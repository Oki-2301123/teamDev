<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BananaController extends Controller
{
    public function getView()
    {
        $bananas='';
        for($i = 0;$i < 5; $i++){
            $bananas .= 'banana!,';
        }
    $data = [
        'b1' => $bananas,
        'b2' => 'banana!'
    ];
    return view('banana', $data);
    }
}