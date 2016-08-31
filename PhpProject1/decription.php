<html lang="en">

    <title>Description</title>
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
                        <link href="css/bootstrap.min.css" rel="stylesheet">
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
    <body>
        <?php
        include 'header.php';
        ?>
        <section id="main" class="wrapper">
        <div class="container">

            <?php
                        /* @var $select type */
                        require_once 'databaseConnect.php';
                        $select = $_GET["no"];
                        $sql1 = "SELECT * FROM beachinfo WHERE no = $select";
                        $result1 = mysqli_query($dbc, $sql1);
                        //Data Extrated
                         while($row = mysqli_fetch_array($result1))
                        {  $uniform = "row 50% uniform";
                           $u = "4u";
                           $fit = "image fit";
                           $img = $row["img_url"];
                           echo '<h2><a href = "desc.php?no='.$row['no'].'" > '.$row['name'].'</a></h2>';
                           echo '<div class="'.$u.'">';
                           echo '<span class="'.$fit.'">';
                           echo '<img src="'.$img.'" />';
                           echo '</span>';
                           echo '</div>';
                        }
            ?>
        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-11">
                <h1 class="page-header">Portfolio Item
                    <small>Item Subheading</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                
                <img class="img-responsive" src="http://placehold.it/750x500" alt="">
            </div>

            <div class="col-md-4">
                <h3>Project Description</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                <h3>Project Details</h3>
                <ul>
                    <li>Lorem Ipsum</li>
                    <li>Dolor Sit Amet</li>
                    <li>Consectetur</li>
                    <li>Adipiscing Elit</li>
                </ul>
            </div>

        </div>
    <section id="main" class="wrapper">
            <div class="container">                          
          <header class="major">
                <h2>What sports can you do ? </h2>
             </header>
                        <?php   
                        $select = $_GET["no"];
                        $servername = "40.126.224.41";
                        $username = "will";
                        $password = "password";
                        $dbname = "beach";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT surfing, sand_volleyball, frisbee, swimming, sand_soccer FROM beachinfo WHERE no = $select";
                        $result = $conn->query($sql); 
                       while($row = $result->fetch_assoc())
                     {
                           $surfing_image = "images/sport/surfing";
                           $volleyball_image = "images/sport/volleyball";
                           $frisbee_image = "images/sport/frisbee";
                           $swimming_image = "images/sport/swimming";
                           $soccer_image = "images/sport/soccer";
                           $uniform = "row 50% uniform";
                           $u = "4u";
                           $fit = "image fit";
                     //   echo  $row["surfing"] . $row["sand_volleyball"] . $row["frisbee"] . $row["swimming"].  $row["sand_soccer"]."<br>";
                       echo '<div class="' .$uniform.'">';
                        if ($row["surfing"] ==1 )
                        {      
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$surfing_image.'.jpg" />';
                            echo '</span>';
                            echo '</div>';
                        }
                        if ($row["sand_volleyball"] ==1)
                            {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$volleyball_image.'.jpg" />';
                            echo '</span>';
                            echo '</div>';
                            }
                          if ($row["frisbee"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$frisbee_image.'.jpg" />';
                            echo '</span>';
                            echo '</div>';
                               }
                             if ($row["swimming"] ==1)
                                  { 
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$swimming_image.'.jpg" />';
                            echo '</span>';
                            echo '</div>';
                                  }
                               if ($row["sand_soccer"] ==1)
                                      {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$soccer_image.'.jpg" />';
                             echo '</span>';
                            echo '</div>';
                                      }
                         echo "</div>";     
                     }
                        $conn->close();
                        ?>	                              
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
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
