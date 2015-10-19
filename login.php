



include("connection.php");



$login_email= $_POST['login_email'];
$login_password = $_POST['login_password'];




$query = mysqli_query($dbc,"SELECT * FORM users WHERE Email='".$login_email."'");
$numrows = mysqli_num_rows($query);





if($_SEVER['REQUEST_METHOD']=='POST'){
	


	if($numrows !=0){



	while($row = mysqli_fetch_array($query)){

$dbemail=$row['Email'];
$dbpass=$row['pw'];
$$row['First_Name'];

	}


i($login_email==$dbemail){
	if($login_password==$dbpass){


	echo "Welcome" .$dbfirstname.",you are in the Prisoner's Dilemma !"
	include("navbar.php");
	}else{
 include("navbar.php");
	echo "your password is incorrect!";

	}
}else{
	
	echo "your email is incorrect!";

}

	}else{

	echo"Invalid credentials!If you are not registered please register first...";


	}
}