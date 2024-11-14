<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="./styles.css">
</head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

-          <title>記事管理</title>
+          <title>商品管理</title>

        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- css -->
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="header-logo">
                    <img  src="s/img/hurumaru_title.png">
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
-                          <h3>管理者画面</h3>
                    </div>
                    <div class="list">
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
-                                      <th>商品ID</th>
-                                      <th>商品名</th>
+                                      <th>在庫</th>
+                                      <th>単価</th>
+                                      <th>産地</th>
+                                      <th>販売元</th>
                                    <th>オプション</th>
                                </tr>
                            </thead>
                            <tbody>
-                                   <?php foreach($news as $new): ?>
+                                   <?php foreach($products as $product): ?>
                                <tr>
-                                      <td><?php echo $new['id']; ?></td>
-                                      <td><?php echo $new['shohin_id']; ?></td>
-                                      <td><?php echo $new['shohin_name']; ?></td>
-                                      <td><?php echo $new['shohin_stock']; ?></td>
-                                      <td><?php echo $new['shohin_price']; ?></td>
+                                      <td><?php echo $product['shohin_made']; ?></td>
+                                      <td><?php echo $product['shohin_seller']; ?></td>
+                                      <td><?php echo $product['shohin_option']; ?></td>
                                   <td>
-                                           <button class="btn btn-green" onclick="location.href='edit_news.php?id=<?php echo $new['id']; ?>'">編集</button>
-                                           
+                                           <button class="btn btn-green">編集</button>
+                                    
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
