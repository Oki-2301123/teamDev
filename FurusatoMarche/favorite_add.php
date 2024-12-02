<?php
// セッション開始
session_start();

// データベース接続
require_once 'function.php';

// ログインしているユーザーがいるか確認
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'ログインが必要です']);
    exit;
}

// JSONデータの受け取り
$request = json_decode(file_get_contents('php://input'), true);

// 商品IDが送信されているか確認
if (isset($request['shohin_id'])) {
    $shohin_id = (int)$request['shohin_id'];
    $user_id = (int)$_SESSION['user_id']; // ログイン中のユーザーID

    // データベース接続
    $pdo = pdo();

    // お気に入りがすでに存在するか確認
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM favorite WHERE users_id = :user_id AND shohins_id = :shohin_id');
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':shohin_id', $shohin_id, PDO::PARAM_INT);
    $stmt->execute();
    $exists = $stmt->fetchColumn();

    if ($exists > 0) {
        // すでにお気に入りに登録されている場合
        echo json_encode(['success' => false, 'message' => 'すでにお気に入りに追加されています']);
    } else {
        // お気に入りに登録
        $stmt = $pdo->prepare('INSERT INTO favorite (users_id, shohins_id, favorite_add) VALUES (:user_id, :shohin_id, NOW())');
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':shohin_id', $shohin_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // 成功
            echo json_encode(['success' => true, 'message' => 'お気に入りに追加しました']);
        } else {
            // 失敗
            echo json_encode(['success' => false, 'message' => 'お気に入りの追加に失敗しました']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => '商品IDが送信されていません']);
}
