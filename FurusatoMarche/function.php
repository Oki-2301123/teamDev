<?php

function pdo()
{
    $pdo = new PDO('mysql:host=mysql311.phy.lolipop.lan;
                    dbname=LAA1554893-teamdev;
                    charset=utf8', 'LAA1554893', 'teamdev5g');

    return $pdo;
}

function endpdo()
{
    $pdo = null;
    return $pdo;
}

function head()
{
    echo '<link rel="stylesheet" href="style.css">';
    echo '<header>';
    echo 
    '<a href="toppage.php">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ" width="100px" height="40px">
    </a>';

    echo 
    '<form action="toppage.php" method="get" class="search__box">
        <input class="search__bar" type="text" name="keyword" placeholder="キーワードから探す">
        <button type="submit" name="search">検索</button>
    </form>';

    echo
    '<a href="cart.php">
        <img src="../img/cart.png" alt="カート" width="40px" height="40px">
    </a>';

    echo 
    '<a href="favorite.php">
        <img src="../img/favorite.png" alt="お気に入り" width="40px" height="40px">
    </a>';

    echo 
    '<a href="mypage.php">
        <img src="../img/menu.png" alt="メニュー" width="40px" height="40px">
    </a>';

    echo 
    '<a href="mypage.php">
        <img src="../img/icon.png" width="40px" height="40px" alt="ユーザアイコン">
    </a>';

    echo '</header>';
}

?>