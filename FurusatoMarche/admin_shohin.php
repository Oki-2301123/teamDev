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
            if (isset($_POST['shohin_id'])) {
                $shohin_id = $_POST['shohin_id'];
                $pdo = pdo();
                $sql = $pdo->prepare('SELECT * FROM shohins WHERE shohin_id = ?');
                $sql->execute([$shohin_id]);
                $product = $sql->fetch(PDO::FETCH_ASSOC);

                // 取得した商品情報をフォームに表示
                if ($product) {
                    $id = $product['shohin_id'];
                    $name = $product['shohin_name'];
                    $price = $product['shohin_price'];
                    $stock = $product['shohin_stock'];
                    $option = $product['shohin_option'];
                    $category = $product['shohin_category'];
                    $shohin_pict = $product['shohin_pict'];
                    $explain = $product['shohin_explain'];
                    $made = $product['shohin_made'];
                    $seller = $product['shohin_seller'];
                }
            }
            ?>
            商品名<input type="text" name="name" value="<?= $name ?>" style="width: 450px; height: 48px;"><br><br>
            単価<input type="text" name="price" value="<?= $price ?>" style="width: 230px; height: 48px;">円<br><br>
            在庫<input type="text" name="stock" value="<?= $stock ?>" style="width: 230px; height: 48px;">個<br><br>
            オプション<input type="text" name="option" value="<?= $option ?>" style="width: 230px; height: 48px;"><br><br>
            カテゴリー<input type="text" name="category" value="<?= $category ?>" style="width: 230px; height: 48px;"><br><br>
            商品画像<?php
                $imagePath = '/teamDev/uploads/' . $shohin_pict;
                echo '<img src="' . $imagePath . '" alt="' . $name . '" width="220px" height="auto">';
                ?>
            <input type="file" name="pict" style="width: 230px; height: 48px;"><br><br>
            商品説明<input type="text" name="setumei" value="<?= $explain ?> style=" width: 500px; height: 114px;">

            産地<input type="text" name="santi" value="<?= $made ?>" style="width: 230px; height: 48px;"><br><br>
            販売元<input type="text" name="hanbai" value="<?= $seller ?>" style="width: 230px; height: 48px;"><br>

            <input type="submit" value="戻る" >
            <input type="submit" value="削除" >
            <input type="submit" value="登録" >
    </form>
</body>