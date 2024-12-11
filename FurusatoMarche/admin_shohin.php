<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/reset.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/style.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/admin_shohin.css"><!--css接続 -->
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
    <div class="text">
        <label class="item-label2">商品情報</label>
    </div>
<?php
    require_once 'function.php';
    head();
    if (isset($_POST['shohin_id'])) {
        $shohin_id = $_POST['shohin_id'];
        $pdo=pdo();
        $sql = $pdo->prepare('SELECT * FROM shohins WHERE shohin_id = ?');
    $sql->execute([$shohin_id]);
    $product = $sql->fetch(PDO::FETCH_ASSOC);

    // 取得した商品情報をフォームに表示
    if ($product) {
        $id=$product['shohin_id'];
        $name = $product['shohin_name'];
        $price = $product['shohin_price'];
        $stock = $product['shohin_stock'];
        $option = $product['shohin_option'];
        $category = $product['shohin_category'];
        $explain = $product['shohin_explain'];
        $made = $product['shohin_made'];
        $seller = $product['shohin_seller'];
    }
    }
?>
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
            <!-- <label class="item-label">　カテゴリー　</label> -->
            <!-- <input type="text" name="category" style="width: 230px; height: 48px;"><br><br> -->
            <!-- <label class="item-label">　商品画像　</label> -->
            <!-- <input type="file" name="pict" style="width: 230px; height: 48px;"><br><br> -->

        <div class="right-align-container">
            <label class="item-label3">商品説明</label>
            <input type="text" name="setumei" style="width: 500px; height: 114px;">
        </div>

        <div class="right-align-container2">
            <label class="item-label4">産地</label>
            <input type="text" name="santi" style="width: 230px; height: 48px;"><br><br>
        </div>

        <div class="right-align-container3">
            <label class="item-label5">販売元</label>
            <input type="text" name="hanbai" style="width: 230px; height: 48px;"><br>
        </div>

            <input type="submit" value="戻る" class="button-kanri2">
            <input type="submit" value="削除" class="button-kanri3">
            <input type="submit" value="登録" class="button-kanri" > 
    </form>
</body>
    <!-- <form action="admin_shohins_insert.php" method="post">
        商品名
        <input type="text" name="shohin_name" value="<?=$name ?>"><br>
        単価
        <input type="text" name="shohin_price" value="<?=  $price ?>">円<br>
        在庫<input type="text" name="shohin_stock" value="<?=  $stock ?>">個<br>
        オプション<input type="text" name="shohin_option" value="<?=  $option ?>"><br>
        カテゴリー<input type="text" name="shohin_category" value="<?=  $category ?>"><br>
        商品説明<input type="text" name="shohin_explain" value="<?=  $explain?>"><br>
        産地<input type="text" name="shohin_made" value="<?=  $made?>"><br>
        販売元<input type="text" name="shohin_seller" value="<?=  $seller ?>"><br>
        <input type="submit" name="dele" value="削除">
        <input type="submit" name="up" value="更新">
        <input type="hidden" name="shohin_id" value="<?=$id?>">
     </form>
     <form action="admin_top.php" method="post">
        <input type="submit" name="return" value="戻る">
     </form> -->
     
     <!--by打田 -->
