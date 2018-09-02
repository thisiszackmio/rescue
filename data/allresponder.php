<?php
	include('data/db.php');

	$query = "SELECT * FROM responders ORDER BY responder_lastname ASC";
	$result = $conn->query($query);
?>