<?php
session_start();
require_once('function.php');
$pdo = pdo();

if (!isset($_SESSION['user_id'])) {
    echo '<h1>ログインしてください</h1><h3><a href="login.php">ログイン画面はこちら</a></h3>';


    exit;
}

$user_id = $_SESSION['user_id'];
$sql = 'SELECT * FROM orders WHERE users_id = ? ORDER BY order_id DESC';
$get_orders = $pdo->prepare($sql);
$get_orders->execute([$user_id]);
$orders = $get_orders->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang=<!DOCTYPE html>

<head>
    <meta charset="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>注文履歴</title>
    <link rel="stylesheet" href="../css/order_history.css">
</head>

<body>

    </head>
    <p>
    <div class="top2">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </div>
    </p>
    <hr class="hr">
    <div class="text">注文履歴</div>
    <?php if ($orders): ?>
        <?php foreach ($orders as $order): ?>
            <div class="order-box">
                <div class="text-indent">注文ID: <?= htmlspecialchars($order['order_id'], ENT_QUOTES, 'UTF-8') ?></div>
                <div class="text-indent2">
                    <p>注文日: <?= htmlspecialchars($order['order_date'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p>お届け先: <?= htmlspecialchars($order['order_sent'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p>支払い方法: <?= htmlspecialchars($order['order_pay'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p>合計金額: ¥<?= number_format($order['order_fee']) ?></p>
                    <p>配送予定日: <?= htmlspecialchars($order['order_delive'], ENT_QUOTES, 'UTF-8') ?></p>
                </div><br>
                <?php
                $sql = 'SELECT * FROM order_details INNER JOIN shohins ON order_details.shohins_id = shohins.shohin_id WHERE order_details.orders_id = ?';
                $get_order_details = $pdo->prepare($sql);
                $get_order_details->execute([$order['order_id']]);
                $order_details = $get_order_details->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php if ($order_details): ?>
                    <div class="text-indent3">注文詳細</div>
                    <ul>
                        <?php foreach ($order_details as $detail): ?>
                            <!-- <li> -->
                            <div class="box_left">
                            <div class="box">
                                <div class="box__image">
                                    <img src="/teamDev/uploads/<?= htmlspecialchars($detail['shohin_pict'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($detail['shohin_name'], ENT_QUOTES, 'UTF-8') ?>" class="product-image" width="220px" height="auto">
                                </div>
                                <!-- <div class="text-indent2"> -->
                                <div class="box__details">
                                    <span>商品名: <?= htmlspecialchars($detail['shohin_name'], ENT_QUOTES, 'UTF-8') ?></span><br>
                                    <span>価格: ¥<?= number_format($detail['shohins_price']) ?></span><br>
                                    <span>数量: <?= htmlspecialchars($detail['order_quant'], ENT_QUOTES, 'UTF-8') ?></span><br>
                                    <span>小計: ¥<?= number_format($detail['shohins_price'] * $detail['order_quant']) ?></span><br>
                                </div>
                            </div>
                            </div>
                            <!-- </div><br> -->
                            <!-- </li> -->
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>注文詳細が見つかりません。</p>
                <?php endif; ?>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <h3>注文履歴がありません。</h3>
    <?php endif; ?>
    <div class="parent">
        <a href="mypage.php"><button type="button" class="button">戻る</button></a><br>
    </div>
</body>

</html>