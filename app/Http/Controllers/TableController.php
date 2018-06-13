<?php

namespace App\Http\Controllers;

use App\Table;
use App\User;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('table.index');
    }
}
