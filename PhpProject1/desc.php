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
                           $u = "6u";
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
       </section>
        <section id="main" class="wrapper">
            <div class="container">                          
                        <?php   
                        $select = $_GET["no"];
                        $sql = "SELECT * FROM beachinfo WHERE no = $select";
                        $result = mysqli_query($dbc, $sql);
                    while($row = mysqli_fetch_array($result)) 
                     {
                           $bin_image = "images/facility/bin";
                           $coffee_image = "images/facility/coffee-cup";
                           $hospital_image = "images/facility/hospital";
                           $nobin_image = "images/facility/no-bin";
                           $nocoffee_image = "images/facility/no-coffee-cup";
                           $nohospital_image = "images/facility/no-hospital";
                           $noparking_image = "images/facility/no-parking";
                           $nopicnic_image = "images/facility/no-picnic";
                           $notoilet_image = "images/facility/no-toilet";
                           $notap_image = "images/facility/no-tap";
                           $parking_image = "images/facility/parking";
                           $picnic_image = "images/facility/picnic";
                           $tap_image = "images/facility/tap";
                           $toilet_image = "images/facility/toilet";
                           $uniform = "row 20% uniform";
                           $u = "1u";
                           $fit = "image fit";
                     //   echo  $row["surfing"] . $row["sand_volleyball"] . $row["frisbee"] . $row["swimming"].  $row["sand_soccer"]."<br>";
                       echo '<div class="' .$uniform.'">';
                        if ($row["toilet"] ==1 )
                        {      
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$toilet_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                        }
                        else
                        {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$notoilet_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                        }
                        if ($row["bin"] ==1)
                            {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$bin_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                            }
                        else
                        {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$nobin_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                        }
                          if ($row["waterspot"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$tap_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$notap_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                         } 
                         if ($row["parking"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$parking_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$noparking_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                         } 
                         if ($row["cafe"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$coffee_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$nocoffee_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                         } 
                         if ($row["bbq"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$picnic_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$nopicnic_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                         } 
                         if ($row["clinic"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$hospital_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$nohospital_image.'.png" />';
                            echo '</span>';
                            echo '</div>';
                         } 
                         echo "</div>";     
                     }
                        ?>	                              
                  </div>   
        </section>
        <div class="container">

            <header class="major">
                <h2>How is weaher in Barwon Heads ? </h2>

            </header>
            <div class="row 150%">
                <div class="4u 12u$(medium)">
                    <?php
                    // set default timezone
                    date_default_timezone_set('Australia/Melbourne');
                    require_once 'databaseConnect.php';
                    $select = $_GET["no"];
                    $sql = "SELECT * FROM beachinfo WHERE no = $select";
                    $result = mysqli_query($dbc, $sql);
                    while($row = mysqli_fetch_array($result)) {
                        $suburb = $row["zone"];
                    }

// api

                    $api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $suburb . "mode=json&units=metric&appid=6552ec0a723e855d8c6eb7618a0706aa";
                    $api_url = str_replace(" ", "%20", $api_url);
                    $weather_data = file_get_contents($api_url);
                    $json = json_decode($weather_data, TRUE);
//json

                    $user_temp = $json['main']['temp'];
                    $user_humidity = $json['main']['humidity'];
                    $user_conditions = $json['weather'][0]['main'];
                    $user_wind = $json['wind']['speed'];
                    $user_wind_direction = $json['wind']['deg'];
                    $user_sunrise = $json['sys']['sunrise'];
                    $user_sunset = $json['sys']['sunset'];
                    $user_sunrise = date('d M Y H:i:s', $user_sunrise);
                    $user_sunset = date('d M Y H:i:s', $user_sunset);

                    //  $degree =  $user_wind_direction;
                    //   $user_wind_direction = (int)str_replace(' ', '',$user_wind_direction);
                    //  $user_wind_direction = 70;

                    function toTextualDescription($user_wind_direction) {
                        if (($user_wind_direction > 337.5 && $user_wind_direction < 360) || ($user_wind_direction > 22.5 && $user_wind_direction < 22.5)) {
                            return 'Northerly';
                        } else if ($user_wind_direction > 22.5 && $user_wind_direction < 67.5) {
                            return 'North Easterly';
                        } else if ($user_wind_direction > 67.5 && $user_wind_direction < 112.5) {
                            return 'Easterly';
                        } else if ($user_wind_direction > 122.5 && $user_wind_direction < 157.5) {
                            return 'South Easterly';
                        } else if ($user_wind_direction > 157.5 && $user_wind_direction < 202.5) {
                            return 'Southerly';
                        } else if ($user_wind_direction > 202.5 && $user_wind_direction < 247.5) {
                            return 'South Westerly';
                        } else if ($user_wind_direction > 247.5 && $user_wind_direction < 292.5) {
                            return 'Westerly';
                        } else if ($user_wind_direction > 292.5 && $user_wind_direction < 337.5) {
                            return 'North Westerly';
                        }
                    }

//
                    echo "<strong> Temperature: </strong>" . $user_temp . " C<br />";
                    echo "<strong> Humidity: </strong>" . $user_humidity . "%<br />";
                    echo"<strong> Conditions: </strong>" . $user_conditions . "<br />";
                    echo"<strong> Wind speed: </strong>" . $user_wind . "meter/sec<br />";
                    echo"<strong> Wind direction: </strong>" . toTextualDescription($user_wind_direction) . "<br />";
                    echo"<strong> Sunrise: </strong>" . $user_sunrise . "<br />";
                    echo"<strong> Sunset: </strong>" . $user_sunset . "<br />";
                    ?>
                    <section class="box">
                        <img src="images/<?php echo $user_conditions?>.jpg " width="100%">
                        <h3><?php
                        echo "<strong >Conditoins:</strong>" .$user_conditions."</br>";
                        ?></h3>

                    </section>
                </div>
                <div class="4u 12u$(medium)">
                    <section class="box">
                            <header class="major">
                                
                            <font size=20><?php  echo $user_temp."℃"?></font>;
                                
                          
                        <h3>Temperature</h3>
                        <p>It's a bit cold at the beach side, be careful :)  </p>
                    </section>
                </div>
                <div class="4u$ 12u$(medium)">
                    <section class="box">
                        <img src="images/details.PNG" height="150" width="170">
                        <h3>Details</h3>
                        <p>It seems that it is good to stay home with your puppy :)</p>
                    </section>
                </div>

            </div>
        </div>
         </section>
         
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


