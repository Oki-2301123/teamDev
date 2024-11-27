// 初期の全体合計金額を設定する関数
function initializeOverallTotal() {
    const overallTotalElement = document.getElementById('overall-total');
    if (overallTotalElement) {
        // PHPで渡された初期値を取得
        const initialTotal = parseInt(overallTotalElement.dataset.initialTotal);
        
        // 初期合計金額を表示
        overallTotalElement.textContent = `合計金額: ¥${initialTotal.toLocaleString()}`;
    }
}

// 合計金額を更新する関数
function updateTotalAmount() {
    const select = this;
    const quantity = parseInt(select.value); // プルダウンで選択された数量
    const price = parseInt(select.dataset.price); // 商品の単価
    const totalAmount = quantity * price; // 合計金額

    const totalElement = select.closest('.cart_box').querySelector('.total-amount');
    if (totalElement) {
        // 合計金額を表示
        totalElement.textContent = `合計: ¥${totalAmount.toLocaleString()}`;
        
        // 数量が初期値かどうかで色を変更
        const originalQuantity = parseInt(select.dataset.originalQuantity);
        if (quantity === originalQuantity) {
            totalElement.classList.remove('red-text');  // 赤色クラスを削除
            totalElement.classList.add('black-text');   // 黒色クラスを追加
        } else {
            totalElement.classList.remove('black-text'); // 黒色クラスを削除
            totalElement.classList.add('red-text');       // 赤色クラスを追加
        }
    }

    updateOverallTotal(); // 合計金額が更新された後に全体の合計を更新
}

// チェックボックスの選択でプルダウンの数量を0にする
function handleCheckboxChange() {
    const checkbox = this;
    const shohinId = checkbox.dataset.shohinId;
    const select = document.querySelector(`select[data-shohin-id="${shohinId}"]`);
    const totalElement = checkbox.closest('.cart_box').querySelector('.total-amount');

    if (checkbox.checked) {
        // チェックされた場合、プルダウンの選択を0に
        select.value = 0;
        select.disabled = true;  // 数量変更を無効にする
        totalElement.textContent = "合計: ¥0";  // 合計金額を0に設定
        totalElement.classList.add('red-text');  // 合計金額を赤色にする
    } else {
        // チェック解除された場合、元の数量に戻す
        select.disabled = false;  // 数量変更を有効にする
        const originalQuantity = select.dataset.originalQuantity;
        select.value = originalQuantity;

        // 元の数量で合計金額を再計算
        updateTotalAmount.call(select);
    }

    updateOverallTotal(); // 合計金額を更新
}

// 全体の合計金額を更新する関数
function updateOverallTotal() {
    let total = 0;
    const totalElements = document.querySelectorAll('.total-amount');
    totalElements.forEach(function (element) {
        total += parseInt(element.textContent.replace('合計: ¥', '').replace(',', '')) || 0;
    });

    const overallTotalElement = document.getElementById('overall-total');
    if (overallTotalElement) {
        overallTotalElement.textContent = `合計金額: ¥${total.toLocaleString()}`;
    }
}

// 数量変更時、チェックボックス変更時にイベントリスナーを設定
document.addEventListener('DOMContentLoaded', function () {
    // 初期合計金額を設定
    initializeOverallTotal();

    // 数量変更時に合計を更新
    const quantitySelects = document.querySelectorAll('.quantity-select');
    quantitySelects.forEach(function (select) {
        select.addEventListener('change', updateTotalAmount);
    });

    // チェックボックス変更時に数量を変更
    const checkboxes = document.querySelectorAll('.delete-checkbox');
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', handleCheckboxChange);
    });
});
