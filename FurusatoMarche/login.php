<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Document</title>
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
    <div class="top2">
        <img src="../img/hurumaru_title.png" alt="アイコンロゴ">
    </div>
    <hr class="hr">

    <div class="parent">
        <div class="box">
            <p>
            <h2>会員ログイン</h2><br>
            <form action="login_check.php" method="post" class="button-form">
                メールアドレス　　<input type="text" name="mailaddress"><br><br>
                パスワード　　　　<input type="password" name="pass"><br><br>
                <div class="button-group">
                    <button type="submit" name="login_user" value="user" class="button1">ログイン</button>
                    <button type="submit" name="login_admin" value="admin" class="button1">管理者としてログイン</button>
                </div>
            </form>
            </p>
        </div>
    </div>
    <div class="parent">
        <div class="box">
            <p>
                ふるさとマルシェの会員登録されていない方
            <form action="create_account.php" method="post">
                <input type="submit" value="新規登録（無料）" class="button2">
            </form>
            </p>
        </div>
    </div>

    <!-- モーダル -->
    <div id="modal-overlay"></div>
    <div id="modal-message">
        <p id="modal-text"></p>
    </div>

    <?php
    if (isset($_SESSION['err'])) {
        echo "<script>
            window.onload = function() {
                showModal('" . $_SESSION['err'] . "');
            };
        </script>";
        unset($_SESSION['err']);
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
