<?php
	include('../includes/connection.php');
	$query = "update leaves set status = 'Rejected' where lid = $_GET[id]";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
		echo "<script type='text/javascript'>
            alert('LEAVE STATUS UPDATED SUCCESFULLY..!');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
	}
	else{
		echo "<script type='text/javascript'>
            alert('ERROR PLEASE TRY AGAIN..!');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
	}
?>