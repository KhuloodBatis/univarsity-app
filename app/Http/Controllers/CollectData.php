<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectData extends Controller
{
    public function getData($key, $value)
    {

        return collect([
            "id" => $value->id,
            "name" => $value->name
        ]);
    }
}
