<html>
<head>
<title></title>
</head>
<body>	
    
    <?php
        error_reporting(0);

            $stage = 0;
            try { $stage = $_POST["stage"];} catch (Exception $e) {$stage = 0;}
            if (!IsSEt($stage)) {
             ?>
    
    <form action="delete.php" method="post">	   
        <input type = "hidden" name = "stage" value = "1" />
        <h4>Please type the email of user to be deleted</h4>
           <p><input type="text" name= "delete_email" size="20" maxlength="50" /></p>           	       
	       <p><input type="submit" name="submit" value="Delete this User" /></p>	   
	   </form>
    <br/><br/><br/>
    
    <?php
            } 
            else {

               $hostname = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

//making the connection to mysql
$dbc = mysqli_connect($hostname, $username, $password, $dbname) OR die("could not connect to database, ERROR: ".mysqli_connect_error());

                //check if user submitted form:
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){    
                    $delete_email = $_POST['delete_email']; 

                    //delete user where email = $email_from_form_input: 
                    $query = "DELETE FROM login WHERE email= " . $delete_email;		
                    mysqli_query($dbc, $query);		
                    echo "The user has been successfully deleted!";
                    }
                    else
                    {
                    echo "failed";
                }
            }
    ?>
    
</body>
</html>
