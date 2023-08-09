<?php
	session_start();
	if (isset($_SESSION['email'])) {
	include('../includes/db.php');

 ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin dashboard</title>
		<!-- jQuery file -->
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap files -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<script src="../js/bootstrap.min.js"></script>
		<!-- External css file -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/new.css">
	</head>

<body>
	<center><h2>All assigned tasks</h2></center>
	<table class="table" style="background-color: black; widows: 80vw;">
		<tr>
			<th>S.No.</th>
			<th>Task ID</th>
			<th>Description</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<?php
		    $sno = 1;
			$query = "select *from tasks";
			$query_run = mysqli_query($connection,$query);
			while($row = mysqli_fetch_assoc($query_run)){
				?>
				<tr style="background-color: #f9d1d1;">
					<td><?php echo $sno; ?></td>
					<td><?php echo $row['tid']; ?></td>
					<td><?php echo $row['description']; ?></td>
					<td><?php echo $row['start_date']; ?></td>
					<td><?php echo $row['end_date']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td><a href="edit_task.php?id=<?php echo $row['tid']; ?>">Edit</a> | <a href="delete_task.php?id=<?php echo $row['tid']; ?>">Delete</a></td>
				</tr>
				<?php
				$sno = $sno + 1;
			} 	
		 ?>
	</table>

</body>
</html>
<?php
	}
	else{
		header('Location: login.php');
	}
?>