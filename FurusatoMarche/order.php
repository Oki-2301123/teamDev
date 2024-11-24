<?php
session_start();
// headerでcart画面に移動
$user_id = $_SESSION['user_id'];
require_once('function.php');
$pdo = pdo();

try {
    // カートの存在チェック
    $sql = 'SELECT * FROM carts WHERE users_id = ?';
    $data = $pdo->prepare($sql);
    $data->execute([$user_id]);
    $cnt = $data->rowCount();

    if ($cnt <= 0) {
        $date = date("Y-m-d");
        $cart_ins = 'INSERT INTO carts(users_id, cart_create, cart_update) VALUES(?,?,?)';
        $insdata = $pdo->prepare($cart_ins);
        $insdata->execute([$user_id, $date, $date]);
    }

    // カートIDを取得
    $result = $data->fetchAll();
    foreach ($result as $a) {
        $cart_id = $a['cart_id'];
    }

    // 商品価格取得
    $get_price = 'SELECT shohin_price FROM shohins WHERE shohin_id = ?';
    $get_price_stmt = $pdo->prepare($get_price);
    $get_price_stmt->execute([$_POST['request_id']]);
    $price = $get_price_stmt->fetchColumn();

    // カート詳細を追加
    $cart_detail = 'INSERT INTO cart_details(carts_id, shohins_id, cart_de_quant, shohins_price) VALUES(?,?,?,?)';
    $create_cart_detail = $pdo->prepare($cart_detail);
    $create_cart_detail->execute([$cart_id, $_POST['request_id'], $_POST['quant'], $price]);

    $_SESSION['incart'] = true;
    header('Location: toppage.php');
    exit(); // スクリプトを終了
} catch (PDOException $e) {
    $_SESSION['incart'] = false;
    header('Location: shohin_detail.php');
    exit(); // スクリプトを終了
}
