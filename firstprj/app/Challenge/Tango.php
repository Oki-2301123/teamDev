<?php

namespace App\Challenge;

class Tango
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        if(intval($_1) === 0){
            $echo("数字じゃないよ！");
        }else if(!($_1 <= $array['max'])){
            $echo("数字が".$array['max']."より大きいよ！");
        }else if(!($_1 >= $array['min'])){
            $echo("数字が".$array['min']."より小さいよ！");
        }else{
            $n='';
            while($_1 > ($array['base']-1)){
                $n = $_1 % $array['base'] . $n;
                $_1 = floor($_1 / 2);
            }

            $n = $_1. $n;

            $echo($n);
        }
    }

}