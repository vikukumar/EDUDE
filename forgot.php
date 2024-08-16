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
if(isset($_POST['forget'])){
    require_once('./secure/session.php');	
	$v = $_POST['type'];
    $id = $_POST['uid'];
    $err = forget_pass($v ,$id);
	
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
				  <input type="submit" value="Get Password" name="forget">
				  <br>
				  Your College is Registered by Clicking
				  <a href="Register">Here</a>
				  <br>
				  <a href="app">Back To Login</a>
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