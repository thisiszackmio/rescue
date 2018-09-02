<?php
//setting header to json
header('Content-Type: application/json');

include('../data/db.php');

$user = "SELECT COUNT(*) as total FROM incident";
$res = $conn->query($user);

$data = array();
foreach ($res as $row) {
	$data[] = $row;
}

//free memory associated with result
$res->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);
?>