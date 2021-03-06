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

		<title>Profile | Prisoner's Dilemma</title>

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
									<a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
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
      

			
<section id="main-content">
				<section class="wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-home"></i><a href="Dashboard.php">Home</a>
								</li>
							
								<li>
									<i class="fa fa-user-md"></i>Profile
								</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<!-- profile-widget -->
						<div class="col-lg-12">
							<div class="profile-widget profile-widget-info">
								<div class="panel-body">
									<div class="col-lg-2 col-sm-2">
										<h4>
                                            <?php echo($UserName); ?>                                            
                                        </h4>
										<div class="follow-ava">								
                                                                                        
                                <?php
                                    switch($group)
                                    {
                                        case "RED":
                                            echo ("<img alt='' src='img/profile-widget-avatar-red.jpg'>"); 
                                            break;
                                        case "GREEN":
                                            echo ("<img alt='' src='img/profile-widget-avatar-green.jpg'>"); 
                                            break;
                                        case "BLUE":
                                            echo ("<img alt='' src='img/profile-widget-avatar-blue.jpg'>");
                                            break;
                                        default:  
                                            echo ("<img alt='' src='img/profile-widget-avatar-black.jpg'>");
                                            break;
                                    }                                         
                                ?>                                
                            
										</div>
										<h6>
                                            <?php if ($isAdmin) { echo ("Administrator");} else { echo("Student");} ?>
                                            </h6>
									</div>
									<div class="col-lg-4 col-sm-4 follow-info">
										<p>
											Hello I’m <?php echo($UserName); ?>.
										</p>
										<p>
                                            @jenifersmith
										</p>
										<p>
											<i class="fa fa-twitter">jenifertweet</i>
										</p>
										<h6><span><i class="icon_clock_alt"></i>11:05 AM</span><span><i class="icon_calendar"></i>25.10.13</span><span><i class="icon_pin_alt"></i>NY</span></h6>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!-- page start-->
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading tab-bg-info">
									<ul class="nav nav-tabs">

									
									</ul>
								</header>
								<div class="panel-body">
									
										<!-- profile -->
										<div id="profile" class="tab-pane">
											<section class="panel">
												<div class="bio-graph-heading">
													Hello I’m <?php echo($UserName);?>, a leading expert in interactive and creative design specializing in the mobile medium. My graduation from Massey University with a Bachelor of Design majoring in visual communication.
												</div>
												<div class="panel-body bio-graph-info">
													<h1>Profile</h1>
													<div class="row">
														<div class="bio-row">
															<p>
																<span>First Name </span>: Jenifer
															</p>
														</div>
														<div class="bio-row">
															<p>
																<span>Last Name </span>: Smith
															</p>
														</div>

												
														<div class="bio-row">
															<p>
																<span>Email </span>:jenifer@mailname.com
															</p>
														</div>
													
														<div class="bio-row">
															<p>
																<span>Class/Section </span>:  BIO-101
															</p>
														</div>
													</div>
												</div>
											</section>
											<section>
												<div class="row"></div>
											</section>
										</div>
										
										
										
										
										<!-- edit-profile -->
										<div id="edit-profile" class="tab-pane">
											<section class="panel">
												<div class="panel-body bio-graph-info">
													<h1> Edit Profile</h1>
													<form class="form-horizontal" role="form" action="updatemyprofile.php" method="post">
														<div class="form-group">
															<label class="col-lg-2 control-label">First Name</label>
															<div class="col-lg-6">
																<input type="text" class="form-control" id="f-name" placeholder=" ">
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-2 control-label">Last Name</label>
															<div class="col-lg-6">
																<input type="text" class="form-control" id="l-name" placeholder=" ">
															</div>
														</div>

														<div class="form-group">
															<label class="col-lg-2 control-label">Email</label>
															<div class="col-lg-6">
																<input type="text" class="form-control" id="email" placeholder=" ">
															</div>
														</div>

														

														<div class="form-group">
															<div class="col-lg-offset-2 col-lg-10">
																<button type="submit" class="btn btn-primary">
																	Save
																</button>
																<button type="button" class="btn btn-danger">
																	Cancel
																</button>
															</div>
														</div>
													</form>
												</div>
											</section>
										</div>

										<!-- edit-password -->

										<section class="panel">
											<div class="panel-body bio-graph-info">
												<h1> Edit Password</h1>
												<form class="form-horizontal" role="form">
													<div class="form-group">
														<label class="col-lg-2 control-label">Current Password<span class="required">*</span></label>
														<div class="col-lg-6">
															<input type="text" class="form-control" id="email" placeholder=" ">
														</div>
													</div>

													<div class="form-group">
														<label class="col-lg-2 control-label">New Password<span class="required">*</span></label>
														<div class="col-lg-6">
															<input type="text" class="form-control" id="email" placeholder=" ">
														</div>
													</div>

													<div class="form-group">
														<label class="col-lg-2 control-label">Confirm New Password<span class="required">*</span></label>
														<div class="col-lg-6">
															<input type="text" class="form-control" id="email" placeholder=" ">
														</div>
													</div>

													<div class="form-group">
														<div class="col-lg-offset-2 col-lg-10">
															<button type="submit" class="btn btn-primary">
																Save
															</button>
															<button type="button" class="btn btn-danger">
																Cancel
															</button>
														</div>
													</div>
												</form>
											<!-- </div> -->
										</section>

									</div>
								<!-- </div> -->
							</section>
						</div>
					</div>

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
		<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
		<!--custome script for all page-->
		<script src="js/scripts.js"></script>

		<!--
		<script>

		//knob
		$(".knob").knob();

		</script>
		-->

	</body>
</html>
