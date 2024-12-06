<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppleController extends Controller
{
    public function  getView(){
        return view('apple');
    }
}
