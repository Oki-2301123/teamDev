<?php
session_start();
if (isset($_POST['incart'])) {
    // 商品IDと数量を取得
    $request_id = $_POST['request_id'];
    $request_name = $_POST['request_name'];
    $quant = $_POST['quant'];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        require_once('function.php');
        $pdo = pdo();

        try {
            // カートの存在チェック
            $sql = 'SELECT * FROM carts WHERE users_id = ?';
            $cart_check_stmt = $pdo->prepare($sql);
            $cart_check_stmt->execute([$user_id]);
            $cart = $cart_check_stmt->fetch(); // 1行だけ取得

            $date = date("Y-m-d");
            if (!$cart) {
                // カートがない場合は作成
                $sql = 'INSERT INTO carts(users_id, cart_create, cart_update) VALUES(?,?,?)';
                $create_cart_stmt = $pdo->prepare($sql);
                $create_cart_stmt->execute([$user_id, $date, $date]);
                $cart_id = $pdo->lastInsertId(); // 新しいカートのIDを取得
                $total = 0;
            } else {
                // 既存のカート情報
                $cart_id = $cart['cart_id'];
                $total = $cart['cart_total'];
            }

            // 商品価格取得
            $sql = 'SELECT shohin_price FROM shohins WHERE shohin_id = ?';
            $get_price_stmt = $pdo->prepare($sql);
            $get_price_stmt->execute([$request_id]);
            $price = $get_price_stmt->fetchColumn();

            // カート詳細に該当商品が存在するか確認
            $sql = 'SELECT * FROM cart_details WHERE carts_id = ? AND shohins_id = ?';
            $check_cart_detail_stmt = $pdo->prepare($sql);
            $check_cart_detail_stmt->execute([$cart_id, $request_id]);
            $cart_detail = $check_cart_detail_stmt->fetch(); // 1行取得

            if ($cart_detail) {
                // すでに存在する場合: 数量を更新（加算ではなく上書き）
                $sql = 'UPDATE cart_details SET cart_de_quant = ?, shohins_price = ? WHERE carts_id = ? AND shohins_id = ?';
                $update_cart_detail_stmt = $pdo->prepare($sql);
                $update_cart_detail_stmt->execute([$quant, $price, $cart_id, $request_id]);
            } else {
                // 存在しない場合: 新規追加
                $sql = 'INSERT INTO cart_details(carts_id, shohins_id, cart_de_quant, shohins_price) VALUES(?,?,?,?)';
                $create_cart_detail_stmt = $pdo->prepare($sql);
                $create_cart_detail_stmt->execute([$cart_id, $request_id, $quant, $price]);
            }

            // カートの合計金額を再計算
            $sql = 'SELECT SUM(cart_de_quant * shohins_price) AS total_price FROM cart_details WHERE carts_id = ?';
            $calculate_total_stmt = $pdo->prepare($sql);
            $calculate_total_stmt->execute([$cart_id]);
            $total_price = $calculate_total_stmt->fetchColumn();

            // 合計金額を更新
            $sql = 'UPDATE carts SET cart_total = ?, cart_update = ? WHERE cart_id = ?';
            $update_cart_stmt = $pdo->prepare($sql);
            $update_cart_stmt->execute([$total_price, $date, $cart_id]);

            $_SESSION['incart'] = true;
            header('Location: toppage.php');
            exit();
        } catch (Exception $e) {
            $_SESSION['error_message'] = 'エラーが発生しました: ' . $e->getMessage();
            header('Location: shohin_detail.php');
            exit();
        }
    } else {
        $_SESSION['shohin_id'] = $request_id;
        $_SESSION['notlogin'] = 'ログインしてください';
        header("Location: shohin_detail.php?id=" . $request_id . "&search=" . $request_name); // リンクで囲む
        exit();
    }
} else {
    $_SESSION['login_false'] = '不正なアクセスです。: error_01';
    header('Location: login.php');
    exit();
}
