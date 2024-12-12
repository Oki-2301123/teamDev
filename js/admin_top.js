// スクロールしてボタンを表示
window.addEventListener('scroll', function () {
    const scrollTopButton = document.getElementById('scrollTopButton');
    if (window.scrollY > 200) { // 200px以上スクロールした場合に表示
        scrollTopButton.classList.add('show');
    } else {
        scrollTopButton.classList.remove('show');
    }
});

// ページの一番上にスクロール
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // スムーズにスクロール
    });
}
