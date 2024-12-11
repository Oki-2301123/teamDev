<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZodiacController extends Controller
{
    public function getForm()
    {
        return view('zodiac');
    }

    public function receivePost(Request $request)
    {
        $sql ="select * from feelings where id= ".$request->feeling_id;
        $results =DB::select($sql);

        $message="";

        foreach($results as $result){
            $message .=$result->feeling_name;
        }

        return redirect(route('zodiac.get'))->with('message','取得！ → '.$message);
    }
}
