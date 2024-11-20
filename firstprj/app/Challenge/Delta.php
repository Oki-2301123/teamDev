<?php

namespace App\Challenge;

class Delta
{
    public function process($echo, String $_1, String $_2, $_3)
    {
        if ($_1 === "inu" && $_2 === "wan") {
            $echo('認証完了だワン');
        } else if ($_1 === "hiyoko" && $_2 === "piyo") {
            $echo('認証完了だピヨ');
        } else {
            $echo('ダメだメ～');
        }
    }
}
