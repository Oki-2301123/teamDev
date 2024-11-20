<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    $id = $_GET['id'];
    $pdo = pdo();
    $sql = 'SELECT * FROM shohins WHERE shohin_id=?';
    $data = $pdo->prepare($sql);
    $data->execute([$id]);

    foreach ($data as $info) {
        $imagePath = '/teamDev/uploads/' . $info['shohin_pict'];
        echo '<img src="' . $imagePath . '" alt="' . $info['shohin_name'] . '　class="shohin-image" width="50%" height="auto">';
        echo '<h2>' . $info['shohin_name'] . '</h2><br>';
        echo '<h2 class="shohin_price">' . $info['shohin_price'] . '円'; //文字の色を赤　.shohin_priceで呼び出す
        echo '<h3>商品説明</h3>';
        echo '<div class="shohin_detail_box">' . $info['shohin_explain'] . '</div>'; //boxをに入れる
    
    echo '<form action="order.php" method="post">';


        echo '数量<select name="quant">';
            for($i=1;$i>=$info['stock'];$i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        echo '</select>';
        echo '<input type="submit" value="レジへ進む">';
        echo '<form action="cart.php" method="post">';
            echo '<input type="submit" value="戻る">';
        echo '</form>';
    echo '</form>';
    echo '<a href="toppage.php"><button type="button">戻る</button></a>';
    }
    ?>
</body>

</html>