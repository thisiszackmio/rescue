<?php
  include('navigation.php');

  $get = "SELECT * FROM ambulance";
  $res = $conn->query($get);
?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
        		<h3> Ambulance Available </h3>
      		</div>
    	</div>

    	<div class="clearfix"></div>

    	<div class="col-md-12 col-sm-12 col-xs-12">
    		<div class="x_panel">
    			<div class="container">
    				<div class="col-md-12 col-sm-12 col-xs-12">
    					<div class="table-responsive">
    						<table class="table table-striped table-bordered" >
    							<tr>
					              <th> Plate Number </th>
					              <th> Status </th>
					              <th> Team Assign </th>
					            </tr>
					            <?php while($row = mysqli_fetch_array($res)):?>
					            <tr>
					            	<td><?php echo $row['plate_number'];?> </td>
					            	<td><?php echo $row['status'];?></td>
					            	<td>
					            		<?php
					            		if($row['status'] == "On-Duty"){
					            			?>
					            			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $row['am_id'];?>">Show Duty Rescuers</button>
					            			<a href="report_incident.php" name="report" class="btn btn-success">Report </a>
					            			<?php
					            		}else{
					            			?>
					            			<a href="online.php?am=<?php echo $row['am_id']?>&in_id=<?php echo $id;?>" name="report" class="btn btn-success">Assign</a>
					            			<?php
					            		}
					            		?>
					            		<div id="<?php echo $row['am_id'];?>" class="modal fade" role="dialog">
					            			<div class="modal-dialog">
					            				<div class="modal-content">
					            					<div class="modal-header">
        												<h3 class="modal-title">Plate Number: <?php echo $row['plate_number'];?></h3>
					            					</div>
					            					<div class="modal-body">
					            						<h3><strong>Assign Team:</strong></h3>
					            						<?php
					            						$idni =  $row['am_id'];
					            						$shown = $conn->query("SELECT * FROM check_availability as ca, responders as r WHERE ca.responder_id=r.responder_id AND ca.am_id='$idni' AND r.status=2");
					            						while($rar = mysqli_fetch_array($shown)):
					            							?>
					            							<h4><?php echo $rar['responder_lastname'].", ".$rar['responder_firstname']." ".$rar['responder_middlename'];?></h4>
					            							<?php
					            						endwhile;
					            						?>
					            					</div>
					            					<div class="modal-footer">
											          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        </div>
					            				</div>
					            			</div>
					            		</div>
					            	</td>        			
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