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
    pdo();
    foreach($pdo->query('select * from shohin') as $row){
        $name=$row['shohin_name'];
        $tanka=$row['shohin_price'];
        $stock=$row['shohin_stock'];
      $option=$row['shohin_option'];
        $explain=$row['shohin_explain'];
        $made=$row['shohin_made'];
        $seller=$row['shohin_seller'];
    }
        ?>
        <img src="../img/furumaru_title.png" alt="ヘッダー"><br>
    <form action="admin_top.php" method="post">
        商品名
        <input type="text" name="" value="<?php echo $name; ?>"><br>
        単価
        <input type="text" name="" value="<?php echo $tanka; ?>">円<br>
        在庫<input type="text" name="" value="<?php echo $stock; ?>">個<br>
        オプション<input type="text" name="" value="<?php echo $option; ?>"><br>
        商品説明<input type="text" name="" value="<?php echo $explain; ?>"><br>
        産地<input type="text" name="" value="<?php echo $made; ?>"><br>
        販売元<input type="text" name="" value="<?php echo $seller; ?>"><br>
        <input type="submit" name="" value="戻る">
        <input type="submit" name="" value="削除">
        <input type="submit" name="" value="更新">
     </form><!--by打田 -->
</body>
</html>