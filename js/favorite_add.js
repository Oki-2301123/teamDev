document.addEventListener('DOMContentLoaded', function () {
    // お気に入りボタンを全て取得
    const favButtons = document.querySelectorAll('button[name="fav"]');

    favButtons.forEach(button => {
        button.addEventListener('click', function () {
            const shohinId = this.dataset.shohinId; // ボタンに埋め込んだ商品IDを取得

            fetch('favorite_add.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `shohin_id=${shohinId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message); // 成功メッセージ
                    this.disabled = true; // ボタンを無効化
                    this.textContent = "お気に入り済み"; // ボタンのテキストを変更
                } else {
                    alert(data.message); // エラーメッセージ
                }
            })
            .catch(error => {
                console.error('エラーが発生しました:', error);
                alert('通信エラーが発生しました。');
            });
        });
    });
});
