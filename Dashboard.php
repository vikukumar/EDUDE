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
  if((isset($_SESSION['v'])) || (isset($_COKKIE['v']))){
	  require_once('./secure/connection.php');
      require_once('./secure/session.php');	
	  $db = local();
	  if(!isset($_SESSION['v'])){
		  $_SESSION['v'] = $_COKKIE['v'];
		  $_SESSION['usr'] = $_COKKIE['usr'];
		  $_SESSION['lv'] = $_COKKIE['v'];
	  }
	  if(!isset($_COKKIE['v'])){
		  setcookie(session_name(),$_COOKIE[session_name()], time()+30*24*60*60,"/");
          setcookie("uid",$_SESSION['usr'], time()+30*24*60*60,"/");
          setcookie("lv",$_SESSION['lv'], time()+30*24*60*60,"/");
          setcookie("dev",$_SERVER['HTTP_USER_AGENT'], time()+30*24*60*60,"/");
          setcookie("v",$_SESSION['v'], time()+30*24*60*60,"/");
	  }
      $pid = $_SESSION['v']?$_SESSION['v']:$_COKKIE['v'];
	  $uid = $_SESSION['usr']?$_SESSION['usr']:$_COKKIE['usr'];
      $data = fetch_data($db, $uid , $pid);
	  $_SESSION['data'] = $data;
      $res = dash($db,$pid);
      
      if($pid==2){
          if(check_CT($db, $data['id'])){
              $_SESSION['ct']=1;
              
              $res .= '<a class="copt" href="Student.php">
						   <div class="anc"></div>
				          <div class="ico"><img src="./assest/img/ico/201811.png"></div>
						  <div class="hd"><h2> @ :ADD Students</h2></div>
				       </a>
                       <a class="copt" href="edude.php?p=Routine&&pid=3">
						   <div class="anc"></div>
				          <div class="ico"><img src="./assest/img/ico/custom.png"></div>
						  <div class="hd"><h2> @ :Routine</h2></div>
				       </a>';
          }
          else{
               $_SESSION['ct']=0;
          }
      }
	  
	  
  }else{
	  header("location: home");
  }
  
  

  
?>

<html>

<head>
    <title>Dashboard:<?php echo $data['name']; ?></title>
    <?php include("./components/header.php");
	   ?>
    <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
    <link type="text/css" rel="stylesheet" href="assest/css/mobile.css">
</head>

<body class="">
    <div class="ehead">
        <?php
		      include("components/nav.php");
		   ?>
    </div>
    <div class="fluid-container ebody">
        <?php if($_SESSION['v'] == 2){ echo '<div style="background:green;color:white;font-size:18px;">
                <marquee> EDUDE Maintain classes for 59 min, For next lecture you will be on Dashboard.Click Start Lecture for Next Lecture on Time. </marquee>
        </div>';}?>
        <div class="itro">
            <div class="dtl">
                <img src="<?php echo $data['dp'];?>">
                <p>
                    <b>Name: </b><span><?php echo $data['name'];?></span>
                    <b>College:</b><span><?php echo $data['college'];?></span>
                    <b>Role: </b><span><?php echo $data['role'];?></span>
                    <b>Id: </b><span><?php echo $data['id'];?></span>
                </p>
                <br>
                <div class="err"><?php echo $data['err'];?></div>
            </div>
            <div class="l-brk">
                <!--line break-->
            </div>
            <div>
                <!-- more content --->
            </div>
        </div>
        <div class="fun">
            <!-- OPTIONS -->
            <?php
				      echo $res;
				   ?>

        </div>
        <div class="epost">
            <!--<div class="cpo"></div>-->
            <h2>Current Posts</h2>
            <div class="post">

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
        $(document).ready(function() {
            $("#oc").click(function() {
                $("#navi").toggleClass("dis");
                $(".ebody").toggleClass("off");
                console.log("clicking");
            });
            $("#navi").click(function() {
                $("#navi").toggleClass("dis");
                $(".ebody").toggleClass("off");
            });
        });

    </script>
</body>

</html>
