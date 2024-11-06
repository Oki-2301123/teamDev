<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>ふるマル</h1>
    <h2>無料会員登録</h2>
    <h3>会員情報入力→会員情報確認</h3>
    <h2>会員情報入力</h2>
    <form action="login.php" method="post">
<?php
    echo '氏名',$_GET['sei'],$_GET['mei'],'<br>';
    echo 'フリガナ',$_GET['katasei'],$_GET['katamei'],'<br>';
    echo '生年月日', '西暦',$_GET['reki'],'年',$_GET['tuki'],'月',$_GET['niti'],'日','<br>';
    echo 'メールアドレス',$_GET['Mail'],'<br>';
    echo 'メールアドレス（確認）',$_GET['Mailkaku'],'<br>';
    echo 'パスワード',$_GET['Pass'],'<br>';
    echo 'パスワード（確認）',$_GET['Passkaku'],'<br>';
    echo '郵便番号',$_GET['yubin'],'<br>';
    echo '都道府県',$_GET[''],'<br>';
    echo '市区町村',$_GET['siku'],'<br>';
    echo '番地',$_GET['banti'],'<br>';
    echo 'マンション名',$_GET['man'],'<br>';
    echo '電話番号',$_GET['ban']; 
    ?>
    <form action="newaccount.php">
    <input type="submit" value="編集"><br><br>
    </form>
    <input type="submit" value="登録">
    </form> 
</body>
</html>