<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="../css/stayle.css"><!--css読み込み-->
</head>

<body><?php require_once 'function.php';
        head(); // ヘッダー呼び出し     
        ?>
    サンプルテキスト
    <img src="" alt=""><br>
    <h2>ログアウト画面</h2><br><img src="" alt=""><br>
    <form action="login.php" method="get"><input type="submit" name="logout" value="ログアウト"></form> <!-- by打田 -->
=======
    <link rel="stylesheet" href="../css/stayl.css">
</head>

<body>
    <?php
    require_once 'function.php';
    head();//ヘッダー呼び出し
    ?>

    <img src="" alt=""><br>
    <h2>ログアウト画面</h2><br>
    <img src="" alt=""><br>
    <form action="login.php" method="get">
        <input type="submit" name="logout" value="ログアウト">
    </form><!--by打田-->


>>>>>>> d1e24443ad2f49969dc907b65ee36867ac4dc4db
</body>

</html>