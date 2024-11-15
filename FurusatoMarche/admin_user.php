<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>
<body>
<?php
    require_once 'function.php';
    head();//ヘッダー呼び出し
    $pdo=new PDO('mysql:host=mysql305.phy.lolipop.lan;
                 dbname=LAA1554893-teamdev;
                 charset=utf8', 'LAA1554893', 'teamdev5g');
    foreach($pdo->query('select * from shohin') as $row){
        $email=$row['email'];
        $birth=$row['birth_date'];
        $name=$row['name'];
        $pass=$row['password'];
        $phone=$row['phone_number'];
    }
    ?>
    <h3>管理者画面</h3>
    <h2>会員情報</h2>
    <form action="admin_top.php" method="post">
        メールアドレス<input type="text" name="" value="<?php echo $email; ?>"><br>
        誕生日<input type="text" name="" value="<?php echo $birth; ?>"><br>
        名前<input type="text" name="" value="<?php echo $name; ?>"><br>
        パスワード<input type="text" name="" value="<?php echo $pass; ?>"><br>
        電話番号<input type="text" name="" value="<?php echo $phone; ?>"><br>
        <input type="submit" name="" value="戻る">
        <input type="submit" name="" value="削除">
        <input type="submit" name="" value="完了">
    </form><!-- by打田 -->
</body>
</html>