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
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            auth()->user()->createToken('key')->plainTextToken;
            return response()->json([
                'Token' => 'token arrived '
            ]);
        }
        return response()->json([
            'message' => 'email or password is unveiled'
        ]);
    }
}
