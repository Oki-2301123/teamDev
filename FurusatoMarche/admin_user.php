<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/style.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/admin_user.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/header.css"><!--css接続 -->
    <title>Document</title>
</head>

<body>
    <div class="top">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </div>
    <hr class="hr">
    <div class="text">
        <label class="item-label2">会員情報</label>
    </div>
    <?php
    require_once 'function.php';
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $pdo = pdo();
        $sql = $pdo->prepare('SELECT * FROM users WHERE user_id = ?');
        $sql->execute([$user_id]);
        $product = $sql->fetch(PDO::FETCH_ASSOC);

        // 取得した商品情報をフォームに表示
        if ($product) {
            $id = $product['user_id'];
            $mail = $product['user_mail'];
            $bd = $product['user_bd'];
            $name = $product['user_name'];
            $rudy = $product['user_ruby'];
            $pass = $product['user_pass'];
            $post = $product['user_post'];
            $pref = $product['user_pref'];
            $city = $product['user_city'];
            $address = $product['user_address'];
            $building = $product['user_building'];
            $phone = $product['user_phone'];
        }
    }
    ?>
    <form action="admin_users_update.php" method="post">
        <div class="form-container">
            <div class="form-left">
                <label class="sub">メールアドレス<input type="text" name="user_mail" value="<?= $mail ?>"></label><br>
                <label class="sub">誕生日<input type="date" name="user_bd" value="<?= $bd ?>"></label><br>
                <label class="sub">名前<input type="text" name="user_name" value="<?= $name ?>"></label><br>
                <label class="sub">フリガナ<input type="text" name="user_ruby" value="<?= $rudy ?>"></label><br>
                <label class="sub">パスワード<input type="text" name="user_pass" value="<?= $pass ?>"></label><br>
                <div class="button-container">
                    <input type="submit" name="back" value="戻る">
                    <input type="submit" name="dele" value="削除">
                    <input type="submit" name="up" value="完了">
                </div>
            </div>
            <div class="form-right">
                <label class="sub">郵便番号<input type="text" name="user_post" value="<?= $post ?>"></label><br>
                <label class="sub">都道府県<input type="text" name="user_pref" value="<?= $pref ?>"></label><br>
                <label class="sub">市区町村<input type="text" name="user_city" value="<?= $city ?>"></label><br>
                <label class="sub">番地<input type="text" name="user_address" value="<?= $address ?>"></label><br>
                <label class="sub">マンション名<input type="text" name="user_building" value="<?= $building ?>"></label><br>
                <label class="sub">電話番号<input type="text" name="user_phone" value="<?= $phone ?>"></label><br>
            </div>
        </div>

        <input type="hidden" name="user_id" value="<?= $id ?>">
    </form>

    <hr class="hr">
</body>

</html>