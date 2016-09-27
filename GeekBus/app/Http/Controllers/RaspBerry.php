<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RaspBerry extends Controller
{
    public function login(Request $request)
    {
        return "login";
    }

    public function update(Request $request)
    {
        return "update";
    }

    public function shutdown(Request $request)
    {
        return "shutdown";
    }
}
