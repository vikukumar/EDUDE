<?php
   echo"<!--
***************************************************************************************
|                  EDUDE EULA and Development License & Information                   |
***************************************************************************************
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
=======================================================================================
=======================================================================================
| Developer Details
=======================================================================================
 * Developer Name: Vikash Kumar , Vishnu Vinoj
 * Mentor's Name : Mr. Kaushal Kishore
 * Guided by     : Dr. Santosh Kumar Shukla
 * Organisation  : Babu Banarsi Das Institute of Technology,Ghaziabad
 * Purpose       : Final Year Project
 * Technology    : Progressive Web Application Using PHP
 * FrontEnd      : HTML5 , CSS3 , Javascript(JQuery) , Bootstrap , Fontawesome , AOS
 * BackEnd       : PHP 8 , AJAX 
 * APIs          : edude.ml, mailjet APIs , daily APIS (Both are only in Prototype)
 * Current Model : Prototype Model
 * Design Model  : UML , ER-Diagram , DFD and DDB
 * Database      : MySQL, JSON(Not in Prototype)
 * File Storage  : AWS or Firebase
 * License Type  : Project Based
 * Monitoring by : BBDIT, GHaziabad
 * HomePage      : index.php
 * Year          : 2020-2021
 * Roll NO(s)    : 1703510042 , 1703510045
 
=========================================================================================
=========================================================================================
| EULA for EDUDE
=========================================================================================
 * End User License Authorised for Prototype Project model.
=========================================================================================
=========================================================================================

-->";
session_start();
date_default_timezone_set("Asia/Kolkata");
$err="";
if(isset($_SESSION['lv'])){
	header("location: Dashboard");//testing on success page change to dashboard
}
if(isset($_COOKIE['lv'])){
	$_SESSION['lv'] = $_COOKIE['lv'];
	header("location: Dashboard"); //testing on success page change to dashboard
}
if(isset($_POST['login'])){
	require_once('./secure/connection.php');
    require_once('./secure/session.php');	
	$db = local();
	$v = $_POST['type'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	
	if(login($db,$uid,$pwd,$v)){
		//Login Success
		$_SESSION['v'] = $v;
		$_SESSION['usr'] = $uid;
		$_SESSION['lv'] = 1;
		
		//Temporary session variables
		$_SESSION['reg'] = 1;
		$_SESSION['clg'] = $uid;
		setcookie(session_name(),$_COOKIE[session_name()], time()+30*24*60*60,"/");
        setcookie("uid",$_SESSION['usr'], time()+30*24*60*60,"/");
        setcookie("lv",$_SESSION['lv'], time()+30*24*60*60,"/");
        setcookie("dev",$_SERVER['HTTP_USER_AGENT'], time()+30*24*60*60,"/");
        setcookie("v",$_SESSION['v'], time()+30*24*60*60,"/");
		header("location: Dashboard"); //testing on success page change to dashboard
	}else{
		    $err="UserId & Password invalid! ";
		    
	}
	
}

?>

<html>
   <head>
       <title>EDUDE : Login</title>
	   <?php include("./components/header.php");
	   ?>
	</head>
	<body>
		
	   <div class="ehead">
		   <?php
		      include("components/nav.php");
		   ?>
	   </div>
	   <div class="fluid-container ebody e-l">
		   <!-- main body --->
		   <div class="elog">
			    <div class="err"><?php 
					                echo $err;
				                  ?>
			    </div>
		        <div class="e-d">
					 <img src="assest/img/main.png">
			         <h1>EDUDE Login</h1>
			    </div>
			    <form method="post" action="" class="l-box">
				  <label for="type">Who are You?<span>*</span></label>
			      <select name="type" required>
					  <option value="1">College/Schools</option>
					  <option value="2">Teacher</option>
					  <option value="3">Student</option>
					  
					  
				  </select>
				  <br>
				  <label for="uid">UserId by EDUDE<span>*</span></label>
				  <input name="uid" type="text" placeholder="UserId by EDUDE" required>
				  <br>
				  <label for="pwd">Password <span>*</span></label>
				  <input name="pwd" type="password" placeholder="Password" required>
				  <br>
				  <input type="submit" value="Login" name="login">
				  <br>
				  Your College is Registered by Clicking
				  <a href="Register">Here</a>
				  <br>
				  <a href="forgot">Forget Password?</a>
			    </form>
		   
		   </div>
	   </div>
	   <!-- footer -->
	   <div class="efoot">
	       <?php
		     include("components/footer.php");
		   ?>
	   </div>
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
            <script src="assest/js/app.js"></script>
            <script>
                $(document).ready(function(){
                    $("#oc").click(function(){
                        $("#navi").toggleClass("dis");
                         $(".ebody").toggleClass("off");
                        console.log("clicking");
                     });
                    $("#navi").click(function(){
                        $("#navi").toggleClass("dis");
                        $(".ebody").toggleClass("off");
                    });
                });
            </script>
	</body>
</html>