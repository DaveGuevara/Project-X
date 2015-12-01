<html>
<head>
<title></title>
</head>
<body>	
    
    <?php
        include('connection.php');
        include('navbar.php');    
        error_reporting(0);
        session_start();
        $id = $_SESSION['sess_ID'];                    
        $stage = 0;
        $current_phone = '';
        try { $stage = $_POST["stage"];} catch (Exception $e) {$stage = 0;}
        
        if (!IsSEt($stage)) {
            $r = mysqli_query($dbc, "SELECT * FROM users WHERE ID=". $id );
            $row = mysqli_fetch_array($r);
             $current_firstName = $row['firstName'];  
              $current_lastName = $row['lastNmae'];  
               $current_email = $row['email'];  
                $current_phone = $row['phone'];
                $current_password = $row['password']; 
                                 
    ?>
    
    <br/><br/>
    <form action="updatephone.php" method="post">	   
        <input type = "hidden" name = "stage" value = "1" />
            Update my phone number from: <?php echo $current_phone; ?>
           to: <input type="text" name= "new_phone" size="20" maxlength="50" />
        
	       <input type="submit" name="submit" value="Update Phone" />
	   </form>
    <br/><br/><br/>
    
    <?php
            } 
            else {            
                //check if user submitted form:
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){    
                    $new_phone = $_POST['new_phone']; 

                    //delete user where email = $email_from_form_input: 
                    $query = "UPDATE users SET phone = " . $new_phone . " WHERE ID= " . $id;		
                    mysqli_query($dbc, $query);		
                    echo "The phone number has been updated successfully!";
                    }
                    else
                    {
                    echo "failed";
                }
            }
    ?>
    
</body>
</html>
