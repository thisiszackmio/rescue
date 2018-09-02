<?php
//setting header to json
header('Content-Type: application/json');

include('../data/db.php');

$user = "SELECT DATE_FORMAT(incident_time, '%b %Y') as month, COUNT(*) as total FROM incident WHERE incident_type_id = 2 GROUP BY MONTH(incident_time)";
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