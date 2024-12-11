<?php

namespace App\Challenge;

class Juliet
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        $mes="番目にネコ発見！";
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] === "ニャー") {
                $echo(1+$i.$mes);
            }
        }
    }
}
