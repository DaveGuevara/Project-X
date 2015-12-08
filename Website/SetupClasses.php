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

		<title>Setup Classes | Prisoner's Dilemma</title>

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
							<h3 class="page-header"><i class="fa fa fa-bars"></i>Class Management</h3>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-home"></i><a href="Dashboard.php">Home</a>
								</li>
								<li>
									<i class="fa fa-users"></i>Class
								</li>
							</ol>
						</div>
					</div>
					<!-- page start-->
				
                    
                    
                    <!-- INSERT NEW CLASS START-->
                    
                        <div class="panel panel-default">
                            <div class="panel-heading">                                                                
                              <div class="pull-left">Add new class</div>
                              <div class="widget-icons pull-right">                                
                                <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                              </div>  
                              <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                
                                
                              <div class="padd">

                                  <div class="form quick-post">
                                                  <!-- Edit profile form (not working)-->
                                                  <form class="form-horizontal">
                                                      <div class="col-lg-12">
                                                          <div class="col-lg-6">
                                                              <!-- Class Name -->                                                    
                                                              <div class="form-group">
                                                                <label class="control-label col-lg-4" for="title">Class Name</label>
                                                                <div class="col-lg-8"> 
                                                                  <input type="text" class="form-control" id="classname">
                                                                </div>
                                                              </div>                                                                             
                                                          </div>
                                                          
                                                          <div class="col-lg-6">
                                                            <!-- Section -->
                                                              <div class="form-group">
                                                                <label class="control-label col-lg-4" for="content">Section</label>
                                                                <div class="col-lg-8">
                                                                  <input type="text" class="form-control" id="section"></textarea>
                                                                </div>
                                                              </div>          
                                                          </div>                                                          
                                                      </div>
                                                    <br/><br>
                                                      <div class="col-lg-12">
                                                         <!-- Buttons -->
                                                              <div class="form-group">
                                                                 <!-- Buttons -->
                                                                 <div class="col-lg-offset-5 col-lg-6">
                                                                    <button type="submit" class="btn btn-primary">Save</button>                           
                                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                                 </div>
                                                              </div>
                                                      </div>
                                                  </form>
                                                </div>


                              </div>
                              <div class="widget-foot">
                                <!-- Footer goes here -->
                              </div>
                            </div>
                        </div>
                    
                    <!-- INSERT NEW CLASS END -->
                    
                    <br/><br/>

					<!-- advanced user table starts -->
            <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Displaying all classes
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>                                 
                                 <th><i class="icon_contacts"></i> Class Name</th>
                                 <th><i class="icon_chat"></i> Section</th>                                 
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>                               
                               
    <?php
    include("connection.php");
    $query = mysqli_query($dbc,"SELECT * FROM class");

            while ( $row = mysqli_fetch_array($query)){        
                $output =  "<tr>                       
                       <td>" . $row['ClassName'] . "</td>               
                       <td>" . $row['Section'] . "</td>                                                                        
                       <td>                            
                            <a href='#' id='EditDetails' class='EditDetails btn btn-info btn-sm'>Edit
                                <div class='details hide'>
                                    <h1>".$row['ClassName'] . "</h1>
                                    <p>". $row['Section']. "</p>                                    
                                </div>
                            </a>
                            <a href='#' id='DeleteClass' class='DeleteDetails btn btn-danger btn-sm'>Delete
                            </a>
                        </td>
                       </tr>"               
                        ;
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
