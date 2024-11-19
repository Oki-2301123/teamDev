<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feelings;

class OrangeController extends Controller
{
    public function getForm()
    {
        return view('orange_get');
    }

    public function magic()
    {
        $data = [
            'feeling_name' => '魔法をかけられた'
        ];

        $new =[
        'new' => Feelings::create($data)
        ];

        $find = Feelings::all();

        return view('orange_post', $new,compact('find'));
    }
}
