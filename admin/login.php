<?php
	session_start();
	include('../includes/db.php');
	if(isset($_POST['adminLogin'])) {
        $query= "SELECT `uid`, `username`, `email`, `password` FROM `admin` WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
		$query_run = mysqli_query($connection,$query);
		if(mysqli_num_rows($query_run)){
			while($row = mysqli_fetch_assoc($query_run)){
				$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['name'];

			}
			echo "<script type='text/javascript'>
			window.location.href = 'admin_dashboard.php';
			</script>";
		}
		else{
			echo "<script type='text/javascript'>
			alert('Please enter correct email and password!');
			window.location.href = 'login.php';
			</script>";
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div>
                <h4 style="padding: top 10px;">Sign In</h4>
            </div>

            <!-- Login Form -->
            <form action="" method="POST">
                <div>
                    <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" required>
                </div>
                <div>
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"
                        required>
                </div>

                <input type="submit" name="adminLogin" class="fadeIn fourth" value="Log In">
                <div>
                    Go back <a class="underlineHover" href="../index.php">Home</a>
                </div>
                <br>
            </form>


        </div>
    </div>
</body>

</html>