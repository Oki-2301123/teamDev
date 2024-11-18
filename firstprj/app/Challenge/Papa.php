<?php

namespace App\Challenge;

class Papa
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        if(!isset($_1)){
            $echo('パラメータ1が空！');
        }else if(intval($_2) === 0){ //intval():値をinteger型にする(出来ない場合は0が返ってくる)
            $echo('パラメータ2が数字じゃない！');
        }else if(intval($_3) === 0){ //intval():値をinteger型にする(出来ない場合は0が返ってくる)
            $echo("パラメータ3が数字じゃない！");
        }else if(!($_2<=100)){
            $echo('パラメータ2が大きすぎる！');
        }else if(!($_3>=1)){
            $echo('パラメータ3が小さすぎる！');
        }else{
            $cnt = ceil($_2/ $_3);
            /*
            round():四捨五入
            ceil():切り上げ
            floor():切り捨て
            ※round(値,桁)
            */
            $i=1;
            while($i <= $cnt){
                $echo($_1);
                $i++;
            }
        }
    }
}
