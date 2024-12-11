<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/mypage.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'function.php';
    head();//ヘッダー呼び出し
    ?>
    <hr class="hr">
    <br>
    　　　マイページ<br>
    <div class="button-form-wrapper">
    <div class="button-form">
    <form action="order_history.php" method="post" >
        <input type="submit" name="myrireki" value="注文履歴" class="buttun-mypage">
    </form>
    </div>
    <div class="button-form">
    <form action="adress_view.php" method="post">
        <input type="submit" name="mysecurity" value="ログインとセキュリティ" class="buttun-mypage"><br>
    </form>
    </div>
    </div>

    <div class="button-form-wrapper">
    <div class="button-form">
    <form action="logout.php" method="post" >
        <input type="submit" name="mylogout" value="ログアウト" class="buttun-mypage">
    </form>
    </div>
    <form action="payment_update.php" method="post" >
        <input type="submit" name="mysiharai" value="支払方法" class="buttun-mypage">
    </form>
    </div>
    </div>
</body>

</html>