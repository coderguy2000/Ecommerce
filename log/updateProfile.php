<?php
    session_start();
    if(isset($_POST['username'])){
        //to going another page after click submit

        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server,$username,$password);
        mysqli_select_db($con,'userregistration');

        if(!$con){
            die("connection to this database failed due to".
            mysqli_connect_error());
        }

        //echo "Sccess connectiong to the db";

        $username = $_POST['username'];//new username we want
        $email = $_POST['email'];
        $password = $_POST['password'];

        $s = "select * from usertable where username='$username' ";

        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);

        if($username==$_SESSION['username']){
            $reg = "update usertable set username='$username', email='$email', password='$password' where username='$username'";
            mysqli_query($con,$reg);
            ?>
                 <h3 class="message" style="color:green;">Congratulation You Information is updated</h3>
            <?php
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
        }
        else if($num==1){//if new username is present
            ?>
                 <h3 class="message">This username is Already present</h3>
            <?php
        }
        else{
            $oldUsername = $_SESSION['username'];
            $reg = "update usertable set username='$username', email='$email', password='$password' where username='$oldUsername'";
            mysqli_query($con,$reg);
            ?>
                 <h3 class="message" style="color:green;">Congratulation You Information is updated</h3>
            <?php
                $_SESSION['username']=$username;
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLog.css">
    <title>Document</title>
</head>
<body>
    <div class="nav">
        Update Profile
    </div>
    <div class="main">
        <div class="container">
            <form action="updateProfile.php" method="post">
                <h3> Username </h3>
                <input type="text" name="username" id="username" value="<?php
                    echo $_SESSION['username'];
                ?>"required>
                <h3> Email </h3>
                <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php
                    echo $_SESSION['email'];
                ?>" required>
                <h3> Password </h3>
                <input type="text" name="password" id="password" placeholder="Enter your password" value="<?php
                        echo $_SESSION['password'];
                ?>"required>
                <button type="submit">Save Changes</button>
            </form>
            <h3 class="diff-page">Go to <a href="../home.php">Home page</a></h3>
        </div>
        <div>
            <img src="images/update.svg" alt="Update">
        </div>
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