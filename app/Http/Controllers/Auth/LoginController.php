<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email','exists:user,email'],
            'password' => ['required', 'integer', 'min:6'],
        ]);
         //this code to check if user is record in database
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //this code to create token when user login
            $token = auth()->user()->createToken('key')->plainTextToken;
            return response()->json(['access_token' => $token]);
        }

        return  response()->json([
            'message' => 'email or password is unveiled'
        ]);
    }
}
