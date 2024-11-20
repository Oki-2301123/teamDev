<?php

namespace App\Challenge;

class Romeo
{
    public function process($echo, $_1, $_2, $_3, $array)
    {
        if (preg_match("/^neko/", $_1)) {
            $echo('ネコファーストだニャ');
        } else {
            $echo('ネコファーストじゃないニャ');
        }
    }
    /*
     先頭
    if (preg_match("/^○○/",$test)) {
	    echo '○○から始まっています';
    }else{
	    echo '○○から始まっていません';
    }

    最後
    if (preg_match("/○○$/",$test)) {
	    echo '○○で終わってます';
    }else{
	    echo '○○で終わってません';
    }
    */
}
