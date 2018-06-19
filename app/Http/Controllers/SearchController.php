<?php

namespace App\Http\Controllers;

use App\UserData;

class SearchController extends Controller
{
    //

    public function index()
    {
        $this->validate(request(), [
            'query' => 'min:1'
        ]);
        $users = UserData::where('name', 'like', request('query') . '%')
            ->orWhere('surname', 'like', request('query') . '%')
            ->limit(5)
            ->get();

        return view('search.index',compact('users'));
    }
}
