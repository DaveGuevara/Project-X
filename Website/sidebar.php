<?php

$isAdmin = $_SESSION['isAdmin'];

$strOut = "<aside>
          <div id='sidebar'  class='nav-collapse'>
              <!-- sidebar menu start-->
              <ul class='sidebar-menu'>    
              
                  <li class='active'>
                      <a class='' href='Dashboard.php'>
                          <i class='icon_house_alt'></i>
                          <span>Dashboard</span>                          
                      </a>
                  </li>";

if ($isAdmin == 1)
{   
    $strOut = $strOut . "  
        <li class='sub-menu'>
                      <a href='javascript:;' class=''>
                          <i class='icon_laptop'></i>
                          <span>Admin Features</span>
                          <span class='menu-arrow arrow_carrot-right'></span>
                      </a>
                      <ul class='sub'>
                          <li><a class='' href='UserManagement.php'>User Management</a></li>
                          <li><a class='' href='SetupClasses.php'>Setup Classes</a></li>
                          <li><a class='' href='SetupGroups.php'>Setup Groups</a></li>
                      </ul>
                  </li>";           
}
else
{    
}
    
$strOut = $strOut . "<li class='sub-menu'>
                      <a href='game.php' class=>
                          <i class='icon_laptop'></i>
                          <span>Play Game</span>
                          <span class='menu-arrow arrow_carrot-right'></span>
                      </a>                      
                  </li>
            </ul>
            <!-- sidebar menu end-->
            </div></aside>";

echo $strOut;



?>