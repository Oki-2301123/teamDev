<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 by荒亀-->
    <title>TopPage</title>
</head>

<body>
    <?php
    require_once 'function.php';
    head(); // ヘッダー呼び出し
    ?>
    <br>
    <div class="outer-div">
        <div class="centered-content">
            <item class="rank">ランキング</item>
            <item class="search">地域で探す</item>
            <item class="category">カテゴリ別</item>
            <item class="sale">セール商品</item>
            <item class="special">特集</item>
        </div>
    </div>

    <?php
    // 商品リスト
    $products = ["商品1", "商品2", "商品3", "商品4", "商品5", "商品6", "商品7", "商品8", "商品9", "商品10"];

    echo '<div class="product-grid">'; // shohinの親コンテナ

    foreach ($products as $index => $product) {
        // 3つごとに新しい行を開始
        if ($index % 3 === 0) {
            echo '<div class="shohin-container">';
        }

        // 商品を表示
        echo '<div class="shohinbox"><p>' . $product . '</p></div>';

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

</body><!--アラカメ-->

</html>