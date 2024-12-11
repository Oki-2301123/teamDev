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
        $data = [
            'name' => $request -> name,
            'color' => $request -> color
        ];

        Color::create($data);

        return view('znavy01_form');
    }
}
