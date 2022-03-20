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
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'mobile' => ['required'],
        ]);
        $teacher = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
        ]);

        $teacher->createToken('key')->plainTextToken;
        return response()->json([
            'Token' => 'token arrived '
        ]);
    }
}
