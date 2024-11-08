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
    <h2>会員情報確認</h2>//野村
    <form action="login.php" method="post">
<?php
    echo '氏名',$_POST['sei'],$_POST['mei'],'<br>';
    echo 'フリガナ',$_POST['katasei'],$_POST['katamei'],'<br>';
    echo '生年月日', '西暦',$_POST['reki'],'年',$_POST['tuki'],'月',$_POST['niti'],'日','<br>';
    echo 'メールアドレス',$_POST['Mail'],'<br>';
    echo 'メールアドレス（確認）',$_POST['Mailkaku'],'<br>';
    echo 'パスワード',$_POST['Pass'],'<br>';
    echo 'パスワード（確認）',$_POST['Passkaku'],'<br>';
    echo '郵便番号',$_POST['yubin'],'<br>';
    echo '都道府県',$_POST[''],'<br>';
    echo '市区町村',$_POST['siku'],'<br>';
    echo '番地',$_POST['banti'],'<br>';
    echo 'マンション名',$_POST['man'],'<br>';
    echo '電話番号',$_POST['ban']; 
    ?>
    <form action="create_account.php">
    <input type="submit" value="編集"><br><br>
    </form>
    <input type="submit" value="登録">
    </form> 
</body>
</html>