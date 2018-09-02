<?php
  include('navigation.php');

  $am = $_GET['am'];
  $id = $_GET['in_id'];
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
        		<h3> Assign Team</h3>
      		</div>
    	</div>

    	<div class="clearfix"></div>

    	<div class="col-md-12 col-sm-12 col-xs-12">
    		<div class="x_panel">
    			<div class="container">
    				<div class="col-md-6 col-sm-6 col-xs-6">
    					<form method="post" action="online.php?am=<?php echo $am;?>&in_id=<?php echo $id;?>">

                <div class="form-group">
                  <select class="form-control" name="team">
                  <option value="no" disabled selected>Select Team</option>
                  <option value="1">Team 1</option>
                  <option value="2">Team 2</option>
                  <option value="3">Team 3</option>
                  <option value="4">Team 4</option>
                </select>
                <br>
                <button type="submit" name="show" class="btn btn-md btn-success">Show On-Duty Rescuers</button>
                </div>  

              </form>

              <?php
              if(isset($_POST['show'])){
                $team = $_POST['team'];

                $sel = $conn->query("SELECT * FROM responders WHERE Team_number='$team' AND status=1");

                if($sel->num_rows > 0){
                  ?>
                  <h4>Team <?php echo $team;?> On-Duty</h4>
                  <?php
                  while($row = mysqli_fetch_array($sel)):
                  ?>
                  <form action="online.php?am=<?php echo $am;?>&in_id=<?php echo $id;?>" method="post">
                    <div style="font-size: 16px;">
                      <input type="checkbox" name="res[]" value="<?php echo $row['responder_id'];?>"><?php echo $row['responder_lastname'].", ".$row['responder_firstname']." ".$row['responder_middlename'];?><br>
                    </div>
                  <?php endwhile;?>
                    <button type="submit" name="pass" class="btn btn-md btn-success">Assign Rescuer</button>
                  </form>
                  <?php
                }else{
                  ?>
                  <h4><strong>No On-Duty Yet</strong></h4>
                  <?php
                }
              }

              if(isset($_POST['pass'])){
                $rescue = $_POST['res'];
                $team = $_POST['team'];
                    for($i=0; $i<sizeof($rescue);$i++){
                    $updat = $conn->query("INSERT INTO check_availability(am_id,incident_id,responder_id) VALUES('$am','$id','".$rescue[$i]."')");
                    if($updat == TRUE){
                      $ambu = $conn->query("UPDATE ambulance SET status='On-Duty' WHERE am_id='$am'");
                      if($ambu == TRUE){
                        $replace = $conn->query("UPDATE responders SET status=2 WHERE responder_id='".$rescue[$i]."'");
                        if($replace == TRUE){
                          $puli = $conn->query("UPDATE incident SET team_assign='$team' WHERE incident_id='$id'");
                          if($puli == TRUE){
                            echo '<script>window.open("check_am.php","_self")</script>';
                          }
                        }
                      }
                    }
                  } 
              }
              ?>
    				</div>
    			</div>
    		</div>
    	</div>
	</div>
</div>

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