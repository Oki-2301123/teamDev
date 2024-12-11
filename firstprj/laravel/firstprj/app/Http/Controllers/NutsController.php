<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feelings;

class NutsController extends Controller
{
    public function getForm()
    {
        return view('nuts_get');
    }

    public function receivePost(Request $request)
    {
        $result1 = Feelings::find($request->fid);
        $result2 = Feelings::where('id', '=', $request->fid)->get();

        $response = [
            'find' => $result1,
            'where' => $result2
        ];

        return view('nuts_post',$response);

    }
}
