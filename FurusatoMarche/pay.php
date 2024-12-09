<?php

// セッションを開始する
session_start();
require_once 'function.php'; // 外部ファイルから関数を読み込む

// データベース接続を取得
$pdo = pdo();
if (isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM carts WHERE users_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_id']]);
    $cart_check = $stmt->fetch();
    if (!($cart_check)) {
        $SESSION['msg'] = "カートが見つかりません";
        header('Location: toppage.php');
        exit;
    }

    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_id']]);
    $user_check = $stmt->fetch();
    if (!($user_check)) {
        $SESSION['msg'] = "ユーザーが見つかりません";
        header('Location: toppage.php');
        exit;
    }
    $users_id = $_SESSION['user_id'];
    $carts_id = $cart_check['cart_id'];
    $order_date = date('Y-m-d'); // 今日の日付
    $order_pay = 'クレジット';
    $order_sent = $user_check['user_pref'] . $user_check['user_city'] . $user_check['user_address'] . $user_check['user_building'];
    $rand = rand(1, 7); // 1から7のランダムな日数
    $order_delive = date('Y-m-d', strtotime($order_date . " + $rand days")); // ランダムな日数を加算
    $order_fee = $cart_check['cart_total'];

    $sql = 'INSERT INTO orders
            (users_id,carts_id,order_date,order_pay,order_sent,order_delive,order_fee) 
            VALUE(?,?,?,?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    if (!($stmt->execute([$users_id, $carts_id, $order_date, $order_pay, $order_sent, $order_delive, $order_fee]))) {
        $SESSION['msg'] = "注文の作成に失敗しました";
        header('Location: toppage.php');
        exit;
    }
    $sql = 'SELECT * FROM orders WHERE carts_id = ?';
    $orders_stmt = $pdo->prepare($sql);
    $orders_stmt->execute([$carts_id]);
    foreach ($orders_stmt as $data) {
        $orders_id = $data['order_id'];
    }

    $sql = 'SELECT * FROM cart_details WHERE carts_id = ?';
    $cart_stmt = $pdo->prepare($sql);
    if (!($cart_stmt->execute([$carts_id]))) {
        $SESSION['msg'] = "カートの取り出しに失敗しました";
        header('Location: toppage.php');
        exit;
    }

    foreach ($cart_stmt as $data) {
        $carts_id = $data['carts_id'];
        $shohins_id = $data['shohins_id'];
        $order_quant = $data['cart_de_quant'];
        $shohins_price = $data['shohins_price'];

        $sql = 'INSERT INTO order_details
            (orders_id,shohins_id,order_quant,shohins_price)
            VALUE(?,?,?,?)';
        $create_orders_de = $pdo->prepare($sql);
        if (!($create_orders_de->execute([$orders_id, $shohins_id, $order_quant, $shohins_price]))) {
            $SESSION['msg'] = "注文詳細の作成に失敗しました";
            header('Location: toppage.php');
            exit;
        }
        $sql = 'DELETE FROM cart_details WHERE shohins_id=? and carts_id = ?';
        $delete_cart_de = $pdo->prepare($sql);
        if (!($delete_cart_de->execute([$shohins_id, $carts_id]))) {
            $SESSION['msg'] = "カート詳細の削除に失敗しました";
            header('Location: toppage.php');
            exit;
        }
    }
    $SESSION['msg'] = "購入完了しました。";
    header('Location: toppage.php');
    exit;
}
