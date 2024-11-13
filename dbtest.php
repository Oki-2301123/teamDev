<?php
$pdo = new PDO('mysql:host=mysql311.phy.lolipop.lan;
                dbname=LAA1554893-teamdev;
                charset=utf8', 'LAA1554893', 'teamdev5g');

foreach ($pdo->query('select * from users') as $row) {
    echo '<p>';
    echo '1',$row['user_id'], ':';
    echo '2',$row['user_name'], ':';
    echo '3',$row['user_ruby'], ':';
    echo '4',$row['user_bd'], ':';
    echo '5',$row['user_sex'], ':';
    echo '6',$row['user_mail'], ':';
    echo '7',$row['user_pass'], ':';
    echo '8',$row['user_post'], ':';
    echo '9',$row['user_pref'], ':';
    echo '10',$row['user_city'], ':';
    echo '11',$row['user_address'], ':';
    echo '12',$row['user_building'], ':';
    echo '13',$row['user_phone'], ':';
    echo '</p>';
}

$pdo = null;
