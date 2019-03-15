<?php

namespace App\Http\Controllers;

use App\Transfer;

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
        $recipients = Transfer::all();
        return view('transfer')->with('recipients', $recipients);
    }

    public function otp()
    {
        return view('otp');
    }

}
