<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueenController extends Controller
{
    public function getForm()
    {
        return view('queen');
    }

    public function receivePost(Request $request)
    {
        return redirect(route('queen.get'))
        ->with('message','リダイレクトされたよ！');
    }
}
