<?php
echo $_POST['id'];
?>
<br>
設計書<br>
受け渡し：$_SESSION['user'],$_POST['id']<br>
<br>
PDO<br>
favoriteテーブル<br>
favorite_id:A_I<br>
users_id=$_SESSION['user']<br>
shohins_id=$_POST['id']<br>
favorite_add=date("Y-m-d");<br>
<br>
$_SESSION['user']がない場合<br>
$_SESSION['err']=please Login<br>
ボタンadd_favoが押されたら↓<br>
hedderで遷移(shohin_detail)<br>
ある場合<br>
上記の情報をfavoriteテーブルに挿入<br>
hedderで遷移<br>
<br>
ボタンdel_favoが押されたら<br>
受け渡し:$_SESSION['user'],$_GET['id']で情報削除<br>
(必ずWHERE=$_SESSION['user'],$_GET['id'])<br>
hedderで遷移(favorite)<br>