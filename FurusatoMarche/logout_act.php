<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
} else {
    $_SESSION['login_false'] = '不正なアクセスです。: error_01';
    header('Location: login.php');
    exit();
}
