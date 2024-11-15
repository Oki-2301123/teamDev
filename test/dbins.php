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
            $_post['user_id'],
            $_post['user_name'],
            $_post['user_ruby'],
            $_post['user_bd'],
            $_post['user_sex'],
            $_post['user_mail'],
            $_post['user_pass'],
            $_post['user_post'],
            $_post['user_pref'],
            $_post['user_city'],
            $_post['user_address'],
            $_post['user_building'],
            $_post['user_phone']
        ]);
    } elseif (isset($_POST['shohins'])) {
        if (is_uploaded_file($column['file']['tmp_name'])) {
            if (!file_exists('upload')) {
                mkdir('upload');
            }
            $file = 'upload/' . basename($column['file']['tmp_name']);

            if (move_uploaded_file($column['file']['tmp_name'], $file)) {
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
                    $_post['shohin_id'],
                    $_post['shohin_name'],
                    $_post['shohin_price'],
                    $_post['shohin_category'],
                    $_post['shohin_made'],
                    $_post['shohin_seller'],
                    $_post['shohin_explain'],
                    $_post['shohin_stock'],
                    $_post['shohin_pict'],
                    $_post['shohin_option'],
                    $_post['shohin_update'],
                ]);
            }
        }
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
            $_post['order_id'],
            $_post['users_id'],
            $_post['carts_id'],
            $_post['order_date'],
            $_post['order_pay'],
            $_post['order_sent'],
            $_post['order_delive'],
            $_post['order_fee']
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
            $_post['order_de_id'],
            $_post['orders_id'],
            $_post['shohins_id'],
            $_post['order_quant'],
            $_post['shohins_price']
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
            $_post['favorite_id'],
            $_post['users_id'],
            $_post['shohins_id'],
            $_post['favorite_add']
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
            $_post['cart_id'],
            $_post['users_id'],
            $_post['cart_create'],
            $_post['cart_update'],
            $_post['cart_total']
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
            $_post['cart_de_id'],
            $_post['carts_id'],
            $_post['shohins_id'],
            $_post['cart_de_quant'],
            $_post['shohins_price']
        ]);
    } elseif (isset($_POST['admin'])) {
        $sql = $pdo->prepare('INSERT INTO 
        admin(
           admin_id,
           admin_pass,
           admin_mail)
         VALUE(?,?,?) ');
        $sql->execute([
            $_post['admin_id'],
            $_post['admin_pass'],
            $_post['admin_mail']
        ]);
    } 

    ?>
</body>

</html>