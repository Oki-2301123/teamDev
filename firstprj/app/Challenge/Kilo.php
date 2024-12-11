<?php

namespace App\Challenge;

class Kilo
{
    public function process($echo,String $_1,String $_2,String $_3, $array)
    {
        for ($i = 1; $i <= 100; $i++) {
            if($i % 3=== 0 && $i % 5 === 0){
                $echo($i." ".$_1." ".$_2);
            }else if ($i % 3=== 0) {
                $echo($i." ".$_1);
            }else if($i % 5 === 0){
                $echo($i." ".$_2);
            }else{
                $echo($i." ".$_3);
            }
        }
    }
}
