<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZGreen01Controller extends Controller
{
    public function getForm()
    {
        return view('zgreen01_form');
    }

    public function submitForm()
    {
        return view('zgreen01_submit');
    }
}
