 <? 
    include("include/common.php"); 

    if(!$loggedin){ 
        ob_start(); 
        header("Location: login.php"); 
    } 
    include("include/header.php"); 
    include("include/accmenu.php"); 

    if($submit){ 
        $sql = "update users set 
            password='$spassword', 
            first_name='$sfirst_name', 
            last_name='$slast_name', 
            email='$semail', 
           
        mysql_query($sql) or die( mysql_error()."<br>$sql" ); 
?> 
        <h3>Edit your Account Details</h3> 
        <form action=account.php method=post> 
        <?=$users?> 
        <tr align=center> 
            <td colspan=2>Your account details have been saved.</td> 
        </tr> 
<? 
        if ($cpassword != $spassword) { 
            echo "<tr align=center><td colspan=2>You will now need to logout <a href=logout.php>here</a> and then login again. Make sure you do not have multiple browser windows open with this site in them.</td></tr>";  
        } 
        echo "</table>"; 
    }else{ 
        $this->c=mysql_query("select * from users where GUID='$myuid'"); 
        $this->d=mysql_fetch_object($this->c); 
        if(is_object($this->d)) { 
            $cusername = $this->d->username; 
            $cpassword = $this->d->password; 
            $cfirst_name = $this->d->first_name; 
            $clast_name = $this->d->last_name; 
            $cemail = $this->d->email; 
          
            $creloc=$this->d->relocate; 
        } 
?> 
        <h3>Edit your Account Details</h3> 
        <form method=post> 
        <?=$users?> 
        <tr align=center> 
            <td colspan=2>Edit your account details and then click the submit button below.<p></td> 
        </tr> 
        <tr> 
            <td align=right>Username:</td> 
            <td><?=$cusername?></td></tr> 
        <tr> 
            <td align=right>Password:</td> 
            <td><input type=text name=spassword size=35 maxlength=15 value='<?=$cpassword?>'></td></tr> 
        <tr> 
            <td align=right>First Name:</td> 
            <td><input type=text name=sfirst_name size=35 maxlength=20 value='<?=$cfirst_name?>'></td></tr> 
        <tr> 
            <td align=right>Last Name:</td> 
            <td><input type=text name=slast_name size=35 maxlength=30 value='<?=$clast_name?>'></td></tr> 
        <tr> 
         
            <td align=right>Your Email:</td> 
            <td><input type=text name=semail size=35 maxlength=75 value='<?=$cemail?>'></td></tr> 
      
        </form> 
<? 
    } 
    include("include/footer.php"); 
?> 
<? 
    function buildCatBox($name,$sel=""){ 
?> 
        <SELECT NAME="<?=$name?>"> 
            <option value="">----- 
<? 
            $qr1 = mysql_query("SELECT * FROM users ORDER BY name ASC"); 
            while ($a = mysql_fetch_object($qr1)){ 
                if($sel == $a->id){ 
                    echo "<OPTION VALUE=\"{$a->id}\" SELECTED>{$a->name}</OPTION>\n";  
                }else{ 
                    echo "<OPTION VALUE=\"{$a->id}\">{$a->name}</OPTION>\n";  
                } 
            } 
?> 
        </select> 
<? 
    } 
    function getCat($cat){ 
        $qr1 = mysql_query("SELECT name FROM user WHERE id='$users'"); 
        $a = mysql_fetch_object($qr1); 
        return $a->name; 
    } 
?>