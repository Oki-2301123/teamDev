<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title><!-- 野村 -->
</head>

<body>
    require_once 'function.php';
    head();//ヘッダー呼び出し

    <form action="order.php" method="post">
        <img src="">


        数量<select name="suu">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>
        <input type="submit" value="レジへ進む">
        <form action="cart.php" method="post">
            <input type="submit" value="戻る">
        </form>
    </form>
</body>

</html>