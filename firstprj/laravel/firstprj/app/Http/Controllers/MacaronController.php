<?php

namespace App\Http\Controllers;

use App\Models\Feelings;

class MacaronController extends Controller
{
    public function getForm()
    {
        return view('macaron_get');
    }

    public function deleteRecode()
    {
        Feelings::where('id', '=', 1)->delete();

        return view('macaron_post');
    }
}
