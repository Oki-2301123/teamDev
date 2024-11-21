<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Document</title>
</head>
<!-- フロント 林 -->

<body>
    <div class="top">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </div>
    <hr class="hr">

    <div class="parent">
        <div class="box">
            <p>
            <h2>会員ログイン</h2><br>
            <form action="login_check.php" method="post" class="button-form">
                メールアドレス　　<input type="text" name="mailaddress"><br><br>
                パスワード　　　　<input type="password" name="pass"><br><br>
                <div class="button-group">
                    <button type="submit" name="login_type" value="user" class="button1">ログイン</button>
                    <button type="submit" name="login_type" value="admin" class="button1">管理者としてログイン</button>
                </div>
            </form>
            </p>
        </div>
    </div>
    <div class="parent">
        <div class="box">
            <p>
                ふるさとマルシェの会員登録されていない方
            <form action="create_account.php" method="post">
                <input type="submit" value="新規登録（無料）" class="button2">
            </form>
            </p>
        </div>
    </div>

</body>

</html>