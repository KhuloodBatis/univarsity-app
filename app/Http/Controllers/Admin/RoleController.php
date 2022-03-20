<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;


class RoleController extends Controller
{
    public function addRole(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);
        $user = Role::create([
            'name' => $request->name
        ]);
        return $request;
    }
}
