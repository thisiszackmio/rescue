<?php
include('data/db2.php');
include('navigation.php');
?>
<div class="right_col" role="main">
	<div class="">
		<div class="x_panel">
			<div class="x_title">
			<div class="title_left">
        		<h3> Notification </h3> 
      		</div>
    	</div>

    	<div class="clearfix"></div>
    	
    	<div class="container">
    		<div class="col-sm-12">
    			<?php
    		$query = "SELECT * FROM incident as i, incident_type as it WHERE i.incident_type_id = it.incident_type_id ORDER BY i.incident_time DESC";
			$result = mysqli_query($connect, $query);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)){
					$date = date_create($row['incident_time']);
					$check = $row['status'];

						if($check == 'seen'){
							$go = 'READ';
						}else{
							$go = 'New Report';
						}
					?>
					<a href="view_map.php?id=<?php echo $row['incident_id']; ?>&lat=<?php echo $row["cor_latitude"]; ?>&long=<?php echo $row["cor_longitude"]; ?>">	
						<div style="color: #337ab7; text-decoration: none;">
							<span>
								<span><?php echo date_format($date, "F j, Y"); ?></span>
								<span style="float: right; font-style: italic;"><?php echo $go; ?></span> <br />
							</span>
							<span class="message">
								<span style="flex-wrap: wrap; font-weight: bold;">
									<?php echo wordwrap($row["incident_address"],100,"<br>\n");?>
								</span> <br />
								<span style="flex-wrap:wrap;font-weight:bold;font-size:15px;color:#f7584c;">
						     	<?php echo wordwrap($row["incident_type"],100,"<br>\n"); ?>
						     	</span> <br /> 
						     	<br />
							</span>
							<span>
					     		<span style="float: right;">
					     		<?php echo 'Incident Time '.date_format($date, "h:i a") ;?>
					     		</span>
					     	</span>
				     	</div>
					</a>
					<li style="list-style-type:none;" class="divider"><br></li>
					<?php
				}
			}
    	?>
    		</div>
    	</div>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>