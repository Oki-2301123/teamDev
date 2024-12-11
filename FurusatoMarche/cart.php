<?php
session_start();
require_once('function.php');
$pdo = pdo(); // データベース接続

// 初期の合計金額を計算
$overallTotal = 0;
if (isset($_SESSION['user_id'])) {
    $sql = 'SELECT * FROM carts WHERE users_id = ?';
    $find_carts = $pdo->prepare($sql);
    $find_carts->execute([$_SESSION['user_id']]);
    $cart = $find_carts->fetch(); // 1行だけ取得

    if ($cart) {
        $cart_id = $cart['cart_id'];
        $sql = 'SELECT * FROM cart_details WHERE carts_id = ?';
        $view_cart = $pdo->prepare($sql);
        $view_cart->execute([$cart_id]);
        $cart_details = $view_cart->fetchAll(PDO::FETCH_ASSOC);
        $cart_cnt = $view_cart->rowCount();

        foreach ($cart_details as $data) {
            $shohins_id = $data['shohins_id'];
            $cart_de_quant = $data['cart_de_quant'];
            $shohins_price = $data['shohins_price'];
            $overallTotal += $cart_de_quant * $shohins_price; // 合計金額を計算
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/cart.css">
    <script src="../js/cart.js" defer></script>
</head>

<body>
    <?php
    head(); // ヘッダー呼び出し
    ?>

    <hr class="hr"><br>

    <?php
    if (isset($_SESSION['user_id'])) {
        // カートの存在チェック
        $sql = 'SELECT * FROM carts WHERE users_id = ?';
        $find_carts = $pdo->prepare($sql);
        $find_carts->execute([$_SESSION['user_id']]);
        $cart = $find_carts->fetch(); // 1行だけ取得

        if ($cart) {
            $cart_id = $cart['cart_id'];
            $_SESSION['cart_id'] = $cart_id;

            // カート内の商品存在チェック
            $sql = 'SELECT * FROM cart_details WHERE carts_id = ?';
            $view_cart = $pdo->prepare($sql);
            $view_cart->execute([$cart_id]);
            $cart_details = $view_cart->fetchAll(PDO::FETCH_ASSOC);

            if ($cart_details) {
                echo '<div class="container">';
                echo '<h2>カート内の商品数：' . $cart_cnt . '件</h2>';
                echo '</div>';
                echo '<form action="cart_update.php" method="post">';
                foreach ($cart_details as $data) {
                    $shohins_id = $data['shohins_id'];
                    $cart_de_quant = $data['cart_de_quant'];
                    $shohins_price = $data['shohins_price'];

                    echo '<div class="cart_box">';
                    $sql = 'SELECT * FROM shohins WHERE shohin_id=?';
                    $view_shohin = $pdo->prepare($sql);
                    $view_shohin->execute([$shohins_id]);
                    $shohin = $view_shohin->fetch(); // 1行だけ取得

                    if ($shohin) {
                        $shohin_stock = $shohin['shohin_stock'];
                        $imagePath = '/teamDev/uploads/' . $shohin['shohin_pict'];
                        echo '<div class="box">';
                        echo '<div class="box__image">';
                        echo '<img src="' . $imagePath . '" alt="' . $shohin['shohin_name'] . '" width="220px" height="auto">';
                        echo '</div>';
                        echo '<div class="box__details">';
                        echo '<div class="name">';
                        echo '<div class="font">';
                        echo $shohin['shohin_name'];
                        echo '</div></div>';
                        // echo '<div class="price">';
                        echo '<div class="font2">';
                        echo '価格: ¥' . $shohin['shohin_price'], '<br>';
                        echo '</div>';
                        echo 'カテゴリー: ' . $shohin['shohin_category'], '<br>';
                        echo  $shohin['shohin_option'], '<br>';
                        echo '</div>';
                        echo '</div>';
                        // 個数選択用プルダウン
                        echo '<div class="box3">';
                        echo '<br><label for="quantity_' . $shohins_id . '">数量: </label>';
                        echo '<select class="quantity-select" name="quantities[' . $shohins_id . ']" id="quantity_' . $shohins_id . '"
                                data-shohin-id="' . $shohins_id . '"
                                data-price="' . $shohins_price . '"
                                data-original-total="' . ($cart_de_quant * $shohins_price) . '"
                                data-original-quantity="' . $cart_de_quant . '">';
                        for ($i = 0; $i <= $shohin_stock; $i++) {
                            $selected = ($i == $cart_de_quant) ? 'selected' : '';
                            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                        }
                        echo '</select>';
                        // echo '</div>';
                    }

                    // 削除用チェックボックス
                    // echo '<div class="bot2">';
                    echo '<input type="checkbox" name="delete_shohin[]" value="' . $shohins_id . '" class="delete-checkbox" data-shohin-id="' . $shohins_id . '"> 削除';
                    echo '</div>';
                    echo '<div class="box2">';
                    echo '<br><span class="total-amount" id="total_' . $shohins_id . '">合計: ¥' . ($cart_de_quant * $shohins_price) . '</span>';
                    echo '</div>';
                    echo '<hr>';
                }
                echo '<div class="cart_container">';
                echo '<br><br><div id="overall-total" data-initial-total="' . $overallTotal . '">合計金額: ¥' . number_format($overallTotal) . '</div></div>';
                echo '<div class="button-group">';
                echo '<br><input type="submit" name="update_cart" value="更新する" class="button">';
                echo '</form>';

                //合計金額の表示部分
                // echo '<div id="overall-total" data-initial-total="' . $overallTotal . '">合計金額: ¥' . number_format($overallTotal) . '</div>';

                echo '<form action="pay.php" method="post">';
                echo '<input type="hidden" name="cart_id" value="' . $cart_id . '">';
                echo '<input type="submit" name="buy" value="レジへ進む" class="button">', '<br>';
                echo '</div>';
                echo '</form>';
            } else {
                echo '<h3>カートが空です</h3>';
            }
        } else {
            echo '<h3>カートが空です</h3>';
        }
    } else {
        echo '<h1>ログインしてください</h1>';
        echo '<h3><a href="login.php">ログイン画面はこちら</a></h3>';
    }
    ?>
    <?php
    if (isset($_SESSION['err'])) {
        echo "<script>
        window.onload = function() {
            alert('" . $_SESSION['err'] . "');
        };
    </script>"; //window.onloadで先にhtmlを読み込んでからalertを出す。
        unset($_SESSION['err']); // セッションデータをクリア
    }

    if (isset($_SESSION['msg'])) {
        echo "<script>
        window.onload = function() {
            alert('" . $_SESSION['msg']  . "');
        };
    </script>"; //window.onloadで先にhtmlを読み込んでからalertを出す。
        unset($_SESSION['msg']); // セッションデータをクリア
    }
    ?>


</body>

</html>