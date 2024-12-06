<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feelings;

class KiwiController extends Controller
{
    public function getForm()
    {
        return view('kiwi_get');
    }

    public function createRecode(Request $request)
    {
        $data = [
            'feeling_name' => $request->fname
        ];
        Feelings::create($data);

        return view('kiwi_post', $data);
    }
}
