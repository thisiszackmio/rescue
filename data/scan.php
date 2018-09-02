<?php
require_once("phpsqlajax_dbinfo.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$conn = new mysqli($servername ,$username, $password, $dbname);

if($conn->connect_error){
  die("Failed" . $conn->connect_error);
}

// Select all the rows in the markers table
$query = "SELECT * FROM incident as i, incident_type as it WHERE i.incident_type_id=it.incident_type_id";
$result = $conn->query($query);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  //dateFormat
  $date = date_create($row['incident_time']);
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['incident_id'] . '" ';
  echo 'address="' . parseToXML($row['incident_address']) . '" ';
  echo 'time="' .date_format($date, "F m, Y h:i:sa"). '" ';
  echo 'time2="' .date_format($date, "F m, Y"). '" ';
  echo 'lat="' . $row['cor_latitude'] . '" ';
  echo 'lng="' . $row['cor_longitude'] . '" ';
  echo 'type="' . $row['incident_type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
