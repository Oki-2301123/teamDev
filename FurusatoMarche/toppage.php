<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayl.css">
    <title>TopPage</title>
    <style>
        /* 外側のdivのスタイル */
        .header {
            display: flex;
            align-items: center;
            gap: 10px;
            /* 各要素の間隔 */
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .outer-div {
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid #333333;
            background-color: #E00000;
        }

        /* 余白をなくすためのリセット */
        html,
        body {
            margin: 0;
            padding: 0;
        }

        /* コンテンツを中央寄せするためのFlexbox */
        .centered-content {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        /* 各<b>要素のスタイル */
        b {
            font-size: 1.5em;
            display: flex;
            /* Flexboxで中央寄せ */
            align-items: center;
            /* 垂直方向の中央寄せ */
            justify-content: center;
            /* 水平方向の中央寄せ */
            border-left: 1px solid #333;
            border-right: 1px solid #333;
            padding: 10px 20px;
            text-align: center;
        }

        /* 連続する<b>要素の左側のボーダーを削除 */
        b+b {
            border-left: 0;
            border-right: 1px solid #333;
        }

        /* 比率を調整 */
        .rank {
            flex: 2;
        }

        /* 比率2 */

        .search {
            flex: 1;
        }

        /* 比率1 */
        .category {
            flex: 1.5;
        }

        /* 比率1.5 */
        .sale {
            flex: 1;
        }

        /* 比率1 */
        .special {
            flex: 2;
        }

        /* 比率2 */
    </style>
</head>

<body>
    <?php
    require_once 'function.php';
    head(); // ヘッダー呼び出し
    ?>
    <br>
    <div class="outer-div">
        <div class="centered-content">
            <b class="rank">ランキング</b>
            <b class="search">地域で探す</b>
            <b class="category">カテゴリ別</b>
            <b class="sale">セール商品</b>
            <b class="special">特集</b>
        </div>
    </div>
</body>

</html>