<?php

namespace App\Challenge;

class November
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        $echo('今日のご飯一覧！');
        foreach ($array['foods'] as $f) {
            $echo($f);
        }
        $echo('飲み物はコレ！');
        $echo($array['drink']);
    }
}
