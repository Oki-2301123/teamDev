<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ZNavy04Controller extends Controller
{
    public function getForm()
    {
        $data = [
            'res' => Color::all()
        ];
        return view('znavy04_form', $data);
    }

    public function deleteColor(Request $request)
    {
        Color::where('id',$request->id)->delete();

        $data = [
            'res' => Color::all()
        ];
        return view('znavy04_form', $data);
    }
}
