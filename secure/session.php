<?php
/*
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

*/

/*===================Registration Algo=======================*/
function Register($db, $cname, $cuniv , $ccode, $cemail, $cnumber, $caddress){
   //College Registeration begin
   $b= '';
   $sql = "SELECT * FROM edu_college WHERE college_code = ?";
   if($stmt = mysqli_prepare($db, $sql)){  
                   mysqli_stmt_bind_param($stmt, "s", $param_username);
                   $param_username = $ccode;
                   if(mysqli_stmt_execute($stmt)){
					  mysqli_stmt_store_result($stmt);
                      if(!(mysqli_stmt_num_rows($stmt) == 1)){   
						  
						        //Inserting College data into edu_college
						        $cid = gen_c_id($db);
						        $path = "/".$cid;   // Folder for college data
                                $pwd = substr(md5(pwdg($cname,$cuniv)),0,8);        //Password Generating for College->
                                $hpwd = hashp($pwd);               //Hashing the Password in required algo in edude
						         
                                $sql = "INSERT INTO edu_college values(".$cid.",'".$cname."','".$cemail."',NULL,NULL,NULL,".$ccode.",'".$hpwd."','".$cuniv."',".$cnumber.",'".$caddress."','assest/img/ogimg.png','edu_".$ccode."_','".$path."',DEFAULT,'https://edude.daily.co/',DEFAULT);";
						        
                                if(mysqli_query($db, $sql)){ //Successfully data inserted 
									 //mysqli_stmt_close($stmt);
									//Creating college_classes 
									
									if(teacher($db , $ccode)){  //Successfully created Classes frame
										//Creating College_Teachers
										if(classes($db, $ccode)){//Successfully created teacher frame
										 //Sending Email to  College Email Id
											//message to send on email in HTML Format->
									       
											if(email_reg($cemail, $cname,$cid, $pwd)){
												if(fol("".$cid)){
													if(fol("".$cid."/classes")){
													     if(fol("".$cid."/teachers")){
															 //Success Creation of college
													          $b= "Success";
												         }else{
										                     $b = "ERR:R009::Teacher FOLDER NOT CREATED!";
									                      }
												     }else{
										                $b = "ERR:R008::College Classes Folder Error!";
									                  }
												}else{
										             $b = "ERR:R007::College FOLDER ERROR!";
									           }
												
												
												
											}
											else{
										        $b = "ERR:R006::Sending Mail Error!";
									      }
										
										}else{
										     $b = "ERR:R005::Unable to Create College_Teacher!" ;
									      }
										
									}else{
										 $b = "ERR:R004::Unable to Create College_Class!" ;
									 }
									
								}else{
									//Unable to create college Error
									 $b = "ERR:R003::Unable to Inserted College!" ;
								}
					  }else{
                             
                             $b = "<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>Colleger already registered!<a href='app.php'>Login</a>";
                         }
				   }else{
					   $b = "ERR:R002::Checking query Failed!" ; //Error by Edude system!
				   }
   }else{
					   $b = "ERR:R001::Checking query Failed to load!" ;//Error by Edude system!
	    }
	return $b;
   
} //Successfully testing Done
function gen_c_id($db){
	
	$sql = "SELECT college_id FROM edu_college WHERE college_id=(SELECT max(college_id) FROM edu_college )";
	$stmt = mysqli_prepare($db, $sql);
     if(mysqli_stmt_execute($stmt)){
             mysqli_stmt_store_result($stmt);  
             if(mysqli_stmt_num_rows($stmt) == 1){
                      mysqli_stmt_bind_result($stmt,$id);
                      if(mysqli_stmt_fetch($stmt)){
						  $uid = $id+1;
					  }
			 }else{
				 $uid = rand(00000,99999);
			 }
	 }
	mysqli_stmt_close($stmt);
	return $uid;
}
/*===================Hash Algo=======================*/
function hashp($str){
	return md5(sha1(md5(sha1($str))));
}

/*===================Password Generation Algo=======================*/
 function pwdg($str1,$str2){
	 $str1 = str_replace(' ', '', $str1);
	 $str2 = str_replace(' ', '', $str2);
return substr($str1,rand(0,strlen($str1)),rand(0,strlen($str1)))."".substr($str2,rand(0,strlen($str2)),rand(0,strlen($str2)))."".rand(00000,999999);
	
}

/*===================Login Algo=======================*/
function login($db, $uid, $pass, $v1){
	$b = false;
	$v = (int) $v1;
	if($v == 1){
		//Operation on college
		$sql = "Select college_id , college_pass From edu_college where college_id =".$uid." ;";
		$result = mysqli_query($db, $sql);
		if($result){
		  if(mysqli_num_rows($result) == 1) {
		     while($row = mysqli_fetch_assoc($result)){
                  if(($row['college_id'] == $uid) && ($row['college_pass'] == hashp($pass))){
					  $b=true;
				  }else{
					  $b=false;
				  }
            }
	     }else{
			$b=false;
		 }
	   }
	}else{
		if($v==2){
			//operation in teacher
			$tbl= "edu_".substr($uid,0,3)."_teacher";
			$sql = "Select teacher_id, teacher_pwd from ".$tbl." where teacher_id = '".$uid."';";
			$result = mysqli_query($db, $sql);
			if($result){
		     if(mysqli_num_rows($result) == 1) {
		       while($row = mysqli_fetch_assoc($result)) {
                      if(($row['teacher_id'] == $uid) && ($row['teacher_pwd'] == hashp($pass))){
					         $b=true;
				      }else{
					      $b=false;
				       }
                }
	       }else{
		    	$b=false;
		   }
		  }else{
		    	$b=false;
		   }
		 }else{
			if($v==3){
				//operation in student;
				$tbl= "edu_".substr($uid,0,5)."_students";
				$sql = "Select Id , pwd from ".$tbl." where Id= '".$uid."';";
                $result = mysqli_query($db, $sql);
			    if($result){
		            if(mysqli_num_rows($result) == 1) {
		                  while($row = mysqli_fetch_assoc($result)) {
                              if(($row['Id'] == $uid) && ($row['pwd'] == hashp($pass))){
					               $b=true;
				               }else{
					               $b=false;
				                 }
                            }
	                   }else{
		    	           $b=false;
		                 }
		          }else{
		    	        $b=false;
		           }
			}
			else{
				$b=false;
			}
		}
	}
	return $b;
}

/*===================Teacher Table=======================*/
function teacher($db, $ccode){
	$b=false;
	$sql = "Create table IF NOT EXISTS edu_".$ccode."_teacher( teacher_id varchar(20) unique not null, teacher_name varchar(100) NOT NULL, teacher_pwd varchar(200) NOT NULL, teacher_dp varchar(100) not null DEFAULT 'assest/img/ogimg.png', teacher_subject varchar(100) NOT NULL , teacher_phone bigint(20) Not NULL primary key, teacher_email varchar(100) NOT NULL, path varchar(50) NOT NULL )";
	//$stmt = mysqli_prepare($db, $sql);
    if(mysqli_query($db, $sql)){
		$b = true;
        
	}
	//mysqli_stmt_close($stmt);
	return $b;
}

/*===================Add Teacher=======================*/
function addteacher($db,$ccode,$tname,$tsub,$tphone,$temail){
      $tcode =teachercode($ccode);
	  $tpwdg = substr(md5(pwdg($tname,"".$tcode)),0,8);
	  $tpwd = hashp($tpwdg);
	  $cid = get_ID($db,"edu_college", "college_code = ".$ccode."");
	  $tpath = "".$cid."/teachers/".$tcode;
      $sql = "Insert into edu_".$ccode."_teacher Values ('".$tcode."','".$tname."','".$tpwd."',DEFAULT,'".$tsub."',".$tphone.",'".$temail."','".$tpath."');";
	  $stmt = mysqli_prepare($db, $sql);
                 if(mysqli_stmt_execute($stmt)){
					  mysqli_stmt_close($stmt);
					  //teacher added, now creating relevant tables
					  
			           if(fol("".$cid."/teachers/".$tcode)){
						   if(email_reg($temail, $tname,$tcode, $tpwdg)){
						           $b = "Success";
						   }else{
				        	   $b = "ERR:D003::ERROR SENDMail!";
				            }
					   }else{
				        	 $b = "ERR:D002::ERROR TO ADD TEACHER FOLDER!";
				     }
				 }else{
					 $b = "ERR:D001::ERROR TO ADD TEACHER! Teacher Already Exists";
				 }
	  //  mysqli_close($db);
	    return $b;


 }

/*===================Delete Teacher=======================*/
function del_teach($db, $id){
	$b='UnSuccessful Deleted Teacher Operation '.$id;
    $path="";
	$tbl= "edu_".substr($id,0,3)."_teacher";
    $sql = "DROP Table edu_".$id."_routine;";
    $res = mysqli_query($db, $sql);
    $sql = "Select path From ".$tbl." Where teacher_id = '".$id."';";
    $res = mysqli_query($db, $sql);
    if($res){
        
        while($row = mysqli_fetch_assoc($res)) {
                $path = $row['path'];
        }
        if(delDir($path)){
			    $sql = "Delete from ".$tbl." where teacher_id = '".$id."'";
			    if(mysqli_query($db, $sql)){
	                 	$b='Successfully Deleted Teacher ';

				 }
		
	    }
	}
	return $b;
}

/*===================Class Table=======================*/
function classes($db, $ccode){

	$sql = "Create table IF NOT EXISTS edu_".$ccode."_classes( id varchar(20) Primary key, code varchar(50) Unique , name varchar(50) NOT NULL, class_teacher varchar(20) , path varchar(50) NOT NULL,link mediumtext  , FOREIGN KEY (class_teacher) REFERENCES edu_".$ccode."_teacher(teacher_id));";
	//$stmt = mysqli_prepare($db, $sql);
      return mysqli_query($db, $sql);
		//$b = true;
        
	
	//mysqli_stmt_close($stmt);
	
}

/*=================== Email sender =======================*/
function email_reg($to, $name, $uid, $pwd){
   $b=false;
   $mailjetApiKey = 'eea0c8342683852dc803c57cd59f0839';
   $mailjetApiSecret = 'ad58ef8ae39b7a79186e486e74dbf3b1';
   $messageData = [
       'Messages' => [
            [
               'From' => [
                    'Email' => 'noreply@edude.ml',
                    'Name' => 'EDUDE India'
               ],
               'To' => [
                   [
                     'Email' => $to,
                     'Name' => $name
                   ]
                ],
				
                //'Subject' => $sub,
                //'TextPart' => $typ,
                //'HTMLPart' => $msg,
				//'CustomID'=> 'AppGettingStartedTest'
				'TemplateID'=> 2988144,
                'TemplateLanguage'=> true,
                'Subject'=> 'Successfully Registered in EDUDE INDIA',
                'Variables' => json_decode('{
                                                "as": "College/Schools",
                                                "name":"'.$name.'",
                                                "uid": "'.$uid.'",
                                                "pwd": "'.$pwd.'",
                                                "YYYY": "'.date("Y").'"
                                 }',true)
            ]
       ]
   ]; 
   $jsonData = json_encode($messageData);
   $ch = curl_init('https://api.mailjet.com/v3.1/send');
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
   curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
   curl_setopt($ch, CURLOPT_USERPWD, "{$mailjetApiKey}:{$mailjetApiSecret}");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, [
       'Content-Type: application/json',
       'Content-Length: ' . strlen($jsonData)
   ]);
  $response = json_decode(curl_exec($ch));
    //print_r($response);
  if($response->Messages[0]->Status == 'success'){
	  $b=true;
  }
	return $b;

}


function email_add($to, $name, $uid, $pwd){
   $b=false;
   $mailjetApiKey = 'eea0c8342683852dc803c57cd59f0839';
   $mailjetApiSecret = 'ad58ef8ae39b7a79186e486e74dbf3b1';
   $messageData = [
       'Messages' => [
            [
               'From' => [
                    'Email' => 'noreply@edude.ml',
                    'Name' => 'EDUDE India'
               ],
               'To' => [
                   [
                     'Email' => $to,
                     'Name' => $name
                   ]
                ],
				
                //'Subject' => $sub,
                //'TextPart' => $typ,
                //'HTMLPart' => $msg,
				//'CustomID'=> 'AppGettingStartedTest'
				'TemplateID'=> 2988144,
                'TemplateLanguage'=> true,
                'Subject'=> 'Successfully Registered in EDUDE INDIA',
                'Variables' => json_decode('{
                                                "as": "College/Schools",
                                                "name":"'.$name.'",
                                                "uid": "'.$uid.'",
                                                "pwd": "'.$pwd.'",
                                                "YYYY": "'.date("Y").'"
                                 }',true)
            ]
       ]
   ]; 
   $jsonData = json_encode($messageData);
   $ch = curl_init('https://api.mailjet.com/v3.1/send');
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
   curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
   curl_setopt($ch, CURLOPT_USERPWD, "{$mailjetApiKey}:{$mailjetApiSecret}");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, [
       'Content-Type: application/json',
       'Content-Length: ' . strlen($jsonData)
   ]);
  $response = json_decode(curl_exec($ch));
    //print_r($response);
  if($response->Messages[0]->Status == 'success'){
	  $b=true;
  }
	return $b;

}


/*===================Add Class=======================*/
function addclass($db,$classname,$ccode ,$classteacher){
	  $classcode = classid($ccode);
	  $classid = $classcode; // temporary in beta it is same
      $link = "https://edude.daily.co/".md5($classcode)."";
      $cid = get_ID($db,"edu_college", "college_code = ".$ccode."");
      $classpath ="".$cid."/classes/".$classcode."";
      if(class_num($ccode) <=2){
      if(classlink(md5($classcode))){
      $sql = "Insert into edu_".$ccode."_classes Values ('".$classid."','".$classcode."','".$classname."','".$classteacher."','".$classpath."','".$link."');";
	  $stmt = mysqli_prepare($db, $sql);
                 if(mysqli_stmt_execute($stmt)){
					  mysqli_stmt_close($stmt);
					  //Class added now creating relevant tables
					  if(class_posts($db,$classcode)){
						  //class posts is created
						  // Class students proceed
						  if(class_student($db,$classcode)){
							   //class student created is created
							  
							  if(fol("".$cid."/classes/".$classcode."/posts")){
								   if(fol("".$cid."/classes/".$classcode."/students")){
									       
								            $b = "Success";
							       }else{
						               $b = "ERR:D007::ERROR TO CREATE FOLDERS Std:: !";
					                }
							  }else{
						          $b = "ERR:D006::ERROR TO CREATE FOLDERS !";
					          }
						 
						      
						   
					      }else{
						      $b = "ERR:D005::ERROR TO CREATE CLASS Students !";
					      }
						  
					  }else{
						  $b = "ERR:D004::ERROR TO CREATE CLASS POSTs !";
					  }
					 
				 }else{
					 $b = "ERR:D003::ERROR TO ADD CLASS!";
				 }
      }else{
          $b = "ERROR 3490:: Link not generated";
      }
      }else{
          $b = "Please Buy EDUDE Premium to add More than 2 classes!";
      }
	   return $b;


 }
 
/*===================Student Table=======================*/
function class_student($db, $classcode){
	$b = false;
	$sql = "Create table IF NOT EXISTS edu_".$classcode."_students ( Id varchar(20) Primary Key , Name varchar(200) NOT NULL , pwd varchar(200) NOT NULL , email varchar(100) NOT NULL UNIQUE , path varchar(100) NOT NULL , dp varchar(200) );";
	$stmt = mysqli_prepare($db, $sql);
	if(mysqli_stmt_execute($stmt)){
		$b=true;
	}
	mysqli_stmt_close($stmt);
	return $b;
}//Tested Succesfull

/*===================Class Post Table=======================*/
function class_posts($db, $classcode){
	$b = false;
	$sql = "Create table IF NOT EXISTS edu_".$classcode."_posts (id varchar(30) Primary Key , post varchar(3000) NOT NULL, date TIMESTAMP , post_by varchar(20) NOT NULL, type int(10) NOT NULL, path varchar(50) )";
	$stmt = mysqli_prepare($db, $sql);
	if(mysqli_stmt_execute($stmt)){
		$b=true;
	}
	mysqli_stmt_close($stmt);
	return $b;
}//Tested Successfull

/*===================Add students=======================*/
 function addstudents($db , $studentname , $studentemail , $classcode){
    $studentid = studentid($classcode);
	$studentpass =substr(md5(pwdg($studentname,"".$classcode)),0,8);
    //email detail$tpwdg = substr(md5(pwdg($tname,"".$tcode)),0,8);
    if(email_add($studentemail, $studentname, $studentid, $studentpass)){
           $path = get_path($db,"edu_".substr($classcode,0,3)."_classes"," code ='".$classcode."'")."/".$studentid."";
	       $spwd = hashp($studentpass);
           if(fol($path)){
	            $sql = "Insert into edu_".$classcode."_Students Values('".$studentid."','".$studentname."','".$spwd."','".$studentemail."','".$path."','./assest/img/ico/201811.png')";
                 if(mysqli_query($db,$sql)){
                     //Student Successfully registered
                     return true;
                }else{
                     //if data not set not sended
                     return false;
                 }
          }else{
               //if folder not create sended
                return false;
           }
    }else{
        //if mail not sended
        return false;
    }
 }
/****************GET PATH********************************************/

function get_path($db, $table, $pk){
    $rt = "false";
    $sql = "select path from ".$table." where ".$pk." ;";
    $result = mysqli_query($db,$sql);
    if($result){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $rt = $row['path'];
            }
        }
    }
    return $rt;
}
/*===================Class id generator Algo=======================*/
function classid($ccode){
	$code = "".$ccode;
	if(strlen($ccode)<3){
		for($i =0; $i< (3-strlen($ccode));$i++){
			$code="0".$code;
		}
	}
	$salt ="".rand(00,99);
    if(strlen($salt) < 2){
       $salt="0".$salt;
    }
	$code= $code."".$salt;
	
	return $code;
  }

/*===================Teacher code generator Algo=======================*/
 function teachercode($ccode){ 
	//teacher code generater
	$code = "".$ccode;
	if(strlen($ccode)<3){
		for($i =0; $i< (3-strlen($ccode));$i++){
			$code="0".$code;
		}
	}
	
	$code= $code."".rand(0000,9999);
	
	return $code;
  }

/*===================Student code generator Algo=======================*/
 function studentid($classcode){
	  //student code generater
	$code= substr($classcode,0,5)."".rand(0,99);
	return $code;
 }


/*===================get ID Algo=======================*/

function get_ID($db,$table, $s){
	 $uid='';
	 $sql = "Select college_id from ".$table." Where ".$s;
	 $stmt = mysqli_prepare($db, $sql);
     if(mysqli_stmt_execute($stmt)){
             mysqli_stmt_store_result($stmt);  
             if(mysqli_stmt_num_rows($stmt) == 1){
                      mysqli_stmt_bind_result($stmt,$id);
                      if(mysqli_stmt_fetch($stmt)){
						  $uid = $id;
					  }
			 }
	 }
	mysqli_stmt_close($stmt);
	return $uid;
}

function get_ctable($db,$id){
	 $tbl='';
	 $sql = "Select college_table from edu_college Where college_id = ".$id;
	 $stmt = mysqli_prepare($db, $sql);
     if(mysqli_stmt_execute($stmt)){
             mysqli_stmt_store_result($stmt);  
             if(mysqli_stmt_num_rows($stmt) == 1){
                      mysqli_stmt_bind_result($stmt,$id);
                      if(mysqli_stmt_fetch($stmt)){
						  $tbl = $id;
					  }
			 }
	 }
	mysqli_stmt_close($stmt);
	return $tbl;
}

/*=============FOLDER CREATION===========================*/
function fol($dir){
	$directoryName = "./".$dir;
    $b=false;
      //Check if the directory already exists.
     if(!is_dir($directoryName)){
        //Directory does not exist, so lets create it.
      if(mkdir($directoryName, 0755, true)){
		  $b = true;
	  }else{
		 $b=true;
	   }
    }else{
		 $b=true;
	 }
	return $b;
}





/*================= Dashboard Functions ====================*/


function dash($db,$pid){
	require_once('function.php');
	$tbl = [
		   '1' => "edu_college_dashbord",
		   '2' => "edu_teacher_dashbord",
		   '3' => "edu_student_dashbord"
	];
	$res="";
	$sql="Select * From ".$tbl[$pid]." Where anc is NULL ";
	$result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
              
          $res = $res." ".option($row['id'],$row['link'],$row['anc'],$row['ico'],$row['hd']);   
         }
	}else{
		$res = "<CENTER class='na'><h1> No OPTION AVAILABLE</h1><CENTER>";
	}
	return $res;
}

function fetch_data($db, $uid , $v){
	$data = array();
	if($v==1){
		//Operation on college
		$sql = "Select * From edu_college where college_id =".$uid." ;";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1) {
		     while($row = mysqli_fetch_assoc($result)) {
                  $data = [
					  'name' => $row['college_name'],
					  'college' => $row['college_uni'],
					  'role'  => 'College',
					  'id' => $uid,
					  'dp' => $row['college_icon'],
					  'err' => date('d-m-y h:iA'),
					  'ccode' => strlen(''.$row['college_code'])==3?''.$row['college_code']:(strlen(''.$row['college_code'])==2?'0'.$row['college_code']:'00'.$row['college_code']),
                      'email' => $row['college_email']
				 ];
            }/*else{
				 $data = [
					  'name' => ' no user found! ',
					  'college' => 'NA',
					  'role'  => 'College',
					  'id' => 'uid',
					  'dp' => 'assest/img/ogimg.png',
					  'err' => 'Please Refresh Page or Login Again'
				 ];
			 }*/
	    }else{
			 $data = [
					  'name' => ' no user found! ',
					  'college' => 'NA',
					  'role'  => 'College',
					  'id' => $uid,
					  'dp' => 'assest/img/ogimg.png',
					  'err' => 'Please Refresh Page or Login Again',
				      'ccode' => '0',
                      'email' => 'edudein@gmail.com'
				 ];
		}
	}else{
		if($v==2){
			//operation in teacher
			$tbl= "edu_".substr($uid,0,3)."_teacher";
			$sql = "Select * From ".$tbl." where teacher_id =".$uid." ;";
		    $result = mysqli_query($db, $sql);
		    if (mysqli_num_rows($result) == 1) {
		         while($row = mysqli_fetch_assoc($result)) {
                      $data = [
					            'name' => $row['teacher_name'],
					            'college' => get_college($db,(int)substr($uid,0,3)),
					            'role'  => 'Teacher',
					            'id' => $uid,
					            'dp' => $row['teacher_dp'],
					            'err' => date('d-m-y h:iA'),
						        'ccode' => substr($uid,0,3),
                                'email' => $row['teacher_email']
				      ];
                 }
			}else{
			     $data = [
					     'name' => ' no user found! ',
					     'college' => 'NA',
					     'role'  => 'Teacher',
					     'id' => $uid,
					     'dp' => 'assest/img/ogimg.png',
					    'err' => 'Please Refresh Page or Login Again',
					    'ccode' => substr($uid,0,3),
                        'email' => 'edudein@gmail.com'
				  ];
		      }
		}
		else{
			if($v==3){
				//operation in student;
                
				$tbl= "edu_".substr($uid,0,5)."_students";
				$sql = "Select * From ".$tbl." where id =".$uid." ;";
		        $result = mysqli_query($db, $sql);
		        if (mysqli_num_rows($result) == 1) {
		             while($row = mysqli_fetch_assoc($result)) {
                          $data = [
					               'name' => $row['Name'],
					               'college' => get_college($db,(int)substr($uid,0,3)),
					               'role'  => 'Student',
					               'id' => $uid,
					               'dp' => $row['dp'],
					               'err' => date('d-m-y h:iA'),
							       'ccode' => substr($uid,0,3),
                                   'email' => $row['email']
				          ];
                     }
			    }else{
		        	 $data = [
			    		  'name' => ' no user found! ',
			    		  'college' => 'NA',
			     		  'role'  => 'Student',
				    	  'id' => $uid,
					      'dp' => 'assest/img/ogimg.png',
					     'err' => 'Please Refresh Page or Login Again',
						 'ccode' => substr($uid,0,3),
                         'email' => 'edudein@gmail.com'
				    ];
	        	}
			}
			else{
				$data = [
					  'name' => ' no user found! ',
					  'college' => 'NA',
					  'role'  => 'College',
					  'id' => 'uid',
					  'dp' => 'assest/img/ogimg.png',
					  'err' => 'Please Refresh Page or Login Again',
					  'ccode' => 'NA',
                      'email' => 'edudein@gmail.com'
				 ];
			}
		}
	}
	return $data;
}


/************Get college ================*/
function get_college($db,$ccode){
	$data ='';
	$sql = "Select college_name from edu_college where college_code = ".$ccode;
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) == 1) {
		         while($row = mysqli_fetch_assoc($result)) {
					 $data = $row['college_name'];
				 }
	}
	return $data;
}


function get_teachers($db, $ccode){
	$data ="<div class='sc'><center><h1> ERROR SQL! :( </h1></center></div>";
	$sql = "select * from ".$ccode."teacher;";
	$result = mysqli_query($db, $sql);
	//print_r($result);
		if(mysqli_num_rows($result) > 0) {
			$data ='';
		     while($row = mysqli_fetch_assoc($result)) {
			     $data = $data.'<form action="" method="post">
				      <div class="tb">
						  <label>Id: </label><id type="text" name="id">'.$row['teacher_id'].'</id>
				          <label>Name: </label><name>'.$row['teacher_name'].'</name>
					      <label>Subject: </label><subject>'.$row['teacher_subject'].'</subject>
					      <label>Email: </label><email>'.$row['teacher_email'].'</email>
					      <label>Phone: </label><a class="phn" href="tel:+91'.$row['teacher_phone'].'">+91'.$row['teacher_phone'].'</a>
						  <button type="submit" name="del" value="'.$row['teacher_id'].'">DELETE</button>
					   </div>
				   </form>';
			 }
		}else{
			$data = "<div class='sc'><center><h1> NO RECORD FOUND! <br> Please Add Teacher :) </h1></center></div>";
		}
	    mysqli_close($db);
		return $data;
}


/*****************Class List **********************/
function get_classlst($db, $ccode){
	$data ="<div class='sc'><center><h1> ERROR SQL! :( </h1></center></div>";
	$sql = "select * from ".$ccode."classes;";
	$result = mysqli_query($db, $sql);
	//print_r($result);
		if(mysqli_num_rows($result) > 0) {
			$data ='';
		     while($row = mysqli_fetch_assoc($result)) {
			     $data = $data.'<form action="" method="post">
				      <div class="tb">
						  <label>Id: </label><id type="text" name="id">'.$row['id'].'</id>
				          <label>Name: </label><name>'.$row['name'].'</name>
					      <label>Class Teacher: </label><subject>'.$row['class_teacher'].'</subject>
					      <label>Path: </label><email>'.$row['path'].'</email>
						  <button class="delbtn" type="submit" name="del" value="'.$row['id'].'">DELETE</button>
					   </div>
				   </form>';
			 }
		}else{
			$data = "<div class='sc'><center><h1> NO RECORD FOUND! <br> Please Add Teacher :) </h1></center></div>";
		}
	    mysqli_close($db);
		return $data;
}
function get_students($db,$tbl){
    $data ="<div class='sc'><center><h1> ERROR SQL! :( </h1></center></div>";
	$sql = "select * from ".$tbl;
	$result = mysqli_query($db, $sql);
	//print_r($result);
		if(mysqli_num_rows($result) > 0) {
			$data ='';
		     while($row = mysqli_fetch_assoc($result)) {
			     $data = $data.'<form action="" method="post">
				      <div class="tb">
						  <label>Id: </label><id type="text" name="id">'.$row['Id'].'</id>
				          <label>Name: </label><name>'.$row['Name'].'</name>
					      <label>Path: </label><email>'.$row['path'].'</email>
						  <button class="delbtn" type="submit" name="del" value="'.$row['Id'].'" disabled>DELETE</button>
					   </div>
				   </form>';
			 }
		}else{
			$data = "<div class='sc'><center><h1> NO RECORD FOUND! <br> Please Add Students in Class :) </h1></center></div>";
		}
	    mysqli_close($db);
		return $data;
}
/********************************Delete Class******************************/
/*=============FOLDER Deletion ===========================*/
function delDir($directory){
         $opt=0;        //custom function recursive function entire directory
         If(file_exists($directory)){//Identifies whether the directory exists, if there is no rmdir() function, an error occurs.
                 If($dir_handle=@opendir($directory)){//Open the directory to return the directory resource and determine whether it is successful
                         While($filename=readdir($dir_handle)){// traverse the directory, read out the files or folders in the directory
                                 If($filename!='.' && $filename!='..'){//Be sure to exclude two special directories
                                         $subFile=$directory."/".$filename;//Connect the files in the directory to the current directory
                                         If(is_dir($subFile)){//If it is a directory condition then it becomes
                                                 delDir ($subFile); // recursive call to delete the subdirectory
                    }
                                         If(is_file($subFile)){//If it is a file condition, it is established.
                                                 Unlink($subFile);// directly delete this file
                    }
                }
            }
                         Closedir($dir_handle);//Close directory resources
                         $opt = rmdir($directory);//Delete empty directory
        }
    }
    return $opt;
}


function del_class($db, $classcode){
    $rt="Error in deleting";
    if(del_link(md5($classcode))){
    $sql = "DROP Table IF Exists edu_".$classcode."_routine;";
    $res = mysqli_query($db, $sql);
    $sql = "DROP Table If exists edu_".$classcode."_students;";
    $res = mysqli_query($db, $sql);
    if($res){
        $sql = "DROP Table edu_".$classcode."_posts;";
        $res = mysqli_query($db, $sql);
         if($res){
             $tbl="edu_".substr($classcode,0,3)."_classes";
             $sql = "Select path From ".$tbl." Where id='".$classcode."';";
             $res = mysqli_query($db, $sql);
             if($res){
                 $path="";
                 while($row = mysqli_fetch_assoc($res)) {
                     $path = $row['path'];
                 }
                 if(delDir($path)){
                     $sql = "Delete From ".$tbl." Where id=".$classcode.";";
                     $res = mysqli_query($db, $sql);
                     if($res){
                        if(delquiztbl($db,$classcode)){
                              $rt="Successfully Deleted Class ".$classcode."!";
                        }
                     }
                 }
             }
             
             
         }
     }
    }else{
        $rt= "room not deleted";
    }
    return $rt." :: ".$res;
}


function delquiztbl($db,$class){
    $sql = "DROP table IF EXISTS  edu_".$class."_quiz";
     mysqli_query($db,$sql);
     return true;
}

/*************** Teacher dashboard starts***************************/
function check_CT($db, $tcode){
    $val=0;
    $code="";
    $sql = "Select code from edu_".substr($tcode,0,3)."_classes Where class_teacher='".$tcode."';";
    $res = mysqli_query($db,$sql);
    if($res){
        while($row = mysqli_fetch_assoc($res)) {
            $val =1;
            $code = $row['code'];
        }

        
    }
    $_SESSION['classcode'] = $code; 
    return $val;
        
}

function classlink($room){

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.daily.co/v1/rooms",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"properties\":{\"enable_prejoin_ui\":true,\"enable_screenshare\":true,\"enable_chat\":true,\"start_video_off\":true,\"start_audio_off\":true,\"owner_only_broadcast\":false,\"autojoin\":true},\"name\":\"".$room."\",\"privacy\":\"public\"}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Bearer 9ba1d0d1283b1ae9683dc7ecbf671fc06f40d27ec8eaf7b208ab250de8f9eca9",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

   if ($err) {
       return false;
    } else {
      return json_decode($response)->api_created;
   }
}

function del_link($room){


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.daily.co/v1/rooms/".$room,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Bearer 9ba1d0d1283b1ae9683dc7ecbf671fc06f40d27ec8eaf7b208ab250de8f9eca9"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return false;
} else {
    //return true;
    return json_decode($response)->deleted;
}
}





/******************* Routine System**************************/
function tblrout_t($db,$tcode){
    //chech & create routine table for teacher
    /*classid,classname,time,link*/
    $sql = "CREATE TABLE IF NOT EXISTS edu_".$tcode."_routine (sno int(20) Primary Key Auto_increment, classid varchar(20) NOT NULL , classname varchar(100) NOT NULL, Subject varchar(30) NOT NULL, Time TIME)";
    if(mysqli_query($db,$sql)){
        return true;
    }else{
        return false;
    }
}
function tblrout_c($db,$ccode){
    //check & create routine table for class
    /*teacherid, teachername, time , link */
    $sql = "CREATE TABLE IF NOT EXISTS edu_".$ccode."_routine (sno int(20) Primary Key Auto_increment, teacherid varchar(20) NOT NULL , teachername varchar(100) NOT NULL, Subject varchar(30) NOT NULL, Time TIME)";
    if(mysqli_query($db,$sql)){
        return true;
    }else{
        return false;
    }
}

function assign_routine($db,$code){
    //assign routine to respective
}





function token($room,$user,$uid,$own){
    $curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.daily.co/v1/meeting-tokens",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"properties\":{\"room_name\":\"".$room."\",\"is_owner\":".$own.",\"user_name\":\"".$user."\",\"user_id\":\"".$uid."\",\"redirect_on_meeting_exit\":\"https://edude.ml/Dashboard.php\"}}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Bearer 9ba1d0d1283b1ae9683dc7ecbf671fc06f40d27ec8eaf7b208ab250de8f9eca9",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return false;
} else {
  return json_decode($response)->token;
}
}





/***************************** Pagination Now **************************************************************************/

function show_lec($db, $tcode){
      $data ="<table style='width:100%; text-align:center;'>
                        <tr>
                            <th>SNO</th>
                            <th>Time</th>
                             <th>Class Name</th>
                             <th>Class Id</th>
                             <th>Subject</th>
                        </tr>";
      $sql = "Select * From edu_".$tcode."_routine;";
      $result = mysqli_query($db,$sql);
      if($result){
          if(mysqli_num_rows($result)>0){
              $i=1;
              while($row = mysqli_fetch_assoc($result)){
                  $data .= "<tr>
                <td>".$i++."</td>
                <td>".$row['Time']."</td>
                <td>".$row['classname']."</td>
                <td>".$row['classid']."</td>
                <td>".$row['Subject']."</td>
                </tr>";
              }
              $data .= "</table>";
          }else{
              $data = " No Routine Available Please Contact Class-Teachers! ";
          }
      
      }else{
              $data = " No Routine Available Please Contact Class-Teachers! ";
      }
    
    $data .= "<br> <a href='Dashboard.php'>Back to DashBoard</a>";
    return $data;
}


function profile($data){
    $data = "<div class='fluid-container pro'>
                 <h1>Profile</h1>
                 <div class='fluid-container pro-card'>
                          <img src='assest/img/exam/edu_teacher_1.gif'>
                          <form>
                             <label for='id'>User Id: ".$data['id']."</label>
                             <label for='name'>User Name: ".$data['name']."</label>
                             <label for='email'>User Email: ".$data['email']."</label>
                             <label for='role'>User Role: ".$data['role']."</label>
                           </form>
                    </div>
              </div>
                             ";
    return $data;
}


function questiontbl($db,$qid,$class){
    $sql = "Create table if not exists edu_".$class."_exam_".$qid."(qno int Primary key AUTO_INCREMENT, question longtext not null , option1 text not null ,option2 text not null ,option3 text not null ,option4 text not null , correct text not null  ); ";
    return mysqli_query($db,$sql);
}


function forget_pass($v ,$id){
       require_once('connection.php');
       $db = local();
       $op ="";
      $pwdg = "";
      $tbl = [
		   1 => "Select college_name as name , college_email as email From edu_college where college_id=".$id,
		   2 => "Select teacher_name as name , teacher_email as email From edu_".substr($id,0,3)."_teacher where teacher_id='".$id."'",
		   3 => "Select Name as name , email as email From edu_".substr($id,0,3)."_students where Id='".$id."'"
	   ];
       $res = mysqli_query($db , $tbl[$v]);
       if($res){
             if(mysqli_num_rows($res)){
                 $i =0;
                    while($row = mysqli_fetch_assoc($res)){
                        $pwdg = substr(md5(pwdg($row['name'],"".rand(0000,9999))),0,8);
                        if(email_add($row['email'], $row['name'], $id, $pwdg)){
                            $i++;
                        }
                    }
                    if($i == 1){
                                $tbl = [
		                                 1 => "Update edu_college set college_pass = '".hashp($pwdg)."' where college_id=".$id,
		                                 2 => "Update edu_".substr($id,0,3)."_teacher set teacher_pwd '".hashp($pwdg)."' where teacher_id='".$id."'",
		                                 3 => "Update edu_".substr($id,0,3)."_students set pwd = '".hashp($pwdg)."' where Id='".$id."'"
	                            ];
                                if(mysqli_query($db, $tbl[$v])){
                                    $op = "You will get Password on Your registered mail Soon!";
                                }else{
                                    $op = "Error Occurs!";
                                }
                    }else{
                         $op = "Sorry It's Server Error! Try after Sometime";
                     }
             }else{
                 $op = "You are Not a Valid User. Please Contact admin if you are valid!";
             }
       }else{
             $op = "You are Not a Valid User. Please Contact admin if you are valid!";
       }
       mysqli_close($db);
  return $op;
}

function class_num($code){
    require_once('connection.php');
    $db = local();
    $sql = "select * from edu_".$code."_classes";
    $res = mysqli_query($db,$sql);
    $n = mysqli_num_rows($res);
    mysqli_close($db);
    return $n;
}


?>