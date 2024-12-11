function head2()
{
    echo '<link rel="stylesheet" href="style.css">';
    echo '<header>';
    echo 
    '<a href="toppage.php">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </a>';

    echo 
    '<form action="toppage.php" method="get" class="search__box">
        <input class="search__bar" type="text" name="keyword" placeholder="キーワードから探す">
        <button type="submit" name="search">検索</button>
    </form>';

    echo 
    '<a href="cart.php">
        <button type="button" class="header__icon">カート</button>
    </a>';

    echo 
    '<a href="favorite.php">
        <button type="button" class="header__icon">お気に入り</button>
    </a>';

    echo 
    '<a href="mypage.php">
        <button type="button" class="header__icon">メニュー</button>
    </a>';

    echo 
    '<a href="mypage.php">
        <img src="../img/icon.png" width="2.5%" height="2.5%" alt="ユーザアイコン">
    </a>';

    echo '</header>';
}
