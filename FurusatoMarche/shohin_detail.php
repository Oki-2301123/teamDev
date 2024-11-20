<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/stayle.css">
    <link rel="stylesheet" href="../css/header.css">
    <title></title><!-- 野村 -->
</head>

<body>
    <?php
    require_once 'function.php';
    head(); //ヘッダー呼び出し
    ?>
    <div class="outer-div">
        <div class="centered-content">
            <item class="rank">ランキング</item>
            <item class="search">地域で探す</item>
            <item class="category">カテゴリ別</item>
            <item class="sale">セール商品</item>
            <item class="special">特集</item>
        </div>
    </div>

    <?php
    $id=$_GET['id'];
    $pdo = pdo();
    $sql = 'SELECT * FROM shohins WHERE shohin_id=?';
    $data=$pdo->prepare($sql);
    $data->execute($id);

    foreach($data as $info){
        $imagePath = '/teamDev/uploads/' . $info['shohin_pict'];
        echo '<img src="' . $imagePath . '" alt="' . $info['shohin_name'] . '>';
        echo '<h2>'.$shohin_name.'</h2><br>';
        echo '<h2 class="shohin_price">'.$info['shohin_price'].'円';//文字の色を赤　.shohin_priceで呼び出す
        echo '<h3>商品説明</h3>';
        echo '<shohin_detail_box>'.$info[''].'';
    }
    ?>
    <form action="order.php" method="post">


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