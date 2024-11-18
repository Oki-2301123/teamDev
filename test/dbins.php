<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

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
    }
    ?>
    <a href="dbadd.php">戻る</a>
</body>

</html>