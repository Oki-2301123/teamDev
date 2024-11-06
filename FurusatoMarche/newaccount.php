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
    <form action="newaccountcheck.php" method="post">
        氏名<input type="text" name="sei"><input type="text" name="mei"><br><br>
        フリガナ<input type="text" name="katasei"><input type="text" name="katamei"><br><br>
        生年月日　西暦<input type="text" name="reki">年<input type="text" name="tuki">月<input type="text" name="niti">日<br><br>
        性別<input type="radio" name="seibetu" value="設定しない" checked>設定しない
        <input type="radio" name="seibetu" value="男性" checked>男性
        <input type="radio" name="seibetu" value="女性" checked>女性<br><br>
        メールアドレス<input type="text" name="Mail"><br>
        半角英数字と半角-_@のみ使用可能<br>
        メールアドレス（確認）<input type="text" name="Mailkaku"><br>
        確認の為、再度メールアドレスを入力してください<br>
        パスワード<input type="text" name="Pass"><br>
        8文字以上の半角英数字<br>
        パスワード（確認）<input type="text" name="Passkaku"><br>
        郵便番号<input type="text" name="yubin"><input type="submit" value="住所検索"><br><br>
        都道府県
        <select name="todouhu">
    <option value="北海道">北海道</option>
    <option value="青森県">青森県</option>
    <option value="秋田県">秋田県</option>
    <option value="岩手県">岩手県</option>
    <option value="宮城県">宮城県</option>
    <option value="山形県">山形県</option>
    <option value="福島県">福島県</option>
    <option value="茨城県">茨城県</option>
    <option value="栃木県">栃木県</option>
    <option value="群馬県">群馬県</option>
    <option value="秋田県">秋田県</option>
    <option value="岩手県">岩手県</option>
</select>


        </form>
</body>
</html>