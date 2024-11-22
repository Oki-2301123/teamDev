<?php
session_start();
//headerでcart画面に移動
$user_id =$_SESSION['user_id'];
require_once('function.php');
$pdo = pdo();

$sql = 'SELECT * FROM carts WHERE users_id = ?';
$data = $pdo->prepare($sql);
$data->execute([$user_id]);
$cnt = $data->rowCount();
if($cnt <= 0){
    $date= Da
    $sql = 'INSERT INTO carts(users_id,
}