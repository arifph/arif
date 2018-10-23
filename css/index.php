<?php
	session_start();
	if(!isset($_SESSION['login'])){
		header("location:../view/utama.php");
	}else{
		header("location:../view/utama2.php");
	}
?>