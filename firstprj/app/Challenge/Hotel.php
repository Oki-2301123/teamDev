<?php

namespace App\Challenge;

class Hotel
{
    public function process($echo, $_1, $_2, $_3)
    {
        $array = ['ニャー', 'ワン', 'ブー'];
        for ($i = 0; $i < 3; $i++) {
            $echo($array[$i]);
        }
    }
}
