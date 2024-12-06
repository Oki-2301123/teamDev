<?php

namespace App\Challenge;

class Europe
{
    public function process($echo, String $_1, $_2, $_3)
    {
        if($_1 === "inu" ){
            $echo('ワン');
        }else if($_1 === "neko" ){
            $echo('ニャー');
        }else if($_1 === "buta"){
            $echo('ブー');
        }else{
            $echo('メー');
        }
    }
}