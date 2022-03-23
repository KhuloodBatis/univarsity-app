<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'alpha'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'integer', 'min:6'],
            'mobile' => ['required'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
        ]);
        //this code to assign role for user as student
        $user->assignRole('student');
        //this code to create token when user register
        $token = $user->createToken('key')->plainTextToken;
        return response()->json([
            'status' => 'token arrived ',
            'token' => $token
        ]);
    }
}
