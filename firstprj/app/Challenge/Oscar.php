<?php

namespace App\Challenge;

class Oscar
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        $_1 *= 4;
        $_2 *= 2;

        $_3 += $_1+$_2;
        
        $echo($_3);
    }
}
