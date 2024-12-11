<?php
session_start();
$user_id=$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
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
        head();
    }
    ?>
    <h2>住所確認</h2>
    <?php
    echo '郵便番号 <input type="text" value="' . $_POST['user_post'] . '" readonly><br>';
    echo '都道府県 <input type="text" value="' . $_POST['user_pref'] . '" readonly><br>';
    echo '市区町村 <input type="text" value="' . $_POST['user_city'] . '" readonly><br>';
    echo '番地 <input type="text" value="' . $_POST['user_address'] . '" readonly><br>';
    echo 'マンション名 <input type="text" value="' . $_POST['user_building'] . '" readonly><br>';
    echo '電話番号 <input type="text" value="' . $_POST['user_phone'] . '" readonly><br>';
?>
    <form action="mypage.php" method="post">
    <input type="submit" name="update-btn" value="この住所に変更する">
</form>
<form action="adress_update.php" method="post">
    <input type="submit" name="return" value="戻る">
</form>
</body>
</html>