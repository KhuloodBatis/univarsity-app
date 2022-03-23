<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register(Request $request)
    {   
        $request->validate([
            'name' => ['required', 'not_regex:/^Dr\..*/'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required','integer', 'min:6'],
            'mobile' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
        ]);
        //to assign Role to user as teacher
        $user->assignRole('teacher');
        //to create token after register
        $token = $user->createToken('key')->plainTextToken;

        return response()->json(['access_token' => $token]);
    }
}
