<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZGreen02Controller extends Controller
{
    public function getForm()
    {
        return view('zgreen02_form');
    }

    public function submitForm(Request $request)
    {
        $date=[
            'text' => $request->text
        ];

        return view('zgreen02_submit', $date);
    }
}
