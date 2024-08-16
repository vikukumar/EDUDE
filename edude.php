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
require_once("./secure/connection.php");
require_once("./secure/session.php");
require_once("./secure/page.php");
$db = local();
$code = $_SESSION['classcode'];
$page = "<SPAN>NOT AVAILABLE!</SPAN>";
if(isset($_REQUEST)){
    $pid = $_REQUEST['pid'];
    $title = $_REQUEST['p'];
    if(($_SESSION['v']!= 1) && ($_SESSION['v']!= 2) && ($_SESSION['v']!= 3)){
	  header("location: Dashboard");
    }else{
        if($pid == 3){
            if($_SESSION['ct']!=1){
                   header("location: Dashboard");
           }else{
               //Routine Setup
                if(isset($_POST['route'])){
                    addroutinec($db, $_POST['time'],$_POST['teach'],$code,$_POST['sub']);
                }
                tblrout_c($db,$code);
                $page = routinebox_class($db, $code);
                $page .="<br><br>";
                $page .=form_rout($db,$code);
                
           }
        }else{
            // other setup
            if($pid == 2 ){
                $page = show_lec($db, $_SESSION['data']['id']);
            }
            if($pid == 10){
                $page = profile($_SESSION['data']);
            }
        }
    }
}else{
    header('location: Dashboard');
}

?>

<html>
   <head>
       <title><?php echo $title; ?></title>
	   <?php include("./components/header.php");
	   ?>
	   <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
       <link type="text/css" rel="stylesheet" href="assest/css/page.css">
       <link type="text/css" rel="stylesheet" href="assest/css/mobile.css">
	</head>
	<body class="">
	   <div class="ehead">
		   <?php
		      include("components/nav.php");
		   ?>
	   </div>
	   <div class="fluid-container ebody">
		       <div class="pg"><a href="Dashboard.php">Dashboard</a>/<?php echo $title; ?></div>
		       <div class="lec">
		               <?php 
                          //echo "<pre>";
                          echo $page;
                          //echo "</pre>";
                       ?>
		                 
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