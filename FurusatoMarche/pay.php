<?php

// セッションを開始する
session_start();
require_once 'function.php'; // 外部ファイルから関数を読み込む

// データベース接続を取得
$pdo = pdo();

// 必須のセッションおよびPOSTデータが存在するか確認
if (!isset($_SESSION['users_id'], $_POST['carts_id'], $_POST['overallTotal'])) {
    
die("必要なデータが不足しています。"); // 必要なデータがない場合は処理を中止
}

// セッションとPOSTからデータを取得
$users_id = $_SESSION['users_id']; // ユーザーID
$carts_id = $_POST['carts_id']; // カートID
$order_date = date("y-m-d"); // 注文日（現在の日付）
$order_pay = 'クレジットカード'; // 支払い方法を固定で設定

// ユーザーの住所情報を取得するSQLを準備
$sql = "SELECT user_pref, user_city, user_address, user_building FROM users WHERE user_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$users_id]); // ユーザーIDを使って住所情報を取得
$user = $stmt->fetch(PDO::FETCH_ASSOC); // 1行だけ取得

// 住所情報が見つからなかった場合のエラーハンドリング
if (!$user) {
    echo 'エラー：住所情報の取得に失敗しました。';
    exit;
}

// 住所を1つの文字列に結合
$order_sent = $user['user_pref'] . $user['user_city'] . $user['user_address'] . $user['user_building'];
$order_delive = date("y-m-d", strtotime("+2 day")); // 配送予定日（2日後）

$
$order_fee = (float)$_POST['overallTotal']; // 総額（数値として扱う）

// ユーザーが既に注文を持っているか確認するSQLを準備
$sql = $pdo->prepare('SELECT * FROM orders WHERE users_id = ?');
$sql->execute([$users_id]); // ユーザーIDで検索
$row_count = $sql->rowCount(); // ヒットした行数を取得

try {
// トランザクションを開始（複数のSQL操作をまとめて行う）
    $pdo->beginTransaction();

    // ユーザーが注文を持っていない場合、新規注文を作成
    if ($row_count <= 0) {
        // 新規注文を登録するSQLを準備
        
$sql = $pdo->prepare('INSERT INTO orders (users_id, carts_id, order_date, order_pay, order_sent, order_delive, order_fee) 
            VALUES (?, ?, ?, ?, ?, ?, ?)');
        
       
$sql->execute([$users_id, $carts_id, $order_date, $order_pay, $order_sent, $order_delive, $order_fee]);

// `orders_id`（自動生成された注文ID）を取得
        $orders_id = $pdo->lastInsertId();
    }

    // 注文詳細（商品の情報）を登録する処理
    if (isset($_POST['pay_id']) && is_array($_POST['pay_id'])) {
        
       
// 複数の商品情報をループで処理
        
    
foreach ($_POST['pay_id'] as $index => $shohin_id) {
            
           
$order_quant = $_POST['order_quant'][$index] ?? 1; // 商品数量（デフォルトは1）
            $shohins_price = $_POST['shohins_price'][$index] ?? 0.0; // 商品単価（デフォルトは0.0）

            

// 注文詳細を登録するSQLを準備
            $sql = $pdo->prepare(
                
               
'INSERT INTO order_details (orders_id, shohins_id, order_quant, shohins_price) VALUES (?, ?, ?, ?)'
            );
            
$sql->execute([$orders_id, $shohin_id, $order_quant, $shohins_price]); // 詳細を登録
        }
    }

// トランザクションを確定（すべての処理をデータベースに反映）
    
   
$pdo->commit();

    // 処理成功のメッセージを表示
    echo "注文と注文詳細が正常に作成されました。";
} catch (Exception $e) {
    // エラーが発生した場合、トランザクションをロールバック（変更を取り消し）
    $pdo->rollBack();

    // エラーメッセージを表示
    die("エラーが発生しました: " . $e->getMessage());
}
?>