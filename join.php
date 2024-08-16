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

$data = $_SESSION['data'];
$page = "<SPAN>NOT AVAILABLE!</SPAN>";
$i =1;
$tpm = "NO Lecture!";
if(isset($_REQUEST['c'])){
    $title = $_REQUEST['n'];
    if($_SESSION['v'] == 2){
        //for teacher
        $own = 'true';
        $uid = $data['id'];
        $user = $data['name'];
        $lec = lec_teach($db,$data['id']);
        if(!empty($lec['classid'])){
              $room = md5($lec['classid']);
              $classurl = "https://edude.daily.co/".$room;
              $user .=" : ".$lec['Subject']." Teacher";
              $i = 0;
        }else{
            $classurl = "non";
            //header('location: Dashboard.php');
        }
        
    }else if($_SESSION['v'] == 3){
        //for students
        $own = 'false';
        $uid = $data['id'];
        $user = $data['name'];
        $room = md5(substr($uid,0,5));
        if(lec_chk()){
              $classurl = "https://edude.daily.co/".$room;
              $tpm = "Classroom";
               $i = 1;
        }else{
            $classurl = "non";
        }
    }else{
        header('location: Dashboard');
    }
}else{
    header('location: Dashboard');
}

?>

<html>
   <head>
       <title><?php echo $title; ?></title>
       <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	   <?php include("./components/header.php");
	   ?>
	   <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
       <link type="text/css" rel="stylesheet" href="assest/css/page.css">
	</head>
	<body class="">
	   <div class="ehead">
		   <?php
		      include("components/nav.php");
		   ?>
	   </div>
	   <div class="fluid-container ebody">
		       <div class="pg"><a href="Dashboard.php">Dashboard</a>/<?php if(!empty($lec['classid'])){print_r($lec['Subject']." Class");}else{ echo $tpm;} ?></div>
		       <div class="lec" >
		               <iframe id="root" width="100%" height="540px" allow="camera;microphone">
		                   Wait till we connect
		               </iframe>
		                 
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
            <script crossorigin src="https://unpkg.com/@daily-co/daily-js"></script>
            <script src="assest/js/app.js"></script>
            
            <script>
                function createFrameAndJoinRoom() {
                            //window.callFrame = window.DailyIframe.createFrame();
                            //import Daily from '@daily-co/react-native-daily-js';
                            let callframe = window.DailyIframe.wrap(document.getElementById('root'),{showLeaveButton: false,
  showFullscreenButton: true});
                            callframe.join({ url: '<?php echo $classurl;?>',
                                             token: '<?php if($i=0){if(!empty($lec['classid'])){ echo token($room,$user,$uid,$own);}}else{echo token($room,$user,$uid,$own);}?>'
                                           });
                }
                 function checkTimeout() {
                          var now = new Date();
                          var minutes = now.getMinutes();
                          console.log(minutes);
                          if (minutes >= 59) {
                                location.href = 'Dashboard';
                          }
                }
                $(document).ready(function(){
                    <?php if($_SESSION['v'] == 2){ echo "var i = 0;";}else if($_SESSION['v'] == 3){  echo "var i = 1;";
                }?> 
                    $("#oc").click(function(){
                        $("#navi").toggleClass("dis");
                         $(".ebody").toggleClass("off");
                        console.log("clicking");
                     });
                    $("#navi").click(function(){
                        $("#navi").toggleClass("dis");
                        $(".ebody").toggleClass("off");
                    });
                   createFrameAndJoinRoom();
                   if(i == 0){
                   setInterval(checkTimeout, 1000);
                   }
                });
               


                
            </script>

	</body>
</html>