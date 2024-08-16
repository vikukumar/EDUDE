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
$data = $_SESSION['data'];
$err ="";
require_once('./secure/connection.php');
require_once('./secure/session.php');	
$db = local();

 if($_SESSION['v']!= 1){
	  header("location: Dashboard");
  }
if(isset($_POST['del'])){
	//$err = $_POST['del'];
    $err = del_class($db,$_POST['del']);
}
if(isset($_POST['add'])){
	$err = addclass($db,$_POST['cname'],$data['ccode'] ,$_POST['ct']);
}
?>

<html>
   <head>
       <title><?php echo $data['name']; ?>:Classes</title>
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
		   <div class="pg"><a href="Dashboard.php">Dashboard</a>/Classes</div>
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
				  <label for="cname">Class Name :</label>
				  <input type="text" name="cname" placeholder="Enter New Class Name" required>
				  <label for="ct">Select Class Teacher: </label>
				  <select name="ct" required>
					  <option style="border-bottom: 1px solid orangered;" >Select Teacher</option>
			      <?php 
                     $sql = "SELECT t1.teacher_id,t1.teacher_name
                                                FROM ".get_ctable($db,$data['id'])."teacher t1
                                                Left JOIN ".get_ctable($db,$data['id'])."classes t2 
                                                ON t2.class_teacher = t1.teacher_id where t2.class_teacher is NULL ";
				     /*$sql = "select teacher_id,teacher_name from ".get_ctable($db,$data['id'])."teacher, ".get_ctable($db,$data['id'])."classes where ".get_ctable($db,$data['id'])."teacher.teacher_id != ".get_ctable($db,$data['id'])."classes.class_teacher;";*/
				     $result = mysqli_query($db, $sql);
          		     if(mysqli_num_rows($result) > 0) {
			                while($row = mysqli_fetch_assoc($result)) {
							  echo '<option value="'.$row['teacher_id'].'" >'.$row['teacher_id'].': '.$row['teacher_name'].'</option>';
						    }
				      }else{
						 echo '<option value="">No Teacher Found!</option>';
					 }
				  
				  
				   ?>
				     
				  </select>
				  
				  <input type="submit" name="add" value="Add" >
			  </form>
		   </div>
		   <div class="display" id="dis">
			   <h3>Your Classes is here...</h3>
			    <?php echo "<div class='err'><h1>Result: </h1><h4>".$err."</h4></div>";?>
		      <div class="scrn">
			     <?php
				      print_r(get_classlst($db,get_ctable($db,$data['id'])));
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