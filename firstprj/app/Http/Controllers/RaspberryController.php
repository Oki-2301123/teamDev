<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Feelings;

class RaspberryController extends Controller
{
    public function getForm()
    {
        $feelings = Feelings::all();
        return view('raspberry', compact('feelings'));
    }

    public function receivePost(Request $request)
    {
        $data =[
            'feeling_name' => $request->fname_update
        ];

        Feelings::where('id', '=', $request->feeling)->update($data);

        $message = '更新完了！→　'.$request->fname_update;
        return redirect(route('raspberry.get'))->with('message',$message); 
    }
}
