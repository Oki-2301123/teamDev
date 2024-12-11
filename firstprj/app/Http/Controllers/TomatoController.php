<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feelings;

class TomatoController extends Controller
{
    public function getForm()
    {
        $feelings = Feelings::all();
        return view('tomato', compact('feelings'));
    }

    public function receivePost(Request $request)
    {

        $message='';

        if($request->has('create')){
            $data =[
                'feeling_name' => $request->create_feeling
            ];

            Feelings::create($data);
            $message='気分を作成しました！→'.$request->create_feeling;

            return redirect(route('tomato.get'))->with('text',$message);

        }elseif($request->has('update')){
            $data =[
                'feeling_name' => $request->update_feeling                
            ];

            Feelings::where('id', '=', $request->emo)->update($data);
            $message='更新しました！→'.$request->update_feeling;

            return redirect(route('tomato.get'))->with('text',$message);

        }elseif($request->has('delete')){
            Feelings::where('id', '=', $request->emo)->delete();
            $message='気分を削除しました！';

            return redirect(route('tomato.get'))->with('text',$message);
        }
    }
}
