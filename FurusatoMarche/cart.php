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
                echo 'カート内の商品数：' . $cart_cnt . '件';
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
                        echo '<img src="' . $imagePath . '" alt="' . $shohin['shohin_name'] . '" class="product-image" width="50%" height="auto">';
                        echo '</div>';
                        echo '<div class="box__details">';
                        echo '<div class="name">';
                        echo '商品名: ' . $shohin['shohin_name'];
                        echo '</div>';
                        echo '<div class="price">';
                        echo '価格: ¥' . $shohin['shohin_price'], '</div>';
                        echo 'カテゴリー: ' . $shohin['shohin_category'];
                        echo 'オプション: ' . $shohin['shohin_option'];
                        echo '在庫: ' . $shohin_stock;
                        echo '</div>';

                        // 個数選択用プルダウン
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
                    }

                    // 削除用チェックボックス
                    echo '<br><input type="checkbox" name="delete_shohin[]" value="' . $shohins_id . '" class="delete-checkbox" data-shohin-id="' . $shohins_id . '"> 削除';
                    echo '<br><span class="total-amount" id="total_' . $shohins_id . '">合計: ¥' . ($cart_de_quant * $shohins_price) . '</span>';
                    echo '</div>';
                }
                echo '<br><input type="submit" name="update_cart" value="更新する">';
                echo '</form>';

                //合計金額の表示部分
                echo '<div id="overall-total" data-initial-total="' . $overallTotal . '">合計金額: ¥' . number_format($overallTotal) . '</div>';

                echo '<form action="pay.php" method="post">';
                echo '<input type="hidden" name="cart_id" value="' . $cart_id . '">';
                echo '<input type="submit" name="buy" value="レジへ進む">';
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


</body>

</html>