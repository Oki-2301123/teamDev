<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>
<!-- お気に入り画面 林 -->
<body>
    <?php
    require_once 'function.php';
    head();//ヘッダー呼び出し
    echo '<table>';
    //写真
    echo $_POST[''];
    //産地 カテゴリー
    echo $_POST[''], '県産 ', $_POST[''], '<br>';
    //単価
    echo '<h3>', $_POST[''], '円', '</h3><br>';
    echo '<h4>', '送料無料', '</h4>', '<br>';

    ?>
    //削除ボタン
    <button onclick=" location.href='#'">削除</button>
    <?php
    echo '</table>';
    ?>
    //カートの中身一括削除ボタン
    <button onclick=" location.href='#'">一括削除</button>;
</body>

</html>