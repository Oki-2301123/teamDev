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
    pdo();
    foreach($pdo->query('select * from user') as $row){
        $mail=$row['user_mail'];
        $bd=$row['user_bd'];
        $name=$row['user_name'];
        $pass=$row['user_pass'];
        $phone=$row['user_phone'];
    }
    ?>
    <img src="../img/furumaru_title.png" alt="ヘッダー"><br>
    <h3>管理者画面</h3>
    <h2>会員情報</h2>
    <form action="admin_top.php" method="post">
        メールアドレス<input type="text" name="" value="<?php echo $mail; ?>"><br>
        誕生日<input type="text" name="" value="<?php echo $bd; ?>"><br>
        名前<input type="text" name="" value="<?php echo $name; ?>"><br>
        パスワード<input type="text" name="" value="<?php echo $pass; ?>"><br>
        電話番号<input type="text" name="" value="<?php echo $phone; ?>"><br>
        <input type="submit" name="" value="戻る">
        <input type="submit" name="" value="削除">
        <input type="submit" name="" value="完了">
    </form><!-- by打田 -->
</body>
</html>