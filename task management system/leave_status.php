<?php
	session_start();
	if(isset($_SESSION['email'])){
	include('includes/connection.php');
?>
<html>
<body>
	<center><h3>Your Leave applications</h3></center>
	<table class="table" style="background-color:black;">
		<tr>
			<th>S.No</th>
			<th>Subject</th>
			<th>Message</th>
			<th>Status</th>
		</tr>
		<?php
			$sno = 1;
			$query = "select * from leaves where uid = $_SESSION[uid]";
			$query_run = mysqli_query($connection,$query);
			while($row = mysqli_fetch_assoc($query_run)){
				?>
				<tr>
					<td><?php echo $sno; ?></td>
					<td><?php echo $row['subject']; ?></td> 
					<td><?php echo $row['message']; ?></td> 
					<td><?php echo $row['status']; ?></td>
				</tr>
				<?php 
				$sno =$sno + 1; 
			}
		?>
	</table>
</body>
</html>
<?php 
}
else{
	header('Location:user_login.php');
}
