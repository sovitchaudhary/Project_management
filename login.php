<?php
session_start();
include "header.php";
if (isset($_POST['userLogin'])) {
    echo "Click";
}
if (isset($_POST['userLogin'])) {
    $query = "select email,password from users where email = '$_POST[email]' AND password = '$_POST[password]'";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_num_rows($query_run)) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['uid'] = $row['uid'];

        }
        echo "<script type='text/javascript'>
        window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Please enter correct email and password!');
        window.location.href = 'login.php';
        </script>";
    }
}
?>

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

                <input type="submit" name="userLogin" class="fadeIn fourth" value="Log In">

                <div>
                    Are You New User <a href="register.php">Register here</a>
                </div>
                <div id="formFooter">
                    Go back <a class="underlineHover" href="index.php">Home</a>
                </div>
                <br>
            </form>

        </div>
    </div>
</body>

</html>