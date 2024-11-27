// 初期の全体合計金額を設定する関数
function initializeOverallTotal() {
    const overallTotalElement = document.getElementById('overall-total');
    if (overallTotalElement) {
        const initialTotal = overallTotalElement.textContent.replace('合計金額: ¥', '').replace(',', '');
        overallTotalElement.textContent = `合計金額: ¥${parseInt(initialTotal).toLocaleString()}`;
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
        
        if (quantity > 0) {
            totalElement.classList.remove('red-text'); // 赤色のクラスを削除（数量が0でない場合）
        } else {
            totalElement.classList.add('red-text');  // 赤色のクラスを追加（数量が0の場合）
        }
    }

    // 削除のチェックボックスが選択されている場合
    const deleteCheckbox = select.closest('.cart_box').querySelector('.delete-checkbox');
    if (deleteCheckbox && deleteCheckbox.checked) {
        totalElement.textContent = `合計: ¥0`; // 削除されている場合は0円
        totalElement.classList.add('red-text');  // 赤色にする
    }

    updateOverallTotal(); // 合計金額が更新された後に全体の合計を更新
}

// 全体の合計金額を更新する関数
function updateOverallTotal() {
    let total = 0;
    const totalElements = document.querySelectorAll('.total-amount');

    totalElements.forEach(function (totalElement) {
        const text = totalElement.textContent.replace('合計: ¥', '').replace(',', '');
        const amount = parseInt(text);  // 数値として解析
        if (!isNaN(amount)) {
            total += amount;  // 合計を加算
        }
    });

    const overallTotalElement = document.getElementById('overall-total');
    if (overallTotalElement) {
        overallTotalElement.textContent = `合計金額: ¥${total.toLocaleString()}`;
    }
}

// チェックボックスの変更を扱う関数
function handleCheckboxChange() {
    const shohinId = this.dataset.shohinId; // 商品IDを取得
    const quantitySelect = document.getElementById(`quantity_${shohinId}`); // 対応するプルダウンを取得
    const originalQuantity = quantitySelect.dataset.originalQuantity; // 元の数量を取得
    const totalElement = quantitySelect.closest('.cart_box').querySelector('.total-amount');

    if (!quantitySelect || !totalElement) {
        console.error(`Cannot find quantity select or total element for shohinId: ${shohinId}`);
        return;
    }

    if (this.checked) {
        quantitySelect.value = "0"; // プルダウンの値を0に設定
        totalElement.textContent = `合計: ¥0`;  // 合計金額を0に
        totalElement.classList.add('red-text');  // 赤色にする
    } else {
        quantitySelect.value = originalQuantity; // 元の数量に戻す
        updateTotalAmount.call(quantitySelect); // 金額を再計算

        // 元の数量に戻したときに赤色を解除
        if (originalQuantity > 0) {
            totalElement.classList.remove('red-text');
        }
    }

    updateOverallTotal(); // 全体合計を再計算
}

// イベントリスナーの設定
document.addEventListener('DOMContentLoaded', function () {
    const quantitySelects = document.querySelectorAll('.quantity-select');
    quantitySelects.forEach(select => {
        select.addEventListener('change', updateTotalAmount);
    });

    const deleteCheckboxes = document.querySelectorAll('.delete-checkbox');
    deleteCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', handleCheckboxChange);
    });

    initializeOverallTotal(); // ページ読み込み時に初期の合計金額を設定
});
