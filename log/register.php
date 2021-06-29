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

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        //photo =>upload and store in databse 
        $photo = $_FILES['photo'];
        $photoname = $photo['name'];
        $photopath = $photo['tmp_name'];
        $photoerror = $photo['error'];
        
        $s = "select * from usertable where username='$username' ";

        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);

        if($num==1){
            ?>
                 <h3 class="message">This username is Already present</h3>
            <?php
        }
        else{
            if($photoerror==0){
                $destfile='upload/'.$photoname;
                move_uploaded_file($photopath,$destfile);
                $reg = "insert into usertable(username,email,password,dt,photo) values('$username','$email' ,'$password',current_timestamp(),'$destfile')";
                
            }
            else{
                $reg = "insert into usertable(username,email,password,dt) values('$username','$email' ,'$password',current_timestamp())";
            }
            mysqli_query($con,$reg);
            ?>
                 <h3 class="message" style="color:green;">Congratulation You register Successfully</h3>
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
    <link rel="stylesheet" href="styleLog.css">
    <title>Document</title>
</head>
<body>
    <div class="nav">
        Create Account
    </div>
    <div class="container">
        <form action="register.php" method="post" enctype="multipart/form-data">
            <input type="text" name="username" id="username" placeholder="Enter your username" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            <input type="file" name="photo">
            <button type="submit">Create Account</button>
        </form>
        <h3>If you have account <a href="login.php">Log in</a></h3>
    </div>
</body>
</html>


<style>
    .nav{
        background-color: teal;
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