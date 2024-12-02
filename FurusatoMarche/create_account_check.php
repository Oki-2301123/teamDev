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
    require_once 'function.php';
    $pdo = pdo();
    $user_name = $_POST['user_name'];
    $user_name1 = $_POST['user_name1'];
    $user_ruby = $_POST['user_ruby'];
    $user_ruby1 = $_POST['user_ruby1'];
    $user_bd = $_POST['user_bd'];
    $user_bd1 = $_POST['user_bd1'];
    $user_bd2 = $_POST['user_bd2'];
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
    $sql->execute([$user_name, $user_name1, $user_ruby,  $user_ruby1, $user_bd1, $user_bd2,
     $user_bd, $user_sex, $user_mail, $user_pass, $user_post, $user_pref, $user_city, $user_address, $user_building, $user_phone]);
    $pdo = null;
    head();//ヘッダー呼び出し
    ?>
    <h1>ふるマル</h1>
    <h2>無料会員登録</h2>
    <h3>会員情報入力→会員情報確認</h3>
    <h2>会員情報確認</h2><!-- 野村 -->
    <form action="login.php" method="post">
        <?php
        echo '氏名', $_POST['user_name'], $_POST['user_name1'], '<br>';
        echo 'フリガナ', $_POST['user_ruby'], $_POST['user_ruby1'], '<br>';
        echo '生年月日', '西暦', $_POST['user_bd'], '年', $_POST['user_bd1'], '月', $_POST['user_bd2'], '日', '<br>';
        echo '性別', $_POST['user_sex'];
        echo 'メールアドレス', $_POST['user_mail'], '<br>';
        echo 'メールアドレス（確認）', $_POST['user_mail'], '<br>';
        echo 'パスワード', $_POST['user_pass'], '<br>';
        echo 'パスワード（確認）', $_POST['user_pass'], '<br>';
        echo '郵便番号', $_POST['user_post'], '<br>';
        echo '都道府県', $_POST['user_pref'], '<br>';
        echo '市区町村', $_POST['user_city'], '<br>';
        echo '番地', $_POST['user_address'], '<br>';
        echo 'マンション名', $_POST['user_building'], '<br>';
        echo '電話番号', $_POST['user_phone'];
        ?>
        <input type="submit" name="toroku" value="登録">
    </form>
    <form action="create_account.php">
            <input type="submit" name="return" value="編集"><br><br>
        </form>
</body>

</html>