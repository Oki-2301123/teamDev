<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ZNavy02Controller extends Controller
{
    public function getForm()
    {
        return view('znavy02_form');
    }

    public function findColor(Request $request)
    {
        $q=$request -> data;
        
        
            $n = Color::where('color','like', '%'.$q.'%');
            $data =[
            "res" => $n ->get()
            ];

        return view('znavy02_result', $data);
    }
    
}
