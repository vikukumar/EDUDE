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
$id = "";
$err = "";
$qid = 0;
require_once('./secure/connection.php');
require_once('./secure/session.php');	


if(isset($_SESSION['v'])!=2){
	  header("location: Dashboard");
}else{
    //code to show page
    if(isset($_REQUEST['id'])){
        $db = local();
        $id = $_REQUEST['id'];
        $qid = $_REQUEST['qid'];
        //require_once('./secure/quiz.php');
        $opt = questiontbl($db,$qid,$id);
        if(isset($_POST['addques'])){
           
            $sql = "INSERT INTO edu_".$id."_exam_".$qid." values(NULL,'".$_POST['q']."','".$_POST['o1']."','".$_POST['o2']."','".$_POST['o3']."','".$_POST['o4']."','".$_POST['co']."' )";
            if(mysqli_query($db,$sql)){
                $err = "<div class='fluid-container' style='background:green;color:white;'>Question Successfully added. Add more question in Exam. <a href='Dashboard'>Click Here</a> to Go to Dashboard</div>";
            }else{
                $err = "<div class='fluid-container' style='background:red;color:white;'>	&#9888; Error Occured!<br>Contact EDUDE Admin to Solve the issues!</div> <br>".$db -> error;
            }
            mysqli_close($db);
        }
    }else{
        header("location: Exam");
    }
}


?>

<html>
   <head>
       <title>EDUDE:Exam Management </title>
	   <?php include("./components/header.php");
	   ?>
      
       <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
       <link type="text/css" rel="stylesheet" href="assest/css/quiz.css">
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
           <div class="pg"><a href="Exam">Exam System</a>/Add Question</div>
           <div class='fluid-container ques'>
               <div class="container hed">
                   <h1>EDUDE Question Management System</h1>
                   <br>
                   <label>Class id: <?php echo $id;?> </label>
                   <label>Exam id: <?php echo $qid;?> </label>
                   <label>Teacher id: <?php echo $data['id'];?> </label>
               </div>
               <div class="container">
                  <div class="err"><?php echo $err; ?></div>
                  <div class="form-wrapper">
                     <form method="post" name="question" action=''>
                         <div class='question'>
                             <div class="row">
                                 <div class="col-md-3">
                                     <label for="q">Question: </label>
                                 </div>
                                 <div class="col-md-9">
                                     <textarea name="q" placeholder="Enter your Question Here....." maxlength="1000"required></textarea>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-3">
                                     <label for="o1">Option 1: </label>
                                 </div>
                                 <div class="col-md-9">
                                    <input type="text" name="o1" placeholder="Enter Option A here" required>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-3">
                                     <label for="o2">Option 2: </label>
                                 </div>
                                 <div class="col-md-9">
                                    <input type="text" name="o2" placeholder="Enter Option B here" required>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-3">
                                     <label for="o3">Option 3: </label>
                                 </div>
                                 <div class="col-md-9">
                                    <input type="text" name="o3" placeholder="Enter Option C here" required>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-3">
                                     <label for="o4">Option 4: </label>
                                 </div>
                                 <div class="col-md-9">
                                    <input type="text" name="o4" placeholder="Enter Option D here" required>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-3">
                                     <label for="co">Correct Answer : </label>
                                 </div>
                                 <div class="col-md-9">
                                    <input type="text" name="co" placeholder="Enter Correct Answer" required>
                                 </div>
                             </div>
                             <div class="row">
                             <div class="col-md-12">
                                 <input type="submit" name="addques" value="ADD QUESTION">
                             </div>
                         </div>
                         </div>
                         
                     </form>
                   </div>
                </div>
               <a class="btn" href="Exam">Back</a>
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
                
            </script>
	</body>
</html>