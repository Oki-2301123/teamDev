<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/style.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/test.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/header.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/login.css"><!--css接続 -->
    <title>Document</title>
</head>
<body>
<div class="top">
<img src="../img/hurumaru_title.png" alt="アイコンロゴ">
</div>
<hr class="hr">
    <form action="admin_top.php" method="post">
    
    <div class="text">
        <label class="item-label2">商品追加</label>
    </div>
<div class="parent">
    <div class="box2">
        <label class="item-label">商品名　</label>
        <input type="text" name="shohin"><br><br>
        <label class="item-label">単価　</label>
        <input type="text" name="tanka" style="width: 230px; height: 48px;">
        <span class="item-label2">円</span><br>
    </div>
</div>
        <label class="item-label2">在庫　</label>
        <input type="text" name="zaiko" style="width: 230px; height: 48px;">
        <span class="item-label2">円</span><br>
        <label class="item-label">オプション　</label>
        <input type="text" name="opsyon" style="width: 230px; height: 48px;"><br>
        <label class="item-label2">商品説明　</label>
        <input type="text" name="setumei"><br>
        <label class="item-label">産地　</label>
        <input type="text" name="santi" style="width: 230px; height: 48px;"><br>
        <label class="item-label">販売元　</label>
        <input type="text" name="hanbai" style="width: 230px; height: 48px;"><br>
        <input type="submit" name="toroku" value="登録" class="buttun-kanri">
        <input type="submit" name="modoru" value="戻る">
     </form><!--by打田 -->
</body>
</html>