<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/stayle.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/payment_update.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once 'function.php';
    head();//ヘッダー呼び出し
    ?>
    <hr class="hr">
    
    <div class="text">
    お支払い方法
    </div>
    <br>
    <form action="#" method="post">
    <fieldset>
      <div class="radio-container">
        <label>
          <input type="radio" name="payment" value="クレジットカード決済" checked>クレジットカード決済
        </label>
        <label>
          <input type="radio" name="payment" value="コンビニ決済" disabled>コンビニ決済
        </label>
        <label>
          <input type="radio" name="payment" value="代金決済" disabled>代金決済
        </label>
        <label>
          <input type="radio" name="payment" value="後払い決済" disabled>後払い決済
        </label>
        <label>
          <input type="radio" name="payment" value="銀行決済" disabled>銀行決済
        </label>
        <label>
          <input type="radio" name="payment" value="電子マネー決済" disabled>電子マネー決済
        </label>
        <label>
          <input type="radio" name="payment" value="ID決済" disabled>ID決済
        </label>
      </div>
    </fieldset>
    <br>
    <div class="button-container">
    <input type="submit" value="選択" class="buttun-payment">
  </form>
</div>
<!--by打田 -->
</body>

</html>