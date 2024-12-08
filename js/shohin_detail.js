document.addEventListener('DOMContentLoaded', function() {
    // ボタン1に対する処理
    const starButtons1 = document.querySelectorAll('.star-button1');
    starButtons1.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // フォーム送信を防止
            button.classList.toggle('yellow'); // クラスをトグル
        });
    });

    // ボタン2に対する処理
    const starButtons2 = document.querySelectorAll('.star-button2');
    starButtons2.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // フォーム送信を防止
            button.classList.toggle('gray'); // クラスをトグル
        });
    });
});
