<?php
session_start();
    $logged = false;
    
    try
    {
    $UserName = $_SESSION["UserName"];
    $GUID = $_SESSION["GUID"];
    $fb_Log = $_SESSION["fb_Log"];
    $isAdmin = $_SESSION["isAdmin"];    
    
    if ($GUID != ''){ $logged = true;}        
        
    }
    catch (Exception $ex) {
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
    <title>Score | Prisoner's Dilemma</title>

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
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <?php 
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
                        <h3 class="page-header"><i class="fa fa fa-bars"></i> Score</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="Dashboard.php">Home</a></li>
                            <li><i class="fa fa-square-o"></i>Score</li>                            
                        </ol>
                    </div>
                </div>
                <!-- page start-->
                    
                <div class="row">               	
				<div class="col-lg-9 col-md-12">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-flag-o red"></i><strong>My latest scores Users</strong></h2>							
						</div>
						<div class="panel-body">
							<table class="table bootstrap-datatable countries">                    

							<thead>
                            <tr>
                                <th>Rival Name</th>
                                <th>My Action</th>
                                <th>My Action Date</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>                        
            
            <?php
    include("connection.php");        
    $query = mysqli_query($dbc,"SELECT Player1ID as GUID, groupplayers.PlayerName, Player1Score as score, Player1Action as actions, Player1CompleteDate as compDate, Player2ID as rivalID, (select playername from groupplayers where UserGUID = Player2ID) as rivalName
FROM game join groupplayers on game.Player1ID = groupplayers.UserGUID
WHERE Player1ID = '$GUID'
UNION 
SELECT Player2ID as GUID, groupplayers.PlayerName, Player2Score as score, Player2Action as actions, Player2CompleteDate as compDate, Player1ID as rivalID, (select playername from groupplayers where UserGUID = Player1ID) as rivalName
FROM game join groupplayers on game.Player2ID = groupplayers.UserGUID
WHERE Player2ID = '$GUID' 
ORDER BY compDate desc");

            while ( $row = mysqli_fetch_array($query)){        
                print  "<tr>
                       <td>" . $row['rivalName'] . "</td>
                       <td>" . $row['actions'] . "</td>
                       <td>" . $row['compDate'] . "</td>
                       <td>" . $row['score'] . "</td>               
                       </tr>"               
                        ;        		
                }
            mysqli_close($dbc); 
            ?>                                                  
          
                        </tbody>                        
                        </table>
						</div>
	
					</div>	

				</div><!--/col-->
								
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
