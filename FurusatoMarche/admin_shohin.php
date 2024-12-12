<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/style.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/admin_shohin.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/header.css"><!--css接続 -->
    <title>商品追加</title>
</head>

<body>
    <div class="top">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </div>
    <hr class="hr">
    <form action="admin_shohins_insert.php" method="post" enctype="multipart/form-data">
        <div class="text">
            <label class="item-label2">商品情報</label>
        </div>
        <?php
        require_once 'function.php';
        if (isset($_POST['shohin_id'])) {
            $shohin_id = $_POST['shohin_id'];
            $pdo = pdo();
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
                $shohin_pict = $product['shohin_pict'];
                $explain = $product['shohin_explain'];
                $made = $product['shohin_made'];
                $seller = $product['shohin_seller'];
            }
        }
        ?>
        <div class="form-container">
            <div class="form-left">
                <input type="hidden" name="id" value="<?= $id ?>">
                商品名<input type="text" name="name" value="<?= $name ?>"><br>

                <!-- 単価と円を同じ行に配置 -->
                単価
                <div class="price-container">
                    <input type="number" name="price" value="<?= $price ?>">
                    <span class="currency">円</span>
                </div><br>

                <!-- 在庫と個を同じ行に配置 -->
                在庫
                <div class="stock-container">
                    <input type="number" name="stock" value="<?= $stock ?>">
                    <span class="unit">個</span>
                </div><br>

                オプション<input type="text" name="option" value="<?= $option ?>"><br>
                カテゴリー<input type="text" name="category" value="<?= $category ?>"><br>
                産地<input type="text" name="made" value="<?= $made ?>"><br>
                販売元<input type="text" name="seller" value="<?= $seller ?>"><br>
            </div>

            <div class="form-right">
                商品画像<br>
                <?php
                $imagePath = '/teamDev/uploads/' . $shohin_pict;
                echo '<img src="' . $imagePath . '" alt="' . $name . '" class="shohin__img">';
                ?>
                <input type="file" name="pict"><br>

                商品説明<br>
                <textarea name="explain"><?= $explain ?></textarea><br>
            </div>
        </div>


        <div class="button-container">
            <input type="submit" name="back" value="戻る">
            <input type="submit" name="dele" value="削除">
            <input type="submit" name="up" value="登録">
        </div>
        <br>
        <hr class="hr">
    </form>
</body>