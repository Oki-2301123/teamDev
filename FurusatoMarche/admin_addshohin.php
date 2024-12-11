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
<form action="admin_shohins_insert.php" method="post" enctype="multipart/form-data">
    <div class="text">
        <label class="item-label2">商品追加</label>
    </div>
    <div class="parent2">
        <div class="box2">
            <label class="item-label">商品名　</label>
            <input type="text" name="name" style="width: 450px; height: 48px;"><br><br>
            <label class="item-label">単価　　</label>
            <input type="text" name="price" style="width: 230px; height: 48px;">

            <span class="item-label2">円</span>
        </div>
    </div>

            <label class="item-label">　　在庫　　</label>
            <input type="text" name="stock" style="width: 230px; height: 48px;">
            <span class="item-label2">円</span><br><br>
            <label class="item-label">　オプション　</label>
            <input type="text" name="option" style="width: 230px; height: 48px;"><br><br>
            <label class="item-label">　カテゴリー　</label>
            <input type="text" name="category" style="width: 230px; height: 48px;"><br><br>
            <label class="item-label">　商品画像　</label>
            <input type="file" name="pict" style="width: 230px; height: 48px;"><br><br>

        <div class="right-align-container">
            <label class="item-label3">商品説明</label>
            <input type="text" name="explain" style="width: 500px; height: 114px;">
        </div>

            <label class="item-label">産地</label>
            <input type="text" name="made" style="width: 230px; height: 48px;"><br><br>

            <label class="item-label">販売元</label>
            <input type="text" name="seller" style="width: 230px; height: 48px;"><br>
            <!-- <label class="item-label2">商品説明</label> -->
            <!-- <input type="text" name="setumei" style="width: 541px; height: 114px;"><br><br> -->

            <!-- <label class="item-label">産地</label> -->
            <!-- <input type="text" name="santi" style="width: 230px; height: 48px;"><br><br> -->

            <!-- <label class="item-label">販売元</label> -->
            <!-- <input type="text" name="hanbai" style="width: 230px; height: 48px;"><br> -->

            <input type="submit" value="戻る" class="button-kanri2">
            <input type="submit" value="登録" class="button-kanri" name="in"> 
    </form>
</body>
