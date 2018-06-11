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

    public function store(User $user){

        $this->validate(request(), [
            "body" => "min:3"
        ]);
        Table::AddPost(request());

        return back();
    }
}
