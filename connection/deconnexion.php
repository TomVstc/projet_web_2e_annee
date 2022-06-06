<?php session_start();

session_destroy();
header("Location: http://localhost/livrablev2/site.php#" );
exit;


?>