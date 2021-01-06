<?php
include 'config.php';

    $result = "";
    if(isset($_POST['username'],$_POST['password'])){
 
        $username = $_POST['username'];
        $pass = $_POST['password'];
        if($username == $admin && $pass == $passw){
            session_start();
            $_SESSION['logged'] = $pass;
            header("Location: index.php");
            exit();
        }else{
            $result .= '<div class="alert alert-danger">Invalid Login</div>';
        }
    }

?>
	
<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title>Login</title>

    <!--styles-->
    <link rel="stylesheet" href="assets/styles/main.css">

    <!--scripts-->
    <script src="assets/scripts/jquery-1.12.2.min.js"></script>
    <script src="assets/scripts/admin.js"></script>

</head>
<body>

    <!--login screen-->
    <div class="login-screen">
        
        <!--login logo-->
        <div class="login-logo">
            <a href="#">
                <img src="assets/images/logo.png" alt="">
            </a>
        </div>
        
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </li>
                <li>
                    <input type="submit" name="login" value="Login">
                     <label for="check" class="checkbox">
                      <?=$result;?> 
                    </label>
                </li>
            </ul>
        </form>



    </div>

</body>
</html>