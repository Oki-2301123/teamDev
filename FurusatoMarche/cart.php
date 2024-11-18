<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>

<body>//カート画面 林
    <?php
    require_once 'function.php';
    head(); //ヘッダー呼び出し

    echo '<table>';
    //写真
    echo $_GET[''];
    //産地 カテゴリー
    echo $_GET[''], '県産  ', $_GET[''], '<br>';
    //単価
    echo '<h3>', $_GET[''], '円', '</h3><br>';
    echo '<h4>', '送料無料', '</h4>', '<br>';
    //数量 ドロップダウン
    echo '数量';
    echo '<select name="num">';
    for ($i = 1; $i <= 100; $i++) {
        print('<option value="' . $i . '</option>');
    }
    //削除ボタン
    ?>
    <button onclick="location.href='#'">削除</button>
    <?php
    echo '</table>';

    //カートの中身の合計
    echo '<h3>', '合計', $_GET[''], '円';
    //カートの中身一括削除ボタン
    ?>
    <button onclick="location.href='#'">一括削除</button>;
    <?php
    //レジに進むボタン
    echo '<input type="submit" value="レジに進む">';

    ?>

</body>

</html>