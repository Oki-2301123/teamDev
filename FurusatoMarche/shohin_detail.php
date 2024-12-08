<?php
session_start();
if (isset($_SESSION['notlogin'])) {
    echo "<script>
    window.onload = function() {
        alert('" . $_SESSION['notlogin'] . "');
    };
    </script>";
    unset($_SESSION['notlogin']);
}
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
    <link rel="stylesheet" href="../css/shohin_detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <?php
    require_once('function.php');
    head(); //ヘッダーの呼び出し
    ?>
    <div class="subject-line">
        <div class="subject">
            <item class="subject1">価格別</item>
            <item class="subject2">地域で探す</item>
            <item class="subject3">カテゴリ別</item>
            <item class="subject4">セール商品</item>
            <item class="subject5">特集</item>
        </div>
    </div>
    <div class="info-box">
        <?php
        $pdo = pdo(); //pdoの呼び出し
        $sql = 'SELECT * FROM shohins WHERE shohin_id = ?';
        $data = $pdo->prepare($sql);
        $data->execute([$id]); //sqlで選択したidの情報を検索

        foreach ($data as $info) { //商品情報の出力
            $imagePath = '/teamDev/uploads/' . $info['shohin_pict'];
            echo '<img class="shohin-image" src="' . $imagePath . '" alt="' . $info['shohin_name'] . '" width="50%" height="auto">';
            $sql = 'SELECT shohins_id FROM favorite WHERE shohins_id = ? AND users_id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id, $_SESSION['user_id']]);
            $check = $stmt->fetch();

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

            echo '<h2>' . $info['shohin_name'] . '</h2>';
            echo '<h2 class="shohin_price">' . $info['shohin_price'] . '円'; //文字の色を赤　.shohin_priceで呼び出す
            echo '<h3>商品説明</h3>';
            echo '<div class="shohin_detail_box">' . nl2br($info['shohin_explain']) . '</div>'; //boxをに入れる
            $stock = $info['shohin_stock'];
        }
        ?>
    </div>
    <form action="order.php" method="post">
        数量:<select name="quant">
            <?php
            for ($i = 1; $i <= $stock; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
        <input type="hidden" name="request_id" value=<?= $id ?>>
        <input type="hidden" name="request_name" value=<?= $name ?>>
        <button type="submit" name="incart">カートに入れる</button>
    </form>
    <a href="toppage.php"><button type="button">戻る</button></a>
</body>

</html>