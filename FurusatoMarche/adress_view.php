<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>
<body><!-- 現在の住所を表示 打田 -->
<?php
 $pdo=new PDO('mysql:host=mysql305.phy.lolipop.lan;
 dbname=LAA1554893-teamdev;
 charset=utf8', 'LAA1554893', 'teamdev5g');
foreach($pdo->query('select * from shohin') as $row){
$post=$row['user_post'];
$pref=$row['user_pref'];
$city=$row['user_city'];
$address=$row['useer_address'];
$building=$row['user_building'];
$phone=$row['user_phone'];
}
?>
    <img src="" alt="">
    <h3>住所変更</h3>
    <h2>現在のご登録住所</h2>
    郵便番号<?php echo $post; ?>
    都道府県<?php echo $pref; ?>
    市区町村<?php echo $city; ?>
    番地<?php echo $address; ?>
    マンション名<?php echo $building; ?>
    電話番号 <?php echo $phone; ?>
    <form action="adress_update.php" method="post">
        <input type="submit" name="" value="編集">
    </form>
</body>
</html>