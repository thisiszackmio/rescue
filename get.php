<?php
if(isset($_POST["view"]))
{
include('data/db2.php');
//include('data/boot.php');
// if($_POST["view"] != '')
//  {
// $update_query = "UPDATE incident SET status=1 WHERE status=0";
//   mysqli_query($connect, $update_query);
// }
$query = "SELECT * FROM incident as i, incident_type as it WHERE i.incident_type_id = it.incident_type_id ORDER BY incident_time DESC LIMIT 3";
$result = mysqli_query($connect, $query);
$output = '';

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_array($result)){
		$date = date_create($row['incident_time']);
		$check = $row['status'];

		if($check == 'seen'){
			$go = 'READ';
		}else{
			$go = '<b> New Incident Report </b>';
		}
		$output .= '
			<li>
		    <a href="view_map.php?id='.$row['incident_id'].'&lat='.$row["cor_latitude"].'&long='.$row["cor_longitude"].'&type='.$row["incident_type"].'">
		     	<span>
			     	<span>'.date_format($date, "F j, Y").'</span>			     	
			     </span>
			     <span>
			     	<span style="float: right; font-style: italic;">'.$go.'</span> 
			     </span> <br />
			     <span>
			     	<span style="flex-wrap: wrap; font-weight: bold;">'
			     	.wordwrap($row["incident_address"],50,"<br>\n").
			     	'</span> <br /> 
			     	<span style="flex-wrap:wrap;font-weight:bold;font-size:15px;color:#f7584c;">'
			     	.wordwrap($row["incident_type"],50,"<br>\n").
			     	'</span> <br /> 
			     	<br />
		     	</span>
		     	<span>
		     		<span style="float: right;">
		     		Incident Time '.date_format($date, "h:i a").
		     		'</span>
		     	</span>
		    </a>
		   </li>
		   <li class="divider"></li>
		';
	}
	$output .= '<li><a href="see.php" class="text-bold text-italic" style="text-align: center;">See All Reports</a></li>';
}

 $query_1 = "SELECT * FROM incident WHERE status='unseen'";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);	
}
?>