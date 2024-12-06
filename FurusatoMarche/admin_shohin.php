<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>
<body>
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
        $explain = $product['shohin_explain'];
        $made = $product['shohin_made'];
        $seller = $product['shohin_seller'];
    }
    }
?>
    <form action="admin_insert.php" method="post">
        商品名
        <input type="text" name="shohin_name" value="<?=$name ?>"><br>
        単価
        <input type="text" name="shohin_price" value="<?=  $price ?>">円<br>
        在庫<input type="text" name="shohin_stock" value="<?=  $stock ?>">個<br>
        オプション<input type="text" name="shohin_option" value="<?=  $option ?>"><br>
        商品説明<input type="text" name="shohin_explain" value="<?=  $explain;?>"><br>
        産地<input type="text" name="shohin_made" value="<?=  $made?>"><br>
        販売元<input type="text" name="shohin_seller" value="<?=  $seller ?>"><br>
        <input type="submit" name="dele" value="削除">
        <input type="submit" name="up" value="更新">
        <input type="hidden" name="shohin_id" value="<?=$id?>">
     </form>
     <form action="admin_top.php" method="post">
        <input type="submit" name="modoru" value="戻る">
     </form>
     
     <!--by打田 -->
</body>
</html>