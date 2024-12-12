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
            echo '<br><div class="font5">','送料無料','</div>';
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
        echo '<div class="font2">' . $info['shohin_price'] . '円','</div><br><br>'; //文字の色を赤　.shohin_priceで呼び出す
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
    
    
    <?php

    if (isset($_SESSION['err'])) {
        echo "<script>
            window.onload = function() {
                alert('" . $_SESSION['err'] . "');
            };
        </script>"; //window.onloadで先にhtmlを読み込んでからalertを出す。
        unset($_SESSION['err']); // セッションデータをクリア
    }

    if (isset($_SESSION['msg'])) {
        echo "<script>
            window.onload = function() {
                alert('" . $_SESSION['msg'] . "');
            };
        </script>"; //window.onloadで先にhtmlを読み込んでからalertを出す。
        unset($_SESSION['msg']); // セッションデータをクリア
    }

    ?>
    <div class="parent">
    <br><br><br><br><br>
    <a href="toppage.php"><button type="button" class="button">戻る</button></a>
    </div>
</body>

</html>