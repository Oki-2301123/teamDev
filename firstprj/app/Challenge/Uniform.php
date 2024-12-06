<?php

namespace App\Challenge;

class Uniform
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        foreach ($array as $a) {
            if (!(strpos($a, $_1) === false)) {
                $echo($a . 'は、' . $_1 . 'を含んでいます');
            }
            if (str_starts_with($a, $_2)) {
                $echo($a . 'は、' . $_2 . 'から始まります');
            }
            if (str_ends_with($a, $_3)) {
                $echo($a . 'は、' . $_3 . 'で終わります');
            }
        }
        /*
        strpos(検索対象,検索文字)：見つかった場合、見つかった文字列の位置、見つからなかった場合falseが返る
        str_starts_with(検索対象,検索文字):最初に検索文字で始まるかを確認する、あったらtrue、なかったらfalse
        str_ends_with(検索対象,検索文字):最後に検索文字で終わるかを確認する、あったらtrue、なかったらfalse
        */
    }
}
