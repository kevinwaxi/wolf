<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Create Roles
        $roleSuperAdmin = Roles::create(['name' => 'super-admin', 'details' => 'Systems developer and overall']);
        $roleAdmin = Roles::create(['name' => 'administrator', 'details' => 'Owner and stack holder of the company']);
        $roleTechnician = Roles::create(['name' => 'Technician', 'details' => 'Repair computers and maintain them']);
        $roleModerator = Roles::create(['name' => 'moderator', 'details' => 'Ensure mails are sent, ban accounts']);
        $roleUser = Roles::create(['name' => 'user', 'details' => 'Normal user with basic permissions']);

        //Create Permissions and Assign Role
        $permissions = $this->getPermissions();

        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permissions::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                ]);

                //Super Admin: Role 1
                //Using Gate::before() => Super admin has access to all features by default : AuthServiceProvider@boot

                //Admin: Role 2
                $permission->assignRole($roleAdmin);

                //User: Associate/Moderator 3
                if ($permissionGroup == 'user' || $permissionGroup == 'dashboard') {
                    $permission->assignRole($roleTechnician);
                    $permission->assignRole($roleModerator);
                }

                //User: Role 4
                if ($permissionGroup == 'dashboard') {
                    $permission->assignRole($roleUser);
                }
            }
        }
    }

    public function permissionItem($groupName, $viewOnly = 0)
    {
        $permissions = [
            "$groupName list",
            "$groupName create",
            "$groupName view",
            "$groupName edit",
            "$groupName delete",
        ];

        $permissions = $viewOnly ? ["$groupName view"] : $permissions;

        $permissionItem = [
            'group_name' => "$groupName",
            'permissions' => $permissions,
        ];

        return $permissionItem;
    }

    //Generate Permission Array
    public function getPermissions()
    {
        $permissions = [];
        $permissions[] = $this->permissionItem('dashboard', 1);

        $permissionGroups = [
            'permissions',
            'roles',
            'users',
        ];
        foreach ($permissionGroups as $permissionGroup) {
            $permissions[] = $this->permissionItem($permissionGroup);
        }

        return $permissions;
    }
}
