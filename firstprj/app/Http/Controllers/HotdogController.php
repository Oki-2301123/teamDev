<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotdogController extends Controller
{
    public function getView()
    {
        $data = [
            'rand' => rand(0, 2)
        ];

        return view('hotdog', $data);
    }
}
