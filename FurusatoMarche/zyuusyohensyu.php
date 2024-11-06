<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>//住所編集 打田
    <img src="" alt="">
    住所変更<br>
    <form action="zyuusyokakunin.php" method="get">
      <h2>ご登録住所の変更</h2>
        郵便番号 <input type="text" name=""><br>
        都道府県<input type="text" name=""><br>
        市区町村<input type="text" name=""><br>
        番地<input type="text" name=""><br>
        マンション名<input type="text" name=""><br>
        電話番号<input type="text" name="">
        <input type="submit" name="" value="変更">  
    </form>
    <form action="zyuusyohenkou.php" method="post">
        <input type="submit" name="" value="戻る">
    </form>
</body>
</html>