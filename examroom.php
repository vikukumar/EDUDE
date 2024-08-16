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
 * APIs          : edude apis, mailjet APIs ,daily APIS (Both are only in Prototype)
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
//require_once("./secure/connection.php");
require_once("./secure/quiz.php");
$page ="";
$script ="";
$exam ="";
$time ="";
$dur ="";
$std = "";
if($_SESSION['v'] == 3){
    //run codes here
    $exam ='';
    $time ='';
    $dur =0;
    $std = '';
    if(!isset($_REQUEST) || empty($_REQUEST) || empty($_GET)){
         header('location: Exam');
    }
    if(isset($_REQUEST)){
        if(!isset($_REQUEST['exam']) || !isset($_REQUEST['time']) || !isset($_REQUEST['dur']) || !isset($_REQUEST['std'])){
            header('location: Exam');
        }else{
            // here get all data from link
             $exam =$_REQUEST['exam'];
             $time =$_REQUEST['time'];
             $dur =$_REQUEST['dur'];
             $std = $_REQUEST['std'];
             studentmarkstbl($std); //student marks table created 
             $today = date('Y-m-d H:i:s');
             $delay = date( "Y-m-d H:i:s", strtotime($time)+(60*30) );
             
             $tbl = "edu_".substr($std,0,5)."_exam_".$exam."";
             
             if(!chk_exam_given($exam , $std)){
                if((time_diff($time , $today)) && ($delay <= $today)){
                     $page = questionbox($tbl);
                     $script ="function startTimer(duration, display) {
                                                  var timer = duration, minutes, seconds;
                                                  var tid =setInterval(function () {
                                                                minutes = parseInt(timer / 60, 10);
                                                                seconds = parseInt(timer % 60, 10);

                                                                minutes = minutes < 10 ? '0' + minutes : minutes;
                                                                seconds = seconds < 10 ? '0' + seconds : seconds;
                                                        if(minutes>5){
                                                               display.innerHTML  = '<span>' + minutes + ':' + seconds + '</span>';
                                                           }else{
                                                               display.innerHTML  = '<span style=\"color:red;\">' + minutes + ':' + seconds + '</span>';
                                                           }
                                                        if (--timer < 0) {
                                                                    //$('#submit-exam').submit();
                                                                    $('#ques-box').hide();
                                                                    $('#examsubmit').trigger('click');
                                                                    clearInterval(tid);
                                                         }
                                                        }, 1000);
                                          }
                                          
                                          var Minutes = 60 * ".$dur.",
                                          display = document.querySelector('#timer');
                                          startTimer(Minutes, display);";
                }else {
                     //Delay Program
                    if($time > $today){
                        $page = "<div class='row'><div class='col-md-12 io'><img src='assest/img/exam/edu_teacher_6.gif'></div><div class='col-md-12'><h1 style='color:red;'> Exam not started yet come on wait till ".$time."!</h1></div><div class='col-md-12'><a href='Exam'>Back to Exam</a></div></div>";
                        $script = "//setInterval(location.reload(), 60000);
                        ";
                    }else{
                         $page = "<div class='row'><div class='col-md-12 io'><img src='assest/img/exam/edu_teacher_6.gif'></div><div class='col-md-12'><h1 style='color:red;'> You are Delay in this Exam ! Sorry Exam Expired!</h1></div><div class='col-md-12'><a href='Exam'>Back to Exam</a></div></div>";
                    }
                   
                }
                
                 
             }else{
                 //Already attempt this
                 $page = "<div class='row'><div class='col-md-12 io'><img src='assest/img/exam/edu_teacher_6.gif'></div><div class='col-md-12'><h1 style='color:red;'> You Already attempted this test check marks in Exam Dashboard!".time_diff($time , $today)."</h1></div><div class='col-md-12'><a href='Exam'>Back to Exam</a></div></div>";
             }
        }
        if(isset($_POST['examsubmit'])){
          //here submit answer work
          /*************************************************************************
          |                          Student marks table                           |
          **************************************************************************/
          //  mid , exam name , qid , marks , total , date of exam                  //
          //------------------------------------------------------------------------//
            $tbl = "edu_".substr($std,0,5)."_exam_".$exam."";
            $m  = checkans($tbl , $_POST);
           // var_dump($_POST);
           // print_r($m);
            if(addmarks($std,$exam , $m['marks'] , $m['total'])){
                header('location: Exam') ; 
            }else{
                $page = " Not Submitted";
            }
            
        }
    }else{
         header('location: Exam');
    }
    
}else{
    header('location: Exam');
}







?>


<html>
   <head>
       <title>EDUDE:Exam Time </title>
	   <?php include("./components/header.php");
	   ?>
       <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
       <link type="text/css" rel="stylesheet" href="assest/css/mobile.css">
       <link type="text/css" rel="stylesheet" href="assest/css/quiz.css">
       
	</head>
	<body>
	   <!-- Headding -->
	   <div class="ehead">
		   <nav>
	          <a href="#">
	            <img alt="logo" src='./assest/img/hor.png'>
	            <span>Exam Time</span>
	          </a>
              <div class="timer" id="timer">
                 
              </div>
	          
          </nav>
	   </div>
	   <!-- Main Body -->
	   <div class="fluid-container ebody">
           <div class="pg"><a href="#">Exam</a>/Exam Time(You go back after exam else data will automatically submit and you will mark 0 point)                        
            </div>
            <div class="container out" id='ques-box'>
                <?php echo $page; ?>
            </div>
            
	   </div>
	   <!-- footer -->
	   <div class="efoot">
	       <?php
		     //include("components/footer.php");
		   ?>
	   </div>
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
            <script src="assest/js/app.js"></script>
            <script>
                $(document).ready(function(){
                   <?php echo $script; ?>
                     document.addEventListener("contextmenu", function(evt){
                               evt.preventDefault();
                     }, false);
                     document.addEventListener("copy", function(evt){
  
                              evt.clipboardData.setData("text/plain", "Copying is not allowed on this webpage");
 

                               evt.preventDefault();
                            }, false);
                 });
            </script>
	</body>
</html>