<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/stayle.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/adress_update.css">
    <title>Document</title>
</head>
<!-- 住所編集 打田 -->
<body>
<?php
// セッションからユーザーIDを取得
$user_id = $_SESSION['user_id'];
require_once 'function.php';
$pdo = pdo(); // PDO接続を取得
$sql = 'SELECT user_post, user_pref, user_city, user_address, user_building, user_phone FROM users WHERE user_id = :user_id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

if ($product) {
    // フォームに表示するデータを取得
    $post = $product['user_post'];
    $pref = $product['user_pref'];
    $city = $product['user_city'];
    $address = $product['user_address'];
    $building = $product['user_building'];
    $phone = $product['user_phone'];
}
?>
<div class="top2">
<img src="../img/hurumaru_title.png" alt="アイコンロゴ">
</div>
<hr class="hr">
    <div class="text">
    住所変更
    </div>
    <fieldset>
    <div class="center">
    <div class="container">ご登録住所の編集</div>
    <form action="adress_check.php" method="post">
    <div class="container2">
        郵便番号 　　　<input type="text" name="user_post" value="<?= htmlspecialchars($post) ?>"><br><br>
        </div>
        <div class="container2">
        都道府県　　　　
        <select name="user_pref">
            <?php
            // 都道府県を表示
            $prefectures = [
                "都道府県を選択してください",
                "北海道",
                "青森県",
                "秋田県",
                "岩手県",
                "宮城県",
                "山形県",
                "福島県",
                "茨城県",
                "栃木県",
                "群馬県",
                "埼玉県",
                "千葉県",
                "東京都",
                "神奈川県",
                "山梨県",
                "長野県",
                "新潟県",
                "富山県",
                "石川県",
                "福井県",
                "岐阜県",
                "静岡県",
                "愛知県",
                "三重県",
                "滋賀県",
                "京都府",
                "大阪府",
                "兵庫県",
                "奈良県",
                "和歌山県",
                "鳥取県",
                "島根県",
                "岡山県",
                "広島県",
                "山口県",
                "徳島県",
                "香川県",
                "愛媛県",
                "高知県",
                "福岡県",
                "佐賀県",
                "長崎県",
                "熊本県",
                "大分県",
                "宮崎県",
                "鹿児島県",
                "沖縄県"
            ];
            foreach ($prefectures as $item) {
                echo '<option value="' . $item . '" ' . ($pref == $item ? 'selected' : '') . '>' . $item . '</option>';
            }
            ?>
        </select><br><br>
        </div>
        <div class="container2">
        市区町村 　　　<input type="text" name="user_city" value="<?= htmlspecialchars($city) ?>"><br><br>
        </div>
        <div class="container2">
        番地 　　　　　<input type="text" name="user_address" value="<?= htmlspecialchars($address) ?>"><br><br>
        </div>
        <div class="container2">
        マンション名 　<input type="text" name="user_building" value="<?= htmlspecialchars($building) ?>"><br><br>
        </div>
        <div class="container2">
        電話番号 　　　<input type="text" name="user_phone" value="<?= htmlspecialchars($phone) ?>"><br><br>
        </div>
        </fieldset>
        <div class="button-container">
        <input type="submit" name="update-btn" value="確認" class="button">
        </div>
    </form>
    <form action="adress_view.php" method="post">
    <div class="button-container">
        <input type="submit" name="return" value="戻る" class="button">
        </div>
    </form>
    </body>

</html>