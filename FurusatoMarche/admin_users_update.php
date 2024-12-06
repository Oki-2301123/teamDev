<?php
ob_start();
require_once 'function.php';
$pdo = pdo();
if (isset($_POST['user_id'])) {
    $shohin_id = $_POST['user_id'];
    $sql = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
    $sql->execute([$user_id]);
    $product = $sql->fetch(PDO::FETCH_ASSOC);

    // 取得した商品情報をフォームに表示
    if ($product) {
        $id = $product['user_id'];
        $mail = $product['user_mail'];
        $bd = $product['user_bd'];
        $name = $product['user_name'];
        $pass = $product['user_pass'];
        $phone = $product['user_phone'];
    }
}

// 削除処理
if (isset($_POST['dele'])) {
    $shohin_id = $_POST['user_id']; 
    $sql = $pdo->prepare('DELETE FROM users WHERE user_id = ?');
    $sql->execute([$user_id]);
    header('Location: admin_top.php');
    exit;
}
if (isset($_POST['up'])) {
    $id = $product['user_id'];
    $mail = $product['user_mail'];
    $bd = $product['user_bd'];
    $name = $product['user_name'];
    $pass = $product['user_pass'];
    $phone = $product['user_phone'];

    $sql = $pdo->prepare('UPDATE users SET 
                            user_mail = ?, user_bd = ?, user_name = ?, user_pass = ?, user_phone = ?
                          WHERE user_id = ?');
    $sql->execute([$mail, $bd, $name, $pass, $phone, $id]);
    header('Location: admin_top.php');
    exit;                   
}
if($_POST['modoru']){
    header('Location: admin_top.php');
    exit;
}
ob_flush();
?>