<?php    
    session_start();
    $server='localhost';
    $Username='root';
    $password='';

    $con = mysqli_connect($server,$Username,$password,'userregistration');

    if(isset($_POST['title'])){
        $title=$_POST['title'];
        $content=$_POST['content'];
        $username = $_SESSION['username']; 
    
        $s = "insert into blog(username, title, content, dt) values ('$username','$title','$content',current_timestamp())";
        mysqli_query($con,$s);
        header('location: #');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="nav">
        Blog Section
    </div>
    <div class="main">
        <form action="blogs.php" method='POST'>
            <h3>Title:</h3>
            <input type="text" name='title' required>
            <h3>Content:</h3>
            <textarea name="content" cols="30" rows="10"></textarea>
            <button type="submt"><i class="fa fa-plus-circle"></i></button>
        </form>
    </div>

    <?php
        $s = "select * from blog where username='$_SESSION[username]'";
        $res = mysqli_query($con,$s);
    ?>

    <div class="blogs">
        <?php
            while($row = $res->fetch_assoc()){
        ?>

        <div class="blog-container">
            <h3><?php echo $row['title']?> </h3>
            <p><?php echo $row['content']?> </p>
            <div class="functionality">
                <div class="edit">Edit</div>
                <div class="delete">Delete</div>
            </div>
        </div>

        <?php
            }
        ?>
    </div>
</body>
</html>

<style>
    .fa{
        font-size: 50px;
    }
</style>