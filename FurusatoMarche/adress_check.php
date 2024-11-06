<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>//変更後の住所を表示 打田
    <img src="" alt="">
    
    <h2>住所確認</h2>
    <?php
    echo '郵便番号',$_GET[''],'<br>';
    echo '都道府県',$_GET[''],'<br>';
    echo '市区町村',$_GET[''],'<br>';
    echo '番地',$_GET[''],'<br>';
    echo 'マンション名',$_GET[''],'<br>';
    echo '電話番号',$_GET[''],'<br>';
    ?>
    <form action="mypage.php" method="post">
    <input type="submit" name="" value="編集">
</form>
<form action="zyuusyohensyu.php" method="post">
    <input type="submit" name="" value="戻る">
</form>
</body>
</html>