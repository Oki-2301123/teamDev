<?php
session_start();
require_once('function.php');

try {
    $pdo = pdo(); // データベース接続
} catch (PDOException $e) {
    $_SESSION['cart_update_error'] = 'データベース接続に失敗しました。';
    header('Location: cart.php');
    exit;
}

// 必要なセッションがあるか確認
if (!isset($_SESSION['cart_id'])) {
    $_SESSION['cart_update_error'] = 'カート情報の取得に失敗しました。';
    header('Location: cart.php');
    exit;
}

if (isset($_POST['update_cart'])) {
    $quantities = isset($_POST['quantities']) ? $_POST['quantities'] : [];
    $delete_shohin = isset($_POST['delete_shohin']) ? $_POST['delete_shohin'] : [];
    try {
        // 商品ごとに処理
        if (isset($quantities)) {
            echo 'b';
            var_dump($quantities);
        }
        echo '<br>';
        if (isset($delete_shohin)) {
            echo 'a';
            var_dump($delete_shohin);
        }
        //exit;
        foreach ($quantities as $shohins_id => $quantity) {
            if ($quantity > 0) {
                // 数量更新
                $sql = 'UPDATE cart_details SET cart_de_quant = ? WHERE shohins_id = ? AND carts_id = ?';
                $stmt = $pdo->prepare($sql);
                if (!$stmt->execute([$quantity, $shohins_id, $_SESSION['cart_id']])) {

                    $_SESSION['cart_update_error'] = "数量の変更に失敗しました（商品ID: $shohins_id）";
                }
            } elseif ($quantity <= 0) {
                // 商品削除
                $sql = 'DELETE FROM cart_details WHERE order_quant = ? ';
                $stmt = $pdo->prepare($sql);
                if (!$stmt->execute([$quantity])) {
                    $_SESSION['cart_update_error'] = "商品の削除に失敗しました（商品ID: $shohins_id）";
                }
            }
        }

        // カート合計の再計算
        $sql = 'SELECT SUM(cart_de_quant * shohins_price) AS total FROM cart_details WHERE carts_id = ?';
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$_SESSION['cart_id']])) {
            $_SESSION['cart_update_error'] = "カート合計金額の計算に失敗しました。";
        }
        $total = $stmt->fetchColumn();

        // カートの合計金額を更新
        $sql = 'UPDATE carts SET cart_total = ? WHERE cart_id = ?';
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$total, $_SESSION['cart_id']])) {
            $_SESSION['cart_update_error'] = "カート合計金額の更新に失敗しました。";
        }

        // 成功メッセージをセットしてリダイレクト
        $_SESSION['cart_update'] = 'カートが正常に更新されました。';
        header('Location: cart.php');
        exit;
    } catch (Exception $e) {
        // エラーメッセージをセッションに保存
        $_SESSION['cart_update_error'] = $e->getMessage();
        header('Location: cart.php');
        exit;
    }
} else {
    $_SESSION['cart_update_error'] = '不正なリクエストです。';
    header('Location: cart.php');
    exit;
}
