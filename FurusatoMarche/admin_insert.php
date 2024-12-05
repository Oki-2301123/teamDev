<?php
require_once 'function.php';
$pdo = pdo();
$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$option = $_POST['option'];
$explain = $_POST['explain'];
$made = $_POST['made'];
$seller = $_POST['seller'];
$pict = $_FILES['pict']['name'];

$sql = $pdo->prepare('INSERT INTO shohins (shohin_name,shohin_price,shohin_stock,shohin_option,
                    shohin_explain,shohin_made,shohin_seller,shohin_pict) VALUES (?,?,?,?,?,?,?,?)');
$sql->execute([$name, $price, $stock, $option, $explain, $made, $seller, $pict]);
$pdo = null;
header('Location: admin_top.php');
exit;
?>