<?php
session_start();
session_destroy(); 
unset($_SESSION['username']);
unset($_SESSION['Bagian']);
echo '<script>window.location.href = "../index1.php";</script>';
?>