<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="GeeksLabs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Registration | Prisoner's Dilemma</title>

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
            <div class="top-nav notification-row"></div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa fa-bars"></i> Registration</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="Dashboard.php">Home</a></li>
                            <li><i class="icon_document_alt"></i>Sign up</li>                            
                        </ol>
                    </div>
                </div>
                <!-- page start-->
                
                <!-- Form validations -->
             
                <header class= "col-lg-offset-2 col-lg-10">
                    <h3>Sign Up</h3> 
                </header>
                <br />
                <br />
                <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal " id="register_form" method="POST" action="">
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="firstname" name="firstname" type="text" />
                            </div>
                        </div>                                        
                        <div class="form-group ">
                            <label for="lastname" class="control-label col-lg-2">Last Name <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="lastname" name="lastname" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="password" name="password" type="password" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required" >*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="email" name="email" type="email" />
                            </div>
                        </div>
										
	                    <div class="form-group">
                            <label class="control-label col-xs-3">Gender:</label>
                            <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="genderRadios" value="male"> Male
                            </label>
                        </div>
                            <div class="col-xs-2">
                            <label class="radio-inline">
                                <input type="radio" name="genderRadios" value="female"> Female
                            </label>
                        </div>
                        </div>
										
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="agree">  I agree to the <a href="#">Terms and Conditions</a>.<span class="required">*</span>
                                </label>
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                <input type="reset" class="btn btn-default" value="Reset">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </section>
                <!-- page end-->
         </section>
     </section>
<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>

    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    
</body>
</html>

<?php
include("connection.php");

if(isset($_POST["submit"])){
     if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])  && !empty($_POST['email']) && !empty($_POST['genderRadios']) ) {
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $password=$_POST['password'];
            $confirm_password=$_POST['confirm_password'];
            $email=$_POST['email'];
            $genderRadios=$_POST['genderRadios'];

            $query = mysqli_query($dbc, "SELECT * FROM users WHERE email='" .$email. "'");                                   
            $numrows=mysqli_num_rows($query);
            if($numrows==0)
            {
                //$sql="INSERT INTO users(first_name,last_name,password,email,Gender) VALUES('$firstname','$lastname', '$password','$email','$genderRadios')";
                
                $sql = "SELECT * FROM users";
                $result=mysqli_query($dbc, $sql);
                if($result){
                    //message = "Account Successfully Created";
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    header('Location: profile.php');
                    exit;
                } 
            } 
            else
            {
                $message2 = "That username already exists! Please try again with another.";
                echo "<script type='text/javascript'>alert('$message2');</script>";
            }
        } 
        else 
        {
             $message3 = "All fields are required!";
            echo "<script type='text/javascript'>alert('$message3');</script>";
        }
    }
?>
