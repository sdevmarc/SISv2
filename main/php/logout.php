<?php
session_start();
session_unset();
session_destroy();
header('location: /dbfiles/ias/sisv2/main/php/login.php');
exit();
?>