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

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">



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
                    <img  src="/img/hurumaru_title.png">
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
                     <form action="admin_shohin.php" method="post">
                    <input type="submit" value="商品">
                
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
+                                      <td><?php echo $new['shohin_made']; ?></td>
+                                      <td><?php echo $new['shohin_seller']; ?></td>
+                                      <td><?php echo $new['shohin_option']; ?></td>
                                   <td>
-                                           <button class="btn btn-red" onclick="location.href='admin_shohin.php?id=<?php echo $new['id']; ?>'">編集</button>
-                                           
+                                           <button class="btn btn-red">編集</button>
+                                    
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <form action="admin_user.php" method="post">
                    <input type="submit" value="会員">
                   

                        <div class="list">
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
-                                      <th>名前</th>
+                                      <th>メールアドレス</th>
+                                      <th>パスワード</th>
+                                      <th>性別</th>
+                                      <th>電話番号</th>
                                </tr>
                            </thead>
                            <tbody>
-                                   <?php foreach($news as $new): ?>
+                                   <?php foreach($products as $product): ?>
                                <tr>
-                                      <td><?php echo $new['user_id']; ?></td>
-                                      <td><?php echo $new['user_name']; ?></td>
-                                      <td><?php echo $new['user_mail']; ?></td>
-                                      <td><?php echo $new['user_pass']; ?></td>
+                                      <td><?php echo $new['user_sex']; ?></td>
+                                      <td><?php echo $new['user_phone']; ?></td>
                                   <td>
-                                           <button class="btn btn-red" onclick="location.href='admin_user.php?id=<?php echo $new['id']; ?>'">確認</button>
-                                           
+                                           <button class="btn btn-red">確認</button>
+                                    
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </form>
    
        </main>
       
        <footer>
            <div class="container">
                <p>Copyright @ 2018 SQUARE, inc</p>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
    </html>
