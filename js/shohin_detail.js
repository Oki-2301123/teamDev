    document.addEventListener('DOMContentLoaded', function() {
        const starButton1 = document.querySelector('.star-button1');

        starButton1.addEventListener('click', function() {
            // クラスを切り替えて色をトグル
            starButton1.classList.toggle('yellow');
        });
    });

    /*document.addEventListener('DOMContentLoaded', function() {
        const starButton2 = document.querySelector('.star-button2');

        starButton2.addEventListener('click', function() {
            // クラスを切り替えて色をトグル
            starButton2.classList.toggle('gray');
        });
    });*/
