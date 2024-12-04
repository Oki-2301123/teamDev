<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        header('Location: admin_top.php');
        require_once 'function.php';
        $pdo = pdo();
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $option = $_POST['option'];
        $explain = $_POST['explain'];
        $made = $_POST['made'];
        $seller = $_POST['seller'];

        if(is_uploaded_file($_FILES['pict']['tmp_name'])){
            if(!file_exists('upload')){
                mkdir('upload');
            }
            $file='upload/'.basename(($_FILES['pict']['name']));
            if(move_uploaded_file($_FILES['pict']['tmp_name'],$file)){
            }
        }
        
        $sql = $pdo->prepare('INSERT INTO shohins (shohin_name,shohin_price,shohin_stock,shohin_option,shohin_explain,shohin_made,shohin_seller,shohin_pict) VALUES (?,?,?,?,?,?,?,?)');
        $sql->execute([$name,$price,$stock,$option,$explain,$made,$seller,$pict]);
        $pdo = null;
        exit;
    ?>
</body>
</html>