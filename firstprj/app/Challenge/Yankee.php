<?php

namespace App\Challenge;

class Yankee
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        //Aが50、Bが200
        
        $a_func=function($a){
            if($a === 50){
                return true;
            }else{
                return false;
            }
        };

        $b_func=function($b){
            if($b === 200){
                return true;
            }else{
                return false;
            }
        };

        $res=$array['func']($echo,$a_func,$b_func);

        $echo($res);
    }
}
