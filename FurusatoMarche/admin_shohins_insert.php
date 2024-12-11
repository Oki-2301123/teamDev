<?php
require_once 'function.php';
$pdo = pdo();
if (isset($_POST['in'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $option = $_POST['option'];
    $category = $_POST['category'];
    $explain = $_POST['explain'];
    $made = $_POST['made'];
    $seller = $_POST['seller'];
    $date = date('y-m-d');

    $uploadDir = '../uploads/';  // 保存先ディレクトリ

    // ディレクトリが存在しない場合、作成する
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // ディレクトリを作成、親ディレクトリも必要なら作成
    }

    // ファイルを保存するパスを指定
    $uploadFile = $uploadDir . basename($_FILES['pict']['name']);

    // アップロードされたファイルを移動
    if (move_uploaded_file($_FILES['pict']['tmp_name'], $uploadFile)) {
        $sql = $pdo->prepare('INSERT INTO 
                        shohins (shohin_name,shohin_price, shohin_category,shohin_made, shohin_seller,shohin_explain,shohin_stock,shohin_pict,shohin_option,shohin_update)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)');
        $sql->execute([$name, $price, $category, $made, $seller, $explain, $stock, $uploadFile, $option, $date]);
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
        $category = $product['shohin_category'];
        $explain = $product['shohin_explain'];
        $made = $product['shohin_made'];
        $seller = $product['shohin_seller'];
    }
}

// 削除処理
if (isset($_POST['dele'])) {
    $shohin_id = $_POST['id'];
    $sql = $pdo->prepare('DELETE FROM shohins WHERE shohin_id = ?');
    $sql->execute([$shohin_id]);
    header('Location: admin_top.php');
    exit;
}

if (isset($_POST['up'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $option = $_POST['option'];
    $category = $_POST['category'];
    $explain = $_POST['explain'];
    $made = $_POST['made'];
    $seller = $_POST['seller'];

    $sql = $pdo->prepare('UPDATE shohins SET
                            shohin_name = ?, shohin_price = ?, shohin_stock = ?, shohin_option = ?,
                            shohin_category = ?,shohin_explain = ?, shohin_made = ?, shohin_seller = ?
                          WHERE shohin_id = ?');
    if (!($sql->execute([$name, $price, $stock, $option, $category, $explain, $made, $seller, $id]))) {
    }
    header('Location: admin_top.php');
    exit;
}
header('Location: admin_top.php');
exit;
