<?php
  include('navigation.php');
  include('data/db.php');
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
            <div class="title_left">
            	<h3> Natural Disaster Incident Report </h3>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
            		<div class="x_content">
            			<div class="table-responsive">
            				<table class="table table-striped table-bordered">
            					<tr>
					              <th> Incident Date </th>
					              <th> Incident Time </th>
					              <th> Incident Address </th>
					              <th> Team Assignment </th>
					              <th> Final Incident Report </th>
                        <th> Witness </th>
					            </tr>
					            <?php
					            	$er = "SELECT * FROM user as u, responders as r, incident as i, incident_type as it, responder_report as rr WHERE u.user_id=i.user_id AND i.incident_type_id=it.incident_type_id AND i.incident_id=rr.incident_id AND r.responder_id=rr.responder_id AND it.incident_type_id = 4 ORDER BY i.incident_time DESC";
					            	$ers = $conn->query($er);
					            	while($erow = mysqli_fetch_array($ers)):
					            	$date = date_create($erow['incident_time']);
					            	$time = date_create($erow['incident_time']);
            					?>
            					<tr>
            						<td> <?php echo date_format($date, "F d, Y"); ?> </td>
            						<td> <?php echo date_format($time, "g:i:sa") ?> </td>
            						<td> <?php echo $erow['incident_address']; ?> </td>
            						<td> <a href="team<?php echo $erow['Team_Number']; ?>_responder.php"> Team <?php echo $erow['Team_Number']; ?> </a></td>
            						<td class="col-md-5"> <?php echo $erow['final_report']; ?> </td>
                        <td class="col-md-2"> <?php echo $erow['user_firstname'].' '.$erow['user_lastname']; ?> </td>
            					</tr>
            				<?php endwhile; ?>
                                    </table>
                              </div>
                        </div>
                        </div>
                  </div>
            </div>
            </div>
      </div>
      <!-- footer content -->
  <footer>
    <div class="pull-right">
      Developer: Zack-Mio Sermon || Kharen Tompong - <strong> Capstone Project SY 2017-2018 </strong>
    </div>
    <div class="clearfix"></div>
  </footer>
<!-- /footer content -->
<?php
include('footer.php');
?>