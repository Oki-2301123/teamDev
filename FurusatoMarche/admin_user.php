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
        $id=$product['user_id'];
        $mail = $product['user_mail'];
        $bd = $product['user_bd'];
        $name = $product['user_name'];
        $rudy = $product['user_ruby'];
        $pass = $product['user_pass'];
        $post = $product['user_post'];
        $pref = $product['user_pref'];
        $city = $product['user_city'];
        $address = $product['user_address'];
        $building = $product['user_building'];
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
        フリガナ<input type="text" name="user_ruby" value="<?=$rudy ?>"><br>
        パスワード<input type="text" name="user_pass" value="<?=$pass ?>"><br>
        郵便番号<input type="text" name="user_post" value="<?=$post ?>"><br>
        都道府県<input type="text" name="user_pref" value="<?=$pref ?>"><br>
        市区町村<input type="text" name="user_city" value="<?=$city ?>"><br>
        番地<input type="text" name="user_address" value="<?=$address ?>"><br>
        マンション名<input type="text" name="user_building" value="<?=$building ?>"><br>
        電話番号<input type="text" name="user_phone" value="<?=$phone ?>"><br>
        <input type="submit" name="return" value="戻る">
        <input type="submit" name="dele" value="削除">
        <input type="submit" name="up" value="完了">
        <input type="hidden" name="user_id" value="<?=$id?>">
    </form><!-- by打田 -->
</body>
</html>