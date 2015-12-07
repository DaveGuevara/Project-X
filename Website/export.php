<?php
session_start();
    $logged = false;
    if(!empty($_SESSION['GUID']))
    {
        $logged = true;
    }
   
    if ($logged)
    {    
    $UserName = $_SESSION["UserName"];
    $GUID = $_SESSION["GUID"];
    $fb_Log = $_SESSION["fb_Log"];
    $isAdmin = $_SESSION["isAdmin"];    
    $group = $_SESSION["group"];                   
    }
    else
    {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="GeeksLabs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Export | Prisoner's Dilemma</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body>    
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->

        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>
            <!--logo start-->
            <a href="Dashboard.php" class="logo">Prisoner's <span class="lite">Dilemma</span></a>
            <!--logo end-->
            <div class="nav search-row" id="top_menu"></div>
            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?php
                                    switch($group)
                                    {
                                        case "RED":
                                            echo ("<span class='profile-ava'> <img alt='' src='img/avatar_small_red.jpg'> </span>"); 
                                            break;
                                        case "GREEN":
                                            echo ("<span class='profile-ava'> <img alt='' src='img/avatar_small_green.jpg'> </span>"); 
                                            break;
                                        case "BLUE":
                                            echo ("<span class='profile-ava'> <img alt='' src='img/avatar_small_blue.jpg'> </span>");
                                            break;
                                        default:  
                                            echo ("<span class='profile-ava'> <img alt='' src='img/avatar_small_black.jpg'> </span>");
                                            break;
                                    }     
                                echo ("<label id='username' class='username' > ". $UserName . "</label>");
                            ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="score.php"><i class="icon_calculator_alt"></i> My Score</a>
                            </li>
                            <li>
                                <a href="export.php"><i class="icon_download"></i> Export</a>
                            </li>
                            <li>
                                <a href="login.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->
 
      <!--sidebar start-->
      <?php        
        include("sidebar.php");
      ?>
      <!--sidebar end-->
              
        
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="Dashboard.php">Home</a></li>
                            <li><i class="fa fa-bars"></i>Pages</li>
                            <li><i class="fa fa-square-o"></i>Export</li>
                        </ol>
                    </div>
                </div>
                <!-- page start-->
                Export page content goes here
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>
    <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>

</body>
</html>
