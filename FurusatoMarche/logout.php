<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Document</title><!-- 外部CSSファイルをリンク -->
    <link rel="stylesheet" href="../css/styl.css">
</head>

<body><?php require_once 'function.php';
        head(); // ヘッダー呼び出し     
        ?><b>サンプルテキスト</b><img src="" alt=""><br>
    <h2>ログアウト画面</h2><br><img src="" alt=""><br>
    <form action="login.php" method="get"><input type="submit" name="logout" value="ログアウト"></form> <!-- by打田 -->
=======
    <title>Document</title>
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


>>>>>>> 063da16fcd8b289b37753fa56c83fadb6a301d54
</body>

</html>