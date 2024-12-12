<?php
require_once 'function.php';
$pdo = pdo();
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $sql = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
    $sql->execute([$user_id]);
    $product = $sql->fetch(PDO::FETCH_ASSOC);

    // 取得した商品情報をフォームに表示
    if ($product) {
        $id=$product['user_id'];
        $mail = $product['user_mail'];
        $bd = $product['user_bd'];
        $name = $product['user_name'];
        $rudy = $product['user_ruby'];
        $pass = $product['user_pass'];
        $post = $product['user_post'];
        $pref = $product['user_pref'];
        $city = $product['user_city'];
        $address = $product['user_address'];
        $building = $product['user_building'];
        $phone = $product['user_phone'];
    }
}

// 削除処理
if (isset($_POST['dele'])) {
    $user_id = $_POST['user_id']; 
    $sql = $pdo->prepare('DELETE FROM users WHERE user_id = ?');
    $sql->execute([$user_id]);
    header('Location: admin_top.php');
    exit;
}
if (isset($_POST['up'])) {
    $id = $_POST['user_id'];
    $mail = $_POST['user_mail'];
    $bd = $_POST['user_bd'];
    $name = $_POST['user_name'];
    $rudy = $_POST['user_ruby'];
    $pass = $_POST['user_pass'];
    $post = $_POST['user_post'];
    $pref = $_POST['user_pref'];
    $city = $_POST['user_city'];
    $address = $_POST['user_address'];
    $building = $_POST['user_building'];
    $phone = $_POST['user_phone'];

    $sql = $pdo->prepare('UPDATE users SET 
                            user_mail = ?, user_bd = ?, user_name = ?,user_ruby = ?, user_pass = ?, user_post = ?, 
                            user_pref = ?, user_city = ?, user_address = ?, user_building = ?, user_phone = ?
                          WHERE user_id = ?');
    $sql->execute([$mail, $bd, $name, $rudy, $pass, $post, $pref, $city, $address, $building, $phone, $id]);
    header('Location: admin_top.php');
    exit;                   
}
if($_POST['back']){
    header('Location: admin_top.php');
    exit;
}
?>