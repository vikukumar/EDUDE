<?php
    session_start();
    date_default_timezone_set("Asia/Kolkata");
    require_once("./secure/connection.php");
   $db = local();
   if(isset($_REQUEST['e'])){
    $title= $_REQUEST['e'];
    $body = array();
   
          $data = array();
          $sql = "Select * From edu_error where code= ".$title." ;";
          $result = mysqli_query($db,$sql);
          if($result){
              if(mysqli_num_rows($result) > 0) {
		           while($row = mysqli_fetch_assoc($result)){
		               $data['body1'] = $row['body1'];
                       $data['body2'] = $row['body2'];
                       $data['img'] = $row['img'];
		           }
                  
              }else{
              $data['body1'] = "ERROR::ERROR 321!";
              $data['body2'] = "ERROR::ERROR 321!";
              $data['img'] = "assest/img/error/error.gif";
              }
          }else{
              $data['body1'] = "ERROR::ERROR 321!";
              $data['body2'] = "ERROR::ERROR 321!";
              $data['img'] = "assest/img/error/error.gif";
          }
          mysqli_close($db);
       
       
    
   }else{
       header('location: Dashboard');
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
       <title>EDUDE : Error <?php echo $title; ?></title>
       <?php include("./components/header.php");
	   ?>
	   <link type="text/css" rel="stylesheet" href="assest/css/dash.css">
       
</head>

<body>
      <div class="ehead">
		   <?php
		      include("components/nav.php");
		   ?>
	   </div>
       <div class="fluid-container ebody">
         <!-- End Breadcrumbs -->
          <div class="pg"><a href="Dashboard">Dashboard</a>/Error <?php echo $title; ?></div>
    <section class="sc" style="background:#fff;">
      <div class="fluid-container">
        <div class="fluid-container error">
            <img height="150" src="assest/img/error/error.gif">
            <div class="err-code"><?php echo $title; ?></div>
            <div class="err-body"><?php echo $data['body1']; ?></div>
            <div class="err-dtl"><?php echo $data['body2'];?></div>
        </div>
      </div>
    </section>

    </div> <!-- footer -->
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