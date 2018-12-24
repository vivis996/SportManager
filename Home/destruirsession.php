<?php
	session_start();
	session_unset();
	session_destroy(); 
	unset($_SESSION["usuario"]);
	unset($usuario); 
	header("Location: ../login.php");
?>