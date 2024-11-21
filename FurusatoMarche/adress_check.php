<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>
<body><!-- 変更後の住所を表示 打田 -->
    <?php
    require_once 'function.php';
    head();
    ?>
    <h2>住所確認</h2>
    <?php
    echo '郵便番号',$_POST[''],'<br>';
    echo '都道府県',$_POST[''],'<br>';
    echo '市区町村',$_POST[''],'<br>';
    echo '番地',$_POST[''],'<br>';
    echo 'マンション名',$_POST[''],'<br>';
    echo '電話番号',$_POST[''],'<br>';
    ?>
    <form action="mypage.php" method="post">
    <input type="submit" name="" value="この住所に変更する">
</form>
<form action="adress_update.php" method="post">
    <input type="submit" name="" value="戻る">
</form>
</body>
</html>