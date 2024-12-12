<?php
require_once 'function.php';
$pdo = pdo();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/stayle.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/admin_top.css">
    <script src="../js/admin_top.js" defer></script>
    <title>Document</title>
</head>

<body>
    <header>
        <div class="top2">
            <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
        </div>
        <hr class="hr">
    </header>

    <div class="text">
        管理者画面
        <div class="logout">
            <a href="logout.php" class="logout__text">ログアウト</a>
        </div>
    </div>


    <div class="sticky-container">
        <form action="admin_top.php" method="post" class="sticky-form">
            <input type="submit" name="shohins" value="商品">
            <input type="submit" name="users" value="会員">
            <input class="search_bar" type="text" name="keyword" placeholder="キーワードから探す">
            <input type="submit" name="search" value="検索">
        </form>
        <form action="admin_addshohin.php" method="post" class="add-button-form">
            <input type="submit" value="商品追加" class="button">
        </form>
    </div>
    <?php
    //商品
    if (isset($_POST['shohins'])) {

        $sql = 'SELECT * FROM shohins';
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<table border="1"><tr>';
        echo '<th>ID</th>';
        echo '<th>商品名</th>';
        echo '<th>在庫</th>';
        echo '<th>単価</th>';
        echo '<th>産地</th>';
        echo '<th>販売元</th>';
        echo '<th>オプション</th>';
        echo '</tr>';

        foreach ($products as $product) {
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
    }

    //会員
    if (isset($_POST['users'])) {
        $sql = 'SELECT * FROM users';
        $stmt = $pdo->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<table border="1"><tr>';
        echo '<th>ID</th>';
        echo '<th>名前</th>';
        echo '<th>メールアドレス</th>';
        echo '<th>性別</th>';
        echo '<th>電話番号</th>';
        echo '</tr>';

        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>', $user['user_id'], '</td>';
            echo '<td>', $user['user_name'], '</td>';
            echo '<td>', $user['user_mail'], '</td>';
            if ($user['user_sex'] === 0) {
                echo '<td>未設定</td>';
            } elseif ($user['user_sex'] === 1) {
                echo '<td>男</td>';
            } elseif ($user['user_sex'] === 2) {
                echo '<td>女</td>';
            } else {
                echo '<td>?</td>';
            }
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




    if (isset($_POST['search']) && isset($_POST['keyword']) && !empty($_POST['keyword'])) {
        $search_term = '%' . $_POST['keyword'] . '%';

        // 商品検索
        if (isset($_POST['shohins']) || (isset($_POST['keyword']) && !isset($_POST['users']))) {
            $sql = 'SELECT * FROM shohins WHERE shohin_name LIKE ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$search_term]);

            if ($stmt->rowCount() > 0) {

                echo '<table border="1"><tr>';
                echo '<th>ID</th>';
                echo '<th>商品名</th>';
                echo '<th>在庫</th>';
                echo '<th>単価</th>';
                echo '<th>産地</th>';
                echo '<th>販売元</th>';
                echo '<th>オプション</th>';
                echo '</tr>';

                foreach ($stmt as $shohin) {
                    echo '<tr>';
                    echo '<td>', $shohin['shohin_id'], '</td>';
                    echo '<td>', $shohin['shohin_name'], '</td>';
                    echo '<td>', $shohin['shohin_stock'], '</td>';
                    echo '<td>', $shohin['shohin_price'], '</td>';
                    echo '<td>', $shohin['shohin_made'], '</td>';
                    echo '<td>', $shohin['shohin_seller'], '</td>';
                    echo '<td>', $shohin['shohin_option'], '</td>';
                    echo '<td>';
                    echo '<form action="admin_shohin.php" method="post">';
                    echo '<input type="hidden" name="shohin_id" value="', $shohin['shohin_id'], '">';
                    echo '<input type="submit" value="編集" class="button">';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        }

        // 会員検索
        if (isset($_POST['users']) || (isset($_POST['keyword']) && !isset($_POST['shohins']))) {
            $sql = 'SELECT * FROM users WHERE user_name LIKE ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$search_term]);

            if ($stmt->rowCount() > 0) {
                echo '<table border="1"><tr>';
                echo '<th>ID</th>';
                echo '<th>名前</th>';
                echo '<th>メールアドレス</th>';
                echo '<th>性別</th>';
                echo '<th>電話番号</th>';
                echo '</tr>';

                foreach ($stmt as $user) {
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
        }
    }
    ?>
    <div id="scrollTopButton" class="scroll-top" onclick="scrollToTop()">
        ↑
    </div>
    </div>
<?php
if (isset($_SESSION['msg'])) {
        echo "<script>
            window.onload = function() {
                alert('" . $_SESSION['msg'] . "');
            };
        </script>"; //window.onloadで先にhtmlを読み込んでからalertを出す。
        unset($_SESSION['msg']); // セッションデータをクリア
    }
?>
</body>

</html>