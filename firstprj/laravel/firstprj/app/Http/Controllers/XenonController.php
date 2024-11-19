<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XenonController extends Controller
{
    public function getForm()
    {
        return view('xenon_get');
    }

    public function receivePost(Request $request)
    {
        $response = [
            'message' => $request->date
        ];

        return view('xenon_post', $response);
    }
}
