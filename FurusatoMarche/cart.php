<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート</title>
    <script src="../js/cart.js"></script>
    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
    <?php
    require_once('function.php');
    head(); // ヘッダーの呼び出し
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
        // カートの存在チェック
        $sql = 'SELECT * FROM carts WHERE users_id = ?';
        $find_carts = $pdo->prepare($sql);
        $find_carts->execute([$_SESSION['user_id']]);
        $cart = $find_carts->fetch(); // 1行だけ取得

        if ($cart) {
            $cart_id = $cart['cart_id'];

            // カート内の商品の存在チェック
            $sql = 'SELECT * FROM cart_details WHERE carts_id = ?';
            $view_cart = $pdo->prepare($sql);
            $view_cart->execute([$cart_id]);
            $cart_details = $view_cart->fetchAll(PDO::FETCH_ASSOC); // 複数行取得

            if ($cart_details) {
                echo '<form action="cart_update.php" method="post">'; // 更新用のフォーム
                foreach ($cart_details as $data) {
                    $shohins_id = $data['shohins_id'];
                    $cart_de_quant = $data['cart_de_quant'];
                    $shohins_price = $data['shohins_price'];

                    echo '<div class="cart_box">'; // カートの商品を格納する箱

                    $sql = 'SELECT * FROM shohins WHERE shohin_id=?';
                    $view_shohin = $pdo->prepare($sql);
                    $view_shohin->execute([$shohins_id]);
                    $shohin = $view_shohin->fetch(); // 1行だけ取得

                    if ($shohin) {
                        $shohin_stock = $shohin['shohin_stock'];
                        $imagePath = '/teamDev/uploads/' . $shohin['shohin_pict'];
                        echo '<img src="' . $imagePath . '" alt="' . $shohin['shohin_name'] . '" class="product-image"  width="50%" height="auto">';
                        echo '<br>商品名: ' . $shohin['shohin_name'];
                        echo '<br>価格: ¥' . $shohin['shohin_price'];
                        echo '<br>カテゴリー: ' . $shohin['shohin_category'];
                        echo '<br>オプション: ' . $shohin['shohin_option'];
                        echo '<br>在庫: ' . $shohin_stock;

                        // 個数選択用プルダウンメニュー
                        echo '<br><label for="quantity_' . $shohins_id . '">数量: </label>';
                        echo '<select class="quantity-select" name="quantities[' . $shohins_id . ']" id="quantity_' . $shohins_id . '" 
                                data-shohin-id="' . $shohins_id . '" 
                                data-price="' . $shohins_price . '" 
                                data-original-total="' . ($cart_de_quant * $shohins_price) . '" 
                                data-original-quantity="' . $cart_de_quant . '">'; // 元の数量を保持
                        for ($i = 0; $i <= $shohin_stock; $i++) {
                            $selected = ($i == $cart_de_quant) ? 'selected' : '';
                            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                        }
                        echo '</select>';
                    }

                    // 削除用のチェックボックス
                    echo '<br><input type="checkbox" name="delete_shohin[]" value="' . $shohins_id . '" class="delete-checkbox" data-shohin-id="' . $shohins_id . '"> 削除';
                    // 合計金額表示部分に total-amount クラスを追加
                    echo '<br><span class="total-amount">合計: ' . ($cart_de_quant * $shohins_price) . '円</span>';
                    echo '</div>';
                }
                echo '<br><input type="submit" name="update_cart" value="更新する">';
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