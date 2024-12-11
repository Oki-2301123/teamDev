<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;

class VanillaController extends Controller
{
    public function getForm()
    {
        return view('vanilla_get');
    }

    public function receivePost(Request $request)
    {
        $path = $request->file('img')->store('image','public');
        $data = [
            'title' => '画像アップロード',
            'impression' => '画像アップロード',
            'photograph' => $path
        ];
        Magazine::create($data);

        $magazine = Magazine::all();
        return view('vanilla_post', compact('magazine'));
    }
}
