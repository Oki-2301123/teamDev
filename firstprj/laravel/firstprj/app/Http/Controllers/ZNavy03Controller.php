<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ZNavy03Controller extends Controller
{
    public function getForm()
    {
        $date = [
            'res' => Color::all()
        ];
        return view('znavy03_form', $date);
    }

    public function showUpdateForm(Request $request)
    {
        $q = $request->color_id;
        $n = Color::find($q);
        $date = [
            "res" => $n->get()
        ];
        return view('znavy03_update',$date);
    }

    public function updateColor(Request $request)
    {
        $id=$request -> id;
        $up=[
        'name'=>$request -> name,
        'color'=>$request -> color
        ];

        Color::where('id',$id)->update($up);

         $date = [
            'res' => Color::all()
        ];
        return view('znavy03_form', $date);
    }
}
