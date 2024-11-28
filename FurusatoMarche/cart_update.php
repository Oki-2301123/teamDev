<?php
session_start();
require_once('function.php');
$pdo = pdo();

if (isset($_POST['update_cart'])) {
    $quantities = $_POST['quantities'];
    $delete_shohin = isset($_POST['delete_shohin']) ? $_POST['delete_shohin'] : [];

    foreach ($quantities as $shohins_id => $quantity) {
        if (in_array($shohins_id, $delete_shohin)) {
            // 商品削除
            $sql = 'DELETE FROM cart_details WHERE shohins_id = ? AND carts_id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$shohins_id, $_SESSION['cart_id']]);
        } else {
            // 数量更新
            $sql = 'UPDATE cart_details SET cart_de_quant = ? WHERE shohins_id = ? AND carts_id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$quantity, $shohins_id, $_SESSION['cart_id']]);
        }
    }

    // カート合計の再計算
    $sql = 'SELECT SUM(cart_de_quant * shohins_price) AS total FROM cart_details WHERE carts_id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['cart_id']]);
    $total = $stmt->fetchColumn();

    $sql = 'UPDATE carts SET cart_total = ? WHERE cart_id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$total, $_SESSION['cart_id']]);

    header('Location: cart_page.php'); // カートページへリダイレクト
    exit;
}
