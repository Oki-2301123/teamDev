<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrapeController extends Controller
{
    public function eatGrape()
    {
        return view('grape_get');
    }

    public function eatLunch(Request $request)
    {
        $date = [
            'name' => $request->name . 'さん、こんにちは！',
            'lunch' => $request->lunch . 'を食べましょう！'
        ];

        return view('grape_post', $date);
    }
}
