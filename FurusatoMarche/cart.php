<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('function.php');
    head(); //ヘッダーの呼び出し
    $pdo = pdo();
    ?>
    <div class="subject-line">
        <div class="subject">
            <item class="subject1">ランキング</item>
            <item class="subject2">地域で探す</item>
            <item class="subject3">カテゴリ別</item>
            <item class="subject4">セール商品</item>
            <item class="subject5">特集</item>
        </div>
    </div>
    <?php
    if (isset($_SESSION['user_id'])) {
        //echo $_SESSION['user_id'];

        // カートの存在チェック
        $sql = 'SELECT * FROM carts WHERE users_id = ?';
        $find_carts = $pdo->prepare($sql);
        $find_carts->execute([$_SESSION['user_id']]);
        $cart = $find_carts->fetch(); // 1行だけ取得

        if ($cart) {
            $cart_id = $cart['cart_id'];
            $cart_total = $cart['cart_total'];

            // カート内の商品の存在チェック
            $sql = 'SELECT * FROM cart_details WHERE carts_id = ?';
            $view_cart = $pdo->prepare($sql);
            $view_cart->execute([$cart_id]);
            $cart_details = $view_cart->fetchAll(PDO::FETCH_ASSOC); // 複数行取得

            if ($cart_details) {
                echo'<form action="cart_delete" method="post">';//フォームで削除のチェックボックスを作る
                foreach ($cart_details as $data) {
                    $shohins_id = $data['shohins_id'];
                    $cart_de_quant = $data['cart_de_quant'];
                    $shohins_price = $data['shohins_price'];

                    echo '<div class="cart_box">'; //カートの商品を格納する箱

                    $sql = 'SELECT * FROM shohins WHERE shohin_id=?';
                    $view_shohin = $pdo->prepare($sql);
                    $view_shohin->execute([$shohins_id]);
                    $shohin = $view_shohin->fetch(); // 1行だけ取得

                    if ($shohin) {
                        echo '<div class="cart_shohin_box">'; //商品情報を格納する箱

                        $imagePath = '/teamDev/uploads/' . $shohin['shohin_pict'];
                        echo '<img src="' . $imagePath . '" alt="' . $shohin['shohin_name'] . '" class="product-image"  width="50%" height="auto">';
                        echo '<br>商品名:'.$shohin['shohin_name'];
                        echo '<br>価格:'.$shohin['shohin_price'];
                        echo '<br>カテゴリー:'.$shohin['shohin_category'];
                        echo '<br>オプション:'.$shohin['shohin_option'];

                        echo '</div>';
                    }
                    echo $cart_de_quant .'個×'. $shohins_price.'円＝'.$cart_de_quant*$shohins_price;
                    echo '</div>';
                    echo '<input type="checkbox" name="delete_shohin" value="'.$shohins_id.'">'.$shohin['shohin_name'].'を削除する<br>';
                }
                echo '<input type="submit" name="delete" value="削除">';
                echo '</form>';
            }
        } else {
            echo '<h3>カートが空です</h3>';
        }
    } else {
        echo '<h1>ログインしてください</h1>';
        echo '<h3><a href="login.php">ログイン画面はこちら</a></h3>';
    }
    ?>
</body>

</html>