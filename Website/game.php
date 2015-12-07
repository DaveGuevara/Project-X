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

		<title>Play Game | Prisoner's Dilemma</title>

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
                                <span class="profile-ava"> <img alt="" src="img/avatar1_small.jpg"> </span> 
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
							<h3 class="page-header"><i class="fa fa fa-bars"></i>Game</h3>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-home"></i><a href="Dashboard.php">Home</a>
								</li>
								<li>
									<i class="fa fa-square-o"></i>Game
								</li>
							</ol>
						</div>
					</div>
					<!-- page start-->

					<h2> Prisoner's Dilemma </h2>

					<form name="PDForm">
						<table>
							<tbody>
								<tr>
									<th> Strategy </th><th> Cooperate </th><th> Defect </th><th> Total </th>
								</tr>

								<tr>
									<td>Cooperate</td>
									<td>
									<input name="CR" size="5" value="0" onclick="run('C','R');" type="text">
									</td><td>
									<input name="CC" size="5" value="0" onclick="run('C','C');" type="text">
									</td><td>
									<input name="CD" size="5" value="0" onclick="run('C','D');" type="text">
									</td>
								</tr>

								<tr>
									<td>Defect</td>
									<td>
									<input name="DR" size="5" value="0" onclick="run('D','R');" type="text">
									</td><td>
									<input name="DC" size="5" value="0" onclick="run('D','C');" type="text">
									</td><td>
									<input name="DD" size="5" value="0" onclick="run('D','D');" type="text">
									</td>
								</tr>
							</tbody>
						</table>
						</tbody>
						</table>
						<br>
						<input type="submit" class="btn btn-primary" value="Submit">
						<input type="reset" class="btn btn-default" value="Reset">
						
						<!-- <input value="Reset" onclick="resetAll();" type="button">
						<input value="Submit" onclick="runAll();" type="button"> -->
					</form></center>

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
