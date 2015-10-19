<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="GeeksLabs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login | Prisoner's Dilemma</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action="" method="POST" >        
        <div class="login-wrap">

            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name= "email" placeholder="Email" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name = "password" placeholder="password">
            </div>

            <div class="input-group">
                <div class="fb-login-button" data-scope="public_profile,email" data-show-faces="true" data-width="200" data-max-rows="2" onlogin="checkLoginState()">Login using Facebook</div>
            </div>

               

            <input class="btn btn-primary btn-lg btn-block btn btn-info" type="submit" value="Login" name="submit" role="button"/>
            <a href="Registration.php" class="btn btn-primary btn-lg btn-block btn btn-info" type="submit" role="button">SignUp</a>

        </div>
      </form>

    </div>

      
      
      
      
<?php
include("connection.php");


if(isset($_POST["submit"])){
    
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $query = mysqli_query($dbc, "SELECT * FROM users WHERE email='" .$email. "' AND password='" .$password. "'");                    
        $numrows = mysqli_num_rows($query);                
        
        if($numrows!=0)
        {
            while($row= mysqli_fetch_array($query))
            {
                $dbemail=$row['email'];
                $dbpassword=$row['password'];
            }

            if($email == $dbemail && $password == $dbpassword)
            {
                session_start();
                $_SESSION['sess_user']=$email;

                /* Redirect browser */
                header("Location: index.html");
            }
        } 
        else 
        {
            $message = "Invalid username or password!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    else 
    {
        $message2 = "All fields are required!";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }
}
?>




      <script type="text/javascript" src="js/facebook.js"></script>

  </body>
</html>