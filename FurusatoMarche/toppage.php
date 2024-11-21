<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 by荒亀-->
    <link rel="stylesheet" href="../css/toppage.css"><!--css接続 by荒亀-->
    <title>TopPage</title>
</head>

<body><?php
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
    <?php
    echo '<div class="product-grid">'; // 商品全体のラップを開始

    foreach ($products as $index => $product) {
        //3つごとに新しい行
        if ($index % 3 === 0) {
            echo '<div class="shohin-container">';
        }

        // 商品を表示
        echo '<a href="shohin_detail.php?id=' . $product['shohin_id'] . '&search=' . $product['shohin_name'] . '" class="shohin-link">'; // リンクで囲む
        echo '<div class="shohinbox">';
        // 商品の写真を表示（画像のパスに合わせて変更）
        $imagePath = '/teamDev/uploads/' . $product['shohin_pict'];
        echo '<img src="' . $imagePath . '" alt="' . $product['shohin_name'] . '" class="product-image">';

        // 商品名、価格、カテゴリ、オプションを表示
        echo '<p>' . $product['shohin_name'] . '</p>';
        echo '<p>¥' . number_format($product['shohin_price']) . '</p>';
        echo '<p>' . $product['shohin_category'] . '</p>';
        echo '<p>' . $product['shohin_option'] . '</p>';

        echo '</div>'; // shohinboxを閉じる
        echo '</a>';
        // 3つごとに行を終了
        if ($index % 3 === 2) {
            echo '</div>';
        }
    }

    // 商品数が3の倍数でない場合、最後の行を閉じる前に空の要素を追加
    $remainingItems = count($products) % 3;
    if ($remainingItems !== 0) {
        for ($i = 0; $i < 3 - $remainingItems; $i++) {
            echo '<div class="shohinbox empty"></div>'; // 空の要素を追加
        }
        echo '</div>'; // 最後の行を閉じる
    }

    echo '</div>'; // 商品全体のラップを終了
    ?>
</body>

</html>