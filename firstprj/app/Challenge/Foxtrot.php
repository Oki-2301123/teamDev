<?php

namespace App\Challenge;

class Foxtrot
{
    public function process($echo, String $_1, $_2, $_3)
    {
        for($i=1;$i<=5;$i++){
            $echo($_1);
        }
    }
}