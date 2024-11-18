<?php

namespace App\Challenge;

class Whisky
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        $behavior = function ($value) use ($echo) {
            $echo($value);
        };

        $array['func']($behavior);
        
    }
}