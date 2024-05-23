<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolController extends Controller
{
    public function list()
    {
        return view('panel.role.list');
    }

    public function add()
    {
        return view('panel.role.add');
    }
}
