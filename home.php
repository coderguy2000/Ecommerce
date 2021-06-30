<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Testing</title>
</head>
<body>
    <div class="main">
        <div class="heading-content">Ecommerce</div>
        
        <div class="username">
            <img src="<?php  echo 'log/'.$_SESSION['photo']?>" width="50px"  alt="profile pic">
            <?php echo "Hi ".$_SESSION['username']."  ";?>
            <i class="fa fa-chevron-right"></i>
        </div>
        
        <div class="username-content">
            <h3><a href="log/updateProfile.php">Dashboard</a></h3>
            <h3>Profile</h3>
        </div>
        <div class="log"><a href="log/logout.php">Logout</a></div>
    </div>
    <div class="nav-sm">
        <div class="main-head"><img class="mode" onclick="convertMode()" src="images/nightMode.svg" alt="mode" ><div class="hamburger-logo" onclick="menubar()">&#8801</div></div>
        <ul class="nav-sm-content">
            <li class="a"><a  href="#">HOME</a></li>
            <li><a href="#">SERVICES</a></li>
            <li><a href="#">GALLERY</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#">CONTACT US</a></li>
        </ul>
    </div>
    <div class="nav-lg">
        <ul>
            <li class="a"><a  href="#">HOME</a></li>
            <li><a href="#">SERVICES</a></li>
            <li><a href="#">GALLERY</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#">CONTACT US</a></li>
            <img class="mode" onclick="convertMode()" src="images/nightMode.svg" alt="mode">
        </ul>
    </div>

    <div class="social-bio">
        <img src="images/social bio.svg" alt="Social Bio">
    </div>
</body>
</html>

<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
    a{
        text-decoration:none;
    }
    body{
        background-color: var(--primary-color);
        font-family: 'Dancing Script';
    }
    :root{
        --primary-color:#edf2fc;
        --secondary-color:#212121;
    }
    
    .dark-theme{
        --primary-color:#000106;
        --secondary-color:#fff;
    }
    .main{
        display: flex;
        align-items: center;
        height: 89px;
        text-align: center;
        background: purple;
        color: white;
    }
    .heading-content{
        flex:7;
        font-size: 36px;
    }
    .username{
        flex:1;
    }
    .username-content{
        margin-left: -21px;
        margin-top: 22px;
    }
    .username-content h3,.username-content h3 a{
        color:white;
        padding: 5px;
        background-color:purple;
    }

    .log{
        flex:2;
        display: flex;
        justify-content: space-evenly;
    }
    .log a{
        color: white;
        text-decoration: none;
        border: 1px solid white;
        border-radius: 9px;
        padding: 8px 22px;
        font-size: 18px;
    }

    .mode{
        width: 100px;
        align-items: center;
    }

    .nav-lg ul,.nav-sm-content{
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }
    .nav-lg li, .nav-sm li{
        list-style: none;
        min-width: 100px;
        font-size:25px;
    }
    .nav-lg a, .nav-sm a{
        text-decoration: none;
        color:var(--secondary-color);
        position: relative;
    }
    
    .nav-lg a:hover, .nav-sm a:hover{
        color:var(--secondary-color);
    }
    
    .nav-lg a::after, .nav-sm a::after{
        content: "";
        position: absolute;
        width:0%;
        height: 3px;
        background: rgb(243, 32, 32);
        bottom: -10px;
        left:0px;
        transition: 0.3s;
    }

    .nav-lg a:hover::after, .nav-sm  a:hover::after{
        width: 100%;
    }

    .social-bio{
        display: flex;
        margin-top: 41px;
        justify-content: flex-end;
    }
    .social-bio img{
        height: 328px;
    }
    .nav-sm{
        display: none;
    }

    @media(max-width:850px){
        
        .nav-lg ul{
            display:none;
        }
        .main-head{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .hamburger-logo{
            cursor: pointer;
            font-size: 50px;
            color: var(--secondary-color);
            margin-right: 29px;
            margin-top: 11px;
        }
        .nav-sm{
            border: 4px solid grey;
            display: flex;
            flex-direction: column;
        }
       
        .nav-sm-content{
            display: none;
            transition: 0.6s;
        }
        .nav-sm-content li{
            text-align: center;
            width: 100%;
            padding: 11px;
        }
    }
</style>


<script>
    const menubar=()=>{
        var x = document.getElementsByClassName("nav-sm-content")[0].style;
        console.log(x.display);
        if(x.display==""||x.display=="none"){
            x.transition = '0.6s';
            x.display = "block";
        }
        else{
            x.display = "none";
        }
    }
    const convertMode=()=>{
        document.body.classList.toggle("dark-theme");
        var x = document.getElementsByClassName("mode");

        if(document.body.classList.contains("dark-theme")){
            x[0].src = "images/lightmode.svg";
            x[1].src = "images/lightmode.svg";
        }
        else{
            x[0].src = "images/nightMode.svg";
            x[1].src = "images/nightMode.svg";
        }
    }

</script>