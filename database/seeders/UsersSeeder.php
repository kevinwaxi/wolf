<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createUser('developer', 'super-admin');
        $this->createUser('administrator', 'administrator');
        $this->createUser('user', 'user');
    }

    public function createUser($username, $role, $password = 'password')
    {
        $user = User::create([
            'name' => $username,
            'email' => $username.'@'.$username.'.com',
            'phone' => random_int(254700000000, 254799999999),
            'password' => bcrypt("$password"),
        ]);

        $user->assignRole($role);
    }
}
