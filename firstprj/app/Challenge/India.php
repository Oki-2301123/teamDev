<?php

namespace App\Challenge;

class India
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        for ($i = 0; $i < count($array); $i++) {
            $echo($array[$i]);
        }
    }
}
