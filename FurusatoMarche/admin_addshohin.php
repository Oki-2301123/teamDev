<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/style.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/test.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/header.css"><!--css接続 -->
    <title>Document</title>
</head>
<body>
<div class="top">
<img src="../img/hurumaru_title.png" alt="アイコンロゴ">
</div>
<hr class="hr">
    <form action="admin_top.php" method="post">
    <!-- <div class="label"> -->
    <div class="text">
        商品追加
    </div>
    <!-- </div> -->
        商品名
        <input type="text" name=""><br>
        単価
        <input type="text" name="">円<br>
        在庫<input type="text" name="">個<br>
        オプション<input type="text" name=""><br>
        商品説明<input type="text" name=""><br>
        産地<input type="text" name=""><br>
        販売元<input type="text" name=""><br>
        <input type="submit" name="" value="登録">
        <input type="submit" name="" value="戻る">
     </form><!--by打田 -->
</body>
</html>