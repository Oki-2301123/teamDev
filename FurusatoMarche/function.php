<?php

function pdo()
{
    $pdo = new PDO('mysql:host=mysql311.phy.lolipop.lan;
                    dbname=LAA1554893-teamdev;
                    charset=utf8', 'LAA1554893', 'teamdev5g');

    return $pdo;
}

function endpdo(){
    $pdo = null;
    return $pdo;
}

function head()
{
    echo
    '<a href=toppage.php>
            <img src="./img/hurumaru_title.png" width="10%" height="5%" alt="アイコンロゴ">
        </a>'; //ふるマルのアイコン　クリックでトップページに遷移　by荒亀

    echo
    '<form action="toppage.php" method="get">
            <input type="text" name="keyword" placeholder="キーワードから探す">
            <input type="submit" name ="search" value="検索"
        </form>'; //ヘッダーの検索欄　by荒亀
    echo '';
    echo '<a href=cart.php>
            <button type="button">カート</button>
        </a>'; // by荒亀
    echo ' ';
    echo '<a href=favorite.php>
        <button type="button">お気に入り</button>
        </a>';
    echo ' ';
    echo '<a href=mypage.php>
            <button type="button">メニュー</button>
        </a>'; // by荒亀
    echo ' ';
    echo '<a href=mypage.php>
            <img src="./img/icon.png" width="2.5%" height="2.5%" alt="ユーザアイコン">
        </a>'; // by荒亀
    echo ' ';
}
