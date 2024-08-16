<?php
//session_start();
//$s=array('app.php','login','registeration.php','Register','profile.php','Profile','secure/logout.php','Logout');

if(isset($_SESSION['lv']) || isset($_COOKIE['lv'])){
	if($_SESSION['lv'] == 1  || $_COOKIE['lv'] == 1){
		$s=array('secure/logout','Logout','Dashboard','Dashboard');
	}
	else{
	$s=array('app','login','Register','Register');
    }
}
else{
	$s=array('app','login','Register','Register');
}


?>
   <!-- Google Tag Manager (noscript) -->
    <noscript>
           <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNR9XR3" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
   <nav>
	   <a href="home">
	     <img alt="logo" src='./assest/img/hor.png'>
        <!-- <img alt="logo" style="border-radius:8px;" src='./assest/img/fest/edude_independence.gif'> -->
	    
	   </a>
       <navbar id="oc">
	   <i class="fa fa-bars" aria-hidden="true"></i>
      </navbar>
	  <ul id="navi">
	      <li> <a href="./home" style="text-align:">Home</a></li>
		  <li> <a href="./info?id=1">About Us</a></li>
		  <li> <a href="./info?id=0">Partners</a></li>
		  <li> <a href="./info?id=2">Teams</a></li>
		  <li> <a href='<?php echo $s[2]; ?>'><?php echo @$s[3];?></a></li>
		  <li> <a href='<?php echo $s[0]; ?>'><?php echo @$s[1];?></a></li>
		  
	  </ul>
	   
   </nav>
   

