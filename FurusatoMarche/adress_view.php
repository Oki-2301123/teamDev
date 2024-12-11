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
    <link rel="stylesheet" href="../css/adress_view.css">
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
        <div class="container">現在のご登録住所</div>
        <?php
        if ($product) {
            echo '<div class="container2">';
            echo '郵便番号 　　　<input type="text" name="user_post" value="' . $product['user_post'] . '"readonly disabled><br><br>';
            echo '</div>';
            echo '<div class="container2">';
            echo '都道府県 　　　<input type="text" name="user_pref" value="' . $product['user_pref'] . '"readonly disabled><br><br>';
            echo '</div>';
            echo '<div class="container2">';
            echo '市区町村 　　　<input type="text" name="user_city" value="' . $product['user_city'] . '"readonly disabled><br><br>';
            echo '</div>';
            echo '<div class="container2">';
            echo '番地 　　　　　<input type="text" name="user_address" value="' . $product['user_address'] . '"readonly disabled><br><br>';
            echo '</div>';
            echo '<div class="container2">';
            echo 'マンション名 　<input type="text" name="user_building" value="' . $product['user_building'] . '"readonly disabled><br><br>';
            echo '</div>';
            echo '<div class="container2">'; 
            echo '電話番号 　　　<input type="text" name="user_phone" value="' . $product['user_phone'] . '"readonly disabled><br><br>';
            echo '</div></div>';
        }
        ?>
        <form action="adress_update.php" method="post">
    </fieldset>
    <div class="button-container">
    <input type="submit" name="" value="編集" class="button">
    </div>
        </form>
        <div class="button-container">
        <a href="mypage.php"><button type="button" class="button">戻る</button></a>
    <?php
    } else {
        echo 'please login';
    }
    ?>
</body>

</html>