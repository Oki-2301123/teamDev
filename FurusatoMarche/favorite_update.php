<?php
session_start();
require_once('function.php');

$pdo = pdo();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['err'] = 'ログインしてください';
    header("Location: login.php"); // ログインページにリダイレクト
    exit;
}
// POSTでadd_favoが送信された場合
if (isset($_POST['add_favo'])) {
    // セッションからユーザーIDを取得
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
// POSTでdel_favoが送信された場合
if (isset($_POST['del_favo'])) {
    $user_id = $_SESSION['user_id'];
    if (isset($_POST['delete_shohin'])) {
        $delete_shohin = $_POST['delete_shohin'];
        foreach ($delete_shohin as $a => $shohins_id) {
            $sql = 'DELETE FROM favorite WHERE shohins_id = ? and users_id = ? ';
            $stmt = $pdo->prepare($sql);
            if (!$stmt->execute([$shohins_id, $user_id])) {
                $_SESSION['fav_info'] = "商品の削除に失敗しました（商品ID: $shohins_id）";
                header("Location: favorite.php");
                exit;
            }
        }

        $_SESSION['fav_info'] = '商品を削除しました。';
        header("Location: favorite.php");
        exit;
    }
    header("Location: favorite.php");
    exit;
}
$_SESSION['login_false'] = '不正なアクセスです。: error_01';
header('Location: login.php');
exit();
