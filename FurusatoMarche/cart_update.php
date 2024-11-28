<?php
session_start();
require_once('function.php');

try {
    $pdo = pdo(); // データベース接続
} catch (PDOException $e) {
    $_SESSION['cart_update'] = 'データベースの接続失敗';
}

// セッション変数が正しく設定されているか確認
if (!isset($_SESSION['cart_id'])) {
    $_SESSION['cart_update'] = 'カート情報の取得に失敗';
}

if (isset($_POST['update_cart'])) {
    $quantities = $_POST['quantities'];
    $delete_shohin = isset($_POST['delete_shohin']) ? $_POST['delete_shohin'] : [];

    try {
        echo $delete_shohin[0];
        foreach ($quantities as $shohins_id => $quantity) {
            echo $shohins_id . '→' . $quantity;
            if (in_array($shohins_id, $delete_shohin)) {
                //商品削除
                $sql = 'DELETE FROM cart_details WHERE shohins_id = ? AND carts_id = ?';
                $stmt = $pdo->prepare($sql);
                if (!$stmt->execute([$shohins_id, $_SESSION['cart_id']])) {
                    $_SESSION['cart_update'] = '商品の削除に失敗 商品ID:' . $shohins_id;
                }
            } else {
                //数量更新
                $sql = 'UPDATE cart_details SET cart_de_quant = ? WHERE shohins_id = ? AND carts_id = ?';
                $stmt = $pdo->prepare($sql);
                if (!$stmt->execute([$quantity, $shohins_id, $_SESSION['cart_id']])) {
                    $_SESSION['cart_update'] = '数量の変更に失敗 商品ID:' . $shohins_id;
                }
            }
        }

        // カート合計の再計算
        $sql = 'SELECT SUM(cart_de_quant * shohins_price) AS total FROM cart_details WHERE carts_id = ?';
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$_SESSION['cart_id']])) {
            $_SESSION['cart_update'] = '金額計算に失敗';
        }
        $total = $stmt->fetchColumn();

        // カートの合計金額を更新
        $sql = 'UPDATE carts SET cart_total = ? WHERE cart_id = ?';
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$total, $_SESSION['cart_id']])) {
            $_SESSION['cart_update'] = '金額更新に失敗';
        }

        // 正常終了後のリダイレクト
        header('Location: cart.php'); // カートページへリダイレクト
        exit;
    } catch (Exception $e) {
        // エラー時の処理
        header('Location: toppage.php');
    }
}
