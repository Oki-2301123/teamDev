<!DOCTYPE html>
<html lang="ja">
<!-- 野村 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="./styles.css">

+          <title>商品管理</title>

    </head>
    <body>
        <header>
        class="container">
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
                <form action="admin_shohin.php" method="post">
                    <input type="submit" value="商品">
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
                                <?php
                                $stmt = $pdo->query('SELECT * FROM shohins');
                                foreach ($stmt as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item['shohin_stock'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item['shohin_price'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item['shohin_made'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($item['shohin_seller'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <button class="btn btn-red" onclick="location.href='admin_shohin.php?id=<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?>'">編集</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>

                <!-- 会員管理 -->
                <form action="admin_user.php" method="post">
                    <input type="submit" value="会員">
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
                                <?php
                                $stmt = $pdo->query('SELECT * FROM users');
                                foreach ($stmt as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($user['user_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($user['user_mail'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($user['user_sex'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($user['user_phone'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <button class="btn btn-red" onclick="location.href='admin_user.php?id=<?= htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8'); ?>'">確認</button>
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