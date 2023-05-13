<?php  
session_start();

session_unset();
session_destroy();

header("Location: ../../frontend/view/auth/login.php");
exit;