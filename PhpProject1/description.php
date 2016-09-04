<html lang="en">
<meta charset="UTF-8">
    <title>Description</title>
    <link rel="stylesheet" href="css/list-table.css" />
    <head>
        <title>Description</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
                <script src="js/jquery-3.1.0.min.js"></script>
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
                        {  $desc = $row["desc"];
                           $leashinfo = $row["on/offleashinfo"];
                           $uniform = "row 50% uniform";
                           $u = "10u";
                           $fit = "image fit";
                           $map_url = $row["map_link"];
                           $img = $row["img_url"];
                           echo '<section style="background-image: url('.$img.')" id="test" fixed 50%;>
                                 <div>
                                 <h2><span>'.$row["name"].'&nbsp&nbsp<br />&nbsp&nbsp&nbsp'.$row["address"].'</span></h2>
                                 </div>
                                 </section>';
                        }
            ?>
            <br /><br /><br /><br /><br />
      <table>
          <tr id="row1">
           <td>

               <font size=5>
               <font color =red>
                <?php echo "On-leash and Off-leash info: ";?>
                </font>
                </font>
               <b><font color="white"> =<?php echo $leashinfo?></font></b><br /><br />


               <p> <font size=5>
               <font color =#ffff99>
                <?php echo "Description: ";?>
                </font>
                </font>
                <b><font color="white"><?php echo $desc?></font></b></p>




            </td>
            <td>

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
                    $api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $suburb . "&mode=json&units=metric&appid=6552ec0a723e855d8c6eb7618a0706aa";
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
                    echo "  <strong>  Temperature: </strong>","<font color =white>" . $user_temp . " C </font><br />";
                    echo "<strong> Humidity: </strong>", "<font color =white>". $user_humidity . "%</font><br />";
                    echo"<strong> Conditions: </strong>" ,"<font color =white>". $user_conditions . "<br />";
                    echo"<strong> Wind speed: </strong>" ,"<font color =white>". $user_wind . "meter/sec<br />";
                    echo"<strong> Wind direction: </strong>" ,"<font color =white>". toTextualDescription($user_wind_direction) . "<br />";
                    echo"<strong> Sunrise: </strong>","<font color =white>" . $user_sunrise . "<br />";
                    echo"<strong> Sunset: </strong>","<font color =white>" . $user_sunset . "<br />";
                    ?>
                    <div class="row">
                    <div class="6u 12u$(medium)">
                    <section class="box">
                        <img src="images/weather/<?php echo $user_conditions?>.png " width="100%">
                        <h3><?php
                       echo $user_conditions;
                        ?></h3>

                    </section>
                </div>
                <div class="6u 12u$(medium)">
                    <section class="box">

                            <font size=20><?php  echo $user_temp."℃"?>
                            </font>
                    </section>
                </div>
            </div>
        </div>

                <font size=5>
               <font color =#2E86C1 >
                <?php echo "Facilities provided on the beach: ";?>
                </font>
                </font>

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

            </td>
          </tr>
          </table>






         <section id="main" class="wrapper">
            <div class="container">
          <header class="major">
                <font size=20>
              <b>  <font color =white>
                   <?php  echo "Recommended activities";?>
                  </font>  </b>
               </font>
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
                        $sql = "SELECT surfing, sand_volleyball, frisbee, swimming, sand_soccer FROM activity WHERE no = $select";
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
            <section>
                <header class="major">
                <font size=20>
              <b>  <font color =white>
                   <?php  echo "Check the map here";?>
                  </font>  </b>
               </font>
           </header>
                <div> <iframe src=<?php echo $map_url; ?>  width="100%" height="75%"  frameborder="0" style="border:0" allowfullscreen></iframe></div>
            </section>
            <br />
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


