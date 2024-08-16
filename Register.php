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
  //$err=$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  //$err = $_REQUEST['post'];
if(isset($_POST['submit'])){
	  require_once('./secure/connection.php');
	  require_once('./secure/session.php');
	  $db = local();
	  $err = Register($db, $_POST['cname'], $_POST['uname'] , $_POST['ccode'], $_POST['cmail'], $_POST['cno'], $_POST['cadd']);
	  if($err == "Success"){
		  // Success Page redirect.......
		  $_SESSION['reg'] = 1;
		  $_SESSION['clg'] = $_POST['cname'];
		  mysqli_close($db);
		  header("location: Success");
	  }
		 
  }

   
?>

<html>
   <head>
       <title>EDUDE:Signup</title>
	   <?php include("./components/header.php");
	   ?>
	   <link rel="icon" type="image/png"  href="assest/img/main.png">
	</head>
	<body>
	
	   <div class="ehead">
		   <?php
		   include("components/nav.php");
		   ?>
	   </div>
	   <div class="fluid-container ebody e-l">
		    <div class="elog">
			    <div class="err"><?php 
					               // $arr = get_object_vars($err);
					                print_r($err);
				                  ?>
			    </div>
		        <div class="e-d">
					 <img src="assest/img/main.png">
			         <h1>EDUDE College Signup</h1>
			    </div>
			    <form method="post" name="register" action="" class="l-box">
				  
				  <br>
				  <label for="cname">Enter College Name<span>*</span></label>
				  <input name="cname" type="text" placeholder="College Name" required>
				  <br>
				  <label for="uname">Enter University<span>*</span></label>
				  <input name="uname" type="text" placeholder="University" required>
				  <br>
				  <label for="ccode">College Code<span>*</span></label>
				  <input name="ccode" type="text" placeholder="College Code" required>
				  <br>
				  <label for="cmail">College email<span>*</span><h6>(You'll get EDUDE ID & Password Here)</h6></label>
				  <input name="cmail" type="email" placeholder="College email" required>
				  <br>
				  <label for="cno">College Number<span>*</span></label>
				  <input name="cno" type="tel" maxlength="10" placeholder="99XXXXXX89" required>
				  <br>
				  <label for="cadd">College Address<span>*</span></label>
				  <input name="cadd" type="text"  placeholder="College Address" required>
				  <br>
				  <input type="submit" value="Register" name="submit">
				  <br>
				  Already have EDUDE ID & Pass
				  <a href="app">Login Here</a>
				  <br>
				  <a href="home">Back to Home</a>
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