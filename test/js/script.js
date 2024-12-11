document.addEventListener('DOMContentLoaded', function () {
    // 要素を取得
    const loginButton = document.getElementById('login-button');
    const notificationContainer = document.getElementById('notification-container');

    // 要素が取得できているかデバッグ
    console.log('loginButton:', loginButton);
    console.log('notificationContainer:', notificationContainer);

    // 要素がnullでない場合のみ処理を続ける
    if (loginButton && notificationContainer) {
        // 通知メッセージを表示する関数
        function showNotification(message, duration = 3000) {
            // 通知要素を作成
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;

            // コンテナに追加
            notificationContainer.appendChild(notification);

            // 指定した時間後に自動で削除
            setTimeout(() => {
                notification.remove();
            }, duration);
        }

        // ログインボタンのクリックイベント
        loginButton.addEventListener('click', () => {
            const isLoginSuccessful = true; // 仮定
            if (isLoginSuccessful) {
                showNotification('ログインに成功しました！');
            }
        });
    } else {
        console.error('要素が見つかりませんでした。');
    }
});
