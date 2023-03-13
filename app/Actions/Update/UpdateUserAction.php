<?php

namespace App\Actions\Update;

class UpdateUserAction
{
    public function execute($request, $user)
    {
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->roles);
    }
}
