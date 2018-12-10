<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['result_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($db,"SELECT results.id AS result_id, teams.team AS home_team , away_teams.team AS away_team, results.home_score,results.away_score,results.date, teams.logo AS home_logo, away_teams.logo AS away_logo
                    FROM results LEFT JOIN teams ON results.home = teams.id LEFT JOIN away_teams ON results.away = away_teams.id WHERE results.id = '".$row['result_id']."' AND date > '2018-08-01' ORDER BY date DESC;");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center><strong><?php echo $drow['home_team']; ?></strong> <strong><?php echo $drow['home_score']; ?></strong> -- <strong><?php echo $drow['away_score']; ?></strong>  <strong><?php echo $drow['away_team']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="deleteresult.php?id=<?php echo $row['result_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->