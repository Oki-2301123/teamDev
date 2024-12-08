<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/payment_update.css">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>

<body><!-- 現在の住所を表示 打田 -->
<div class="top2">
<img src="../img/hurumaru_title.png" alt="アイコンロゴ">
</div>
<hr class="hr">
    <?php
    if (isset($_SESSION['user_id'])) {
        require_once 'function.php';
        // head();
        $user_id = $_SESSION['user_id'];
        $pdo = pdo();
        $sql = 'SELECT user_post, user_pref, user_city, user_address, user_building, user_phone FROM users WHERE user_id = :user_id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
        <div class="text">
        住所変更
        </div>
        <fieldset>
        <div class="center">
        <h2>現在のご登録住所</h2>
        <?php
        if ($product) {
            echo '郵便番号 ', $product['user_post'], '<br>';
            echo '都道府県 ', $product['user_pref'], '<br>';
            echo '市区町村 ', $product['user_city'], '<br>';
            echo '番地 ', $product['user_address'], '<br>';
            echo 'マンション名 ', $product['user_building'], '<br>';
            echo '電話番号 ', $product['user_phone'], '<br>';
            echo '</div>';
        }
        ?>
        <form action="adress_update.php" method="post">
            <input type="submit" name="" value="編集">
    </fieldset>
        </form>
    <?php
    } else {echo 'please login';
    }
    ?>
</body>

</html>