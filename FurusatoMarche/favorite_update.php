<?php
session_start();
require_once('function.php');

$pdo = pdo();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['err'] = 'ログインしてください';
    header("Location: login.php");
    exit;
}

if (isset($_POST['toggle_favo'])) { // トグルボタンが押された場合
    $user_id = $_SESSION['user_id'];
    $shohin_id = $_POST['id'];
    $name = $_POST['name'];
    $data = date("Y-m-d");

    // 商品がお気に入りに存在するか確認
    $sql = 'SELECT * FROM favorite WHERE users_id = ? AND shohins_id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $shohin_id]);
    $favorite = $stmt->fetch();

    if ($favorite) {
        // 存在する場合、削除する
        $sql = 'DELETE FROM favorite WHERE users_id = ? AND shohins_id = ?';
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$user_id, $shohin_id])) {
            $_SESSION['fav_info'] = 'お気に入りから削除しました';
        } else {
            $_SESSION['fav_info'] = '削除に失敗しました';
        }
    } else {
        // 存在しない場合、追加する
        $sql = 'INSERT INTO favorite (users_id, shohins_id, favorite_add) VALUES (?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$user_id, $shohin_id, $data])) {
            $_SESSION['fav_info'] = 'お気に入りに追加しました';
        } else {
            $_SESSION['fav_info'] = '追加に失敗しました';
        }
    }

    // 元のページにリダイレクト
    header("Location: shohin_detail.php?id=" . urlencode($shohin_id) . "&search=" . urlencode($name));
    exit;
}

$_SESSION['login_false'] = '不正なアクセスです。: error_01';
header('Location: login.php');
exit;
