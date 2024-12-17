<?php
// セッション開始
session_start();
if (!(isset($_SESSION['user_name']))) {
    $_SESSION['guest'] = true;
} else {
    $_SESSION['guest'] = false;
}
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
// 昇順/降順、ソート対象を取得（デフォルトはID昇順）
$orderOptions = ['asc', 'desc'];
$sortOptions = ['shohin_id', 'shohin_name', 'shohin_price'];

$order = isset($_GET['order']) && in_array($_GET['order'], $orderOptions) ? $_GET['order'] : 'asc';
$sortBy = isset($_GET['sort']) && in_array($_GET['sort'], $sortOptions) ? $_GET['sort'] : 'shohin_id';

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

// 商品データ取得
$sql = 'SELECT shohin_id, shohin_name, shohin_price, shohin_category, shohin_pict, shohin_option FROM shohins';
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $sql .= ' WHERE shohin_name LIKE :keyword';
}
$sql .= " ORDER BY $sortBy $order LIMIT :limit OFFSET :offset";


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
    <style>
        /* モーダルのスタイル */
        #modal-message {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            text-align: center;
        }

        /* オーバーレイのスタイル */
        #modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <?php
    // ヘッダーの呼び出し
    head();
    ?>
    <!-- ヘッダー -->
    <hr class="hr">
    <div class="guest">
        <?php
        if (!(isset($_SESSION['user_name']))) {
            echo '<h2><a href="login.php">ログインはこちら</a></h2>';
        }
        ?>
    </div>
    <!-- ソートボタン -->
    <div class="sort-buttons">
        <span>並び替え:</span>
        <a href="?sort=shohin_name&order=asc"
            class="sort-button asc">名前昇順</a>
        <a href="?sort=shohin_name&order=desc"
            class="sort-button desc">名前降順</a>
        <a href="?sort=shohin_price&order=asc"
            class="sort-button asc">価格昇順</a>
        <a href="?sort=shohin_price&order=desc"
            class="sort-button desc">価格降順</a>
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


    <!-- モーダル -->
    <div id="modal-overlay"></div>
    <div id="modal-message">
        <p id="modal-text"></p>
    </div>

    <?php
    if (isset($_SESSION['user_name'])) {
        if (isset($_SESSION['login_first'])) {
            echo "<script>
            window.onload = function() {
                showModal('ようこそ！" . $_SESSION['user_name'] . "さん！');
            };
            </script>";
            unset($_SESSION['login_first']); // セッションデータをクリア
        }
    }

    if (isset($_SESSION['msg'])) {
        echo "<script>
            window.onload = function() {
                showModal('" . $_SESSION['msg'] . "');
            };
        </script>";
        unset($_SESSION['msg']); // セッションデータをクリア
    }
    ?>

    <script>
        // モーダル表示関数
        function showModal(message) {
            const modal = document.getElementById('modal-message');
            const overlay = document.getElementById('modal-overlay');
            const modalText = document.getElementById('modal-text');

            // メッセージを設定
            modalText.textContent = message;

            // モーダルとオーバーレイを表示
            modal.style.display = 'block';
            overlay.style.display = 'block';

            // 3秒後に非表示
            setTimeout(() => {
                modal.style.display = 'none';
                overlay.style.display = 'none';
            }, 3000);
        }
    </script>
</body>

</html>