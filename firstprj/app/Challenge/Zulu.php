<?php

namespace App\Challenge;

class Zulu
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        //↓パスワードを検索するコード
        //使用する文字列　+-*/@[]#$%

        //パスワード→　]#*#@+*

        $alp = str_split('+-*/@[]#$%');
        $generator = function () {
            $sum = 0;
            for ($i = 1; $i < 2024; $i++) {
                $sum += $i;
            }
            return $sum;
        };
        $target = $generator();
        $pass = '';
        $passlen = 0;
        while ($target != 0) {//パスワード作成
            $pass .= $alp[$target % count($alp)];
            $target = floor($target / count($alp));
            $passlen++;//パスワードの文字数
        }
        $echo('文字数：'.$passlen);
        $i = 0;
        $ans = '';
        foreach (str_split($pass) as $char) {//一文字ずつ文字を比較
            $indices = array_keys($alp, $char);  // $alp 配列内で $char を検索
            //↑の中身Array ( [0] => ｘ ) 
            $i++;
            foreach ($indices as $key => $value) {
                $echo($i . '文字目：' . $alp[$value]);
                $ans .= $alp[$value];
            }
        }
        $echo('パスワード:→　　'.$ans);

        $echo('↓結果↓');
        //あっているか確認するコード
        $array['auth']($echo,$_1);
    }
}
