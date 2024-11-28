<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    $_SESSION['guest'] = true;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/toppage.css">
    <title>TopPage</title>
</head>

<body>
    <?php
    require_once 'function.php';
    head(); // ヘッダー呼び出し
    ?><br>
    <div class="outer-div">
        <div class="centered-content">
            <item class="rank">ランキング</item>
            <item class="search">地域で探す</item>
            <item class="category">カテゴリ別</item>
            <item class="sale">セール商品</item>
            <item class="special">特集</item>
        </div>
    </div><?php
            // 商品リスト
            $pdo = pdo();
            $sql = 'SELECT shohin_id, shohin_name, shohin_price, shohin_category, shohin_pict, shohin_option FROM shohins';
            $statement = $pdo->query($sql);
            $products = $statement->fetchAll(PDO::FETCH_ASSOC); // 各商品を連想配列で取得
            ?>
    <br>
    <!-- 商品リスト -->
    <div class="product-grid">
        <?php foreach ($products as $product) { ?>
            <!-- 商品リンク -->
            <a href="shohin_detail.php?id=<?= $product['shohin_id'] ?>&search=<?= $product['shohin_name'] ?>" class="shohin-link">
                <div class="shohinbox">
                    <!-- 商品画像 -->
                    <?php $imagePath = '/teamDev/uploads/' . $product['shohin_pict']; ?>
                    <img src="<?= $imagePath ?>" alt="<?= $product['shohin_name'] ?>" class="product-image">

                    <!-- 商品情報 -->
                    <p><?= $product['shohin_name'] ?></p>
                    <p>¥<?= $product['shohin_price'] ?></p>
                    <p><?= $product['shohin_category'] ?></p>
                    <p><?= $product['shohin_option'] ?></p>
                </div>
            </a>
        <?php } ?>

        <!-- レイアウトを整えるための空要素 -->
        <?php
        $remainingItems = count($products) % 3;
        if ($remainingItems !== 0) {
            for ($i = 0; $i < 3 - $remainingItems; $i++) { ?>
                <div class="shohinbox empty"></div>
        <?php
            }
        }
        ?>
    </div>
    <?php
    if (isset($_SESSION['user_name'])) {
        $_SESSION['login_cnt']++; //ログイン時に初期値を０にし、このページを訪れるたびに+1→ログインして初めての時のみ「ようこそ」を表示
        if ($_SESSION['login_cnt'] === 1) {
            echo "<script>
            window.onload = function() {
                alert('" . $_SESSION['user_name'] . "さん、ようこそ！');
            };
        </script>"; //window.onloadで先にhtmlを読み込んでからalertを出す。
        }
    }
    if (isset($_SESSION['incart'])) {
        if ($_SESSION['incart'] === true) {
            echo "<script>
            window.onload = function() {
                alert('カート情報を更新しました');
            };
        </script>";
            unset($_SESSION['incart']);
        } else {
            echo "<script>
            window.onload = function() {
                alert('購入中に問題が発生しました。: error_02');
            };
        </script>";
        }
    }
    if (isset($_SESSION['cart_update'])) {
        echo "<script>
            window.onload = function() {
                alert(" . $_SESSION['cart_update'] . ");
            };
        </script>";
        unset($_SESSION['cart_update']);
    }
    ?>
</body>

</html>