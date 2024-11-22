<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $mail = $_POST['mailaddress'];
    $pass = $_POST['pass'];

    require_once('function.php');
    $pdo = pdo();
    $sql = 'SELECT user_pass FROM users WHERE user_mail = ?';
    $data = $pdo->prepare($sql);
    $data->execute([$mail]);
    foreach ($data as $a) {
        $check_pass= $a['user_pass'];
    }
    if($check_pass === $pass){
        header('Location: toppage.php');
    }else{
        header('Location: login.php');
    }
    
    ?>
</body>

</html><?php
