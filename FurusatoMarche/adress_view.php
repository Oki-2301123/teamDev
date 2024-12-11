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
            echo '郵便番号 <input type="text" name="user_post" value="' . $product['user_post'] . '"readonly><br>';
            echo '都道府県 <input type="text" name="user_pref" value="' . $product['user_pref'] . '"readonly><br>';
            echo '市区町村 <input type="text" name="user_city" value="' . $product['user_city'] . '"readonly><br>';
            echo '番地 <input type="text" name="user_address" value="' . $product['user_address'] . '"readonly><br>';
            echo 'マンション名 <input type="text" name="user_building" value="' . $product['user_building'] . '"readonly><br>';
            echo '電話番号 <input type="text" name="user_phone" value="' . $product['user_phone'] . '"readonly><br>';
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