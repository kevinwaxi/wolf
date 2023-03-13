<?php

namespace App\Actions\Store;

use App\Models\User;

class StoreUserAction
{
    public function execute($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($request->roles);
    }
}
