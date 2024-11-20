<?php

namespace App\Challenge;

class Lima
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        foreach ($array as $e) {
            $echo($e);
        }
    }
}
