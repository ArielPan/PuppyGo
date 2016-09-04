<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Dog-friendly Beaches Map</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery-3.1.0.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
                <script src="distance.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
                        <link rel="stylesheet" href="css/listpage.css.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>
       <?php
        include 'header.php';
       ?>  

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
                                            <h2>Dog-friendly beaches map</h2>
                                                <p>This map will show all the dog-friendly beaches in Victoria, as well as your current location. Feel free to click on the beach you would like to explore.</p>
					</header>    
                                    <form>
                                        <?php
                                        $test = $_GET["w1"];
                                        $hello = explode(',',$test); 
                                        $beachzone = $hello[0];
                                        //echo $beachzone;
                                        $facility = $hello[1];
                                        //echo $facility;
                                        $sports = $hello[2];
                                        require_once 'databaseConnect.php';
                                        $sql = "SELECT * FROM beachinfo where zone= '$beachzone' AND $facility= 1 AND $sports =1";
                                        $result = mysqli_query($dbc, $sql);
                                        //   for ($row = mysqli_fetch_array($result) && $row['no']=1; $row['no']<42; $row['no']++)
                                        while(($row = mysqli_fetch_array($result)))
                                            {
//                                            require_once 'test.php';
//                                            test($row['no']);
                                            session_start();
                                            $_SESSION['no'] = $row['no'];
                                            $name = "distance";
                                            
                                            echo '<div class = "image">
                                            <a href = "desc.php?no='.$row['no'].'"> <img style="width: 600px; height: 300px"; src="'.$row['img_url'].'" width="1600" height="60" />
                                            <h2><a href = "desc.php?no='.$row['no'].'" > '.$row['name'].'</a></h2>
                                            <p>'.$row['address'].'</p>
                                            </div>';
                                            echo '<p class="wordText" id="'.$name.'">distance</p>';
                                            session_abort();   
                                        }
                                         ?>
<!--                                        <input id="distance" name="distance" type="text" value="" />-->
                                    </form>   
                                </div>
			</section>
        <?php
        include 'footer.php';
        ?>
	</body>
</html>