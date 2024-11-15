<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>

<body>
    require_once 'function.php';
    head();//ヘッダー呼び出し

    <h1>ふるマル</h1>
    <h2>無料会員登録</h2>
    <h3>会員情報入力→会員情報確認</h3>
    <h2>会員情報確認</h2><!-- 野村 -->
    <form action="login.php" method="post">
        <?php
        echo '氏名', $_POST['user_name'], $_POST['user_name'], '<br>';
        echo 'フリガナ', $_POST['user_ruby'], $_POST['user_ruby'], '<br>';
        echo '生年月日', '西暦', $_POST['user_bd'], '年', $_POST['user_bd'], '月', $_POST['user_bd'], '日', '<br>';
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
        <form action="create_account.php">
            <input type="submit" value="編集"><br><br>
        </form>
        <input type="submit" value="登録">
    </form>
</body>

</html>