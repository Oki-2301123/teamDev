<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/style.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/admin_addshohin.css"><!--css接続 -->
    <link rel="stylesheet" href="../css/header.css"><!--css接続 -->
    <title>商品追加</title>
</head>

<body>
    <div class="top">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </div>
    <hr class="hr">

    <form action="admin_shohins_insert.php" method="post" enctype="multipart/form-data" class="form-container">
        <h2 class="form-title">商品追加</h2>

        <div class="form-group">
            <label for="name" class="form-label">商品名</label>
            <input type="text" id="name" name="name" class="form-input">
        </div>

        <div class="form-group">
            <label for="price" class="form-label">単価</label>
            <div class="input-with-unit">
                <input type="text" id="price" name="price" class="form-input-with-unit">
            </div>
        </div>



        <div class="form-group">
            <label for="stock" class="form-label">在庫</label>
            <input type="text" id="stock" name="stock" class="form-input">
        </div>

        <div class="form-group">
            <label for="option" class="form-label">オプション</label>
            <input type="text" id="option" name="option" class="form-input">
        </div>

        <div class="form-group">
            <label for="category" class="form-label">カテゴリー</label>
            <input type="text" id="category" name="category" class="form-input">
        </div>

        <div class="form-group">
            <label for="pict" class="form-label">商品画像</label>
            <input type="file" id="pict" name="pict" class="form-input">
        </div>

        <div class="form-group">
            <label for="explain" class="form-label">商品説明</label>
            <textarea id="explain" name="explain" class="form-textarea"></textarea>
        </div>

        <div class="form-group">
            <label for="made" class="form-label">産地</label>
            <input type="text" id="made" name="made" class="form-input">
        </div>

        <div class="form-group">
            <label for="seller" class="form-label">販売元</label>
            <input type="text" id="seller" name="seller" class="form-input">
        </div>

        <div class="form-buttons">
            <button type="submit" name="back" class="button-secondary">戻る</button>
            <button type="submit" name="in" class="button-primary">登録</button>
        </div>
    </form>
</body>

</html>