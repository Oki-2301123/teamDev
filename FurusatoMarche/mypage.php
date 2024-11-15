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

    マイページ<br>
    <form action="order_history.php" method="post">
        <input type="submit" name="myrireki" value="注文履歴">
    </form>
    <form action="adress_view.php" method="post">
        <input type="submit" name="mysecurity" value="ログインとセキュリティ"><br>
    </form>
    <form action="logout.php" method="post">
        <input type="submit" name="mylogout" value="ログアウト">
    </form>
    <form action="payment_update.php" method="post">
        <input type="submit" name="mysiharai" value="支払方法">
    </form><!-- by打田 -->
</body>

</html>