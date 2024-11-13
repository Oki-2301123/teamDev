<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once 'function.php';
    head();//ヘッダー呼び出し
    ?>
    <h3>管理者画面</h3>
    <h2>会員情報</h2>
    <form action="admin_top.php" method="post">
        メールアドレス<input type="text" name="" value=""><br>
        誕生日<input type="text" name="" value=""><br>
        名前<input type="text" name="" value=""><br>
        パスワード<input type="text" name="" value=""><br>
        電話番号<input type="text" name="" value=""><br>
        <input type="submit" name="" value="戻る">
        <input type="submit" name="" value="削除">
        <input type="submit" name="" value="完了">
    </form><!-- by打田 -->
</body>
</html>