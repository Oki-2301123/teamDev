<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/stayle.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/adress_check.css">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['update-btn'])) {
        require_once 'function.php';
        $pdo = pdo();
        $user_post = $_POST['user_post'];
        $user_pref = $_POST['user_pref'];
        $user_city = $_POST['user_city'];
        $user_address = $_POST['user_address'];
        $user_building = $_POST['user_building'];
        $user_phone = $_POST['user_phone'];

        $sql = $pdo->prepare('UPDATE users SET user_post = ?, user_pref = ?, user_city = ?, user_address = ?, user_building = ?, user_phone = ? WHERE user_id=?');
        $sql->execute([$user_post, $user_pref, $user_city, $user_address, $user_building, $user_phone, $user_id]);
        $pdo = null;
        // head();
    }
    ?>
    <div class="top2">
<img src="../img/hurumaru_title.png" alt="アイコンロゴ">
</div>
<hr class="hr">
    <div class="text">
        住所確認
    </div>
    <fieldset>
        <?php
        echo '<div class="container2">';
        echo '郵便番号 　　　<input type="text" value="' . $_POST['user_post'] . '" readonly><br><br>';
        echo '</div>';
        echo '<div class="container2">';
        echo '都道府県 　　　<input type="text" value="' . $_POST['user_pref'] . '" readonly><br><br>';
        echo '</div>';
        echo '<div class="container2">';
        echo '市区町村 　　　<input type="text" value="' . $_POST['user_city'] . '" readonly><br><br>';
        echo '</div>';
        echo '<div class="container2">';
        echo '番地 　　　　　<input type="text" value="' . $_POST['user_address'] . '" readonly><br><br>'; 
        echo '</div>';
        echo '<div class="container2">';
        echo 'マンション名 　<input type="text" value="' . $_POST['user_building'] . '" readonly><br><br>';
        echo '</div>';
        echo '<div class="container2">';
        echo '電話番号 　　　<input type="text" value="' . $_POST['user_phone'] . '" readonly><br><br>';
        echo '</div>';
       ?>
    </fieldset>
        <form action="mypage.php" method="post">
            <div class="button-container">
            <input type="submit" name="update-btn" value="この住所に変更する" class="button">
            </div>
        </form>
        <form action="adress_update.php" method="post">
            <div class="button-container">
            <input type="submit" name="return" value="戻る" class="button">
            </div>
        </form>
</body>

</html>