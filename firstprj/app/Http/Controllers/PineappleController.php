<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PineappleController extends Controller
{
    public function getForm()
    {
        return view('pineapple_get');
    }

    public function receivePost(Request $request)
    {
        $message = '';

        if($request->has('bakuhatsu')){
            $message = 'ドカーン！';
        }else if($request->has('enjou')){
            $message = 'Yahooニュースに取り上げました!';
        }else if($request->has('saikyo')){
            $message = 'あなたが最強です！';
        }

        $response=[
            'message' => $message
        ];

        return view('pineapple_post', $response);
    }
}
