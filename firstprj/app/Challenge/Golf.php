<?php

namespace App\Challenge;

class Golf
{
    public function process($echo, String $_1, int $_2, $_3)
    {
        for($i=1;$i<=$_2;$i++){
            $echo($_1);
        }
    }
}