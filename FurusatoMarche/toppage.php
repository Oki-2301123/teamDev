<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopPage</title>
    <style>
        div {
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid #333333;
            background-color: #E00000;
        }

        b {
            border-left: 1px solid #333;
            border-right: 1px solid #333;
            padding-left: 7%;
            padding-right: 7%;
        }

        b+b {
            border-left: 0;
            border-right: 1px solid #333;
        }

        cent{
            margin:auto;
        }
    </style>
</head>

<body>
    <?php
    require_once 'function.php';
    head(); //ヘッダー呼び出し
    ?>
    <br>
    <div>
        <cent>
            <b>ランキング</b>
            <b>地域で探す</b>
            <b>カテゴリ別</b>
            <b>セール商品</b>
            <b>特集</b>
        </cent>
    </div>
</body>

</html>