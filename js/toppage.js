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
