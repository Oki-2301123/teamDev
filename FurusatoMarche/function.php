<?php

function head(){
    echo '<p>';
    echo 
        '<a href=toppage.php>
            <img src="" alt="アイコンロゴ">
        </a>';//ふるマルのアイコン　クリックでトップページに遷移　by荒亀

    echo
        '<form action="toppage.php" method="get">
            <input type="text" name="keyword" placeholder="キーワードから探す">
            <input type="submit" name ="sarch" value="検索"
        </form>';//ヘッダーの検索欄　by荒亀

    echo '<a href=cart.php>
            <button type="button"><img src="" alt="カートのアイコン"</button>
        </a>';// by荒亀
    echo '<a href=favorite.php>
        <button type="button"><img src="" alt="カートのアイコン"</button>
    </a>';
    echo '<a href=mypage.php>
            <button type="button"><img src="" alt="カートのアイコン"</button>
        </a>';// by荒亀

        echo '<a href=mypage.php>
            <button type="button"><img src="" alt="カートのアイコン"</button>
        </a>';
    echo'</p>';// by荒亀
}