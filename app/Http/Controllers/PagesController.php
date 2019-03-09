<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function add()
    {
        return view('add');
    }

    public function check()
    {
        return view('validate');
    }

    public function transfer()
    {
        return view('transfer');
    }

}
