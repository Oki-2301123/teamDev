<?php

// セッションを開始する
session_start();
require_once 'function.php'; // 外部ファイルから関数を読み込む

// データベース接続を取得
$pdo = pdo();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    head(); // ヘッダー呼び出し
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
    if (isset($_SESSION['user_id'])) {
        $sql = "SELECT * FROM carts WHERE users_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $cart_check = $stmt->fetch();
        if ($cart_check) {
            $SESSION['msg'] = "カートが見つかりません";
            echo 'cart';
        }
        $sql = "SELECT * FROM users WHERE users_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $user_check = $stmt->fetch();
        if ($user_check) {
            $SESSION['msg'] = "ユーザーが見つかりません";
            echo 'user';
        }
        $users_id = $_SESSION['user_id'];
        $carts_id = $cart_check['cart_id'];
        $order_date = date('y-m-d');
        $order_pay = 'クレジット';
        $order_sent = $user_check['user_pref'] . $user_check['user_city'] . $user_check['user_address'] . $user_check['user_building'];
        $rand = rand(1, 7);
        $order_delive = date($order_date, strtotime("YYYY-mm-dd " . $rand . " day"));
        $order_fee = $cart_check['cart_total'];

        $sql = 'INSERT INTO orders
            (users_id,carts_id,order_date,order_pay,order_sent,order_deliver,order_fee) 
            VALUE(?,?,?,?,?,?,?)';
        $stmt = $pdo->prepare($sql);
        if (!($stmt->execute([$users_id, $carts_id, $order_date, $order_pay, $order_sent, $order_delive, $order_fee]))) {
            $SESSION['msg'] = "注文の作成に失敗しました";
            echo 'order';
            exit;
        }
        //order_de_idを作成（cart_detailからひとつずつ取り出して挿入）
        //すべて入れたらcartテーブルを消す（WHERE＝user_id)
    }
    ?>
</body>

</html>