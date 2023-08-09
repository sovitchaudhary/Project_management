<?php
include "header.php";
if(isset($_POST['signup'])) {
    $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('User registered successfully..');
        window.location.href = 'index.php';
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error... Plz try again.');
        window.location.href = 'registration.php';
        </script>";
    }
}
?>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <div>
                <h4 style="padding: top 10px;" >Registeration</h4>
            </div>

            <!-- Register Form -->
            <form action="" method="POST">
            <div>
                <input type="text" id="login" class="fadeIn second" name="name" placeholder="name" required >
                </div>
                <div>
                <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" required >
                </div>
                <div>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required >
                </div>
                
                <input type="submit" name="signup" class="fadeIn fourth" value="Register">
            </form>

            <div id="formFooter">
                Go back <a class="underlineHover" href="index.php">Home</a>
            </div>

        </div>
    </div>
</body>

</html>