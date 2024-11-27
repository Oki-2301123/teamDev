document.addEventListener('DOMContentLoaded', function () {

    // 価格と数量変更時に金額を更新する処理
    const quantitySelects = document.querySelectorAll('.quantity-select');
    quantitySelects.forEach(select => {
        select.addEventListener('change', updateTotalAmount);
    });

    // チェックボックス変更時の処理
    const deleteCheckboxes = document.querySelectorAll('.delete-checkbox');
    deleteCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', handleCheckboxChange);
    });

    /**
     * 数量が変更されたときに金額を更新する関数
     */
    function updateTotalAmount() {
        const select = this;
        const quantity = parseInt(select.value); // 選択された数量
        const price = parseInt(select.dataset.price); // 商品の単価
        const totalAmount = quantity * price; // 合計金額

        const totalElement = select.closest('.cart_box').querySelector('.total-amount');
        if (totalElement) {
            // 合計金額を表示
            totalElement.textContent = `合計: ¥${totalAmount.toLocaleString()}`;

            // 合計金額の色を赤に変更
            totalElement.classList.add('red-text');  // 赤色のクラスを追加
        }

        // 削除のチェックボックスが選択されていれば、金額を0円に設定
        const deleteCheckbox = select.closest('.cart_box').querySelector('.delete-checkbox');
        if (deleteCheckbox && deleteCheckbox.checked) {
            totalElement.textContent = `合計: ¥0`;
            totalElement.classList.add('red-text');  // 削除時も赤色にする
        }

        updateOverallTotal(); // 全体の合計金額を更新
    }

    /**
     * チェックボックス操作時の処理
     * チェックボックスにチェックを入れると対応するプルダウンを0にして金額を更新
     * チェックボックスが外れた場合は元の数量に戻す
     */
    function handleCheckboxChange() {
        const shohinId = this.dataset.shohinId; // 商品IDを取得
        const quantitySelect = document.getElementById(`quantity_${shohinId}`); // 対応するプルダウンを取得
        const originalQuantity = quantitySelect.dataset.originalQuantity; // 元の数量を取得
        const totalElement = quantitySelect.closest('.cart_box').querySelector('.total-amount');

        if (this.checked) {
            quantitySelect.value = "0"; // プルダウンの値を0に設定
            totalElement.textContent = `合計: ¥0`;  // 合計金額を0に
            totalElement.classList.add('red-text');  // 赤色に変更
        } else {
            quantitySelect.value = originalQuantity; // 元の数量を設定
            quantitySelect.dispatchEvent(new Event('change')); // 金額を更新
            totalElement.classList.remove('red-text');  // 赤色をリセット
        }
    }

    /**
     * 全体の合計金額を更新する関数
     */
    function updateOverallTotal() {
        let overallTotal = 0;
        const totalElements = document.querySelectorAll('.total-amount');
        totalElements.forEach(element => {
            const total = parseInt(element.textContent.replace('合計: ¥', '').replace(',', ''));
            overallTotal += total;
        });

        const overallTotalElement = document.querySelector('#overall-total');
        if (overallTotalElement) {
            overallTotalElement.textContent = `合計金額: ¥${overallTotal.toLocaleString()}`;
        }
    }
});
