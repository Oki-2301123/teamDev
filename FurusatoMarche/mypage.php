<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>//打田
    マイページ<br>
    <form action="tyumonrireki.php" method="post">
    <input type="submit" name="myrireki" value="注文履歴">
    </form>
    <form action="zyuusyohenkou.php" method="post">
    <input type="submit" name="mysecurity" value="ログインとセキュリティ"><br>
    </form>
    <form action="logout.php" method="post">
    <input type="submit" name="mylogout" value="ログアウト">
    </form>
    <form action="siharaihenkou.php" method="post">
    <input type="submit" name="mysiharai" value="支払方法">
    </form>
</body>
</html>