<!--<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css">css接続
    <title>Document</title>
</head>
<body>
    
    require_once 'function.php';
    head();//ヘッダー呼び出し
    echo '<table>';
    //写真
    echo $_POST[''];
    //産地 カテゴリー
    echo $_POST[''], '県産 ', $_POST[''], '<br>';
    //単価
    echo '<h3>', $_POST[''], '円', '</h3><br>';
    echo '<h4>', '送料無料', '</h4>', '<br>';

    ?>
    //削除ボタン
    <button onclick=" location.href='#'">削除</button>
    
    echo '</table>';
    ?>
    //カートの中身一括削除ボタン
    <button onclick=" location.href='#'">一括削除</button>;
</body>

</html>
-->

設計書<br>
ヘッダー表示<br>
PDO<br>
DBでfavoriteテーブル取得<br>
favoriteテーブル<br>
favorite_id:A_I<br>
users_id=$_SESSION['user']<br>
shohins_id=$_POST['id']<br>
favorite_add=date("Y-m-d");<br>
<br>
$_SESSION['user']でfavoriteテーブルの中からWHERE users_id="?" ($_SESSION['user'])<br>
お気に入り商品数を表示:rowCount<br>
商品情報を取得<br>
foreachで出力<br>
お気に入り商品を削除するようにチェックボックス<br>
class="favoritebox"で商品情報を囲む<br>
商品情報を出力<br>
（商品をクリックで商品詳細へ:
"Location: shohin_detail.php?id=" . $a['shohins_id'] . "&search=" . $a['shohin_name']<br>
削除ボタン（del_favo)<br>