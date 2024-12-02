<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/stayle.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/create_account.css">
    <title>Document</title>
</head>
<!-- 野村 -->

<body>
    <div class="top">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </div>
    <hr class="hr">
    <div class="text">
        無料会員登録
    </div>
    <div class="box-container">

        <div class="box">会員情報入力</div>
        <div class="arrow">→</div>
        <div class="box2">会員情報確認</div>
        <div class="arrow">→</div>
        <div class="box2">会員登録完了</div>
    </div>
    <div class="form-wrapper">
    <div class="title">
    会員情報入力</div><br>
    <form action="create_account_check.php" method="post">
        <div class="title2"><span class="asterisk">＊</span>氏名
        <input type="text" name="user_name" placeholder="山田" required style="width: 180px; height: 30px;"> <input type="text" name="user_name1" placeholder="太郎" required style="width: 180px; height: 30px;"><br><br></div>
        <div class="title2"><span class="asterisk">＊</span>フリガナ
        <input type="text" name="user_ruby" placeholder="ヤマダ" required style="width: 180px; height: 30px;"> <input type="text" name="user_ruby1" placeholder="タロウ" required style="width: 180px; height: 30px;"><br><br></div>
        <div class="title2"><span class="asterisk">＊</span>生年月日 西暦
        <input type="text" name="user_bd" placeholder="2024" required style="width: 90px; height: 30px;"> 年 <input type="text" name="user_bd1" placeholder="01" required style="width: 35px; height: 30px;"> 月 <input type="text" name="user_bd2" placeholder="01" required style="width: 35px; height: 30px;"> 日 <br><br></div>
        <div class="title2"><span class="asterisk">＊</span>性別
        <input type="radio" name="user_sex" value="設定しない" checked>設定しない
        <input type="radio" name="user_sex" value="男性" >男性
        <input type="radio" name="user_sex" value="女性" >女性<br><br></div>
        <div class="title2"><span class="asterisk">*</span>メールアドレス
        <input type="text" name="user_mail" placeholder="sample@mail.com" required style="width: 280px; height: 30px;"><br></div>
        半角英数字と半角-_@のみ使用可能<br><br>
        <div class="title2"><span class="asterisk">＊</span>メールアドレス（確認）<input type="text" name="user_mail" placeholder="sample@mail.com" required style="width: 280px; height: 30px;"><br></div>
        確認の為、再度メールアドレスを入力してください<br><br>
        <div class="title2"><span class="asterisk">＊</span>パスワード
        <input type="password" name="user_pass" required style="width: 280px; height: 30px;"><br></div>
        8文字以上の半角英数字<br><br>
        <div class="title2"><span class="asterisk">＊</span>パスワード（確認）
        <input type="password" name="user_pass" required style="width: 280px; height: 30px;"><br><br></div>
        <div class="title2"><span class="asterisk">＊</span>郵便番号
        <input type="text" name="user_post" placeholder="1230003" required style="width: 100px; height: 30px;"> <input type="submit" value="住所検索" class="buttun"><br><br></div>
        <div class="title2"><span class="asterisk">＊</span>都道府県
        <select name="user_pref" id="user_pref">
            <option value="都道府県を選択してください">都道府県を選択してください</option>
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
        </select><br><br></div>
        <div class="title2"><span class="asterisk">＊</span>市区町村
        <input type="text" name="user_city" placeholder="福岡市博多区" required style="width: 280px; height: 30px;"><br><br></div>
        <div class="title2"><span class="asterisk">＊</span>番地
        <input type="text" name="user_address" placeholder="博多駅南" required style="width: 280px; height: 30px;"><br><br></div>
        <div class="title2">マンション名
        <input type="text" name="user_building" style="width: 280px; height: 30px;"><br><br></div>
        <div class="title2"><span class="asterisk" >＊</span>電話番号
        <input type=" text" name="user_phone" placeholder="08012345678" required style="width: 280px; height: 30px;"><br><br></div>
        </div><br><br>
        <input type="submit" value="確認画面へ進む  >" class="buttun2">
        <br><br>
    </form>
    <!-- 野村 -->
</body>

</html>