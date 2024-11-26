<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('function.php');
    head(); //ヘッダーの呼び出し
    ?>
    <div class="subject-line">
        <div class="subject">
            <item class="subject1">ランキング</item>
            <item class="subject2">地域で探す</item>
            <item class="subject3">カテゴリ別</item>
            <item class="subject4">セール商品</item>
            <item class="subject5">特集</item>
        </div>
    </div>
    <?php
    pdo();
    if (isset($_SESSION['user_id'])) {
        $sql = 'SELECT * FROM carts WHERE users= ?';
        $find_carts = $pdo->prepare($sql);
        $find_carts->execute([$_SESSION['user_id']]);
        foreach ($find_carts as $data) {
            $carts_id = $data['cart_id'];
        }

        $sql = 'SELECT * FROM cart_details WHERE carts_id = ?';
        $view_cart = $pdo->prepare($sql);
        $view_cart->execute([$carts_id]);
        foreach ($view_cart as $data) {
            echo 
            '<div calass="favo_box">
            
            </div>';
        }
    } else {
        echo '<h1>ログインしてください</h1>';
        echo '<h3><a href="login.php">ログイン画面はこちら</a></h3>';
    }
    ?>
</body>

</html>