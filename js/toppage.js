document.addEventListener('DOMContentLoaded', () => {
    // ページネーションクリック時にスクロールをスムーズに移動
    const paginationLinks = document.querySelectorAll('.pagination-link, .pagination-arrow');

    paginationLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            // ページ遷移時にスムーズスクロール
            e.preventDefault();
            const href = link.getAttribute('href');
            if (href) {
                // URLを変更する前にスクロール
                window.scrollTo({
                    top: 0, // ページトップにスクロール
                    behavior: 'smooth'
                });

                // 遷移を少し遅らせる（スムーズスクロール後）
                setTimeout(() => {
                    window.location.href = href;
                }, 500); // スクロールが終わるタイミングに合わせる
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // 全てのお気に入りボタンにクリックイベントを追加
    document.querySelectorAll("button[name='fav']").forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault(); // ページ遷移を防ぐ

            // 商品IDを取得 (親要素のデータ属性やボタン属性を使用)
            const productBox = button.closest(".shohinbox");
            const shohinId = productBox.getAttribute("data-shohin-id");

            if (!shohinId) {
                alert("商品の情報が見つかりません");
                return;
            }

            // 非同期リクエストを送信
            fetch("favorite_add.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ shohin_id: shohinId }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert(data.message); // 成功メッセージを表示
                    } else {
                        alert(data.message); // エラーメッセージを表示
                    }
                })
                .catch((error) => {
                    console.error("お気に入り登録エラー:", error);
                    alert("通信エラーが発生しました");
                });
        });
    });
});
