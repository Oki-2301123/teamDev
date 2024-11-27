<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>
<body><!-- 現在の住所を表示 打田 -->
<?php
 require_once 'function.php';
 head();
 $user_id = $_SESSION['user_id'];
 $pdo = pdo();
 $sql = 'SELECT user_post, user_pref, user_city, user_address, user_building, user_phone FROM users WHERE user_id = :user_id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);
?>
    <h3>住所変更</h3>
    <h2>現在のご登録住所</h2>
    <?php 
    if ($product) {
        echo '郵便番号 ' . htmlspecialchars($product['user_post']) . '<br>';
        echo '都道府県 ' . htmlspecialchars($product['user_pref']) . '<br>';
        echo '市区町村 ' . htmlspecialchars($product['user_city']) . '<br>';
        echo '番地 ' . htmlspecialchars($product['user_address']) . '<br>';
        echo 'マンション名 ' . htmlspecialchars($product['user_building']) . '<br>';
        echo '電話番号 ' . htmlspecialchars($product['user_phone']) . '<br>';
    }
    ?>
    <form action="adress_update.php" method="post">
        <input type="submit" name="" value="編集">
    </form>
</body>
</html>