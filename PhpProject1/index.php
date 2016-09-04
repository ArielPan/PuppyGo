﻿<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>PuppyGo</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
                <script src="js/jquery-3.1.0.min.js"></script>
                <script src="filter.js"></script>
		<script src="js/skel.min.js"></script>
                <script src="distance.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
                
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />  
		</noscript>
                <style type="text/css">  
        #filter  
        {  
            width:620px;  
            height:auto;  
            margin-left:auto;  
            margin-right:auto;  
            font-size:16px;  
        }  
          
        #filter dl  
        {  
            padding:0;  
            margin-top:0;  
            margin-bottom:0;  
            clear:both;  
            padding:6px 0;          
        }  
          
        #filter dt,dd  
        {  
            display:block;  
            float:left;  
            width:auto;  
            padding:0;  
            margin:4px 0;                     
        }  
          
        #filter dt  
        {  
            height:16px;  
            padding-bottom:4px;  
            font-weight:bold;  
            color:#FFFFFF;            
        }  
          
        #filter dd  
        {  
            color:#005AA0;  
            margin-right:8px;  
        }  
          
        #filter a
        {  
            color:#FFFFFF;
            cursor:pointer;  
        }  
        
        #filter facility
      {
          color:#FFFFFF;
          cursor: pointer;
      }
        
        .seling  
        {  
            background-color:#33CCFF;  
            color:#FFFFFF;  
        }  
          
        .seled  
        {  
            background-color:#33CCFF;  
            color:#424242;  
        }  
       
        
    </style>  
	</head>
	<body class="landing">
            <?php
            include 'header.php';
            ?>

		<!-- Banner -->
			<section id="banner" >
                            <h2>Hi. Welcome to PuppyGo!.</h2>
                            <p>Try to find the best dog-friendly beach for you! <br/> 
                                Please choose your preference about the beach.</p>
                            <div id="filter">  
                                    <dl>  
                                        <dt>Suburb：</dt>  
                                        <dd><div><a>Melbourne Suburbs</a></div></dd>  
                                        <dd><div><a>Mornington Peninsula</a></div></dd>  
                                        <dd><div><a>Philip Island</a></div></dd>  
                                        <dd><div><a>Bellarine Peninsula</a></div></dd>
                                        <dd><div><a>Apollo Bay</a></div></dd>
                                    </dl>  
                                    <dl>  
                                        <dt>Facilities：</dt> 
                                        <dd><div><a>toilet</a></div></dd>  
                                        <dd><div><a>bin</a></div></dd>  
                                        <dd><div><a>waterspot</a></div></dd>  
                                        <dd><div><a>parking</a></div></dd>  
                                        <dd><div><a>cafe</a></div></dd>  
                                        <dd><div><a>clinic</a></div></dd>  
                                        <dd><div><a>bbq</a></div></dd> 
                                    </dl>  
                                    <dl>  
                                        <dt>Activity with your dog：</dt>   
                                        <dd><div><a>frisbee</a></div></dd>  
                                        <dd><div><a>sand_volleyball</a></div></dd>  
                                        <dd><div><a>sand_soccer</a></div></dd>  
                                        <dd><div><a>swimming</a></div></dd>  
                                        <dd><div><a>surfing</a></div></dd>   
                                    </dl>   
                                </div>
                            <br />
                            <br />
                            <br />
                            <br />
                            <center>
                            <div class="container">
                            <div class="row 150%" >
                                <div class="4u 12u$(medium)">
                                <ul class="actions">
                                    <li>
                                        <a class="button medium" id="GO">Go to your Beach</a>
                                    </li>
                                </ul>
                                </div>
                                <div class="4u 12u$(medium)">
				<ul class="actions">
					<li>
						<a href="map.php" class="button medium">View Beach on Map</a>
					</li>
				</ul>
                                    </div>
                                    <div class="4u 12u$(medium)">
                                <ul class="actions">
					<li>
						<a href="list.php" class="button medium">View All Beach List</a>
					</li>
				</ul>
                                        </div>
                            </div>
                            </div>
                            </center>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>How does our website help you? </h2>
						<p>We understand that almost every dog owner is willing to take their dog to a beach, but they would like to take their
                        dog to a green park rather than a beach. The reason is dog-owners are not sure whether there are enough dog-friendly
                        facilities to use, and are also concerned about the other real-time information around the beach. By using our web, all this information will be
                        provided to you! Check the process below</p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
                                <img src="images/icon1.PNG "height= "150" width="170">
								<h3>Step 1</h3>
								<p>You can look for all the dog-friendly beaches in VIC either from a map or a list, access form the top right corner of the webpage. </p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
                                <img src="images/icon2.PNG" height="150" width="130">
								<h3>Step 2</h3>
								<p>You can click beach icon on the map or list, then more detailed information about that beach will be provided. </p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
                                <img src="images/icon3.PNG" height="150" width="200">
								<h3>Step 3</h3>
								<p>Finally, you can decide where to go. Don't forget to leave feedback after finishing the journey~</p>
							</section>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Try to connect with us</h2>
						<p>You can contact with us 24/7, we are young, we would love to hear precious feedback from you!</p>
					</header>
					<section class="profiles">
						<div class="row">
							<section class="3u 4u(medium) 8u$(medium) profile">
                                <img src="images/A.PNG " height="150" width="130" alt="" />
								<h4>Ariel</h4>
								<p>Software Developer</p>
							</section>
							<section class="3u 4u(medium) 8u$(xsmall) profile">
                                <img src="images/C.PNG" height="150" width="130" alt="" />
								<h4>Cris</h4>
								<p>UI design</p>
							</section>
                            <section class="3u 4u(medium) 8u$(xsmall) profile">
                                <img src="images/D.PNG" height="150" width="130" alt="" />
                                <h4>Dexter</h4>
                                <p>UI design, Market analysis</p>
                            </section>
							<section class="3u 4u(medium) 8u$(xsmall) profile">
                                <img src="images/R.PNG" height="150" width="130" alt="" />
								<h4>Ritika</h4>
								<p>Data processer</p>
							</section>
							<section class="3u 4u(medium) 8u$(xsmall) profile">
                                <img src="images/W.PNG" height="150" width="130" alt="" />
								<h4>Will</h4>
								<p>Data ETL</p>
							</section>
						</div>
					</section>
					<footer>
						<p>We are all the postgraduate students in university, most data been used may lack consistency due to data maintenance, we apologize for any inconvenience </p>
						
					</footer>
				</div>
			</section>
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Skylark. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>

					</div>
				</div>
			</footer>

	</body>
</html>