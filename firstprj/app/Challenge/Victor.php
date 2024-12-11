<?php

namespace App\Challenge;

class Victor
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        foreach($array['funcs'] as $dec){
            $echo($dec($_1));
        }
    }
}