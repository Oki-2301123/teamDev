<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <title>Document</title>
</head>
<body>
<?php 
require_once 'function.php';
$pdo = pdo();
$shohin_id = $_POST['shohin_id'];
$sql = $pdo->prepare('DELETE FROM shohins WHERE shohin_id = ?');
$sql->execute([$shohin_id]);
head();//ヘッダー呼び出し
?>
    
</body>
</html>