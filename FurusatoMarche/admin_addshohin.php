<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once 'function.php';
    head();//ヘッダー呼び出し
    ?>
    <form action="admin_top.php" method="post">
        商品名
        <input type="text" name="name"><br>
        単価
        <input type="text" name="tanka">円<br>
        在庫<input type="text" name="zaiko">個<br>
        オプション<input type="text" name="op"><br>
        商品説明<input type="text" name="setu"><br>
        産地<input type="text" name="san"><br>
        販売元<input type="text" name="han"><br>
        <input type="submit" name="" value="登録">
        <input type="submit" name="" value="戻る">
     </form><!--by打田 -->
</body>
</html>