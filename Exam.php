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
 * APIs          : Google Meet Links, mailjet APIs , ZOOM APIS (Both are only in Prototype)
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
$pg ="";
$oy ="";
require_once('./secure/connection.php');
require_once('./secure/session.php');	
$db = local();

if(!isset($_SESSION['v'])){
	  header("location: Dashboard");
}else{
    
}
if(isset($_POST)){
    
    if(isset($_POST['ADDExam'])){
        $data = $_SESSION['data'];
        $exam = $_POST['tname'];
        $sub =$_POST['sname'];
        $class = $_POST['ccode'];
        $date = $_POST['stime'];
        //$date = date_format($date,"Y-m-d H:i:s");
        $dur =$_POST['dur'];
        $teach = $data['id'];
        require_once('./secure/quiz.php');
        $tp = quiztbl($db,$class);
        if($tp){
            $sql = "Insert into edu_".$class."_quiz values(DEFAULT,'".$exam."','".$sub."','".$date."',".$dur.",'".$teach."')";
            if(mysqli_query($db,$sql)){
                $pg = "EXAM ADDED Successfully! Now go to Addquestion to add question in Exam.";
            }else{
                 $pg = "EXAM Not ADDED! Retry to add exam.".$date." :: ".$exam." :: ".$teach." :: ".$class." :: ".$dur." :: ".$sub;
            }
        }else{
            $pg = $class;
        }
       // mysqli_close($db);
    }
}

?>

<html>
   <head>
       <title>EDUDE:<?php  
                                   if($_SESSION['v'] == 2){
                                       echo "EDUDE EXAM/QUIZ Management System";
                                   }else if($_SESSION['v'] == 3){
                                       echo "EDUDE EXAM/QUIZ System";
                                   }else{
                                       echo "Unauthorize for EXAM/QUIZ";
                                   }
                            ?> </title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
	   <?php include("./components/header.php");
	   ?>
      
       <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
       <link type="text/css" rel="stylesheet" href="assest/css/mobile.css">
       <link type="text/css" rel="stylesheet" href="assest/css/quiz.css">
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
           <div class="pg"><a href="Dashboard">Dashboard</a>/<?php
                                   if($_SESSION['v'] == 2){
                                       echo "EDUDE EXAM System";
                                   }else if($_SESSION['v'] == 3){
                                       echo "EDUDE EXAM System";
                                   }else{
                                       echo "Unauthorize for EXAM or QUIZ";
                                   } ?>
                                       
            </div>
            <div class='container box err'>
                <h3><?php echo $pg;?></h3>
            </div>
		    <div class="fluid-container head-q">
		        <div class="row">
		            <div class="col-xs-4 col-md-4 col-lg-4 imgx">
		                <img src="assest/img/hor.png">
		            </div>
                    <div class="col-xs-8 col-md-8 col-lg-8 hx">
		                <h1><?php  
                                   if($_SESSION['v'] == 2){
                                       echo "EDUDE EXAM/QUIZ Management System";
                                   }else if($_SESSION['v'] == 3){
                                       echo "EDUDE EXAM/QUIZ System";
                                   }else{
                                       echo "Unauthorize for EXAM/QUIZ";
                                   }
                            ?>   
                        </h1>
		            </div>
		        </div>
                <div class="row bd-q">
                    <div class="col-md-3 col-lg-3 col-xl-3 naw-lt">
                        <!--left Navigation menu-->
                        <ul>
                            <li><a href="#" onclick='getpage("secure/quiz.php?page=main&i=1");'>EXAM HOME</a></li>
                            <li><a href="#" onclick='<?php  
                                   if($_SESSION['v'] == 2){
                                       echo 'getpage("secure/quiz.php?page=addexam&i=1");';
                                   }else if($_SESSION['v'] == 3){
                                       echo 'getpage("secure/quiz.php?p=exam&st=2");';
                                   }else{
                                       echo '#';
                                   }
                            ?>   '>
                                <?php  
                                   if($_SESSION['v'] == 2){
                                       echo "ADD EXAM";
                                   }else if($_SESSION['v'] == 3){
                                       echo "EXAM Schedule";
                                   }else{
                                       echo "Unauthorize for EXAM/QUIZ";
                                   }
                            ?>   
                                
                            </a></li>
                            <li><a href="#"  onclick='<?php  
                                   if($_SESSION['v'] == 2){
                                       echo 'getpage("secure/quiz.php?page=addques&i=1");';
                                   }else if($_SESSION['v'] == 3){
                                       echo 'getpage("secure/quiz.php?p=viewresults&st=2");';
                                   }else{
                                       echo '#';
                                   }
                            ?>   '>
                                <?php  
                                   if($_SESSION['v'] == 2){
                                       echo "ADD QUESTIONS";
                                   }else if($_SESSION['v'] == 3){
                                       echo "RESULTS";
                                   }else{
                                       echo "Unauthorize for EXAM/QUIZ";
                                   }
                            ?>     
                            </a></li>
                            <li><a href="#"  onclick='<?php  
                                   if($_SESSION['v'] == 2){
                                       echo 'getpage("secure/quiz.php?page=viewques&i=1");';
                                   }else if($_SESSION['v'] == 3){
                                       echo 'getpage("secure/quiz.php?p=viewresults&st=2");';
                                   }else{
                                       echo '#';
                                   }
                            ?>   '>
                                <?php  
                                   if($_SESSION['v'] == 2){
                                       echo "View Questions";
                                   }else if($_SESSION['v'] == 3){
                                       echo "Exam Appear";
                                   }else{
                                       echo "Unauthorize for EXAM/QUIZ";
                                   }
                            ?>   
                                
                            </a></li>
                            <li><a href="#"  onclick='<?php  
                                   if($_SESSION['v'] == 2){
                                       echo 'getpage("secure/quiz.php?page=viewresult&i=1");';
                                   }else if($_SESSION['v'] == 3){
                                       echo 'getpage("secure/quiz.php?page=main&i=1");';
                                   }else{
                                       echo '#';
                                   }
                            ?>   '>
                                <?php  
                                   if($_SESSION['v'] == 2){
                                       echo "STUDENT RESULTS";
                                   }else if($_SESSION['v'] == 3){
                                       echo "MORE Quizes";
                                   }else{
                                       echo "Unauthorize for EXAM/QUIZ";
                                   }
                            ?>   
                                
                            </a></li>
                            <li><a href="<?php  
                                   if($_SESSION['v'] == 2){
                                       echo 'Dashboard';
                                   }else if($_SESSION['v'] == 3){
                                       echo 'Dashboard';
                                   }else{
                                       echo 'Dashboard';
                                   }
                            ?>   ">
                                <?php  
                                   if($_SESSION['v'] == 2){
                                       echo "<- BACK TO DASHBOARD";
                                   }else if($_SESSION['v'] == 3){
                                       echo "<- BACK TO DASHBOARD";
                                   }else{
                                       echo "<- BACK TO DASHBOARD";
                                   }
                            ?>   
                                
                            </a></li>
                        </ul>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-8 naw-rt">
                        <!--right body-->
                        
                        <div class="fluid-container q-body" id="q-body">
                            
                            <!-- AJAX OUTPUT HERE -->
                            
                        </div>
                        
                    </div>
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
                    
                    getpage('secure/quiz.php?page=main&i=1');
                    
                    
                    
                   
                });
                /*function examaddfun(ele){
                     $(ele).on("submit",function(e){
	                                 e.preventDefault();
	                                 if($("#addexam [name='tname']").val() === ''){
		                                 $("#addexam [name='tname']").css("border","1px solid red");
	                                 }else{
		
		                                    var sendData = $( this ).serialize();
		                                    $.ajax({
			                                           type: "POST",
			                                           url: "secure/quiz.php?page=addexam&i=1",
			                                           data: sendData,
			                                           success: function(data){
                                                                getpage('secure/quiz.php?page=addexam&i=1');
				                                                $(".response_msg").text(data);
				                                                $(".response_msg").slideDown().fadeOut(3000);
				                                                $("#addexam").find("input[type=text], input[type=number], select").val("");
			                                                   }
			
		                                   });
	                                    }
                          });
	
                        $(ele+" input").blur(function(){
	                              var checkValue = $(this).val();
	                              if(checkValue != '')
	                              {
		                                 $(this).css("border","1px solid #eeeeee");
	                      }
                     });
                }*/
                function getpage(url){
                    
                    $.ajax({
                                      	type: "GET",
	                                    url: url,
	                                    success: function(msg){
		                                         $('#q-body').html(msg);
	                                  }
                                      
                                });
                }
            </script>
	</body>
</html>