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

        $date=[
            'list' => $lists
        ];

        return view('cherry', $date);
    }
}
