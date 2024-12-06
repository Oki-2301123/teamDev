<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once 'function.php';
    $pdo = pdo();
    $users_id = $_SESSION['users_id'];
    $carts_id = $_POST['carts_id'];
    $order_date = date("y-m-d");
    $order_pay = 'クレジットカード';
    $sql="SELECT user_pref, user_city, user_address, user_building FROM users WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([$_SESSION['user_id']]);
    foreach($stmt as $a){
        $pref=$a['user_pref'];
        $city=$a['user_city'];
        $address=$a['user_address'];
        $building=$a['user_building'];
    }
    $order_sent = $pref.$city.$address.$building;
    $order_delive = date("y-m-d",strtotime("+2 day"));
    $order_fee = $_POST['overallTotal'];

    $sql = $pdo->prepare('select * from orders where users_id = ? ');
    $sql->execute([$users_id]);
    $row_count = $sql->rowCount();
    if($row_Count<=0){
        //order作る
        $sql =$pdo->prepare('INSERT INTO orders (order_id, users_id, carts_id, order_date, order_pay, order_sent, order_delive, order_fee) VALUES (?,?,?,?,?,?,?,?)');
        $sql->execute([$order_id, $users_id, $carts_id, $order_date, $order_pay, $order_sent, $order_delive, $order_fee]);
        $pdo = null;
    }
    $sql =$pdo->prepare('INSERT INTO order_details (order_de_id, orders_id, shohins_id, order_quant, shohins_price)');
    
    //ireder_detailをつくる
    ?>
</body>
</html>