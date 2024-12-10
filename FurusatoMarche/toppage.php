<?php
// セッション開始
session_start();

// 必要な関数を読み込み
require_once 'function.php';

// 現在のページ番号を取得（クエリパラメータから取得、デフォルトは1ページ目）
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// 1ページあたりの表示件数
$perPage = 9;

// 昇順/降順の指定を取得（デフォルトは昇順）
$order = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'desc' : 'asc';

// データベース接続
$pdo = pdo();

// 条件付きで商品数を取得するSQL
$sqlCount = 'SELECT COUNT(*) FROM shohins';
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = '%' . $_GET['keyword'] . '%';
    $sqlCount .= ' WHERE shohin_name LIKE :keyword';
}

// 商品の総数を取得
$statementCount = $pdo->prepare($sqlCount);
if (isset($keyword)) {
    $statementCount->bindValue(':keyword', $keyword, PDO::PARAM_STR);
}
$statementCount->execute();
$totalProducts = $statementCount->fetchColumn();

// 総ページ数を計算
$totalPages = ceil($totalProducts / $perPage);

// 現在のページに対応する商品を取得
$offset = ($page - 1) * $perPage;

// 商品データ取得用のSQL
$sql = 'SELECT shohin_id, shohin_name, shohin_price, shohin_category, shohin_pict, shohin_option FROM shohins';
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $sql .= ' WHERE shohin_name LIKE :keyword';
}
$sql .= ' ORDER BY shohin_id ' . $order; // 商品IDでソート
$sql .= ' LIMIT :limit OFFSET :offset';

$statement = $pdo->prepare($sql);
if (isset($keyword)) {
    $statement->bindValue(':keyword', $keyword, PDO::PARAM_STR);
}
$statement->bindValue(':limit', $perPage, PDO::PARAM_INT);
$statement->bindValue(':offset', $offset, PDO::PARAM_INT);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/toppage.css">
    <script src="../js/toppage.js" defer></script>
    <title>TopPage</title>
</head>

<body>
    <?php
    // ヘッダーの呼び出し
    head();
    ?>
    <!-- ヘッダー -->
    <hr class="hr">
    <!-- ソートボタン -->
    <div class="sort-buttons">
        <a href="?order=asc<?= isset($_GET['keyword']) ? '&keyword=' . $_GET['keyword'] : '' ?>"
            class="sort-button <?= $order === 'asc' ? 'active' : '' ?>">昇順</a>
        <a href="?order=desc<?= isset($_GET['keyword']) ? '&keyword=' . $_GET['keyword'] : '' ?>"
            class="sort-button <?= $order === 'desc' ? 'active' : '' ?>">降順</a>
    </div>

    <!-- ページネーション -->
    <div class="pagination">
        <?php if ($page > 1) { ?>
            <a href="?page=<?= $page - 1 ?>" class="pagination-link">前へ</a>
        <?php } ?>
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a href="?page=<?= $i ?>" class="pagination-link <?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php } ?>
        <?php if ($page < $totalPages) { ?>
            <a href="?page=<?= $page + 1 ?>" class="pagination-link">次へ</a>
        <?php } ?>
    </div>


    <!-- 商品リスト -->
    <?php if (empty($products)) { ?>
        <div class="no-results">検索結果が見つかりませんでした。</div>
    <?php } else { ?>
        <div class="product-grid">
            <?php foreach ($products as $product) { ?>
                <a href="shohin_detail.php?id=<?= $product['shohin_id'] ?>&search=<?= $product['shohin_name'] ?>" class="shohin-link">
                    <div class="shohinbox" data-shohin-id="<?= $product['shohin_id'] ?>">
                        <img src="/teamDev/uploads/<?= $product['shohin_pict'] ?>" alt="<?= $product['shohin_name'] ?>" class="product-image">
                        <p><?= $product['shohin_name'] ?></p>
                        <p>¥<?= $product['shohin_price'] ?></p>
                        <p><?= $product['shohin_category'] ?></p>
                        <p><?= $product['shohin_option'] ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>
    <?php } ?>

    <!-- ページネーション -->
    <div class="pagination">
        <?php if ($page > 1) { ?>
            <a href="?page=<?= $page - 1 ?>&order=<?= $order ?><?= isset($_GET['keyword']) ? '&keyword=' . $_GET['keyword'] : '' ?>"
                class="pagination-link">前へ</a>
        <?php } ?>
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a href="?page=<?= $i ?>&order=<?= $order ?><?= isset($_GET['keyword']) ? '&keyword=' . $_GET['keyword'] : '' ?>"
                class="pagination-link <?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php } ?>
        <?php if ($page < $totalPages) { ?>
            <a href="?page=<?= $page + 1 ?>&order=<?= $order ?><?= isset($_GET['keyword']) ? '&keyword=' . $_GET['keyword'] : '' ?>"
                class="pagination-link">次へ</a>
        <?php } ?>

    </div>

    <?php
    // 未ログインの場合、ゲストとしてフラグを立てる
    if (isset($_SESSION['user_name'])) {
        if (isset($_SESSION['login_first'])) {
            echo "<script>
            window.onload = function() {
                alert('ようこそ！" . $_SESSION['user_name'] . "さん！');
            };
        </script>"; //window.onloadで先にhtmlを読み込んでからalertを出す。
            unset($_SESSION['login_first']); // セッションデータをクリア
        }
    }

    if (isset($_SESSION['msg'])) {
        echo "<script>
            window.onload = function() {
                alert('" . $_SESSION['msg'] . "');
            };
        </script>"; //window.onloadで先にhtmlを読み込んでからalertを出す。
        unset($_SESSION['msg']); // セッションデータをクリア
    }
    ?>
</body>

</html>