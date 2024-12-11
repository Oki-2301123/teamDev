<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;

class WorldController extends Controller
{
    public function getForm()
    {
        $magazine = Magazine::all();
        return view('world_get', compact('magazine'));
    }

    public function receivePost(Request $request)
    {
        $response=[
            'message' => ''
        ];

        if($request->has('add')){
            $this->addRecord($request);
            $response['message'] = 'データが挿入されました';

        }elseif($request->has('del')){
            $this->deleteRecord($request);
            $response['message'] = '削除完了しました。';
        }

        return view('world_post', $response);
    }

    private function addRecord(Request $request)
    {
        $path = $request->file('add3')->store('image','public');
        $date = [
            'title' => $request->add1,
            'impression' => $request->add2,
            'photograph' => $path
        ];
        Magazine::create($date);
    }

    private function deleteRecord(Request $request)
    {
        Magazine::where('id', '=', $request->id)->delete();
    }
}
