<?php
session_start();
require_once('function.php');

$pdo = pdo();

// POSTでadd_favoが送信された場合
if (isset($_POST['add_favo'])) {
    // セッションからユーザーIDを取得
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['err'] = 'ログインしてください';
        header("Location: login.php"); // ログインページにリダイレクト
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $shohin_id = $_POST['id'];
    $name = $_POST['name'];
    $data = date("Y-m-d");

    // データベースに追加処理
    $sql = 'INSERT INTO favorite(users_id, shohins_id, favorite_add) VALUES (?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    if (!$stmt->execute([$user_id, $shohin_id, $data])) {
        $_SESSION['err'] = '登録できませんでした';
        header("Location: shohin_detail.php?id=" . urlencode($shohin_id) . "&search=" . urlencode($name));
        exit;
    }

    $_SESSION['msg'] = '登録完了';
    header("Location: shohin_detail.php?id=" . urlencode($shohin_id) . "&search=" . urlencode($name));
    exit;
}
