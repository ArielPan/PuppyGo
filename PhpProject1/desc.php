<html lang="en">

    <title>DATA</title>
    <link rel="stylesheet" href="css/list-table.css" />
          <head>
		<meta charset="UTF-8">
		<title>Beach List</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
    <body>
        <header id="header">
				<h1><a href="index.html">Team Skylark</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="map.php">Map</a></li>
						<li><a href="list.php">List</a></li>
						<li><a href="#" class="button special">Sign Up</a></li>
					</ul>
				</nav>
			</header>
                               <section id="main" class="wrapper">
				<div class="container">
                                       <header class="major">
						<h2>
                      <?php
/* @var $select type */
$select = $_GET["no"];
$servername = "40.126.224.41";
$username = "will";
$password = "password";
$dbname = "beach";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Setup SQL query
$sql ="SELECT * FROM beach WHERE no = $select";
$result = $conn->query($sql);

//Data Extrated
 while($row = $result->fetch_assoc())
{
   echo $row["beach_name"]."<br>\n";
}
$conn->close();
?></h2>		
					</header>
           <section id="main" class="wrapper">
				<div class="container">
            <img src="images/beachPhoto.jpg "style="min-width: 100%; min-height: 100%; vertical-align: middle;">
            <div class="container">
            <h4><?php
$select = $_GET["no"];
$servername = "40.126.224.41";
$username = "will";
$password = "password";
$dbname = "beach";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Setup SQL query
$sql ="SELECT * FROM beach WHERE no = $select";
$result = $conn->query($sql);

//Data Extrated
 while($row = $result->fetch_assoc())
{
  // echo "Beach Name: ".$row["beach_name"]."<br>\n";
   echo "Address: ".$row["address"]."<br>\n";
  // echo "Dog-walking Area: ".$row["area"]."<br>\n";
   //echo "Description: ".$row["description"]."<br>\n";
}
$conn->close();
?>        </h4>
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2214.5623868866323!2d144.49429022203262!3d-38.28264157302546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2e4ff31f845494d9!2sWSUP+-+Stand+Up+Paddleboarding!5e0!3m2!1sen!2sau!4v1472044454144"  frameborder="0" style="min-width: 100%; min-height: 100%; vertical-align: middle;" allowfullscreen></iframe>
            <img src="images/facilities.PNG "style="min-width: 100%; min-height: 100%; vertical-align: middle;">
            </div>
            </div>>
         </section>
            <div class="container">
             	<div class="container">
					<header class="major">
						<h2>How is weather in Barwon Heads ? </h2>
					
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
                                                            <img src="images/cloudy.jpg "height= "150" width="170">
								<h3>Cloudy</h3>
								<p>It is not a good time to take your dog to Barwon Heads beach :) </p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
                                                            <img src="images/temp.PNG" height="150" width="130">
								<h3>Temperature</h3>
								<p>It's a bit cold at the beach side, be careful :)  </p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
                                                            <img src="images/details.PNG" height="150" width="200">
								<h3>Details</h3>
								<p>It seems that it is good to stay home with your puppy :)</p>
							</section>
						</div>
					</div>
				</div>
            </div>
             


            <div class="container">
					<header class="major">
						<h2>What sports can you do at Barwon Heads beach ? </h2>
					
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
                                                            <img src="images/surfing.jpg "height= "150" width="200">
								<h3>Surfing</h3>
								<p>Go surfing and take a cool photo to show to your friends :) </p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
                                                            <img src="images/sand volleball.jpg" height="150" width="200">
								<h3>Sand volleyball</h3>
								<p>go and have a game with your puppy :)  </p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
                                                            <img src="images/frisbee.PNG" height="150" width="200">
								<h3>Frisbee</h3>
								<p>Puppies always like play frisbee with you :)</p>
							</section>
						</div>
					</div>
				</div>
  </div>
 </section>
        <section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>You can make a comment of this beach!</h2>
						
					</header>
				</div>
				<div class="container 50%">
					<form action="#" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
								<input name="name" id="name" value="" placeholder="Name" type="text">
							</div>
							<div class="6u$ 12u$(small)">
								<input name="email" id="email" value="" placeholder="Email" type="email">
							</div>
							<div class="12u$">
								<textarea name="message" id="message" placeholder="Message" rows="6"></textarea>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input value="Send Message" class="special big" type="submit"></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			</section>
        <footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>The copyright of data we used belongs </h3>
								<ul class="unstyled">
									<li><a href="www.google.com">Google Map</a></li>
									<li><a href="www.doggo.com">Doggo</a></li>
					                 	</ul>
							</section>
                                                </div>
																										</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

</body>
</html>


