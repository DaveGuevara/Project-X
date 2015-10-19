<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     </head>
      <body>
    <?php
   
        error_reporting(0);

            $stage = 0;
            try { $stage = $_POST["stage"];} catch (Exception $e) {$stage = 0;}
            if (!IsSEt($stage)) {
             ?>
    
            <form action="changepw.php" method="post">	   
                <input type = "hidden" name = "stage" value = "1" />
                
                <h4>Change password of a user</h4>
                   <p>Email:<input type="text" name= "email" size="20" maxlength="50" /></p>           	       
                   <p>Current Password:<input type="password" name="pass" maxlength="50"></textarea></p>	
                   <p>New Password:<input type="password" name="pass1" maxlength="50"></textarea></p>	
                   <p>Confirm New Password:<input type="password" name="pass2" maxlength="50"></textarea></p>	

                   <p><input type="submit" name="submit" value="Change Password" /></p>	   
               </form>
            <br>
    
    <?php
            } 
            else {
            //check if user submitted form:
             if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //connect to database:
                //define variables
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

//making the connection to mysql
$dbc = mysqli_connect($hostname, $username, $password, $dbname) OR die("could not connect to database, ERROR: ".mysqli_connect_error());

                echo "<br />";

                //Create an array for errors:
                $errors = array();

                //check for email address:
                if (empty($_POST['email'])){
                    $errors[] = 'You forgot to enter your email!';
                }else{
            $e = mysqli_real_escape_string($dbc, trim($_POST['email'])); //escape is to have input such as O’Hara; trim removes the space, return etc.
                }	

                //check current password:
                if (empty($_POST['pass'])){
                    $errors[] = 'You forgot to enter your current password!';
                }else{
                    $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
                }

                //check for a new password and compare it with confirmed password:
                if (!empty($_POST['pass1'])){
                    if ($_POST['pass1'] != $_POST['pass2']){
                        $errors[] = 'Your new password does not match the confirmed password!';
                    }else{
                        $np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
                    }
                }else{
                    $errors[] = 'You forgot to enter your new password!';
                }

                //if there is no errors:
                if(empty($errors)){
                    //create query and return number of rows where email = $e and password = $p:
                    $q = "SELECT id FROM login WHERE (Email='$e' AND password='$p')"; //query the database
                    $r = mysqli_query($dbc, $q); //store the query result which are all the IDs that matching the email
                    $num = mysqli_num_rows($r); //return how many records matched; should be one

                    //get user id where email = $e and password = $p:
                    if($num == 1){
                        $row = mysqli_fetch_array($r, MYSQLI_NUM);

                        //Make the UPDATE query:
                        $q = "UPDATE login SET password='$np' WHERE id='$row[0]'";
                        $r = mysqli_query($dbc, $q);

                        //if everything was ok:
                        if(mysqli_affected_rows($dbc) == 1){
                            //Ok message confirmation:
                            echo "Thanks! You have updated your password!";
                        }else{
                            echo "Your password could not be changed due to a system error";
                        }

                        //close connection to db:
                        mysqli_close($dbc);
                    }else{
                        echo "The email and password do not match our records!";
                    }
                }else{
                    echo "Error! The following error(s) occurred: <br />";
                    foreach($errors as $msg){
                        echo $msg."<br />";
                    }
                } 

             }
            }
?>
    
</body>
</html>
    
    
