<?php
ob_start();
    require_once 'function.php';
    $pdo = pdo();
    if (isset($_POST['in'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $option = $_POST['option'];
    $explain = $_POST['explain'];
    $made = $_POST['made'];
    $seller = $_POST['seller'];
    $date=date('y-m-d');
    
    $pict = $_FILES['pict']['name'];
    $tmp_name = $_FILES['pict']['tmp_name'];
    $uploadDir = '/home/users/2/tonkotsu.jp-aso2301123/web/teamDev/uploads/';
    $uploadFile = $uploadDir . basename($pict);

    if (move_uploaded_file($tmp_name, $uploadFile)) {
        
        $sql = $pdo->prepare('INSERT INTO shohins (shohin_name, shohin_price, shohin_stock, shohin_option,
                        shohin_explain, shohin_made, shohin_seller, shohin_pict,shohin_update) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $sql->execute([$name, $price, $stock, $option, $explain, $made, $seller, $pict, $date]);
        $pdo = null;
        header('Location: admin_top.php');
        exit;
    } 
}
if (isset($_POST['shohin_id'])) {
    $shohin_id = $_POST['shohin_id'];
    $sql = $pdo->prepare('SELECT * FROM shohins WHERE shohin_id = ?');
    $sql->execute([$shohin_id]);
    $product = $sql->fetch(PDO::FETCH_ASSOC);

    // 取得した商品情報をフォームに表示
    if ($product) {
        $id = $product['shohin_id'];
        $name = $product['shohin_name'];
        $price = $product['shohin_price'];
        $stock = $product['shohin_stock'];
        $option = $product['shohin_option'];
        $explain = $product['shohin_explain'];
        $made = $product['shohin_made'];
        $seller = $product['shohin_seller'];
    }
}

// 削除処理
if (isset($_POST['dele'])) {
    $shohin_id = $_POST['shohin_id']; 
    $sql = $pdo->prepare('DELETE FROM shohins WHERE shohin_id = ?');
    $sql->execute([$shohin_id]);
    header('Location: admin_top.php');
    exit;
}

if (isset($_POST['up'])) {
    $id = $_POST['shohin_id'];
    $name = $_POST['shohin_name'];
    $price = $_POST['shohin_price'];
    $stock = $_POST['shohin_stock'];
    $option = $_POST['shohin_option'];
    $explain = $_POST['shohin_explain'];
    $made = $_POST['shohin_made'];
    $seller = $_POST['shohin_seller'];

    $sql = $pdo->prepare('UPDATE shohins SET 
                            shohin_name = ?, shohin_price = ?, shohin_stock = ?, shohin_option = ?, 
                            shohin_explain = ?, shohin_made = ?, shohin_seller = ?
                          WHERE shohin_id = ?');
    $sql->execute([$name, $price, $stock, $option, $explain, $made, $seller, $id]);
    header('Location: admin_top.php');
    exit;                   
}
ob_flush();
?>