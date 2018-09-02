<?php
	session_start();
	$user = $_SESSION['responder_id'];
	session_unset($user);
	echo"<script>alert('Thank You')</script>";
	echo"<script>window.open('index.php','_self')</script>";
?>