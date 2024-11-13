<!DOCTYPE html>
<html lang="ja">

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
                <h1><a href="toppage.php">ふるマル</a></h1>
            </div>
            <form action="logout.php" method="post">
                <input type="submit" value="ログアウト">
            </form>
        </div>
    </header>

    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>管理者画面</h3>
                </div>
                <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>商品ID</th>
                                <th>商品名</th>
                                <th>在庫</th>
                                <th>単価</th>
                                <th>産地</th>
                                <th>販売元</th>
                                <th>オプション</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($news as $new): ?>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?php echo $new['id']; ?></td>
                                        <td><?php echo $new['shouhin_id']; ?></td>
                                        <td><?php echo $new['shouhin_mei']; ?></td>
                                        <td><?php echo $new['stock']; ?></td>
                                        <td><?php echo $product['price']; ?></td>
                                        <td><?php echo $product['Productionarea']; ?></td>
                                        <td><?php echo $product['Seller']; ?></td>
                                        <td><?php echo $product['option']; ?></td>
                                        <td>
                                            <button class="btn btn-green" onclick="location.href='edit_news.php?id=<?php echo $new['id']; ?>'">編集</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>Copyright @ 2018 SQUARE, inc</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>