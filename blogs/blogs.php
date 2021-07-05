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
    body{
        background:#e8e8e8;
    }
    .main{
        width: 425px;
        border:1px solid purple;
        margin:auto;
        margin-top:50px;
        position: relative;
        padding:20px;
        border-radius: 15px;
    }

    input{
        height:30px;
        width:100%;
        margin:10px 0px 20px 0px;
        padding: 10px;
        border:none;
        outline:none;
        border-radius: 5px;
        background: #e8e8e8;
        font-size: 20px;
        box-shadow:  5px 5px 10px #c5c5c5,
             -5px -5px 10px #ffffff;
    }
    textarea{
        width:100%;
        outline:none;
        font-size: 20px;
        padding: 10px;
        border:none;
        margin-top:10px;
        border-radius: 15px;
        background: #e8e8e8;
        box-shadow:  5px 5px 10px #c5c5c5,
             -5px -5px 10px #ffffff;
    }
    input:hover,textarea:hover{
        box-shadow: inset 5px 5px 10px #c5c5c5,
            inset -5px -5px 10px #ffffff;
    }
    button{
        position:absolute;
        border: none;
        position: absolute;    
        right: -24px;
        bottom: -26px;
    }
    .fa{
        font-size: 50px;
        color: purple;
        background: #e8e8e8; 
        cursor: pointer;
    }
    .blogs{
        display:flex;
        flex-wrap:wrap;
        justify-content: space-around;
    }

    .blog-container{
        border: 2px solid #6fc0bb;
        border-radius: 12px;
        width: 314px;
        min-height: 148px;
        height: auto;
        margin: 50px;
        position: relative;
        border-radius: 15px;
        background: linear-gradient(145deg, #d1d1d1, #f8f8f8);
        box-shadow:  5px 5px 10px #c5c5c5,
             -5px -5px 10px #ffffff;
    }
    .blog-container h3{
        color: #6f258d;
        text-align: center;
        font-size: 22px;
        padding: 6px;
    }
    p{
        padding: 8px;
        text-align: justify;
    }

    .edit{
        background: green;
        color: white;
        border-radius: 4px;
        width: 61px;
        height: 26px;
        text-align: center;
    }
    .delete{
        background: red;
        color: white;
        border-radius: 4px;
        width: 61px;
        height: 26px;
        text-align: center;
    }
    .functionality{
        display: flex;
        justify-content: space-around;
        position: absolute;
        bottom: 0px;
        width: 100%;
        margin-bottom: 3px;
    }

    @media(max-width:850px){
        .main{
            width: 314px;
        }
    }
</style>