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
?>
<html>
   <head>
       <title>EDUDE:Education in Every Situation</title>
       <link rel="apple-touch-icon" sizes="180x180" href="assest/img/icons/apple-touch-icon.png">
       <link rel="icon" type="image/png" sizes="32x32" href="assest/img/icons/favicon-32x32.png">
       <link rel="icon" type="image/png" sizes="192x192" href="assest/img/icons/android-chrome-192x192.png">
       <link rel="icon" type="image/png" sizes="16x16" href="assest/img/icons/favicon-16x16.png">
       
       <link rel="mask-icon" href="assest/img/icons/safari-pinned-tab.svg" color="#ff3800">
       <link rel="shortcut icon" href="assest/img/icons/favicon.ico">
       <meta name="apple-mobile-web-app-title" content="EDUDE">
       <meta name="application-name" content="EDUDE">
       <meta name="msapplication-TileColor" content="#da532c">
       <meta name="msapplication-TileImage" content="assest/img/icons/mstile-144x144.png">
       <meta name="msapplication-config" content="assest/img/icons/browserconfig.xml">
       <meta name="theme-color" content="#f6f6f6">      
       <link rel="icon" type="image/png"  href="assest/img/main.png">
       <!-- Add this to your HEAD if you want to load the apple-touch-icons from another dir than your sites' root -->
       <link rel="apple-touch-icon" href="assest/img/ions/apple-touch-icon-iphone-60x60.png">
       <link rel="apple-touch-icon" sizes="60x60" href="assest/img/ions/apple-touch-icon-ipad-76x76.png">
       <link rel="apple-touch-icon" sizes="114x114" href="assest/img/ions/apple-touch-icon-iphone-retina-120x120.png">
       <link rel="apple-touch-icon" sizes="144x144" href="assest/img/ions/apple-touch-icon-ipad-retina-152x152.png">
       <!---- Meta tags Start ------->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width,initial-scale=1.0">
       <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
        <!--- Tags For SEO Optimisation ---->
                <meta name="description" content="Educational Development & Enhancement in short EDUDE is platform for Virtual Classroom">
                <meta name="keywords" content="Education , edu , EDUDE , edude , Edude, Vikash edude index, google , edude , edude ml , Educational Development & Enhancement in short EDUDE is platform for Virtual Classroom , EDUDE , edudel , Vikshro , vikshro , VIKSHRO , eudcation , online class , free , free new , vik">
                <meta name="author" content="EDUDE:Education in Every Situation">
       <!--   Facebook Card (OG)---->
               <meta property="og:title" content="EDUDE:Education in Every Situation"/>
               <meta property="og:description" content="Educational Development & Enhancement in short EDUDE is platform for Virtual Classroom" />
               <meta property="og:url" content=" https://edude.ml" />
               <meta property="og:site_name" content="EDUDE:Education in Every Situation"/>
               <meta property="og:image" content="https://edude.ml/assest/img/ad/edu_2.jpg" />
               <meta property="og:image:secure_url" content="https://edude.ml/assest/img/ad/edu_2.jpg" />
               <meta property="og:image:type" content="image/png" />
               <meta property="og:image:width" content="300" />
               <meta property="og:image:height" content="200" />
               <meta property="og:type" content="website"/>
       <!--  Twitter Card ------------->
               <meta name="twitter:card" content="Educational Development & Enhancement in short EDUDE is platform for Virtual Classroom">
               <meta name="twitter:site" content="https://edude.ml">
               <meta name="twitter:creator" content="VIKSHRO">
               <meta name="twitter:title" content="EDUDE:Education in Every Situation">
               <meta name="twitter:description" content="Educational Development & Enhancement in short EDUDE is platform for Virtual Classroom">
               <meta name="twitter:image:src" content="https://edude.ml/assest/img/ad/edu_2.jpg">
       <!--- Robot Tag ----------->
               <meta name="robots" content="index, google , edude , edude ml , Educational Development & Enhancement in short EDUDE is platform for Virtual Classroom , EDUDE "> 
       <!---- Canonical Links ------->
               <link href="https://edude.ml" rel="canonical"> 
       <!---- PWA Camer Movies------->
       <link rel="manifest" href="manifest.json">
       <!----- Meta tags End ------->
       <!----- css files Start ------->
          
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
	        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
            
            <link type="text/css" rel="stylesheet" href="./assest/css/app.css">
            
       <!----- css files close ---->
       <!----- License term ------->
             <link type="text/edu" rel="license" href="license.edu">
       <!----- LIcense End ------->
       <!-- Global site tag (gtag.js) - Google Analytics -->
           <script async src="https://www.googletagmanager.com/gtag/js?id=G-NDESLZH993"></script>
           <script>
                 window.dataLayer = window.dataLayer || [];
                 function gtag(){dataLayer.push(arguments);}
                 gtag('js', new Date());

                 gtag('config', 'G-NDESLZH993');
           </script>
           <!-- Google Tag Manager -->
            <script>
                (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                   new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                   j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;                                      f.parentNode.insertBefore(j,f);
                 })(window,document,'script','dataLayer','GTM-TNR9XR3');
            </script>
           <!-- End Google Tag Manager -->
     
   </head>
   <body>
    
       <div class="ehead">
		   <?php
		      include("components/nav.php");
		   ?>
	   </div>
	   <div class="fluid-container ebody" data-aos="zoom-in">
            <div id="myCarousel" class="carousel slide" data-aos="fade-up" data-ride="carousel">
               <div class="carousel-inner">
                       <div class="item active">
                             <img src="assest/img/ad/edu_1.jpg">
                             <img src="assest/img/exam/edu_student.gif" id='over'>
                             <a href='app' class='get-start' style="left:-50px;">Get Started</a>
                       </div>
                       <div class="item">
                              <img src="assest/img/ad/edu_2.jpg">
                              <a href='app' class='get-start' style="top:400px;;margin-left:calc(50% - 90px);">Get Started</a>
                      </div>
                     <div class="item">
                              <img src="assest/img/ad/edu_3.jpg">
                              <a href='app' class='get-start' style="margin-left:calc(50% - 80px);">Get Started</a>
                     </div>
                     <div class="item">
                              <img src="assest/img/ad/edu_4.jpg">
                              <a href='app' class='get-start' style="top:400px;margin-left:calc(50% - 280px);">Get Started</a>
                     </div>
                     <div class="item">
                              <img src="assest/img/ad/edu_5.jpg">
                              <a href='app' class='get-start' style="top:450px;margin-left:calc(50% - 200px);">Get Started</a>
                     </div>
                     <div class="item">
                              <img src="assest/img/ad/edu_6.jpg">
                     </div>
              </div>
           </div>
           <!-- Independence day EDUDE--
           <div class="container" id="India" data-aos="fade-up">
                  <div class="row">
                     <div class="col-12" style="text-align:center;" data-aos="fade-up">
                       <img  src="assest/img/fest/edu_inde.gif" style="width:100%;">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6" style="text-align:center;" data-aos="fade-up">
                       <img  src="assest/img/fest/edu_inde1.gif" style="width:100%;">
                     </div>
                     <div class="col-6" style="text-align:center;" >
                       <img  src="assest/img/fest/edu_inde2.gif" style="width:100%;">
                     </div>
                  </div>
            
           </div>-->


           <div class='container-fluid edu_about' id="about" data-aos="fade-up">
                 <div class="container edu_tile">
                     <div class='edu_head'>Education Development & Enhancement</div>
                     <h2>Online Based Schools/College Provides E-Learning and Management System</h2>
                 </div>
                 <div class="container">
                     <div class="row">
                         <div class="col-sm-8 edu_dt">
                             <p data-aos="fade-up">
                                 EDUDE is Web Based PWA application. EDUDE helps Schools/colleges to run their as usual learning program through this portal by which Students can easily learn new things and their study is not intrrupted by any pandemic like <b>COVID-19</b>. EDUDE is launched to have pupose to enhance the education system to improvement in education of India. EDUDE idea is all about How to Improve Our online system in India to provide easy and best solution.
                             </p>
                         </div>
                         <div class="col-sm-2">
                             <div class="edu_mob" data-aos="fade-up">
                             </div>
                         </div>
                     </div> 
                 </div> 
            </div>
            <div class="container-fluid edu_a_nxt" id="aboutnext" data-aos="fade-up">
                 <div class='container'>
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="edu_nxt_head" data-aos="fade-up">
                                   About EDUDE
                                  <div class='edu_lin'></div>
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-3">
                             <div class="edu_pc" data-aos="fade-up">
                             </div>
                        </div>
                        <div class="col-sm-8 edu_dt" data-aos="fade-up">
                            <p>
                              EDUDE is Online Portal to provide all features of online learning at one platform. It makes the realistic classrooms in Virtual Classroom. In Future about 2-3 years, It becomes as Student Network or Education Network of India. In EDUDE, Online Video Lectures , Exam management and handling System , Attendance Management System , Security and Encryption System all are with atonomous system. EDUDE has A.I functionality in Routine System and Lecture System. Also, Exam is handleded in Givern period of time and Starts on the time scheduled.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='container-fluid' id='features' data-aos="fade-up">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="edu_nxt_head" data-aos="fade-up">
                            EDUDE Features
                            <div class="edu_lin"></div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid edu_feat" data-aos="fade-up">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3 " data-aos="fade-up">
                                <img src="assest/img/svg/1628121756365.png" alt="EDUDE user friendly UI System">
                            </div>
                            <div class="col-sm-7  edu_dt">
                                <div class="edu_head" data-aos="fade-up">User Friendly UI System</div>
                                <p data-aos="fade-up">
                                    The looks and UI of EDUDE App is very user friendly and suitable to understand easy flow of processes with use. We are providing less data more information based UI design.
                                    <br>
                                    It is mobile friendly , Laptop/PC Friendly web app and take less time to load in any network.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid edu_feat rev" data-aos="fade-up">
                    <div class="container mob-rev">
                        <div class="row">
                            <div class="col-sm-7  edu_dt">
                                <div class="edu_head" data-aos="fade-up">Understable Dashboard</div>
                                <p data-aos="fade-up">
                                    EDUDE Dashboard is Clear and have only functionality menues and no so much irritation to select.
                                    Due to light weighted Dashboard.We will going to enhance more features like theme in Dashboard etc.
                                    <br>
                                    For Night Study we provided Dark-mode which will protect your eyes from screen rays on both mobile app as well as Desktop application.
                                    
                                </p>
                            </div>
                            <div class="col-sm-3 " data-aos="fade-up">
                                <img src="assest/img/svg/1628121756353.png" alt="EDUDE Understable Dashboard">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid edu_feat" data-aos="fade-up">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3 " data-aos="fade-up">
                                <img src="assest/img/svg/1628152149129.png" alt="EDUDE Live Video Classes">
                            </div>
                            <div class="col-sm-7  edu_dt">
                                <div class="edu_head" data-aos="fade-up">Live Video Classes</div>
                                <p data-aos="fade-up">
                                    EDUDE providing realtime live Video lectures with different features like screen share , screenshare with audio, low latency , 200+ people joined at same time , HD Video Quality etc.
                                    <br>
                                    Our Video Conferencing tools not intrrupt your important lectures due to slow Internet connectivities, It requires only 500kbps of speed of Internet.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid edu_feat rev" data-aos="fade-up">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7  edu_dt">
                                <div class="edu_head" data-aos="fade-up">A.I Based Routine</div>
                                <p data-aos="fade-up">
                                    According to Routine provided by Class-teacher of Class Video lecture Automatically allot the Subject Teacher which is provided in routine at that time in respective classes.
                                    <br>
                                    No need to provide name of teacher or Student Name before joining, It will atomatic give name of Teacher with routine subject.
                                    
                                </p>
                            </div>
                            <div class="col-sm-3 " data-aos="fade-up">
                                <img src="assest/img/svg/1628152149145.png" alt="EDUDE A.I Based Routine">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid edu_feat" data-aos="fade-up">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3 " data-aos="fade-up">
                                <img src="assest/img/svg/1628129988168.png" alt="EXAM Management System">
                            </div>
                            <div class="col-sm-7  edu_dt">
                                <div class="edu_head" data-aos="fade-up">EXAM Management System</div>
                                <p data-aos="fade-up">
                                    EDUDE providing flexible EXAM System for Schools/Teachers. Teacher can easily assign MCQs Based Test/EXAM For respective classes with Start_Time and Duration of Class.
                                    <br>
                                    EXAM have exam name , Time to start , Date of Schedule , Duration for Exam and after addition of Exam data Teacher able to start questions & Options from ADD Question Menu.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid edu_feat rev" data-aos="fade-up">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7  edu_dt">
                                <div class="edu_head" data-aos="fade-up">A.I Based Exam Handling</div>
                                <p data-aos="fade-up">
                                    As per Star_time Exam is scheduled for each student verified by A.I Algorithm for start Exam and within duration a timer is set to the examroom and after timer end it automatically submit the test.  
                                    <br>
                                    Once exam started no back or copy the text. Also Student can join test Start_time + duration Time. After this time exam will expire.
                                    
                                </p>
                            </div>
                            <div class="col-sm-3 " data-aos="fade-up">
                                <img src="assest/img/svg/1628129988160.png" alt="EDUDE A.I Based Exam Handling">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" data-aos="fade-up">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-11 col-11">
                                <a href="info?id=13" class="edu_btn">See More Screens</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid" id="security" data-aos="fade-up">
                 <div class="row">
                     <div class="col-sm-11">
                         <div class="edu_nxt_head" data-aos="fade-up">
                             EDUDE Security System
                            <div class="edu_lin"></div>
                        </div>
                     </div>
                 </div>
                 <div class="container-fluid secu">
                     <div class="row">
                         <div class="col-sm-11">
                             <div class="edu_pci" data-aos="fade-up"></div>
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-11 col-11">
                            <a href="info?id=13" class="edu_btn">Start Now</a>
                        </div>
                    </div>
                 </div>
                 <div class="container-xl secu_bk">
                     <div class="row">
                         <div class="col-sm-11 edu_nxt_head">
                             <div class="edu_head" data-aos="fade-up">All Data Encrypted with EDUDE Algorithm</div>
                             <div class="edu_lin"></div>
                         </div>
                         <div class="col-sm-2"></div>
                         <div class="col-sm-8">
                             <br>
                             <p data-aos="fade-up">
                                 EDUDE Technology uses it's own encrypting algorithm based on md5 & sha1.EDUDE developes A.I based Modified encryption algorithm which is modification of other encryption. 
                                 
                             </p>
                             <div class="edu_img" data-aos="fade-up"></div>
                         </div>
                         <div class="col-sm-1"></div>
                     </div>
                     <br>
                     <div class="row" id="pos">
                         <div class="col-sm-2"></div>
                         <div class="col-sm-2 s-img" data-aos="fade-up">
                             <h2> <b>Protected By:</b></h2> <img src="assest/img/svg/edu_antivirus.png" width="40%">
                         </div>
                         <div class="col-sm-2" data-aos="fade-up">
                             <h2> <b>Antivirus for Files:</b></h2> <img src="assest/img/svg/edu_mcafee.png" width="50%">
                         </div>
                         <div class="col-sm-2" data-aos="fade-up">
                             <h2> <b>Video Lectures Partner:</b></h2> <img src="assest/img/svg/edu_vc.png" width="50%">
                         </div>
                         <div class="col-sm-2" data-aos="fade-up">
                             <h2> <b>SSL Certified:</b></h2> <img src="assest/img/svg/edu_cf.png" width="55%">
                         </div>
                     </div>
                 </div>
            </div>
            <div class="container-fluid" id="pricing" data-aos="fade-up">
                    <div class="container">
                <div class="row">
                    <div class="col-11">
                        <div class="edu_nxt_head" data-aos="fade-up">
                            EDUDE Pricing
                            <div class="edu_lin"></div>
                        </div>
                    </div>
                    <br>
                    <div class="col-11">
                        <center style="color:pink;padding-top:10px;padding-bottom:10px;">
                            <h4>We are Only need Maintainance charge for Each College. No Extra Charge for anything Pay Monthly as Your Package.</h4>
                        </center>
                    </div>
                </div>
                </div>
                <div class="container edu_price">
                    <div class="row">
                        <div class="col-md-4 col-sm-4" data-aos="fade-up">
                           <div class="pricingTable" data-aos="fade-up">
                               <div class="pricingTable-header" data-aos="fade-up">
                                   <h3 class="heading">FREE</h3>
                                   <span class="subtitle">FREE SIGNUP For Trails</span>
                                   <div class="price-value">0
                                       <span class="currency">₹</span>
                                       <span class="month">/mo</span>
                                   </div>
                               </div>
                               <ul class="pricing-content" data-aos="fade-up">
                                   <li>2 Classrooms</li>
                                   <li>100 minutes Monthly Video Lectures</li>
                                   <li>5 Exams/Teachers</li>
                                   <li>No EDUDE INTRO SCHOOLS</li>
                                   <li>No your Own Domain</li>
                               </ul>
                               <a href="Register" class="read" data-aos="fade-up">Get Started<i class="fa fa-angle-right"></i></a>
                           </div>
                       </div>
                        <div class="col-md-4 col-sm-4" data-aos="fade-up">
                           <div class="card pricingTable" data-aos="fade-up">
                               <div class="pricingTable-header" data-aos="fade-up">
                                   <div class="ribbon red"><span>Popular</span></div>
                                   <h3 class="heading">VIP Schools/College</h3>
                                   <span class="subtitle">Use EDUDE Inbuilt Package</span>
                                   <div class="price-value">20,000
                                       <span class="currency">₹</span>
                                       <span class="month">/mo</span>
                                   </div>
                               </div>
                               <ul class="pricing-content" data-aos="fade-up">
                                   <li>102 Classrooms</li>
                                   <li>6000 minutes Monthly Video Lectures</li>
                                   <li>Unlimited Exams/Tests</li>
                                   <li>College Profile Management</li>
                                   <li>No your own Domain</li>
                               </ul>
                               <a href="Register" class="read" data-aos="fade-up" style="Width:200px;margin-left:calc(50% - 100px);">Get Started<i class="fa fa-angle-right"></i></a>
                           </div>
                       </div>
                        <div class="col-md-4 col-sm-4" data-aos="fade-up">
                           <div class="pricingTable" data-aos="fade-up">
                               <div class="pricingTable-header" data-aos="fade-up">
                                   <h3 class="heading">Premium</h3>
                                   <span class="subtitle">Installation of EDUDE in your own Websites</span>
                                   <div class="price-value">55,000
                                       <span class="currency">₹</span>
                                       <span class="month">/mo</span>
                                   </div>
                               </div>
                               <ul class="pricing-content" data-aos="fade-up">
                                   <li>Unlimited Classrooms</li>
                                   <li>Unlimited Video Lectures</li>
                                   <li>Unlimited Tests/Exams also Subjective Exams</li>
                                   <li>College/Schools Authority</li>
                                   <li>Your College/Schools Domain with edude</li>
                               </ul>
                               <a href="#" class="read" data-aos="fade-up">Contact Us<i class="fa fa-angle-right"></i></a>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            
           
            <div class="container-fluid" id="teams" data-aos="fade-up">
                <div class="container">
                      <div class="row">
                         <div class="col-sm-11">
                              <div class="edu_nxt_head" data-aos="fade-up">
                                 EDUDE Teams
                                 <div class="edu_lin" data-aos="fade-up"></div>
                              </div>
                         </div>
                         <div class="col-sm-11">
                             <div class="edu_team_tag" data-aos="fade-up">
                                 <center>
                                     <b>
                                         <h3>"We are family to work together and make possible everything so we are teams"</h3>
                                     </b>
                                 </center>
                             </div>
                         </div>
                      </div>
                </div>
                <div class="container teams" data-aos="fade-up">
                     <div class="row">
                         <div class="col-sm-6 pad-0" data-aos="fade-up">
                
                                      <div class="card  edu_team" data-aos="fade-up">
                                          <div class="row pad-0">
                                           <div class="col-6 shadow-lg lft" data-aos="fade-up">
                                              <div class="image-wrapper">
                                                  <img class="img-fluid card-img-top" src="assest/img/exam/edu_teacher.gif">
                                              </div>
                                              <div class="card-header">Er. VIKASH KUMAR</div>
                                              <div class="card-body">
                                                  <h2 class="card-title">Founder & Full-stack Developer</h2>
                             
                                              </div>
                                            </div>
                                            <div class="col-6  rgt" data-aos="fade-up">
                                              <div class="card-body">
                                                  <h4 class="card-title">About Vikash Kumar</h4>
                                                  <p class="card-text">
                                                      As Full-Stack Developer, Vikash Kumar created this whole website.<br>
                                                      The idea behind EDUDE was created during his study period facing too much problems during <b>COVID-19</b>. So he decided to create a such type of platform which enables realistic facilities in virtural mode. That's EDUDE &hellip;
                                                  </p>
                                                  <p class='kn'>
                                                      <b>
                                                          Know More &hellip;
                                                      </b>
                                                  </p>
                                                  
                                              </div>
                                              <div class="card-footer" data-aos="fade-up">
                                                        <ul>
                                                           <li >
                                                             <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                                           </li>
                                              
                                                           <li >
                                                               <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                                           </li>
                                                           <li >
                                                              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                                           </li>
                                                        </ul>
                                               </div>
                                            </div>
                                          </div>
                                      </div>
                                  
                         </div>
                         <div class="col-sm-6 " data-aos="fade-up">
                
                                      <div class="card  edu_team" data-aos="fade-up">
                                          <div class="row pad-0">
                                           <div class="col-6  shadow-lg lft" data-aos="fade-up">
                                              <div class="image-wrapper">
                                                  <img class="img-fluid card-img-top" src="assest/img/exam/edu_teacher.gif">
                                              </div>
                                              <div class="card-header">Er. VISHNU VINOJ</div>
                                              <div class="card-body">
                                                  <h2 class="card-title">Designer & Documentation</h2>
                            
                                              </div>
                                            </div>
                                            <div class="col-6  rgt" data-aos="fade-up">
                                              <div class="card-body">
                                                  <h4 class="card-title">About Vishnu Vinoj</h4>
                                                  <p class="card-text">
                                                      Vishnu Vinoj Leads role in Designing and Documentation. He is also a software Engineer and trying to gives best idea in team. Testing and Bugs fitting analyse by him and provide all documents required for this project.
                                                      <br>
                                                      He has good skills in Software & Web DEvelopment .
                                                  </p>
                                                  <p class='kn'>
                                                      <b>
                                                          Know More &hellip;
                                                      </b>
                                                  </p>
                                                  
                                              </div>
                                              <div class="card-footer" data-aos="fade-up">
                                                        <ul>
                                                           <li >
                                                             <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                                           </li>
                                              
                                                           <li >
                                                               <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                                           </li>
                                                           <li >
                                                              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                                           </li>
                                                        </ul>
                                               </div>
                                            </div>
                                          </div>
                                      </div>
                                  
                         </div>
                     </div>
                </div>
            </div>
           
            <div class="container-fluid" id="why" data-aos="fade-up">
                <div class="container">
                      <div class="row">
                         <div class="col-sm-11">
                              <div class="edu_nxt_head" data-aos="fade-up">
                                 Why EDUDE?
                                 <div class="edu_lin" data-aos="fade-up"></div>
                              </div>
                         </div>
                         <div class="col-sm-11">
                             <div class="edu_team_tag" data-aos="fade-up">
                                 <center>
                                     <b>
                                         <h3>"What's different in EDUDE makes it usefull?"</h3>
                                     </b>
                                 </center>
                             </div>
                         </div>
                      </div>
                </div>
                <div class="container"   data-aos="fade-up">
                    <div class="row why"  data-aos="fade-up">
                        <div class="col-4"  data-aos="fade-up">
                            <img src="assest/img/exam/edu_student.gif" data-aos="fade-up">
                        </div>
                        <div class="col-7 point" data-aos="fade-up">
                            <h1 data-aos="fade-up">Pandemic has no place in Schools</h1>
                            <p data-aos="fade-up">
                                In 2020, whole world suffer from <b>COVID-19</b> Viral disease which becom pandemic in world. All Countries allows Full Lockdown. By which Many Daily Activities goes stopped, Education is also part of that.<br>
                                Due to some application in market helps to restart the education but not fully workable applications were meet. Different different applications were used in schools by which students motive of study going losse.
                                <br>
                                So, EDUDE is a program which enables that types of classrooms where there is no place for any pandemic or virals. This program gives all features which need in real classrooms in virtual mode.
                                Any Schools/college registered here and start their schools/college without intrruption.EDUDE Continuously adding more and new features.
                                <br>
                                Made in India &hearts; App now available for India.
                            </p>
                        </div>
                    </div>
                    <div class="row why wrev"  data-aos="fade-up">
                        <div class="col-4"  data-aos="fade-up">
                            <img src="assest/img/exam/edu_teacher_4.gif" data-aos="fade-up">
                        </div>
                        <div class="col-7 point" data-aos="fade-up">
                            <h1 data-aos="fade-up">Classroom Like Real</h1>
                            <p data-aos="fade-up">
                                 Online learning is the virtual mode learning but Our Intelligence System maintain it in such way that it feels like real classroom. If you have any doubt you will message in chat or tell directly to the teachers.
                                <br>
                                 We will trying to put whiteboard in Our lecture system such way that teacher can easily make undestand to their students. Provide whiteboard , dusters , pens in virtual mode just like real.
                                 A.I based system also have authority to mute microphone those makes noise and if they continuously make it. A.I removed them and send notification to Admin of your college/schools i.e. Principle.
                                <br>
                                Made in India &hearts; App now available for India.
                            </p>
                        </div>
                    </div>
                    <div class="row why"  data-aos="fade-up">
                        <div class="col-4" style="text-align:center;" data-aos="fade-up">
                            <img src="assest/img/svg/1628192776281.png" style="width:42%;" data-aos="fade-up">
                        </div>
                        <div class="col-7 point" data-aos="fade-up">
                            <h1 data-aos="fade-up">A.I Based Lecture System</h1>
                            <p data-aos="fade-up">
                                 When class teacher of respective class set the routine for the class. At time of lecture A.I system allot the routine teacher at that time. No need to give name of teacher , no need to give name of class teacher, It automatically assign from the teacher profile.
                                 <br>
                                  Our video leacture have facility to share audio with screenshare by which a pre-recorded lecture also can go through this system. No Any meeting links required jus one click you will start your lectures. For VIP Colleges/Schools also have lecture recording system which automatically assign with E-Libraries.
                                <br>
                                Made in India &hearts; App now available for India.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
           
           <div class="par" id="partner">
               <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                               <div class="site-heading text-center">
                                   <h2>Our <span>Partners</span></h2>
                                   <h4>Meet our partners and Guide</h4>
                               </div>
                             </div>
                         </div>
               <div class="row" style="margin-top:-50px;">
                   <div class="col-sm-auto col-md-4 col-lg-3 single-item"></div>
                  <div class="col-sm-auto col-md-4 col-lg-3" style="margin-top:-10px;">
                     <div class="square-holder">
                         <img alt="" height="80px" src="./assest/img/logo.png" />
                     </div>
                   </div>
                   <div class="col-sm-auto col-md-4 col-lg-3" style="margin-top:-10px;">
                     <div class="square-holder">
                         <img alt="" height="140px" src="./assest/img/bbdit.png" />
                     </div>
                   </div>
                   <div class="col-sm-auto col-md-4 col-lg-3 single-item"></div>
                   
               </div>
              </div>
           </div>
	   </div>
	   <div class="efoot">
	       <?php
		     include("components/footer.php");
		   ?>
	   </div>
       <div class="glitchButton" style="position:fixed;top:20px;right:20px;"></div>
       <script src="https://button.glitch.me/button.js"></script>
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

                     // Initialize deferredPrompt for use later to show browser install prompt.
                    

                });
            </script>
   </body>
</html>