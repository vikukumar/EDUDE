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
  
?>

<html>
   <head>
       <title>EDUDE:No Lecture</title>
	   <?php include("./components/header.php");
	   ?>
	   <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
	</head>
	<body>
	   <!-- Headding -->
	  <!-- <div class="ehead">
		   <?php
		     // include("components/nav.php");
		   ?>
	   </div>-->
	   <!-- Main Body -->
	   <div class="fluid-container ebody" style="margin-top:0;">
		   <div class="sc">
		      <h1>NO LECTURE Schedule Currently!</h1>
			  <br>
			   <img src="assest/img/error/error.gif">
			   <br>
			   <h2>Lecture Available from 09:00 am to 05:00 pm. Come between these time.</h2>
		   </div>
	   </div>
	   <!-- footer -->
	  <!-- <div class="efoot">
	       <?php
		     //include("components/footer.php");
		   ?>
	   </div>-->
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