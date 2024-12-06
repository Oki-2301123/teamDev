<?php

namespace App\Challenge;

class Quebec
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        $echo(pathinfo($_1)["filename"]);
        $echo(pathinfo($_2)["filename"]);
        $echo(pathinfo($_3)["filename"]);

        /*
        $info = pathinfo('/test/temp/exam/index.php');
        
        array(4) {
            ["dirname"]=>
            string(15) "/test/temp/exam" :ファイル名を除くディレクトリパス
            ["basename"]=>
            string(9) "index.php" :ディレクトリパスを除くファイル名
            ["extension"]=>
            string(3) "php" :引数で指定したファイル名の拡張子だけを抽出
            ["filename"]=>
            string(5) "index" :引数で指定したファイル名の拡張子を除いたファイル名を取得
        }

        配列で返されるためキー名を指定して持ってくる（今回の場合は[filename]）
        */
    }
}
