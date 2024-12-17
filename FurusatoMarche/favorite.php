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
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/favorite.css">
    <title>お気に入り一覧</title>
    <style>
        /* モーダルのスタイル */
        #modal-message {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            text-align: center;
        }

        /* オーバーレイのスタイル */
        #modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <?php
    head(); //ヘッダー呼び出し

    echo '<hr class="hr">', '<br>';
    try {
        // データベース接続
        $pdo = pdo();

        // お気に入りリストを取得
        $sql = 'SELECT * FROM favorite WHERE users_id = ?';
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$_SESSION['user_id']])) {
            $_SESSION['err'] = 'お気に入りリストの取得に失敗しました。';
            header('Location: toppage.php');
            exit;
        }

        // お気に入り登録件数を表示
        $count = $stmt->rowCount();
        echo '<div class="container">';
        echo '<h2>お気に入り登録商品数: ' . $count . '件</h2>';
        echo '</div>';

        // 各商品をループで表示
        foreach ($stmt as $data) {
            $shohins_id = $data['shohins_id'];

            // 商品情報を取得
            $sql = 'SELECT * FROM shohins WHERE shohin_id = ?';
            $get_shohin = $pdo->prepare($sql);
            if (!$get_shohin->execute([$shohins_id])) {
                $_SESSION['err'] = '商品情報の取得に失敗しました。';
                header('Location: toppage.php');
                exit;
            }

            $shohin = $get_shohin->fetch(PDO::FETCH_ASSOC);
            if ($shohin) {
                // 商品情報の表示
                echo '<form action="favorite_update.php" method="post">';
                echo '<div class="box-container">';
                echo '<div class="box">';

                $imagePath = '/teamDev/uploads/' . $shohin['shohin_pict'];
                echo '<div class="box__image">';
                echo '<img src="' . $imagePath . '" alt="' . $shohin['shohin_name'] . '" class="product-image" width="220px" height="auto">';
                echo '</div>';
                echo '<div class="box__details">';
                echo '<p><div class="font">商品名: ' . $shohin['shohin_name'] . '</div></p>';
                echo '<p><div class="font2">価格: ¥' . $shohin['shohin_price'] . '</div></p>';
                echo '<p>カテゴリー: ' . $shohin['shohin_category'] . '</p>';
                echo '<p>オプション: ' . $shohin['shohin_option'] . '</p>';

                echo '<a href="shohin_detail.php?id=' . $shohin['shohin_id'] . ' &search=' . $shohin['shohin_name'] . '" class="shohin-link">';
                echo '</a></div></div></div>';
                echo '<input type="checkbox" name="delete_shohin[]" value="' . $shohins_id . '" class="delete-checkbox">';
                echo '<label>削除</label>';
                echo '<hr>';
            }
        }
        if (!($count <= 0)) {
            echo '<div class="button-container">';
            echo '<input type="submit" name="del_favo" value="削除" class="button">';
            echo '</div>';
        }
        echo '</form>';
    } catch (Exception $e) {
        $_SESSION['err'] = 'エラーの発生';
        header('Location: toppage.php');
        exit;
    }
    ?>

    <!-- モーダル -->
    <div id="modal-overlay"></div>
    <div id="modal-message">
        <p id="modal-text"></p>
    </div>

    <?php
    if (isset($_SESSION['msg'])) {
        echo "<script>
            window.onload = function() {
                showModal('" . $_SESSION['msg'] . "');
            };
        </script>";
        unset($_SESSION['msg']);
    }
    ?>

    <script>
        // モーダル表示関数
        function showModal(message) {
            const modal = document.getElementById('modal-message');
            const overlay = document.getElementById('modal-overlay');
            const modalText = document.getElementById('modal-text');

            // メッセージを設定
            modalText.textContent = message;

            // モーダルとオーバーレイを表示
            modal.style.display = 'block';
            overlay.style.display = 'block';

            // 3秒後に非表示
            setTimeout(() => {
                modal.style.display = 'none';
                overlay.style.display = 'none';
            }, 3000);
        }
    </script>
</body>

</html>
