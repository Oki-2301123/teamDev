<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feelings;

class YggdrasilController extends Controller
{
    public function getForm()
    {
        $feelings =Feelings::all();
        return  view('yggdrasil', compact('feelings'));
    }

    public function receivePost(Request $request)
    {
        $date=[
            'feeling_name' => 'CSRF!'
        ];

        Feelings::create($date);
        return redirect(route('yggdrasil.post'))->with('message', '登録しました！');
    }
}
