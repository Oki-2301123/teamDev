<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/creae_account_check.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'function.php';
    $pdo = pdo();
    $user_name1 = $_POST['user_name1'];
    $user_name2 = $_POST['user_name2'];
    $user_name = $user_name1.' '.$user_name2;
    $user_ruby1 = $_POST['user_ruby1'];
    $user_ruby2 = $_POST['user_ruby2'];
    $user_ruby = $user_ruby1.' '.$user_ruby2;
    $user_bd1 = $_POST['user_bd1'];
    $user_bd2 = $_POST['user_bd2'];
    $user_bd3 = $_POST['user_bd3'];
    $user_bd = $user_bd1.'-'.$user_bd2.'-'.$user_bd3;
    $user_sex = $_POST['user_sex'];
    $user_mail =  $_POST['user_mail'];
    $user_pass = $_POST['user_pass'];
    $user_post = $_POST['user_post'];
    $user_pref = $_POST['user_pref'];
    $user_city = $_POST['user_city'];
    $user_address = $_POST['user_address'];
    $user_building = $_POST['user_building'];
    $user_phone = $_POST['user_phone'];

    $sql = $pdo->prepare('INSERT INTO users (user_name, user_ruby, user_bd, user_sex, user_mail, user_pass, user_post,
                        user_pref, user_city, user_address, user_building, user_phone) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
    $sql->execute([$user_name, $user_ruby, $user_bd, $user_sex, $user_mail, $user_pass, $user_post, $user_pref, $user_city, $user_address, $user_building, $user_phone]);
    $pdo = null;
    ?>
    <div class="top">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </div>
    <hr class="hr">
    <div class="text">
        無料会員登録
    </div>
    <div class="box-container">

        <div class="box2">会員情報入力</div>
        <div class="arrow">→</div>
        <div class="box">会員情報確認</div>
        <div class="arrow">→</div>
        <div class="box2">会員登録完了</div>
    </div>
    <div class="form-wrapper">
    <div class="title">
    会員情報確認</div><br>
    <form action="login.php" method="post">
        
        <?php
        echo '<div class="title2">','氏名','<input type="text" value="' . htmlspecialchars($_POST['user_name1']) . '"readonly>','<input type="text" value="' . htmlspecialchars($_POST['user_name2']) . '"readonly>', '</div><br>';
        echo '<div class="title2">','フリガナ','<input type="text" value="' . htmlspecialchars($_POST['user_ruby1']) . '"readonly>','<input type="text" value="' . htmlspecialchars($_POST['user_ruby2']) . '"readonly>', '</div><br>';
        echo '<div class="title2">','生年月日', '西暦','<input type="text" value="' . htmlspecialchars($_POST['user_bd1']) . '"readonly>','年','<input type="text" value="' . htmlspecialchars($_POST['user_bd2']) . '"readonly>', '月','<input type="text" value="' . htmlspecialchars($_POST['user_bd3']) . '"readonly>', '日', '</div><br>';
        echo '<div class="title2">','性別','<input type="text" value="' . htmlspecialchars($_POST['user_sex']) . '"readonly>','</div><br>';
        echo '<div class="title2">','メールアドレス','<input type="text" value="' . htmlspecialchars($_POST['user_mail']) . '"readonly>','</div><br>';
        echo '<div class="title2">','メールアドレス（確認）','<input type="text" value="' . htmlspecialchars($_POST['user_mail']) . '"readonly>','</div><br>';
        echo '<div class="title2">','パスワード','<input type="text" value="' . htmlspecialchars($_POST['user_pass']) . '"readonly>','</div><br>';
        echo '<div class="title2">','パスワード（確認）','<input type="text" value="' . htmlspecialchars($_POST['user_pass']) . '"readonly>','</div><br>';
        echo '<div class="title2">','郵便番号','<input type="text" value="' . htmlspecialchars($_POST['user_post']) . '"readonly>','</div><br>';
        echo '<div class="title2">','都道府県','<input type="text" value="' . htmlspecialchars($_POST['user_pref']) . '"readonly>','</div><br>';
        echo '<div class="title2">','市区町村','<input type="text" value="' . htmlspecialchars($_POST['user_city']) . '"readonly>','</div><br>';
        echo '<div class="title2">','番地','<input type="text" value="' . htmlspecialchars($_POST['user_address']) . '"readonly>','</div><br>';
        echo '<div class="title2">','マンション名','<input type="text" value="' . htmlspecialchars($_POST['user_building']) . '"readonly>','</div><br>';
        echo '<div class="title2">','電話番号','<input type="text" value="' . htmlspecialchars($_POST['user_phone']) . '"readonly>','</div><br>';
        echo '</div>'
        ?>
        <br><br>
        <div class="aaaa"><input type="submit" name="toroku" value="登録" class="buttun2"></div><br>
    </form>
    <form action="create_account.php">
    <div class="aaaa"><input type="submit" name="return" value="編集" class="buttun3"></div><br><br>
        </form>
</body>

</html>