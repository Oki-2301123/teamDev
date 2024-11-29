<?php
session_start();
require_once('function.php');

try {
    $pdo = pdo(); // データベース接続
} catch (PDOException $e) {
    $_SESSION['cart_update_error'] = 'データベース接続に失敗しました。';
    //header('Location: cart.php');
    echo 'db';
    exit;
}

// 必要なセッションがあるか確認
if (!isset($_SESSION['cart_id'])) {
    $_SESSION['cart_update_error'] = 'カート情報の取得に失敗しました。';
   // header('Location: cart.php');
    echo 'cart';
    exit;
}

if (isset($_POST['update_cart'])) {
    $quantities = $_POST['quantities'];
    $delete_shohin = isset($_POST['delete_shohin']) ? $_POST['delete_shohin'] : [];

    try {
        echo 'a'.var_dump($quantities);
        echo '<br>';
        echo 's'.var_dump($delete_shohin);
        // 商品ごとに処理
        foreach ($quantities as $shohins_id => $quantity) {
            if (in_array($shohins_id, $delete_shohin)) {
                // 商品削除
                $sql = 'DELETE FROM cart_details WHERE shohins_id = ? AND carts_id = ?';
                $stmt = $pdo->prepare($sql);
                if (!$stmt->execute([$shohins_id, $_SESSION['cart_id']])) {
                    throw new Exception("商品の削除に失敗しました（商品ID: $shohins_id）");
                }
            } else {
                // 数量更新
                $sql = 'UPDATE cart_details SET cart_de_quant = ? WHERE shohins_id = ? AND carts_id = ?';
                $stmt = $pdo->prepare($sql);
                if (!$stmt->execute([$quantity, $shohins_id, $_SESSION['cart_id']])) {
                    throw new Exception("数量の変更に失敗しました（商品ID: $shohins_id）");
                }
            }
        }

        // カート合計の再計算
        $sql = 'SELECT SUM(cart_de_quant * shohins_price) AS total FROM cart_details WHERE carts_id = ?';
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$_SESSION['cart_id']])) {
            throw new Exception("カート合計金額の計算に失敗しました。");
        }
        $total = $stmt->fetchColumn();

        // カートの合計金額を更新
        $sql = 'UPDATE carts SET cart_total = ? WHERE cart_id = ?';
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$total, $_SESSION['cart_id']])) {
            throw new Exception("カート合計金額の更新に失敗しました。");
        }

        // 成功メッセージをセットしてリダイレクト
        $_SESSION['cart_update_success'] = 'カートが正常に更新されました。';
        //header('Location: cart.php');
        exit;
    } catch (Exception $e) {
        // エラーメッセージをセッションに保存
        $_SESSION['cart_update_error'] = $e->getMessage();
        //header('Location: cart.php');
        exit;
    }
} else {
    $_SESSION['cart_update_error'] = '不正なリクエストです。';
    // header('Location: cart.php');
    exit;
}
