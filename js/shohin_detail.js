    document.addEventListener('DOMContentLoaded', function() {
        const starButton = document.querySelector('.star-button');

        starButton.addEventListener('click', function() {
            // クラスを切り替えて色をトグル
            starButton.classList.toggle('yellow');
        });
    });
