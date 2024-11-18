<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>

<body>
    <div class="container">
    <h1>ふるマル</h1>
    <div class="box">
    <div style="border:1px solid #c9c8c8; padding:18px; margin: 50px; width: 50%;">
    <h2>会員ログイン</h2>
    メールアドレス<input type="text" name="mailaddres"><br>
    パスワード<input type="text" name="pass"><br>
    <form action="toppage.php" method="post">
        <input type="submit" value="ログイン" >
    </form>
    <form action="admin_top.php" method="post">
        <input type="submit" value="管理者としてログイン"><br>
    </form>
    テキストを入力</div>
    ふるさとマルシェの会員登録されていない方
    <form action="create_account.php" method="post">
        <input type="submit" value="新規登録（無料）">
    </form>
    </div>
    </div>
</body>

</html>