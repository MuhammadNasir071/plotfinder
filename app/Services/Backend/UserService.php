<?php

namespace App\Services\Backend;

use App\Models\User;

class UserService
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::where('id', $id)->first();
    }

    public function update($request, $id)
    {
        $user = User::where('id', $id)->first();
        if($user){
            User::where('id', $id)->update([
                'status' => $request->status,
                'email_verified_at' => now(),
            ]);
        }
        return;
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
