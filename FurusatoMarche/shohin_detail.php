<?php
session_start();

$id = $_GET['id'] ?? null; // デフォルト値を設定
if (!$id) {
    echo '<h2>商品の情報が見つかりませんでした。</h2>';
    exit;
}

$name = $_GET['search'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ふるさとマルシェ:<?= $name ?></title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/shohin_detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
    require_once('function.php');
    head(); //ヘッダーの呼び出し
    ?>
    <hr class="hr">
    <div class="guest">
        <?php
        if (!(isset($_SESSION['user_name']))) {
            echo '<h2><a href="login.php">ログインはこちら</a></h2>';
        }
        ?>
    </div>
    <div class="info-box">
        <?php
        $pdo = pdo(); //pdoの呼び出し
        $sql = 'SELECT * FROM shohins WHERE shohin_id = ?';
        $data = $pdo->prepare($sql);
        $data->execute([$id]); //sqlで選択したidの情報を検索

        foreach ($data as $info) { //商品情報の出力
            $imagePath = '/teamDev/uploads/' . $info['shohin_pict'];
            echo '<div class="box">';
            echo '<img class="shohin-image" src="' . $imagePath . '" alt="' . $info['shohin_name'] . '">';
            echo '<br><div class="font5">', '送料無料', '</div>';
            if (isset($_SESSION['user_id'])) {
                $sql = 'SELECT shohins_id FROM favorite WHERE shohins_id = ? AND users_id = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id, $_SESSION['user_id']]);
                $check = $stmt->fetch();
                echo '<div class="text-right">';
                if ($check) {
                    // すでにお気に入りに追加済み
                    echo '<form action="favorite_update.php" method="post">
            <input type="hidden" name="id" value="' . $id . '">
            <input type="hidden" name="name" value="' . $name . '">
            <button name="toggle_favo" class="btn star-button-yellow">
                <i class="bi bi-star-fill"></i> <!-- フルの黄色星アイコン -->
            </button>
          </form>';
                } else {
                    // お気に入りに未登録
                    echo '<form action="favorite_update.php" method="post">
            <input type="hidden" name="id" value="' . $id . '">
            <input type="hidden" name="name" value="' . $name . '">
            <button name="toggle_favo" class="btn star-button-gray">
                <i class="bi bi-star"></i> <!-- 空の灰色星アイコン -->
            </button>
          </form>';
                }
            }
        }

        echo '<div class="font">' . $info['shohin_name'] . '</div>';
        echo '<div class="font2">' . $info['shohin_price'] . '円', '</div><br><br>'; //文字の色を赤　.shohin_priceで呼び出す
        echo '<div class="font3">商品説明</div>';
        echo '<div class="font4">' . nl2br($info['shohin_explain']) . '</div>'; //boxをに入れる
        $stock = $info['shohin_stock'];
        echo '</div>'
        ?>
    </div>
    <form action="order.php" method="post">
        <div class="move-up">
            <div class="flex-left">
                <div>
                    数量:<select name="quant">
                        <?php
                        for ($i = 1; $i <= $stock; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                </div>
                </select>
                <br><br><br>
                <input type="hidden" name="request_id" value=<?= $id ?>>
                <input type="hidden" name="request_name" value=<?= $name ?>>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo '<div>';
                    echo '<button type="submit" name="incart" class="button2">カートに入れる</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<button type="submit" name="incart" disabled>カートに入れる</button>'; //押せないボタン
                }
                ?>
    </form>

    <!-- モーダル -->
    <div id="modal-overlay"></div>
    <div id="modal-message">
        <p id="modal-text"></p>
    </div>

    <?php
    if (isset($_SESSION['err'])) {
        echo "<script>
            window.onload = function() {
                showModal('" . $_SESSION['err'] . "');
            };
        </script>";
        unset($_SESSION['err']);
    }

    if (isset($_SESSION['msg'])) {
        echo "<script>
            window.onload = function() {
                showModal('" . $_SESSION['msg'] . "');
            };
        </script>";
        unset($_SESSION['msg']);
    }
    ?>

    <div class="parent">
        <br><br><br><br><br>
        <a href="toppage.php"><button type="button" class="button">戻る</button></a>
    </div>

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