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
        <input type="text" name="name" value=""><br>
        単価
        <input type="text" name="tanka" value="">円<br>
        在庫<input type="text" name="zaiko" value="">個<br>
        オプション<input type="text" name="op" value=""><br>
        商品説明<input type="text" name="setu" value=""><br>
        産地<input type="text" name="san" value=""><br>
        販売元<input type="text" name="han" value=""><br>
        <input type="submit" name="" value="戻る">
        <input type="submit" name="" value="削除">
        <input type="submit" name="" value="更新">
     </form><!--by打田 -->
</body>
</html>