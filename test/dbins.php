<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .product-image {
        width: 200px;
        /* 幅を200pxに指定 */
        height: auto;
        /* アスペクト比を維持 */
        object-fit: cover;
        /* 必要に応じて画像をトリミングして表示 */
    }
</style>

<body>
    <?php
    $pdo = new PDO('mysql:host=mysql311.phy.lolipop.lan;
                    dbname=LAA1554893-teamdev;
                    charset=utf8', 'LAA1554893', 'teamdev5g');

    if (isset($_POST['users'])) {
        $sql = $pdo->prepare('INSERT INTO 
        users(
            user_id,
            user_name,
            user_ruby,
            user_bd,
            user_sex,
            user_mail,
            user_pass,
            user_post,
            user_pref,
            user_city,
            user_address,
            user_building,
            user_phone)
         VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?) ');
        $sql->execute([
            $_POST['user_id'],
            $_POST['user_name'],
            $_POST['user_ruby'],
            $_POST['user_bd'],
            $_POST['user_sex'],
            $_POST['user_mail'],
            $_POST['user_pass'],
            $_POST['user_post'],
            $_POST['user_pref'],
            $_POST['user_city'],
            $_POST['user_address'],
            $_POST['user_building'],
            $_POST['user_phone']
        ]);
    } elseif (isset($_POST['shohins'])) {
        if (isset($_FILES['shohin_pict']) && $_FILES['shohin_pict']['error'] === UPLOAD_ERR_OK) {
            $fileName = $_FILES['shohin_pict']['name'];  // アップロードされたファイル名
            $tempPath = $_FILES['shohin_pict']['tmp_name'];  // 一時保存パス
            $targetPath = "/home/users/2/tonkotsu.jp-aso2301123/web/teamDev/uploads/" . $fileName;

            if (move_uploaded_file($tempPath, $targetPath)) {
                // ファイルが正常にアップロードされた場合の処理
                $shohin_pict = $fileName;  // 保存するファイル名を設定
            } else {
                echo "ファイルのアップロードに失敗しました。";
                $shohin_pict = "";  // アップロードに失敗した場合のデフォルト値
            }
        } else {
            $shohin_pict = "";  // ファイルが存在しない場合のデフォルト値
        }

        // データベース挿入
        $sql = $pdo->prepare('INSERT INTO 
            shohins(
                shohin_id,
                shohin_name,
                shohin_price,
                shohin_category,
                shohin_made,
                shohin_seller,
                shohin_explain,
                shohin_stock,
                shohin_pict,
                shohin_option,
                shohin_update)
            VALUE(?,?,?,?,?,?,?,?,?,?,?) ');
        $sql->execute([
            $_POST['shohin_id'],
            $_POST['shohin_name'],
            $_POST['shohin_price'],
            $_POST['shohin_category'],
            $_POST['shohin_made'],
            $_POST['shohin_seller'],
            $_POST['shohin_explain'],
            $_POST['shohin_stock'],
            $shohin_pict,  // ファイルがない場合はデフォルト値
            $_POST['shohin_option'],
            $_POST['shohin_update'],
        ]);
    } elseif (isset($_POST['orders'])) {
        $sql = $pdo->prepare('INSERT INTO 
        orders(
            order_id,
            users_id,
            carts_id,
            order_date,
            order_pay,
            order_sent,
            order_delive,
            order_fee)
         VALUE(?,?,?,?,?,?,?,?) ');
        $sql->execute([
            $_POST['order_id'],
            $_POST['users_id'],
            $_POST['carts_id'],
            $_POST['order_date'],
            $_POST['order_pay'],
            $_POST['order_sent'],
            $_POST['order_delive'],
            $_POST['order_fee']
        ]);
    } elseif (isset($_POST['order_details'])) {
        $sql = $pdo->prepare('INSERT INTO 
        order_details(
            order_de_id,
            orders_id,
            shohins_id,
            order_quant,
            shohins_price)
         VALUE(?,?,?,?,?) ');
        $sql->execute([
            $_POST['order_de_id'],
            $_POST['orders_id'],
            $_POST['shohins_id'],
            $_POST['order_quant'],
            $_POST['shohins_price']
        ]);
    } elseif (isset($_POST['favorite'])) {
        $sql = $pdo->prepare('INSERT INTO 
        favorite(
            favorite_id,
            users_id,
            shohins_id,
            favorite_add)
         VALUE(?,?,?,?) ');
        $sql->execute([
            $_POST['favorite_id'],
            $_POST['users_id'],
            $_POST['shohins_id'],
            $_POST['favorite_add']
        ]);
    } elseif (isset($_POST['carts'])) {
        $sql = $pdo->prepare('INSERT INTO 
        users(
            cart_id,
            users_id,
            cart_create,
            cart_update,
            cart_total)
         VALUE(?,?,?,?,?) ');
        $sql->execute([
            $_POST['cart_id'],
            $_POST['users_id'],
            $_POST['cart_create'],
            $_POST['cart_update'],
            $_POST['cart_total']
        ]);
    } elseif (isset($_POST['cart_details'])) {
        $sql = $pdo->prepare('INSERT INTO 
        cart_details(
            cart_de_id,
            carts_id,
            shohins_id,
            cart_de_quant,
            shohins_price)
         VALUE(?,?,?,?,?) ');
        $sql->execute([
            $_POST['cart_de_id'],
            $_POST['carts_id'],
            $_POST['shohins_id'],
            $_POST['cart_de_quant'],
            $_POST['shohins_price']
        ]);
    } elseif (isset($_POST['admin'])) {
        $sql = $pdo->prepare('INSERT INTO 
        admin(
           admin_id,
           admin_pass,
           admin_mail)
         VALUE(?,?,?) ');
        $sql->execute([
            $_POST['admin_id'],
            $_POST['admin_pass'],
            $_POST['admin_mail']
        ]);
    } elseif (isset($_POST['list'])) {
        echo '<h2>users</h2>';
        $sql = $pdo->query('SELECT * FROM users');
        foreach ($sql as $a) {
            echo "ユーザーID: " . htmlspecialchars($a['user_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "ユーザー名: " . htmlspecialchars($a['user_name'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "フリガナ: " . htmlspecialchars($a['user_ruby'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "生年月日: " . htmlspecialchars($a['user_bd'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "性別: " . htmlspecialchars($a['user_sex'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "メール: " . htmlspecialchars($a['user_mail'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "パスワード: " . htmlspecialchars($a['user_pass'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "郵便番号: " . htmlspecialchars($a['user_post'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "都道府県: " . htmlspecialchars($a['user_pref'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "市町村: " . htmlspecialchars($a['user_city'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "住所: " . htmlspecialchars($a['user_address'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "電話番号: " . htmlspecialchars($a['user_phone'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "<hr>"; // 区切り線
        }
        echo '<h2>shohins</h2>';
        $sql = $pdo->query('SELECT * FROM shohins');
        foreach ($sql as $a) {
            echo "商品ID: " . htmlspecialchars($a['shohin_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "商品名: " . htmlspecialchars($a['shohin_name'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "価格: " . htmlspecialchars($a['shohin_price'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "カテゴリ: " . htmlspecialchars($a['shohin_category'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "製造: " . htmlspecialchars($a['shohin_made'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "販売元: " . htmlspecialchars($a['shohin_seller'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "説明: " . htmlspecialchars($a['shohin_explain'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "在庫: " . htmlspecialchars($a['shohin_stock'], ENT_QUOTES, 'UTF-8') . "<br>";
            $imagePath = '/teamDev/uploads/' . $a['shohin_pict'];
            echo '写真: <img src="' . $imagePath . '" alt="' . $a['shohin_name'] . '" class="product-image"><br>';
            echo "オプション: " . htmlspecialchars($a['shohin_option'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "更新日: " . htmlspecialchars($a['shohin_update'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "<hr>"; // 区切り線
        }
        echo '<h2>orders</h2>';
        $sql = $pdo->query('SELECT * FROM orders');
        foreach ($sql as $a) {
            echo "注文ID: " . htmlspecialchars($a['user_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "ユーザーID: " . htmlspecialchars($a['user_name'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "カートID: " . htmlspecialchars($a['user_ruby'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "注文日: " . htmlspecialchars($a['user_bd'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "支払方法: " . htmlspecialchars($a['user_sex'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "送り先: " . htmlspecialchars($a['user_mail'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "発送日時: " . htmlspecialchars($a['user_pass'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "支払料金: " . htmlspecialchars($a['user_post'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "<hr>"; // 区切り線
        }
        echo '<h2>order_details</h2>';
        $sql = $pdo->query('SELECT * FROM order_details');
        foreach ($sql as $a) {
            echo "注文詳細ID: " . htmlspecialchars($a['order_de_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "注文ID: " . htmlspecialchars($a['orders_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "商品ID: " . htmlspecialchars($a['shohins_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "注文数: " . htmlspecialchars($a['order_quant'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "商品単価: " . htmlspecialchars($a['shohins_price'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "<hr>"; // 区切り線
        }
        echo '<h2>favorite</h2>';
        $sql = $pdo->query('SELECT * FROM favorite');
        foreach ($sql as $a) {
            echo "お気に入りID: " . htmlspecialchars($a['favorite_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "ユーザーID: " . htmlspecialchars($a['users_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "商品ID: " . htmlspecialchars($a['shohins_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "登録日: " . htmlspecialchars($a['favorite_add'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "<hr>"; // 区切り線
        }
        echo '<h2>carts</h2>';
        $sql = $pdo->query('SELECT * FROM carts');
        foreach ($sql as $a) {
            echo "カートID: " . htmlspecialchars($a['cart_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "ユーザーID: " . htmlspecialchars($a['users_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "カート作成日: " . htmlspecialchars($a['cart_create'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "カート更新日: " . htmlspecialchars($a['cart_update'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "カート合計金額: " . htmlspecialchars($a['cart_total'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "<hr>"; // 区切り線
        }
        echo '<h2>cart_details</h2>';
        $sql = $pdo->query('SELECT * FROM cart_details');
        foreach ($sql as $a) {
            echo "カート詳細ID: " . htmlspecialchars($a['cart_de_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "カートID: " . htmlspecialchars($a['carts_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "商品ID: " . htmlspecialchars($a['shohins_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "カート内商品数: " . htmlspecialchars($a['cart_de_quant'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "商品単価: " . htmlspecialchars($a['shohins_price'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "<hr>"; // 区切り線
        }
        echo '<h2>admin</h2>';
        $sql = $pdo->query('SELECT * FROM admin');
        foreach ($sql as $a) {
            echo "管理者ID: " . htmlspecialchars($a['admin_id'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "管理者パスワード: " . htmlspecialchars($a['admin_pass'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "管理者メール: " . htmlspecialchars($a['admin_mail'], ENT_QUOTES, 'UTF-8') . "<br>";
            echo "<hr>"; // 区切り線
        }
    }
    ?>
    <a href="dbadd.php">戻る</a>
</body>

</html>