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
<!-- 野村 -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <img src="/img/hurumaru_title.png" alt="ロゴ">
            </div>
            <nav class="menu-right menu">
                <a href="logout.php">ログアウト</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>管理者画面</h3>
                </div>

                <!-- 商品管理 -->
                    <form action="admin_top.php" method="post">
                    <input type="submit" value="商品">
                    </form>
                    <form action="admin_shohin.php" method="post">
                    <div class="list">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>在庫</th>
                                    <th>単価</th>
                                    <th>産地</th>
                                    <th>販売元</th>
                                    <th>オプション</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['shohin_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item['shohin_stock'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item['shohin_price'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item['shohin_made'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item['shohin_seller'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                        <form action="admin_shohin.php" method="post">
                                            <input type="hidden" name="shohin_id" value="<?= $item['shohin_id'] ?>">
                                            <button type="submit" class="button">編集</button>
                                        </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <form action="admin_addshohin.php">
                        <input type="submit" value="追加">
                    </form>
                </form>

                <!-- 会員管理 -->
                    <form action="admin_top.php" method="post">
                    <input type="submit" value="会員">
                    </form>
                    <form action="admin_user.php" method="post">
                    <div class="list">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名前</th>
                                    <th>メールアドレス</th>
                                    <th>性別</th>
                                    <th>電話番号</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['user_id']); ?></td>
                                        <td><?= htmlspecialchars($user['user_name']); ?></td>
                                        <td><?= htmlspecialchars($user['user_mail']); ?></td>
                                        <td><?= htmlspecialchars($user['user_sex']); ?></td>
                                        <td><?= htmlspecialchars($user['user_phone']); ?></td>
                                        <td>
                                        <form action="admin_shohin.php" method="post">
                                            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                            <button type="submit" class="button">確認</button>
                                        </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>