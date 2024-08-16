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
 * APIs          : edude api, mailjet APIs , daily APIS (Both are only in Prototype)
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
require_once('connection.php');
require_once('session.php');
/************************************************************************************************************************
                                 Teacher APIs edude quiz
*************************************************************************************************************************/

if($_REQUEST['i'] == 1){
    $req = $_REQUEST['page'];
    
    echo body_req($req);
}
if(isset($_REQUEST['id'])){
    $req = $_REQUEST['id'];
    $db = local();
    $data = $_SESSION['data'];
    echo showexam($db,$req,$data['id']);
    //mysqli_close($db);
}
 if($_REQUEST['d'] == 1){
     
   if(isset($_REQUEST['iv'])){
       $db = local();
      $data = $_SESSION['data'];
      echo viewexam($db,$_REQUEST['iv'],$data['id']);
     // mysqli_close($db);
    }
     if(isset($_REQUEST['tb'])){
         $db = local();
         $tbl = $_REQUEST['tb'];
         echo viewqq($db,$tbl);
        
    }
  }


/*if(isset($_POST)){
    
    if(isset($_POST['addexam'])){
        $data = $_SESSION['data'];
        $pg = $_POST['tname'];
        $pg .= "<br> ".$_POST['sname'];
        $pg .= "<br> ".$_POST['ccode'];
        $pg .= "<br> ".$_POST['stime'];
        $pg .= "<br> ".$_POST['dur'];
        $pg .= "<br> ".$data['id'];
        echo $pg;
    }
}*/
function body_req($req){
    $db = local();
    $data = $_SESSION['data'];
    if($req == 'main'){
        return main($data);
    }else{
        if($req == 'addexam'){
              return addexampg($db,$data);
        }else if($req == 'addques') {
            return addquestionpage($db,$data['id']);
            }else if($req == 'viewques'){
                   return viewquestionpage($db,$data['id']);
           
        }else if($req == 'viewresult'){
            return "<h1>Available Soon</h1>";
        }
    }
    
}
function main($data){
    
    $pg = "<div class='fluid-container'>
            <div class='row'>
                <div class='col-sm-12 col-md-12 col-lg-12 col-ls-12'>
                  <h1>WELCOME TO EDUDE Exam System </h1>
                  <hr>
                  <div class='err'></div>
                 </div>
            </div>
            <div class='row'>
                 <div class='col-sm-6 col-md-6 col-lg-6 col-ls-6 q-d'>
                             <label for='id'>User Id: ".$data['id']."</label><br>
                             <label for='name'>User Name: ".$data['name']."</label><br>
                             <label for='email'>User Email: ".$data['email']."</label><br>
                             <label for='role'>User Role: ".$data['role']."</label><br>
                 </div>
                
                 <div class='col-sm-4 col-md-4 col-lg-4 col-ls-4 q-d'>
                   ".welcome()."
                 </div>
              </div>
             </div>
             ";
    return $pg;
}
function welcome(){
    if($_SESSION['v'] == 2){
        return "You Can Asign or Manage Test/Exam here for your Students!";
    }
    if($_SESSION['v'] == 3){
        return "You Can Give your exam or test here!";
    }
}


function addexampg($db,$data){
    date_default_timezone_set("Asia/Kolkata");
    $sql = "select id,name from edu_".substr($data['id'],0,3)."_classes;";
    $res = mysqli_query($db,$sql);
    $ng="";
    if($res){
         while($row = mysqli_fetch_assoc($res)) {
            $ng .= "<option value='".$row['id']."'>".$row['id']." :: ".$row['name']."</option>";
        }

    }
    $pg = "<div class='fluid-container'>
              <div class='row'>
                <div class='col-sm-12 col-md-12 col-lg-12 col-ls-12'>
                  <h1>ADD Your Exam </h1>
                  <hr>
                 </div>
              </div>
              <div class='form-wrapper'>
              <div class='response_msg'></div>
              <form class='form' method='post' action='' name='addexam' id='addexam'>
                 <div class='row'>
                     <div class='col-md-4'>
                          <label for='tname'>Exam Name:</label>
                     </div>
                     <div class='col-md-8'>
                          <input type='text' name='tname' Palaceholder='Exam Name' required>
                     </div>
                 </div>
                 <div class='row'>
                     <div class='col-md-4'>
                          <label for='sname'>Subject Name:</label>
                     </div>
                     <div class='col-md-8'>
                          <input type='text' name='sname' Palaceholder='Subject Name' required>
                     </div>
                 </div>
                 <div class='row'>
                     <div class='col-md-4'>
                          <label for='ccode'>Choose Your Class:</label>
                     </div>
                     <div class='col-md-8'>
                          <select name='ccode' required>
                               <option value='none' selected disabled hidden>Select Class</option>
                               ".$ng."
                          </select>
                     </div>
                 </div>
                 <div class='row'>
                     <div class='col-md-4'>
                          <label for='stime'>Schedule Date & Time:</label>
                     </div>
                     <div class='col-md-8'>
                          <input type='datetime-local' name='stime' required>
                     </div>
                 </div>
                 <div class='row'>
                     <div class='col-md-4'>
                          <label for='dur'>Duration of Exam (in minute):</label>
                     </div>
                     <div class='col-md-8'>
                          <input type='number' name='dur' Palaceholder='Duration of Exam' required>
                     </div>
                 </div>
                 <div class='row'>
                     <div class='col-md-12'>
                         <input type='submit' name='ADDExam' Value='ADD EXAM'>
                     </div>
                     
                 </div>
              </form>
              </div>
         </div>
    ";
    mysqli_close($db);
    return $pg;
}
function quiztbl($db,$class){
    $sql = "create table IF NOT EXISTS edu_".$class."_quiz(
        qid int Primary key AUTO_INCREMENT , 
        name varchar(100) not null , 
        sub  varchar(100) not null ,
        date datetime not null ,
        duration int(11) not null ,
        teacher varchar(20) , FOREIGN KEY (teacher) REFERENCES edu_".substr($class,0,3)."_teacher(teacher_id)
    );";
    $tp = mysqli_query($db,$sql);
    
    return $tp;
}






function addquestionpage($db,$tcode){
    $pg = '<div class="container">
            <div class="row">
              <div class="col-md-6 naw-lt" style="border:none;">
              <h3> Choose your Class</h3>
            <br>';
    $sql = 'Select id , name from edu_'.substr($tcode,0,3)."_classes ;";
    $res = mysqli_query($db,$sql);
    if($res){
        $pg .="<ul>";
         while($row = mysqli_fetch_assoc($res)) {
             $pg .= "<li><a href='#' onclick='showexam(\"".$row['id']."\");' >".$row['name']."</a></li>";
         }
        $pg .="</ul>
               </div>
               <div class='col-md-6 naw-lt' id='exam' style='border:none;'>
               </div>
               </div>
               </div>";
        $pg .="<script>
        
        
                 function showexam(id){
                      $.ajax({
                                      	type: 'GET',
	                                    url: 'secure/quiz.php?id='+id,
	                                    success: function(msg){
		                                         $('#exam').html(msg);
	                                  }
                                      
                                });
                 }
                 
                 </script>";
    }
    mysqli_close($db);
    return $pg;
}

function showexam($db,$id,$tcode){
    $pg = "<h3>Select Exam from here</h3>
           <br>
           <ul>";
    $sql = 'Select qid , name from edu_'.$id.'_quiz where teacher ='.$tcode;
    $res = mysqli_query($db,$sql);
    if($res){
        $pg .="<ul>";
         while($row = mysqli_fetch_assoc($res)) {
             $pg .= "<li><a href='addques.php?id=".$id."&qid=".$row['qid']."' >".$row['name']."</a></li>";
         }
        $pg .="</ul>";
    }
    mysqli_close($db);
    return $pg;
}
function viewquestionpage($db,$tcode){
    $pg = '<div class="row">
              <div class="col-md-3" style="border:none;">
              <h3> Choose your Class: </h3>';
    $sql = 'Select id , name from edu_'.substr($tcode,0,3)."_classes ;";
    $res = mysqli_query($db,$sql);
    if($res){
        $pg .="<select onchange='viewexam(this.value);' ><option value='none' disabled selected>Choose Class</option>";
         while($row = mysqli_fetch_assoc($res)) {
             $pg .= "<option value='".$row['id']."'>".$row['name']."</option>";
         }
        $pg .="</select>
              <br>
               </div>
               <div class='col-md-9' id='se' style='border:none;'>
               </div>
              
               </div>";
        $pg .="<script>
        
        
                 function viewexam(id){
                      console.log('yes');
                      $.ajax({
                                      	type: 'GET',
	                                    url: 'secure/quiz.php?iv='+id+'&&d=1',
	                                    success: function(msg){
		                                         $('#se').html(msg);
	                                  }
                                      
                                });
                 }
                 
                 </script>";
    }
    mysqli_close($db);
    return $pg;
}
function viewexam($db,$id,$tcode){
    $pg = "<h3>Select Exam from here</h3>
           <br>
           ";
    $sql = 'Select qid , name from edu_'.$id.'_quiz where teacher ='.$tcode;
    $res = mysqli_query($db,$sql);
    if($res){
        $pg .="<Select onChange='viewquestion(this.value)'><option value='none' disabled selected>Choose Exam</option>";
         while($row = mysqli_fetch_assoc($res)) {
             $pg .= "<option value='edu_".$id."_exam_".$row['qid']."'>".$row['name']."</option>";
         }
        $pg .="</select>
               <br>
               <div class='row'>
               <br>
               <div class='col-md-12' id='q' style='margin-top:10px;border:none;text-align:left;overflow-y:scroll;font-size:16px;height:400px;'>
                
               </div>
               </div>
                 ";
        $pg .="<script>
        
        
                 function viewquestion(id){
                      
                      $.ajax({
                                      	type: 'GET',
	                                    url: 'secure/quiz.php?tb='+id+'&&d=1',
	                                    success: function(msg){
		                                         $('#q').html(msg);
	                                  }
                                      
                                });
                 }
                 
                 </script>";
    }
    mysqli_close($db);
    return $pg;
}



function viewqq($db , $tbl){
    $pg="";
    $sql = "Select * From ".$tbl." ";
   
    $res = mysqli_query($db,$sql);
    if($res){
         while($row = mysqli_fetch_assoc($res)) {
             $op1 = $row['option1'];
             $op2 = $row['option2'];
             $op3 = $row['option3'];
             $op4 = $row['option4'];
             $co = $row['correct'];
             $pg .= "<pre><div class='container'>";
             $pg .= "<h4>".$row['qno'].": ".$row['question']."</h4>";
             $pg .= "<ol type='A' style='display:block;padding: 5px 20px;'>";
             $pg .= "<li style='".optchk($op1 , $co)."'>".$op1."</li>";
             $pg .= "<li style='".optchk($op2 , $co)."'>".$op2."</li>";
             $pg .= "<li style='".optchk($op3 , $co)."'>".$op3."</li>";
             $pg .= "<li style='".optchk($op4 , $co)."'>".$op4."</li>";
             $pg .= "</ol></div></pre>";
         }
    }
    mysqli_close($db);
    return $pg;
}

function optchk($op1 , $op2){
    $t ="";
    if($op1 == $op2){
       $t = "color:green;";
    }
    return $t;
}


/************************************************************************************************************************
                                 Student APIs edude quiz
*************************************************************************************************************************/
if(isset($_REQUEST['st']) && $_REQUEST['st'] == 2 ){
    //Student Action here
    if(isset($_REQUEST['p'])){
        if($_REQUEST['p'] == 'exam'){
            $code = $_SESSION['data'];
            echo examschedule($code['id']);
        }else if($_REQUEST['p'] == 'viewresults'){
            $code = $_SESSION['data'];
            echo viewresults($code['id']);
        }
    }
    
}



function examschedule($code){
    $pg ="<div class='row'><div class='col-md-12'><h1>All Exams/Tests</h1></div></div>
          <div class='row'><div class='col-md-12 naw-lt' style='border:none;text-align:left;'><ul class='std-exam'>";
    $db = local();
    $sql = "select * from edu_".substr($code,0,5)."_quiz";
    $res = mysqli_query($db,$sql);
    if($res){
         while($row = mysqli_fetch_assoc($res)) {
             $pg .= "<li><a href='examroom?exam=".$row['qid']."&time=".$row['date']."&dur=".$row['duration']."&std=".$code."'>";
             $pg .= "<center><h3>".$row['qid'].": ".$row['name']."</h3></center><hr><h4>Subject: ".$row['sub']."<span style='text-align:right;color:green; font-weight:900;'> Time to Start: ".$row['date']."</span></h4> <h5> Duration of Exam: ".$row['duration']." Minutes </h5></a></li>";
         }
        $pg .= "</ul></div></div>";
    }
    mysqli_close($db);
    return $pg;
}

function viewresults($code){
    $pg ="<div class='row'><div class='col-md-12'><h1>All Exams Results</h1></div></div>
          <div class='row'><div class='col-md-12 naw-lt' style='border:none;text-align:left;'>";
    $db = local();
    $sql = "select * from edu_".$code."_marks";
    $res = mysqli_query($db,$sql);
    if($res){
        if(mysqli_num_rows($res) > 0){
            $i=1;
         while($row = mysqli_fetch_assoc($res)) {
             $per = ($row['marks']/$row['total']) * 100 ;
             $result ="";
             if($per >= 30){
                 $result ="Pass";
             }else{
                 $result ="Fail";
             }
             $pg .= "<pre><div class='row e-results'><div class='col-md-12'><h1> ".$i++.": ".$row['name']." </h1><hr></div>";
             $pg .= "<div class='col-md-6 re'>Marks: ".$row['marks']."/".$row['total']."</div><div class='col-md-6'>Percentage: ".$per."%</div>";
             $pg .= "<div class='col-md-12 res'>Result: ".$result."</div></div></pre>";
         }
        }else{
               $pg .="<h1> NO Result Found! Please Appear in at least 1 Exam.</h1>";
           }
        
    }else{
        $pg .="<h1> NO Result Found! Contact Admin for error </h1>";
    }
    $pg .= "</div></div>";
    mysqli_close($db);
    return $pg;
}

function studentmarkstbl($code){
    $db = local();
    $sql = "Create table if not exists edu_".$code."_marks(
            mid int primary key auto_increment ,
            name varchar(100) not null ,
            qid int not null , FOREIGN KEY (qid) REFERENCES edu_".substr($code,0,5)."_quiz(qid) ,
            marks int not null ,
            total int not null ,
            date datetime not null
            
    )";
    $res = mysqli_query($db, $sql);
    mysqli_close($db);
    return $res;
}

function questionbox($tbl){
    $db = local();
    $pg .= "<div class='container questions'>
               <div class='form-wrapper'>
                  <form method='post' action='' name='test' id='submit-exam' class='form'>";
    $sql = "select * from ".$tbl." ORDER BY RAND()";
    $res = mysqli_query($db , $sql);
    if($res){
        $i =0;
         while($row = mysqli_fetch_assoc($res)) {
             $pg .= "<div class='form-group' id='".$row['qno']."' >";
             $pg .= "<div class='row'><div class='col-md-12'><h3>Question ".++$i.": ".$row['question']."</h3></div></div>";
             
             $pg .= "<div class='row'><div class='col-md-12'><input type='radio' name='".$row['qno']."' value='".$row['option1']."'><label for='".$row['qno']."'>".$row['option1']."</label></div></div>";
             
             $pg .= "<div class='row'><div class='col-md-12'><input type='radio' name='".$row['qno']."' value='".$row['option2']."'><label for='".$row['qno']."'>".$row['option2']."</label></div></div>";
             
             $pg .= "<div class='row'><div class='col-md-12'><input type='radio' name='".$row['qno']."' value='".$row['option3']."'><label for='".$row['qno']."'>".$row['option3']."</label></div></div>";
             
             $pg .= "<div class='row'><div class='col-md-12'><input type='radio' name='".$row['qno']."' value='".$row['option4']."'><label for='".$row['qno']."'>".$row['option4']."</label></div></div>";
             
             $pg .= "</div>";
             
         }
        $pg .= "<div class='row'><div class='col-md-12'><input type='submit' id='examsubmit' name='examsubmit' value='Submit answer'</div></div>";
        $pg .= "</form></div></div>";
    }
    mysqli_close($db);
    return $pg;
}



function chk_exam_given($exam , $std){
    $db = local();
    $op = false;
    $sql = "select qid from edu_".$std."_marks where qid=".$exam." ";
    $res = mysqli_query($db, $sql);
    if($res){
        if(mysqli_num_rows($res) > 0){
             while($row = mysqli_fetch_assoc($res)) {
                 if($row['qid'] == $exam){
                     $op = true;
                 }
             }
        }else{
            $op = false;
        }
       
    }
    
    mysqli_close($db);
    return $op;
}



function time_diff($date2 , $date1){
    $res = array();
    $diff = abs($date2 - $date1); 
    $years = floor($diff / (365*60*60*24)); 
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
    $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
    $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60)); 
    
    $op = false;
    if(($years == 0) && ($months == 0) && ($days == 0) && ($hours == 0) && ($minutes == 0) && ($seconds == 0) ){
        $op = true;
    }else{
        printf("%d years, %d months, %d days, %d hours, "
     . "%d minutes, %d seconds", $years, $months,
             $days, $hours, $minutes, $seconds); 
    }
// Print the result
  return $op;
}

function checkans($tbl , $answer){
    $db = local();
    $m = 0;
    $t =0;
    $sql = "select qno , correct from ".$tbl;
    $res = mysqli_query($db,$sql);
    if($res){
        if(mysqli_num_rows($res) > 0){
             while($row = mysqli_fetch_assoc($res)) {
                 $t++;
               
                 if($row['correct'] == $answer[$row['qno']]){
                     $m++;
                 }
             }
        }
        
    }
    $rd = [
        'marks' => $m ,
        'total' => $t
    ];
    
    mysqli_close($db);
    return $rd;
}

function addmarks($std,$exam , $m , $t){
    $db = local();
    date_default_timezone_set("Asia/Kolkata");
    $date = date('y-m-d H:i:s');
    $ename = getexamname($db,$exam , "edu_".substr($std,0,5)."_quiz");
    $sql = "insert into edu_".$std."_marks values(NULL,'".$ename."',".$exam.",".$m.",".$t.",'".$date."')";
    if(mysqli_query($db , $sql)){
        return true;
    }else{
        return false;
    }
}


function getexamname($db,$exam , $tbl){
    $sql = "Select name from ".$tbl." where qid=".$exam." ";
    $res = mysqli_query($db,$sql);
    $nm ="";
    if($res){
        if(mysqli_num_rows($res) > 0){
             while($row = mysqli_fetch_assoc($res)) {
                 $nm = $row['name'];
             }
        }
    }
    return $nm;
}
?>