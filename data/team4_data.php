<?php
	include('data/db.php');

	$query = "SELECT * FROM responders WHERE Team_Number=4 ORDER BY responder_lastname ASC";
	$result = $conn->query($query)
?>