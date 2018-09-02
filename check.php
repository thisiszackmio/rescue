<?php
session_start();
?>
<html>
<head>
	<link rel="icon" href="image/811.png" type="image/x-icon">
    <title>403 error</title>
</head>
<style type="text/css">
	.get{
		background-color:#2A3F54;color:white;box-sizing: border-box;
        width:98%; height:60px; border-color:#222;font-size:18px;
	}
	.title{
		color: white;
	}
</style>
<body class="get">
	<?php
	// this file must be included via the include function at the top of every page
	// check if user session already exist
	// if not redirect to the login page
	if(!isset( $_SESSION['responder_id'] ))
	{
	?>
		<h1 align="center">&nbsp;</h1>
		<h1 align="center">&nbsp;</h1>
		<h1 align="center">&nbsp;</h1>
		<h1 align="center">ACCESS DENIED...</h1>
		</br>
		<div align="center"><a href='index.php' class="title">Click Here</a> to Login.</div>
	<?php 
		die();
	}

?>
</body>
</html>