<?php
    session_start();
    if(isset($_POST['username'])){

        $server = "localhost";
        $userName = "root";
        $password = "";

        $con = mysqli_connect($server,$userName,$password);


        mysqli_select_db($con,"userregistration");

        if(!$con){
            die("connection to the databse failed due to".mysqli_connect_error());
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $s = "select * from usertable where username = '$username' && password = '$password'";
        $result = mysqli_query($con,$s);

        $num = mysqli_num_rows($result);


        if($num==1){

            $row = $result -> fetch_assoc();

            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['photo'] = $row['photo'];
      
            header('location:../home.php');
        }
        else{
            ?><!-- close php tag -->

            <h3 class="message">Feed Information is wrong</h3>
            
            
            <!-- start php tag -->
            <?php
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styleLog.css">
</head>
<body>
    <div class="nav">
        Login 
    </div>
    <div class="container">
        <form action="login.php" method="post">
            <h3> Username </h3>
            <input type="text" name="username" id="username" placeholder="Enter your username" required>
            <h3> Password </h3>
            <input type="password" name="password" id="password" placeholder = "Enter your password" required>
            <button type="submit">Log in</button>
        </form>
        <h3 class="diff-page">If you didn't have account <a href="register.php">Create Account</a></h3>
    </div>
</body>
</html>


<style>
    .nav{
        background-color: purple;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 89px;
        font-size: 30px;
    }
    .container{
        width: 31rem;
    }
    .main{
        display:flex;
        align-items: center;
    }
    img{
        height: 389px;
    }
</style>