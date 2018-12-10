<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['fixture_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($db,"SELECT fixtures.id AS fixture_id, teams.logo AS home_logo, teams.team AS home_team, away_teams.team AS away_team, away_teams.logo AS away_logo, fixtures.date AS date, fixtures.time AS time, stadia.stadium, fixtures.town, fixtures.type, stadia.image AS image
                    FROM fixtures LEFT JOIN teams ON fixtures.home = teams.id LEFT JOIN away_teams ON fixtures.away = away_teams.id LEFT JOIN stadia ON stadia.id = fixtures.venue where fixtures.id = '".$row['fixture_id']."' ORDER BY date DESC");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center><strong><?php echo $drow['home_team']; ?></strong> Vs <strong><?php echo $drow['away_team']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="deletefix.php?id=<?php echo $row['fixture_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->