<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    require_once 'function.php';
    head();//ヘッダー呼び出し

    <h1>ふるマル</h1>
    <h2>無料会員登録</h2>
    <h3>会員情報入力→会員情報確認</h3>
    <h2>会員情報入力</h2>
    <form action="create_account_check.php" method="post">
        氏名<input type="text" name="user_name"><input type="text" name="user_name"><br><br>
        フリガナ<input type="text" name="user_ruby"><input type="text" name="user_ruby"><br><br>
        生年月日 西暦<input type="text" name="user_bd">年<input type="text" name="user_bd">月<input type="text" name="user_bd">日<br><br>
        性別<input type="radio" name="user_sex" value="設定しない" checked>設定しない
        <input type="radio" name="user_sex" value="男性" checked>男性
        <input type="radio" name="user_sex" value="女性" checked>女性<br><br>
        メールアドレス<input type="text" name="user_mail"><br>
        半角英数字と半角-_@のみ使用可能<br>
        メールアドレス（確認）<input type="text" name="user_mail"><br>
        確認の為、再度メールアドレスを入力してください<br>
        パスワード<input type="text" name="user_pass"><br>
        8文字以上の半角英数字<br>
        パスワード（確認）<input type="text" name="user_pass"><br>
        郵便番号<input type="text" name="user_post"><input type="submit" value="住所検索"><br><br>
        都道府県
        <select name="user_pref">
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
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
        </select><br>
        市区町村<input type="text" name="user_city"><br><br>
        番地<input type="text" name="user_address"><br><br>
        マンション名<input type="text" name="user_building"><br><br>
        電話番号<input type=" text" name="user_phone"><br><br>
        <input type="submit" value="確認画面へ進む  >">


    </form>
    <!-- newaccountを作った by野村 -->
</body>

</html>