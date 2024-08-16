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

*/

 function option($id,$link,$anc,$ico,$hd){
	          $res = '<a class="copt" href="'.$link.'">
						   <div class="anc">'.$anc.'</div>
				          <div class="ico"><img src="'.$ico.'"></div>
						  <div class="hd"><h2>'.$id.': '.$hd.'</h2></div>
				       </a>';
	 return $res;
 }

 function dashhead($dp,$name,$cllg,$p,$id,$err){
	echo ' <div class="itro">
				    <div class="dtl">
				       <img src="'.$dp.'">
				       <p> 
						  <b>Name: </b><span>'.$name.'</span>
						  <b>College:</b><span>'.$cllg.'</span>
						  <b>Role: </b><span>'.$p.'</span>
						  <b>Id: </b><span>'.$id.'</span>
					   </p>
						<br>
					   <div class="err">'.$err.'</div>
				    </div>
				   <div class="l-brk">
				       <!--line break-->
				   </div>
				   <div>
				     <!-- more content --->
				   </div>
		       </div>';
 }

 


?>