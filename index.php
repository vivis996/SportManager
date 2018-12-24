<?php 
	session_start();
    if (isset($_SESSION['id'])){
        header("Location: Home/home.php");
    }
    else {
		header("location: login.php");
    }
?>