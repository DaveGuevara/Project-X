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

		<title>User Management | Prisoner's Dilemma</title>

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
        <!-- javascripts -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
                 
        
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

			<!--main content start-->
			<section id="main-content">
				<section class="wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h3 class="page-header"><i class="fa fa fa-bars"></i>Users Management</h3>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-home"></i><a href="Dashboard.php">Home</a>
								</li>
								<li>
									<i class="fa fa-users"></i>Users
								</li>
							</ol>
						</div>
					</div>
					<!-- page start-->
				

					<!-- advanced user table starts -->
            <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Displaying all users
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Full Name</th>
                                 <th><i class="icon_heart"></i> Gender</th>
                                 <th><i class="icon_mail"></i> Email</th>
                                 <th><i class="icon_contacts"></i> Class</th>
                                 <th><i class="icon_chat"></i> Section</th>
                                 <th><i class="icon_group"></i> Group</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                               
                               
    <?php
    include("connection.php");
    $query = mysqli_query($dbc,"SELECT u.GUID, c.ClassID, gp.GroupPlayersID, g.GroupID, CONCAT(u.first_name, ' ', u.last_name ) as FullName, u.gender, u.email, c.classname, c.section, gp.PlayerName, g.GroupName FROM users as u LEFT JOIN class c on u.ClassID = c.ClassID LEFT JOIN groupplayers gp on u.GUID = gp.UserGUID LEFT JOIN groups g on gp.GroupID = g.GroupID WHERE u.ActivePlayer = 1 ORDER BY FullName asc");

            while ( $row = mysqli_fetch_array($query)){        
                $output =  "<tr>
                       <td>" . $row['FullName'] . "</td>
                       <td>" . $row['gender'] . "</td>
                       <td>" . $row['email'] . "</td>
                       <td>" . $row['classname'] . "</td>               
                       <td>" . $row['section'] . "</td>                           
                       <td>
                                  <div class='btn-group'>";
                                        if (strtoupper($row['GroupName']) == 'RED')
                                        {                                  
                                            $output = $output."<i class='btn btn-primary icon_group'></i>";
                                        }
                                        if (strtoupper($row['GroupName']) == 'GREEN')
                                        {
                                            $output = $output."<i class='btn btn-success icon_group'></i>";
                                        }
                                        if (strtoupper($row['GroupName']) == 'BLUE')
                                        {
                                            $output = $output."<i class='btn btn-danger icon_group'></i>";
                                        }
                            $output = $output."</div>
                            </td>                      
                        <td>
                            
                            <a href='#' id='EditDetails' class='EditDetails btn btn-info btn-sm' text='Edit'>Edit
        <div class='details hide'>
            <h1>".$row['FullName'] . "</h1>
            <p>". $row['email']. "</p>
            <ul>
                <li>".$row['classname']."</li>
                <li>".$row['GroupName']."</li>
            </ul>
        </div>
    </a>                                                    
                        </td>
                       </tr>"               
                        ;
                //<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-user-id='" .$row['GUID'] . "' data-target='#editModal'>edit</button>
                print $output;
                }
            mysqli_close($dbc); 
            ?>                                                                                                                                                                                                                      
                           </tbody>
                        </table>
                      </section>
                  </div>
                    </div>                    
                    <!-- advanced user table ends-->

					<!-- page end-->
				</section>
			</section>
			<!--main content end-->
		</section>
		<!-- container section end -->
		
		<!-- nice scroll -->
		<script src="js/jquery.scrollTo.min.js"></script>
		<script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
		<script src="js/scripts.js"></script>
        
        
        <!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
    
    <script>
          //$('#editModal').on('show.bs.modal', function(e) {
          //var UserGUID = e.relatedTarget.dataset.userId;          
          //$(document).find('input[name="userId"]').val(UserGUID);
    //    });         
       
        
(function($) {
    var infoModal = $('#editModal');
    $('.EditDetails').on('click', function(){
        htmlData = $(this).find('.details').html();
        infoModal.find('.modal-body').html(htmlData);
        infoModal.modal('show');
        return false;
    });
})(jQuery);        
        
        </script>
  
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit          
          </h4>
      </div>
      <div class="modal-body">
        <!--<p>Some text in the modal.</p>
          <input type="text" name="userId" value=""/>
      -->
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        
        
        

	</body>
</html>
