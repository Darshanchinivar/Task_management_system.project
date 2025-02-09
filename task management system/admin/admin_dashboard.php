<?php
	session_start();
	include('../includes/connection.php');
	if(isset($_POST['create_task'])){
		$query = "insert into tasks values(null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
			echo "<script type='text/javascript'>
            alert('TASK CREATED SUCCESFULLY..!');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
		}
		else{
			echo "<script type='text/javascript'>
            alert('PLEASE TRY AGAIN..!');
            window.location.href = 'admin_dashboard.php';
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
	<title>Admin Dashboard</title>
	<!-- jQuery -->
    <script src="../includes/jquery_latest.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#create_task").click(function(){
    			$("#right_sidebar").load("create_task.php");
    		});
    	});
    	$(document).ready(function(){
    		$("#manage_task").click(function(){
    			$("#right_sidebar").load("manage_task.php");
    		});
    	});
    	$(document).ready(function(){
    		$("#view_leave").click(function(){
    			$("#right_sidebar").load("view_leave.php");
    		});
    	});
    </script>
</head>
<body>
	<div class="row" id="header">
		<div class="col-md-12">
			<div class="col-md-4" style="display: inline-block;">
				<h3>Task Management System</h3>
			</div>
			<div class="col-md-6" style="display: inline-block;text-align: right;">
				<b>Email: </b> <?php echo $_SESSION['email']; ?>
				<span style= "margin-left: 25px;"><b>Name: </b><?php echo $_SESSION['name']; ?></span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2" id="left_sidebar">
			<table class="table">
				<tr>
					<td style="text-align: center;">
						<a href="admin_dashboard.php" type="button" id="logout_link">Dash Board</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="create_task">Create Task</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="manage_task">Manage Task</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="view_leave">Leave Applications</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a href="../logout.php" type="button" id="logout_link">Logout</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-md-10" id="right_sidebar">
			<h4>Instructions for ADMIN</h4>
			<ul style="list-style-type: none;">
				<li>1.Admin should mark their attendance compulsory</li>
				<li>2.admin must complete their respective tasks</li>
				<li>3.Kindly maintain the decorum of the office</li>
				<li>4.maintain cleanliness in your surroundings</li>
				<li>5.Regularly update software, manage user access, and protect systems from unauthorized access.</li>
				<li>6.Create, update, and deactivate user accounts as required, ensuring proper access control.</li>
				<li>7.Ensure all hardware and software are functional, updated, and meet organizational requirements.</li>
				<li>8.Maintain detailed logs of system updates, configurations, and incidents for future reference.</li>
			</ul>
		</div>
	</div>
</body>
</html>