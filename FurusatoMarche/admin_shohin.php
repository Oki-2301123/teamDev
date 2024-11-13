<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ふるマル</h1>
    <h3>商品情報</h3>
    <form action="admin_top.php" method="post">
        <a>商品名<input type="text" name="shohin_mei"></a>
        <a>単価 <input type="text" name="price">円</a>
        <a>在庫<input type="text" name="stock">個</a>
        <a>オプション<input type="text" name="optoin"></a>
        <a>商品説明<textarea name="setu" rows="5" cols="25"></textarea></a>
        <a>産地<input type="text" name="san"></a>
        <a>販売元<input type="text" name="han">個</a>
        <input type="submit" value="戻る">
    </form>
</body>
</html>