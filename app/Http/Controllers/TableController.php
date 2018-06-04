<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('data');
    }

    public function index(){


        return view('table.index');
    }
}
