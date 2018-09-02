<?php
include('navigation.php');
include('data/db.php');
$rep = $_GET['user'];

$resc = "SELECT * FROM responders WHERE responder_id='$rep'";
$res = $conn->query($resc);
$roe = mysqli_fetch_array($res);
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
        		<h3> Report </h3>
      		</div>
    	</div>

    	<div class="clearfix"></div>

    	<div class="row">
    		<div class="col-md-12 col-sm-12 col-xs-12">
    			<div class="x_panel">
    				<div class="clearfix"></div>

    				<div class="x_content">
    					<form method="POST">
    						<input type="hidden" name="rid"  class="demoInputBox form-control col-md-7 col-xs-12" 
				               value="<?php echo $roe['responder_id'] ?>">
    						<div class="item form-group">
				              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="username">Team Number:</label>
				              <div class="col-md-4 col-sm-4 col-xs-12">
				               <input type="username" name="tnumber"  class="demoInputBox form-control col-md-7 col-xs-12" 
				               value="<?php echo $roe['Team_Number']; ?>" readonly>
				              </div>
				              <div class="clearfix"></div>
				            </div>

				            <div class="item form-group">
				                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="username">Name:</label>
				                  <div class="col-md-4 col-sm-4 col-xs-12">
				                    <input type="username" name="username"  class="demoInputBox form-control col-md-7 col-xs-12" 
				                    value="<?php echo $roe['responder_firstname'].' '.$roe['responder_middlename'].' '.$roe['responder_lastname']?>" readonly>
				                  </div>
				                  <div class="clearfix"></div>
				              </div>

				              <?php
				              $scan = $conn->query("SELECT * FROM check_availability as ca, incident as i, responders as r, ambulance as a WHERE ca.am_id=a.am_id AND ca.incident_id=i.incident_id AND ca.responder_id=r.responder_id AND ca.responder_id='$rep'");
				              $row1 = mysqli_fetch_array($scan);
				              $add = $row1['incident_address'];
				              $ambu = $row1['am_id'];
				              $iid = $row1['incident_id'];
				              ?>
				              <div class="item form-group">
				              	<input type="hidden" name="inci_id" class="demoInputBox form-control col-md-7 col-xs-12" value="<?php echo $iid;?>">
				              	<input type="hidden" name="ambulance" class="demoInputBox form-control col-md-7 col-xs-12" value="<?php echo $ambu;?>">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="username">Incident Address:</label>
				              	<div class="col-md-4 col-sm-4 col-xs-12">
				              		<input type="text" name="incident_ad" class="demoInputBox form-control col-md-7 col-xs-12" value="<?php echo $add;?>" readonly>
				              	</div>
				              	<div class="clearfix"></div>
				              </div>

					          <div class="item form-group">
				                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="username">Report:</label>
				                  <div class="col-md-4 col-sm-4 col-xs-12">
				                    <textarea type="text" row="10" cols="50" name="freport"  class="demoInputBox form-control col-md-7 col-xs-12" maxlength="300"
				                    ></textarea>
				                  </div>
				                  <div class="clearfix"></div>
				              </div>

				              <div class="form-group">
					            <div class="col-md-4 col-md-offset-5">
					              <input type="submit" name="save" value="Submit" class="btn btn-success">
					              <a href="report_incident.php?am=<?php echo $am?>&tm=<?php echo $tm?>" class="btn btn-success">Log out</a>
					            </div>
					          </div>

    					</form>
    					<?php
    						if(isset($_POST['save'])){
    								$ince = $_POST['inci_id'];
    								$ambu = $_POST['ambulance'];
    								$rid = $_POST['rid'];
    								$loca = $_POST['incident_ad'];
    								$final = $_POST['freport'];

    								$get = "INSERT INTO responder_report(responder_id,incident_id,final_report)
    										VALUES('$rid','$ince','$final')";
    								$done = $conn->query($get);

    								 if($done == TRUE){
    								 	echo $up = $conn->query("UPDATE ambulance SET status='Vacant' WHERE am_id='$ambu'");
    								 	if($up == TRUE){
    								 		$down = $conn->query("SELECT * FROM check_availability WHERE incident_id='$ince'");
    								 		$row2 = mysqli_fetch_array($down);
    								 		$re_id = $row2['responder_id'];

    								 		$left = $conn->query("UPDATE responders SET status=1 WHERE responder_id='$re_id'");
    								 		if($left == TRUE){
    								 			$right = $conn->query("UPDATE incident SET witness_rep=0 WHERE incident_id='$ince'");
    								 			if($right == TRUE){
    								 				echo '<script>alert("Report Successful")</script>';
    								 				echo '<script>window.open("check_am.php","_self")</script>';
    								 			}
    								 		}	
    								 	}
    								 }/*else{
    								 	echo '<script>alert("There was a problem on ambulance")</script>';
    								 }*/
    						}
    					?>
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