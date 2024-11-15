<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>

<body>//林
    require_once 'function.php';
    head();//ヘッダー呼び出し

    <?php
    require_once 'function.php';
    head(); //ヘッダー呼び出し

    echo '<table>';
    //写真
    echo $_GET[''];
    //産地 カテゴリー
    echo $_GET[''], '県産  ', $_GET[''], '<br>';
    //単価
    echo '<h3>', $_GET[''], '円', '</h3>';
    echo '<h4>', '送料無料', '</h4>';
    //数量 ドロップダウン
    echo '数量',$_GET[''];
    ?>
    <?php
    echo '</table>';
    echo '<table>';
    echo 'お届け住所';
    echo '〒',$_GET[''] ,$_GET[''];
    echo '電話番号',$_GET[''];
    echo '<input type="submit" value="変更">';
    echo '</table>';

    echo '<table>';
    echo 'お支払方法';
    echo 'PayPay';
    echo '<input type="submit" value="変更">';
    echo '</table>';
    
    ?>
    


    <?php
    //注文商品の合計
    echo '<h3>', '合計', $_GET[''], '円';

    //注文を確定するボタン
    echo '<input type="submit" value="注文を確定する">';

    //戻るボタン
    echo '<input type="submit" value="戻る">';

    ?>

</body>

</html>