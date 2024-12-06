<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IcecreamController extends Controller
{
    public function getView(Request $request)
    {
        $data = [
            'text' => $request->text
        ];

        return view('icecream', $data);
    }
}
