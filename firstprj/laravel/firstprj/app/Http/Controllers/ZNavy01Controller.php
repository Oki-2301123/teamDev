<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ZNavy01Controller extends Controller
{
    public function getForm()
    {
        return view('znavy01_form');
    }

    public function saveColor(Request $request)
    {
        $date = [
            'name' => $request -> name,
            'color' => $request -> color
        ];

        Color::create($date);

        return view('znavy01_form');
    }
}
