<?php
	session_start();
	if (isset($_SESSION['email'])) {
	    include('../includes/db.php');
	    if (isset($_POST['create_task'])) {
			 $query = "INSERT INTO `tasks`(`tid`, `uid`, `description`, `start_date`, `end_date`, `status`) VALUES (null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
	     	$query_run = mysqli_query($connection,$query);
	     	if ($query_run) {
	     		echo "<script type='text/javascript'>
				alert('Tasked created successfully..');
				window.location.href = 'manage_task.php';
				</script>";
	     	}
	     	else{
	     		echo "<script type='text/javascript'>
				alert('Sorry, Please try again..');
				window.location.href = 'create_task.php';
				</script>";
	     	}
	     } 

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
		<script type="text/javascript">
			$(document).ready(function(){
				$("#task_create").click(function(){
					$("#right_sidebar").load("create_task.php");
				});
			});

			$(document).ready(function(){
				$("#manage_task").click(function(){
					$("#right_sidebar").load("manage_task.php");
				});
			});
		</script>
	</head>

	<body>


		<!-- header section start -->
		<nav class="navbar navbar-inverse" id="header">
			<div class="container-fluid">
				<div class="navbar-header">
					<h2 class="navbar-brand active"><b><a href="admin_dashboard.php"> Project Management System</a></b></h2>
				</div>
				<div class="" style="float: right;">
					<!-- <b>Email:</b> <?php echo $_SESSION['email']; ?> -->
					<span style="margin-left: 25px;">
						<?php echo $_SESSION['name']; ?>
					</span>
					<a href=""><i class="fa fa-user-circle-o"
							style="font-size:25px;color: black; margin-left: 10px;"></i></a>
				</div>
			</div>
		</nav>
		<!-- header section end-->

		<div class="row">
			<div class="col-md-2" id="left_sidebar">
				<table class="table">
					<tr>
						<td style="text-align: center;">
							<a href="admin_dashboard.php" type="button" id="logout_link">Dashboard</a>
						</td>
					</tr>
					<tr>
						<td style="text-align: center;">
							<a type="button" class="link" id="task_create" style="text-decoration: none;">Create task</a>
						</td>
					</tr>
					<tr>
						<td style="text-align: center;">
							<a type="button" class="link" id="manage_task" style="text-decoration: none;">Manage task</a>
						</td>
					</tr>
					<tr>
						<td style="text-align: center;">
							<a href="../logout.php" type="button" id="logout_link">Logout</a>
						</td>
					</tr>
				</table>
			</div>

			<div class="col-md-8" id="right_sidebar">
				<h3 style="color:red"><b><u>Instructions for admin :</u></b></h3>
				<ul style="line-height: 2.5em; font-size: 1.2em; list-style-type: none;">
					<li>1. All the employee should mark their attendence daily.</li>
					<li>2. Everyone must complete the task assigned to them.</li>
					<li>3. Kindly maintain decorum of the office.</li>
					<li>4. Keep office and your area neat and clean.</li>
				</ul>
			</div>
		</div>
	</body>

	</html>
	<?php
} else {
	header('Location: login.php');
}
?>