<?php
  include('navigation.php');
  include('data/db.php');
  $da = $_GET['date'];
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
            <div class="title_left">
            	<h3> All Reports</h3>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
            		<div class="x_content">
                  <form action="allreport.php" method="get">
                    <select class="form-control" value="<?php echo $da;?>" style="width: 20%;" name="date" onchange="this.form.submit()">
                    <option value="no" disabled selected> - Select Date - </option>
                    <option value="All"> All </option>
                    <option value="January"> January </option>
                    <option value="February"> February </option>
                    <option value="March"> March </option>
                    <option value="April"> April </option>
                    <option value="May"> May </option>
                    <option value="June"> June </option>
                    <option value="July"> July </option>
                    <option value="August"> August </option>
                    <option value="September"> September </option>
                    <option value="October"> October </option>
                    <option value="November"> November </option>
                    <option value="December"> December </option>
                  </select>
                  </form>
                  <br />
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
                      if(isset($_GET['date'])){
                        $date = $_GET['date'];

                        if($date == "All"){
                          $er = "SELECT * FROM user as u, responders as r, incident as i, incident_type as it, responder_report as rr WHERE u.user_id=i.user_id AND i.incident_type_id=it.incident_type_id AND i.incident_id=rr.incident_id AND r.responder_id=rr.responder_id ORDER BY i.incident_time DESC";
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
                        <?php endwhile;
                        }else{
                          $er = "SELECT * FROM user as u, responders as r, incident as i, incident_type as it, responder_report as rr WHERE u.user_id=i.user_id AND i.incident_type_id=it.incident_type_id AND i.incident_id=rr.incident_id AND r.responder_id=rr.responder_id AND DATE_FORMAT(i.incident_time,'%M')='$date' ORDER BY i.incident_time DESC";
                          $ers = $conn->query($er);
                          if($ers->num_rows > 0){
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
                        <?php endwhile;}
                        else{
                          ?>
                          <tr>
                            <td colspan="6" style="text-align: center; font-size: 20px; color: red;"> <strong>No Data Yet</strong> </td>
                          </tr>

                          <?php
                            } 

                          } 
                        }?>      
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