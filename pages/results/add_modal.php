<?php	
	
$sql = "SELECT id, team FROM teams";
$res = mysqli_query($db,$sql);
 
?>
<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Result</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="addresult.php">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Home Team:</label>
						</div>
						<div class="col-lg-10">

  <select class="form-control select2" id="hteam" name="hteam" style="width: 100%;">
                   <option selected="selected" style="position:relative; top:7px;">Select Home Team</option>
                 
						<?php 
					
						foreach($res as $r) { 
							echo "<option value=\"$r[id]\">$r[team]</option>" ;
						}
					        ?>
                </select>
							
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Away Team:</label>
						</div>
						<div class="col-lg-10">
						
  <select class="form-control select2" id="ateam" name="ateam" style="width: 100%;">
                   <option selected="selected" style="position:relative; top:7px;">Select Away Team</option>
                 
						<?php 
					
						foreach($res as $r) { 
							echo "<option value=\"$r[id]\">$r[team]</option>" ;
						}
					        ?>
                </select>
						</div>
					</div>

<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Home Score:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="hscore">
						</div>
					</div>

					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Away Score:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="ascore">
						</div>
					</div>

					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Date:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="date" placeholder="yyyy-mm-dd">
						</div>
					</div>
                            
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>