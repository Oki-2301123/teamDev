<?php

namespace App\Challenge;

class Xray
{
    public function process($echo, $_1, $_2, $_3, $array)
    {

        $ssr_behavior = function ($r) use ($echo) {
            $echo($r.": SSR");
        };
        $sr_behavior = function ($r) use ($echo) {
            $echo($r.": SR");
        };
        $r_behavior = function ($r) use ($echo) {
            $echo($r.": R");
        };
        $n_behavior = function ($r) use ($echo) {
            $echo($r.": N");
        };

        $array['gacha']($_1, $ssr_behavior, $sr_behavior, $r_behavior, $n_behavior);
    }
}
