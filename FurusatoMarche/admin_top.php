<?php
require_once 'function.php';
$pdo = pdo();
$sql = 'SELECT * FROM shohins';
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM users';
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <div class="container">
        <div class="header-logo">
            <img src="../img/hurumaru_title.png" alt="ロゴ">
        </div>
        <nav class="menu-right menu">
            <a href="logout.php">ログアウト</a>
        </nav>
    </div>
</header>

<div class="container">
    <div class="wrapper-title">
        <h3>管理者画面</h3>
    </div>

    <form action="admin_top.php" method="post">
        <input type="submit" name="shohins" value="商品">
        <input type="submit" name="users" value="会員">
        <input class="search_bar" type="text" name="keyword" placeholder="キーワードから探す">
        <input type="submit" name="search" value="検索">
    </form>

    <?php
    if(isset($_POST['shohins'])){
        echo '<table border="1"><tr>';
        echo '<th>ID</th>';
        echo '<th>商品名</th>';
        echo '<th>在庫</th>';
        echo '<th>単価</th>';
        echo '<th>産地</th>';
        echo '<th>販売元</th>';
        echo '<th>オプション</th>';
        echo '</tr>';

        foreach($products as $product){
            echo '<tr>';
            echo '<td>', $product['shohin_id'], '</td>';
            echo '<td>', $product['shohin_name'], '</td>';
            echo '<td>', $product['shohin_stock'], '</td>';
            echo '<td>', $product['shohin_price'], '</td>';
            echo '<td>', $product['shohin_made'], '</td>';
            echo '<td>', $product['shohin_seller'], '</td>';
            echo '<td>', $product['shohin_option'], '</td>';
            echo '<td>';
            echo '<form action="admin_shohin.php" method="post">';
            echo '<input type="hidden" name="shohin_id" value="', $product['shohin_id'], '">';
            echo '<input type="submit" value="編集" class="button">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';

        echo '<form action="admin_addshohin.php">';
        echo '<input type="submit" value="追加">';
        echo '</form>';
    }

    if(isset($_POST['users'])){
        echo '<table border="1"><tr>';
        echo '<th>ID</th>';
        echo '<th>名前</th>';
        echo '<th>メールアドレス</th>';
        echo '<th>性別</th>';
        echo '<th>電話番号</th>';
        echo '</tr>';

        foreach($users as $user){
            echo '<tr>';
            echo '<td>', $user['user_id'], '</td>';
            echo '<td>', $user['user_name'], '</td>';
            echo '<td>', $user['user_mail'], '</td>';
            echo '<td>', $user['user_sex'], '</td>';
            echo '<td>', $user['user_phone'], '</td>';
            echo '<td>';
            echo '<form action="admin_user.php" method="post">';
            echo '<input type="hidden" name="user_id" value="', $user['user_id'], '">';
            echo '<input type="submit" value="確認" class="button">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</div>
</body>
</html>
