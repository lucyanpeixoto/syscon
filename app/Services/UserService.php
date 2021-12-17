<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Exception;

class UserService
{
    public static function create($request)
    {
        try {
            return User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
}
