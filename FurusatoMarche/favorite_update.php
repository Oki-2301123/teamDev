<?php
session_start();
require_once('function.php');

$pdo = pdo();

// ユーザーがログインしているか確認
if (!isset($_SESSION['user_id'])) {
    $_SESSION['err'] = 'ログインしてください';
    header("Location: login.php");
    exit;
}

// お気に入りを追加・削除する処理
if (isset($_POST['toggle_favo'])) {
    $user_id = $_SESSION['user_id'];
    $shohin_id = $_POST['id'];
    $name = $_POST['name'];

    // お気に入りに存在するか確認
    $sql = 'SELECT * FROM favorite WHERE users_id = ? AND shohins_id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $shohin_id]);
    $favorite = $stmt->fetch();

    if ($favorite) {
        // すでに存在する場合は削除
        $sql = 'DELETE FROM favorite WHERE users_id = ? AND shohins_id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $shohin_id]);
        $_SESSION['msg'] = 'お気に入りを削除しました。';
    } else {
        // 存在しない場合は追加
        $sql = 'INSERT INTO favorite (users_id, shohins_id, favorite_add) VALUES (?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $shohin_id, date('Y-m-d')]);
        $_SESSION['msg'] = 'お気に入りに追加しました。';
    }

    // リダイレクトで詳細ページに戻る
    header("Location: shohin_detail.php?id=" . urlencode($shohin_id) . "&search=" . urlencode($name));
    exit;
}

// 不正なアクセスの場合
$_SESSION['err'] = '不正なアクセスです。';
header('Location: login.php');
exit;
