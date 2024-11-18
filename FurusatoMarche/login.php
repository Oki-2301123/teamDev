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
   <p> <h2>会員ログイン</h2>
    メールアドレス<input type="text" name="mailaddres"><br>
    パスワード<input type="text" name="pass"><br>
    <form action="toppage.php" method="post" class="button-form">
        <input type="submit" value="ログイン" >
    </form>
    <form action="admin_top.php" method="post" class="button-form">
        <input type="submit" value="管理者としてログイン"><br>
    </form>
    </p>
</div>

</div>
<div class="parent">
<div class="box">
    <p>
    テキストを入力
    ふるさとマルシェの会員登録されていない方
    <form action="create_account.php" method="post">
        <input type="submit" value="新規登録（無料）">
    </form>
    </p>
</div>  
</div>
    
</body>

</html>