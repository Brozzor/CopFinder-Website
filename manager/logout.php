<?php 
session_start();
setcookie('remember', NULL, -1);
setcookie('remember', null, time() - 60 * 60 * 24 * 7, "/", null, false, true );
unset($_SESSION['auth']);
session_destroy();
header('Location: index.php');