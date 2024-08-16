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
 * APIs          : edude APIs, mailjet APIs , Daily APIS (Both are only in Prototype)
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
require_once('./secure/connection.php');	
$title="";
$page ="";
if(isset($_REQUEST['id'])){
    $db = local();
    $sql = "select name , body from edu_page where pid =".$_REQUEST['id'];
    $res = mysqli_query($db,$sql);
    if($res){
        if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
                $title = $row['name'];
                $page = $row['body'];
            }
        }else{
              header('location: home');
         }
    }else{
            header('location: home');
       }
    mysqli_close($db);
}else{
    header('location: home');
}
?>

<html>
   <head>
       <title>EDUDE: <?php echo $title;?> </title>
	   <?php include("./components/header.php");
	   ?>
      
       <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
       <link type="text/css" rel="stylesheet" href="assest/css/mobile.css">
       <link type="text/css" rel="stylesheet" href="assest/css/page.css">
	</head>
	<body>
	   <!-- Headding -->
	   <div class="ehead">
		   <?php
		      include("components/nav.php");
		   ?>
	   </div>
	   <!-- Main Body -->
	   <div class="fluid-container ebody">
            <div class="pg"><a href="home">Home</a>/<?php echo $title;?>
                                       
             </div>
		    <div class="fluid-container">
		        <?php echo $page;?>
                

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
                    $(window).bind("scroll", function (e) {
                      parallaxScroll();
                    });
                    
                });
               
                function parallaxScroll() {
                         const scrolled = $(window).scrollTop();
                                 $("#team-image").css("top", 0 - scrolled * 0.2 + "px");
                                 $(".img-1").css("top", 0 - scrolled * 0.35 + "px");
                                 $(".img-2").css("top", 0 - scrolled * 0.05 + "px");
                        }

            </script>
	</body>
</html>