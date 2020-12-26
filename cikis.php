<?php
//oturumu sonlandırmak için oluşturulan sayfa.

session_start();

session_destroy();

header("Location: index.php");
?>