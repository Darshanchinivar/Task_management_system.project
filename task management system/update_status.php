<?php
	include('includes/connection.php');
	if(isset($_POST['update'])){
		$query = "update tasks set status = '$_POST[status]' where tid = $_GET[id]";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
			echo "<script type='text/javascript'>
            alert('STATUS UPDATED SUCCESFULLY');
            window.location.href = 'user_dashboard.php';
            </script>
            ";
		}
		else{
			echo "<script type='text/javascript'>
            alert('ERROR..! PLEASE TRY AGAIN');
            window.location.href = 'user_dashboard.php';
            </script>
            ";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update page</title>
	<!-- jQuery -->
    <script src="includes/jquery_latest.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>
<body>
	<div class="row" id="header">
		<div class="col-md-12">
			<center><h3><i class="fa fa-solid fa-list" style="padding-right: 15px;"></i>Task Management System</h3></center>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 m-auto" style="color: white;"><br>
			<center><h3 style="color: white;">Update the Task Status</h3></center><br>
			<?php
			$query = "select * from tasks where tid = $_GET[id]";
			$query_run = mysqli_query($connection,$query);
			while($row = mysqli_fetch_assoc($query_run)){
				?>
				<form action="" method="post">
					<div class="form-group" style="display: flex; gap: 20px;">
						<input type="hidden" name="id" class="form-control" value="" required>
					</div>
					<div class="form-group">
						<select class="form-control" name="status">
							<option>-Select-</option>
							<option>In-Progress</option>
							<option>Partially Complete</option>
							<option>Complete</option>							
						</select>	
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-warning" name="update" value="UPDATE">
					</div>
				</form>
				<?php
				}
			?>	
		</div>
	</div>
</body>
</html>
