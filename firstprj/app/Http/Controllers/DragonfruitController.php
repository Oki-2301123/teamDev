<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DragonfruitController extends Controller
{
    public function getView()
    {
        return view('dragonfruit');
    }
}
