<?php

namespace App\Http\Controllers;

use App\Models\Feelings;

class JamController extends Controller
{
    public function getView()
    {
        $feelings = Feelings::all();
        return view('jam', compact('feelings'));
    }
}
