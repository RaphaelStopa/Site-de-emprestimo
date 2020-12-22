<?php
session_start();
session_destroy();
header('Location: ../login.php');
unset($_COOKIE['email']);
setcookie('email', '');
?>