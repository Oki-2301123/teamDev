<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['err'] = 'ログインしてください';
    header('Location: toppage.php');
    exit;
}

// 必要な関数を読み込み
require_once 'function.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お気に入り一覧</title>
</head>

<body>
    <?php
    head(); //ヘッダー呼び出し

    try {
        // データベース接続
        $pdo = pdo();

        // お気に入りリストを取得
        $sql = 'SELECT * FROM favorite WHERE users_id = ?';
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$_SESSION['user_id']])) {
            throw new Exception('お気に入りリストの取得に失敗しました。');
        }

        // お気に入り登録件数を表示
        $count = $stmt->rowCount();
        echo '<h2>お気に入り登録商品数: ' . htmlspecialchars($count, ENT_QUOTES, 'UTF-8') . '件</h2>';

        // 各商品をループで表示
        foreach ($stmt as $data) {
            $shohins_id = $data['shohins_id'];

            // 商品情報を取得
            $sql = 'SELECT * FROM shohins WHERE shohin_id = ?';
            $get_shohin = $pdo->prepare($sql);
            if (!$get_shohin->execute([$shohins_id])) {
                throw new Exception('商品の情報取得に失敗しました。');
            }

            $shohin = $get_shohin->fetch(PDO::FETCH_ASSOC);
            if ($shohin) {
                // 商品情報の表示
                echo '<div class="favo_box">';
                echo '<input type="checkbox" name="delete_shohin[]" value="' . htmlspecialchars($shohins_id, ENT_QUOTES, 'UTF-8') . '" class="delete-checkbox">';
                echo '<label>削除</label>';

                $imagePath = '/teamDev/uploads/' . htmlspecialchars($shohin['shohin_pict'], ENT_QUOTES, 'UTF-8');
                echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($shohin['shohin_name'], ENT_QUOTES, 'UTF-8') . '" class="product-image" width="50%" height="auto">';
                echo '<p>商品名: ' . htmlspecialchars($shohin['shohin_name'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p>価格: ¥' . htmlspecialchars(number_format($shohin['shohin_price']), ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p>カテゴリー: ' . htmlspecialchars($shohin['shohin_category'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p>オプション: ' . htmlspecialchars($shohin['shohin_option'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '</div>';
            }
        }
    } catch (Exception $e) {
        // エラーメッセージを表示
        echo '<p>エラー: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
    }
    ?>
</body>

</html>