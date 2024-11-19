<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZGreen03Controller extends Controller
{
    public function getForm()
    {
        return view('zgreen03_form');
    }

    public function submitForm(Request $request)
    {
        $date =[
            'name' => $request ->name,
            'age' => $request ->age,
            'hobby' => $request ->hobby,
        ];

        return view('zgreen03_submit',$date);
    }
}
