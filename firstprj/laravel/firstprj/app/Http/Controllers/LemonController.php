<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feelings;

class LemonController extends Controller
{
    public function getForm()
    {
        return view('lemon_get');
    }

    public function updateRecode(Request $request)
    {
        $data =[
            'feeling_name' => $request->fname
        ];
        Feelings::where('id', '=', 1)->update($data);

        return view('lemon_post', $data);
    }
}
