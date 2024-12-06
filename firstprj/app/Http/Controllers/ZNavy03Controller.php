<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ZNavy03Controller extends Controller
{
    public function getForm()
    {
        $data = [
            'res' => Color::all()
        ];
        return view('znavy03_form', $data);
    }

    public function showUpdateForm(Request $request)
    {
        $q = $request->color_id;
        $n = Color::where('id',$q)->get();
        $data = [
            "res" => $n
        ];
        return view('znavy03_update',$data);
    }

    public function updateColor(Request $request)
    {
        $id=$request -> id;
        $up=[
        'name'=>$request -> name,
        'color'=>$request -> color
        ];

        Color::where('id',$id)->update($up);

         $data = [
            'res' => Color::all()
        ];
        return view('znavy03_form', $data);
    }
}
