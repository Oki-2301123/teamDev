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
    head();
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $pdo=pdo();
        $sql = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
    $sql->execute([$user_id]);
    $product = $sql->fetch(PDO::FETCH_ASSOC);

    // 取得した商品情報をフォームに表示
    if ($product) {
        $mail = $product['user_mail'];
        $bd = $product['user_bd'];
        $name = $product['user_name'];
        $pass = $product['user_pass'];
        $phone = $product['user_phone'];
    }
    }
?>
    <h3>管理者画面</h3>
    <h2>会員情報</h2>
    <form action="admin_users_update.php" method="post">
        メールアドレス<input type="text" name="user_mail" value="<?=$mail ?>"><br>
        誕生日<input type="text" name="user_bd" value="<?=$bd ?>"><br>
        名前<input type="text" name="user_name" value="<?=$name ?>"><br>
        パスワード<input type="text" name="user_pass" value="<?=$pass ?>"><br>
        電話番号<input type="text" name="user_phone=" value="<?=$phone ?>"><br>
        <input type="submit" name="modoru" value="戻る">
        <input type="submit" name="dele" value="削除">
        <input type="submit" name="up" value="完了">
    </form><!-- by打田 -->
</body>
</html>