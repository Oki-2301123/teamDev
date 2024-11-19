
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $pdo = new PDO('mysql:host=mysql311.phy.lolipop.lan;
                    dbname=LAA1554893-teamdev;
                    charset=utf8', 'LAA1554893', 'teamdev5g');

    echo '<form action="dbins.php" method="post" enctype="multipart/form-data">';
    echo '<input type="submit" name="list" value="リスト">';
    echo '<fieldset>
        <legend>users</legend>';
    $sql = "SHOW COLUMNS FROM users";
    $sth = $pdo->query($sql);
    $aryColumn = $sth->fetchAll(PDO::FETCH_COLUMN);
    foreach ($aryColumn as $column) {
        echo $column . '<input type="text" name="' . $column . '"><br>';
    }
    echo '<input type="submit" name="users"value="登録">';
    echo '</fieldset>

    <fieldset>
        <legend>shohins</legend>';
    $sql = "SHOW COLUMNS FROM shohins";
    $sth = $pdo->query($sql);
    $aryColumn = $sth->fetchAll(PDO::FETCH_COLUMN);
    foreach ($aryColumn as $column) {
        if ($column === "shohin_pict") {
            echo $column . '<input type="file" name="shohin_pict"><br>';
        } else {
            echo $column . '<input type="text" name="' . $column . '"><br>';
        }
    }
    echo '<input type="submit" name="shohins"value="登録">';
    echo '</fieldset>

    <fieldset>
        <legend>orders</legend>';
    $sql = "SHOW COLUMNS FROM orders";
    $sth = $pdo->query($sql);
    $aryColumn = $sth->fetchAll(PDO::FETCH_COLUMN);
    foreach ($aryColumn as $column) {
        echo $column . '<input type="text" name="' . $column . '"><br>';
    }
    echo '<input type="submit" name="orders"value="登録">';
    echo '</fieldset>

    <fieldset>
        <legend>order_details</legend>';
    $sql = "SHOW COLUMNS FROM order_details";
    $sth = $pdo->query($sql);
    $aryColumn = $sth->fetchAll(PDO::FETCH_COLUMN);
    foreach ($aryColumn as $column) {
        echo $column . '<input type="text" name="' . $column . '"><br>';
    }
    echo '<input type="submit" name="order_details"value="登録">';
    echo '</fieldset>

    <fieldset>
        <legend>favorite</legend>';
    $sql = "SHOW COLUMNS FROM favorite";
    $sth = $pdo->query($sql);
    $aryColumn = $sth->fetchAll(PDO::FETCH_COLUMN);
    foreach ($aryColumn as $column) {
        echo $column . '<input type="text" name="' . $column . '"><br>';
    }
    echo '<input type="submit" name="favorite"value="登録">';
    echo '</fieldset>

    <fieldset>
        <legend>carts</legend>';
    $sql = "SHOW COLUMNS FROM carts";
    $sth = $pdo->query($sql);
    $aryColumn = $sth->fetchAll(PDO::FETCH_COLUMN);
    foreach ($aryColumn as $column) {
        echo $column . '<input type="text" name="' . $column . '"><br>';
    }
    echo '<input type="submit" name="carts"value="登録">';
    echo '</fieldset>

    <fieldset>
        <legend>cart_details</legend>';
    $sql = "SHOW COLUMNS FROM cart_details";
    $sth = $pdo->query($sql);
    $aryColumn = $sth->fetchAll(PDO::FETCH_COLUMN);
    foreach ($aryColumn as $column) {
        echo $column . '<input type="text" name="' . $column . '"><br>';
    }
    echo '<input type="submit" name="cart_details"value="登録">';
    echo '</fieldset>

    <fieldset>
        <legend>admin</legend>';
    $sql = "SHOW COLUMNS FROM admin";
    $sth = $pdo->query($sql);
    $aryColumn = $sth->fetchAll(PDO::FETCH_COLUMN);
    foreach ($aryColumn as $column) {
        echo $column . '<input type="text" name="' . $column . '"><br>';
    }
    echo '<input type="submit" name="admin"value="登録">';
    echo '</fieldset>
    </form>';

    ?>
</body>

</html>