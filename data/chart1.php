<?php
//setting header to json
header('Content-Type: application/json');

include("db.php");

$sql = "SELECT DATE_FORMAT(incident_time, '%M %Y') as month, COUNT(incident_id) as total FROM incident GROUP BY MONTH(incident_time)";
$res = $conn->query($sql);

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