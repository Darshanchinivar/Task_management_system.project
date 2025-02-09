<?php
	session_start();
	if(isset($_SESSION['email'])){
	include('includes/connection.php');
	if(isset($_POST['submit_leave'])){
		$query = "insert into leaves values (null,$_SESSION[uid],'$_POST[subject]','$_POST[message]','No Action')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
			echo "<script type='text/javascript'>
            alert('FORM SUBMITTED SUCCESFULLY..!');
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
	<title>User Dashboard</title>
	<!-- jQuery -->
    <script src="includes/jquery_latest.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#manage_task").click(function(){
    			$("#right_sidebar").load("manage_task.php");
    		});
    	});
    	$(document).ready(function(){
    		$("#apply_leave").click(function(){
    			$("#right_sidebar").load("leave_form.php");
    		});
    	});
    	$(document).ready(function(){
    		$("#view_leave").click(function(){
    			$("#right_sidebar").load("leave_status.php");
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
						<a href="user_dashboard.php" type="button" id="logout_link">Dash Board</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="manage_task" style="text-decoration: none;">Update Task</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="apply_leave" style="text-decoration: none;">Apply Leave</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="view_leave" style="text-decoration: none;">Leave Status</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a href="logout.php" type="button" id="logout_link">Logout</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-md-10" id="right_sidebar">
			<h4>Instructions for EMPLOYEES</h4>
			<ul style="list-style-type: none;">
				<li>1.All the employess should mark their attendance compulsory</li>
				<li>2.Every employee must complete their respective tasks</li>
				<li>3.Kindly maintain the decorum of the office</li>
				<li>4.maintain cleanliness in your surroundings</li>
				<li>5.Follow safety guidelines, report hazards, and maintain a safe working environment.</li>
				<li>6.Submit leave applications in advance through the designated process for planned absences</li>
				<li>7.Participate in training sessions, upskill regularly, and stay updated with industry trends.</li>
				<li>8.Abide by the company's code of conduct, dress code, and workplace ethics.</li>
			</ul>
		</div>
	</div>
</body>
</html>
<?php
}
else{
	header('Location:user_login.php');
}