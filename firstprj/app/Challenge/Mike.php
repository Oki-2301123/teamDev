<?php

namespace App\Challenge;

class Mike
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        $echo('ネコの一覧！');
        foreach ($array['cat'] as $c) {
            $echo($c);
        }
        $echo('イヌの一覧！');
        foreach ($array['dog'] as $d) {
            $echo($d);
        }
    }
    
}
