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
  $err ="";
  session_start();
  date_default_timezone_set("Asia/Kolkata");
  require_once('./secure/connection.php');
  require_once('./secure/session.php');	
  $db = local();
  $data = $_SESSION['data'];
  if($_SESSION['v']!= 1){
	  header("location: Dashboard");
  }
  
  if(isset($_POST['del']) && !check_CT($db, $_POST['del'])){
	$err = del_teach($db,$_POST['del']);
  }
  if(isset($_POST['add'])){
	//Add Teacher in Data Base
	  
	  $err = addteacher($db,$data['ccode'],$_POST['tname'],$_POST['tsub'],$_POST['tphone'],$_POST['temail']);
  }
?>

<html>
   <head>
       <title><?php echo $data['name']; ?>:Teachers</title>
	   <?php include("./components/header.php");
	   ?>
	   <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
       <link type="text/css" rel="stylesheet" href="assest/css/mobile.css">
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
		   <div class="pg"><a href="Dashboard.php">Dashboard</a>/Teacher</div>
		   <div class="head-menu">
		      <div class="search">
			       <form method="post" action="">
				      <input type="text" name="srch" Placeholder="Search" required>
					  <button name="search" type="submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
				   </form>
				   <div class="util">
			           <button type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
				       <button type="button"><i class="fa fa-bell-o" aria-hidden="true"></i></button>
			       </div>
			   </div>
		       
		   </div>
		   <div class="add">
		      <form method="post" action="" name="add_teacher">
				  <label for="tname">Teacher Name :</label>
				  <input type="text" name="tname" placeholder="Enter New teacher Name" required>
				  <label for="tsub">Teacher Subject :</label>
				  <input type="text" name="tsub" placeholder="Enter New teacher Subject" required>
				  <label for="tphone">Teacher Phone :</label>
				  <input type="text" name="tphone" placeholder="Enter New teacher Phone" maxlength="10" required>
				  <label for="temail">Teacher Email : </label>
				  <input type="email" name="temail" placeholder="Enter New teacher Email" required>
				  
				  <input type="submit" name="add" value="Add" >
			  </form>
		   </div>
		   <div class="display" id="dis">
			   <h3>Your Teachers is here...</h3>
			   <?php echo "<div class='err'><h1>Result: </h1><h4>".$err."</h4></div>";?>
		      <div class="scrn">
				  <?php
				      print_r(get_teachers($db,get_ctable($db,$data['id'])));
				  ?>
			      
			  </div>
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