<?php 
  function routinebox_class($db, $ccode){
      $sql = "Select teacherid, teachername , Subject , Time From edu_".$ccode."_routine;";
      $result = mysqli_query($db,$sql);
      $pg = rout_frame_head();
      if($result){
          if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){
                  $pg .=rout_frame($row['Time'],$row['teacherid'], $row['teachername'], $row['Subject']);
              }
          }
      }else{
          $pg .=rout_frame("Not Available!","Not Available!","Not Available!","Not Available!");
      }
        $pg .= rout_frame_end();
      return $pg;
  }
   function rout_frame_head(){
       $point = "<table style='width:100%'>
                        <tr>
                            <th>Time</th>
                             <th>Teacher Name</th>
                             <th>Teacher Id</th>
                             <th>Subject</th>
                             <th>Action</th>
                        </tr>";
       return $point;
   }
   function rout_frame($time, $id, $name, $sub){
       $point = "<tr>
                <td>".$time."</td>
                <td>".$name."</td>
                <td>".$id."</td>
                <td>".$sub."</td>
                <td> <a href=''>UPDATE</a></td>
                </tr>";
       return $point;
   }
   function rout_frame_end(){
       $point = "</table>";
       return $point;
   }




   function form_rout($db,$code){
       $pg = "<form action='' method='post' name='routine'>
              <h2> UPDATE/ADD Routine</h2>
             ";
       $pg .="<label for='time'>Time: </label>
                 <select name='time' required>
                       <optgroup label='Class Time'>
                           <option value='09:00:00'>09:00:00</option>
                           <option value='10:00:00'>10:00:00</option>
                           <option value='11:00:00'>11:00:00</option>
                           <option value='12:00:00'>12:00:00</option>
                           <option value='13:00:00'>13:00:00</option>
                           <option value='14:00:00'>14:00:00</option>
                           <option value='15:00:00'>15:00:00</option>
                           <option value='16:00:00'>16:00:00</option>
                       </optgroup>
                 </select>
             ";
       $pg .="<label for='teach'>Teacher: </label><select name='teach' required>";
       $sql = "SELECT t1.teacher_id,t1.teacher_name  FROM edu_".substr($code,0,3)."_teacher t1";
                                               /*
                                                Left JOIN edu_".$code."_routine t2 
                                                ON t2.teacherid = t1.teacher_id where t2.teacherid is NULL "*/
       $result = mysqli_query($db, $sql);
       if(mysqli_num_rows($result) > 0) {
			  while($row = mysqli_fetch_assoc($result)) {
					$pg .='<option value="'.$row['teacher_id'].'" >'.$row['teacher_id'].': '.$row['teacher_name'].'</option>';
			 }
		}else{
			$pg .='<option value="">No Teacher Found!</option>';
        }
       $pg .="</select>";
       
       $pg .="<label for='sub'>Subject: </label><input type='text' name='sub' Placeholder='Enter Subject' required>";
       $pg .= "<input type='submit' value='ADD/UPDATE' name='route'>";
       
       $pg .="</form>";
       return $pg;
   }

   function get_name($db,$code){
       $sql = "Select teacher_name from edu_".substr($code,0,3)."_teacher where teacher_id='".$code."';";
       $res = mysqli_query($db,$sql);
       $op = "";
       if($res){
           
           if(mysqli_num_rows($res)>0){
               while($row = mysqli_fetch_assoc($res)) {
					$op = $row['teacher_name'];
			 }
           }
       }
      return $op;
   }
   
   function get_c_name($db,$code){
       $sql = "Select name from edu_".substr($code,0,3)."_classes where id='".$code."';";
       $res = mysqli_query($db,$sql);
       $op = "";
       if($res){
           
           if(mysqli_num_rows($res)>0){
               while($row = mysqli_fetch_assoc($res)) {
					$op = $row['name'];
			 }
           }
       }
      return $op;
   }

   function check($db,$code, $time){
       $v = false;
       $sql = "Select * from edu_".$code."_routine where Time = '".$time."'";
       $res = mysqli_query($db,$sql);
       if($res){
           if(mysqli_num_rows($res)>0){
               while($row = mysqli_fetch_assoc($res)) {
					 if($row['Time'] == $time){
					     $v=true;
					 }
			 }
           }
       }
       return $v;
   }




   function addroutinec($db, $time, $tcode,$code,$sub){
       $id = 0;
       if($time == '09:00:00'){
           $id = 1;
       }else if($time == '10:00:00'){
           $id = 2;
       }else if($time == '11:00:00'){
           $id = 3;
       }else if($time == '12:00:00'){
           $id = 4;
       }else if($time == '13:00:00'){
           $id = 5;
       }else if($time == '14:00:00'){
           $id = 6;
       }else if($time == '15:00:00'){
           $id = 7;
       }else if($time == '16:00:00'){
           $id = 8;
       }else{
           $id =-1;
       }
       require_once('session.php');
       tblrout_c($db,$code);
       tblrout_t($db,$tcode);
       remove_lec($db ,getrout_teacher($db,$code,$time), $time);
       $sql = "REPLACE INTO edu_".$code."_routine VALUES (".$id.",'".$tcode."','".get_name($db,$tcode)."','".$sub."','".$time."')";
       if(mysqli_query($db,$sql)){
           $sql  = "REPLACE INTO edu_".$tcode."_routine VALUES (".$id.",'".$code."','".get_c_name($db,$code)."','".$sub."','".$time."')";
           if(mysqli_query($db,$sql)){
               return true;
           }else{
               return false;
           }
       }else{
               return false;
        }
   }


  function lec_teach($db,$tcode){
      $data = array();
      date_default_timezone_set("Asia/Kolkata");
      $id =0;
      if(date('H') == '09'){
          $id =1;
      }else if(date('H') == '10'){
          $id =2;
      }else if(date('H') == '11'){
          $id =3;
      }else if(date('H') == '12'){
          $id = 4;
      }else if(date('H') == '13'){
          $id = 5;
      }else if(date('H') == '14'){
          $id = 6;
      }else if(date('H') == '15'){
          $id = 7;
      }else if(date('H') == '16'){
          $id = 8;
      }
      $sql = "SELECT * From edu_".$tcode."_routine where sno = ".$id;
      $res = mysqli_query($db,$sql);
      if($res){
           while($row = mysqli_fetch_assoc($res)) {
               $data['classid'] = $row['classid'];
               $data['classname'] = $row['classname'];
               $data['Subject'] = $row['Subject'];
           }
      }
     return $data;
  }

  function lec_chk(){
      date_default_timezone_set("Asia/Kolkata");
      $id =0;
      if(date('H') == '09'){
          $id =1;
      }else if(date('H') == '10'){
          $id =1;
      }else if(date('H') == '11'){
          $id =1;
      }else if(date('H') == '12'){
          $id = 1;
      }else if(date('H') == '13'){
          $id = 1;
      }else if(date('H') == '14'){
          $id = 1;
      }else if(date('H') == '15'){
          $id = 1;
      }else if(date('H') == '16'){
          $id = 1;
      }
      return $id;
  }

  function getrout_teacher($db,$code,$time){
           $re ="";
           $sql = "Select teacherid from edu_".$code."_routine where Time='".$time."'";
           $res = mysqli_query($db,$sql);
           if($res){
           if(mysqli_num_rows($res)>0){
               while($row = mysqli_fetch_assoc($res)) {
					 $re = $row['teacherid'];
			    }
             }
          }
          return $re;
  }
  function remove_lec($db ,$otcode, $time){
        $sql ="Delete from edu_".$otcode."_routine where Time='".$time."'";
        mysqli_query($db,$sql);
  }
?>