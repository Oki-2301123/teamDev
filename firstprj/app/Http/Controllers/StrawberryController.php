<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feelings;

class StrawberryController extends Controller
{
    public function getForm()
    {
        $feelings = Feelings::all();
        return view('strawberry', compact('feelings'));
    }

    public function receivePost(Request $request)
    {
        $data =[
            'feeling_name' => $request->update_feeling
        ];

        $message='';

        if($request->has('update')){
            Feelings::where('id', '=', $request->emo)->update($data);
            $message='更新しました！→'.$request->update_feeling;

            return redirect(route('strawberry.get'))->with('text',$message);

        }elseif($request->has('delete')){
            Feelings::where('id', '=', $request->emo)->delete();
            $message='気分を削除しました！';

            return redirect(route('strawberry.get'))->with('text',$message);
        }
    }
}
