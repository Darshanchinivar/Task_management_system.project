<?php
	include('../includes/connection.php');
	$query = "delete from tasks where tid = $_GET[id]";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
		echo "<script type='text/javascript'>
            alert('TASK DELETED SUCCESFULLY');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
        }
        else{
        	echo "<script type='text/javascript'>
            alert('ERROR..PLEASE TRY AGAIN');
            window.location.href = 'admin_dashboard.php';
            </script>
            ";
    }
?>	