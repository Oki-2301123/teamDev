<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CherryController extends Controller
{
    public function getView(){
        $lists = [
            'shiritori',
            'ringo',
            'gorira',
            'rappa',
            'panke-ki',
            'kitune',
            'neko',
            'kobuta',
            'tanbarin'
        ];

        $data=[
            'list' => $lists
        ];

        return view('cherry', $data);
    }
}
