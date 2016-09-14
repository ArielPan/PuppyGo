<!DOCTYPE html>
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
                <script src="js/jquery.raty.min.js"></script>
                <script src="js/newRate.js"></script>
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
    <section width="100%">
        <div class="container" >

            <?php
                        /* @var $select type */
                        require_once 'databaseConnect.php';
                        $select = $_GET["no"];
                        $sql1 = "SELECT * FROM beachinfo WHERE no = $select";
                        $sql2 = "SELECT AVG(overallRate) from rating where beachId = $select";
                        $result1 = mysqli_query($dbc, $sql1);
                        $result2 = mysqli_query($dbc, $sql2);
                        while($row2 = mysqli_fetch_array($result2)){
                            $overallRate = $row2['AVG(overallRate)'];
                        }
                        //Data Extrated
                         while($row = mysqli_fetch_array($result1))
                        {  $desc = $row["desc"];
                           $leashinfo = $row["on/offleashinfo"];
                           $uniform = "row 50% uniform";
                           $u = "10u";
                           $fit = "image fit";
                           $map_url = $row["map_link"];
                           $img = $row["img_url"];
                           echo '<header class="major">
                                 <h2>'.$row["name"].'</h2>
                                 <p><font=2>&nbsp&nbsp&nbsp'.$row["address"].'</p>
                                 <div id="star" data-number='.$overallRate.'></div>
                                 </header>
                                 <p><span class="image left"><img src='.$row["img_url"].' alt="" /></span><p style=" font-size:150%; font-weight:bold; margin-bottom:0">Description:</p>'.$row["desc"].'</p>
                                 <p><p style="font-size:150%;font-weight:bold; margin-bottom:0">On-Leash/Off-Leash Information:</p>'.$row["on/offleashinfo"].'</p>
                                 ';
                        }
            ?>
          </div>
        
        </section>
        
        <br /><br /><br />
        
      <hr />
            <section><div class="container" aligen="left"> <font size=5 color=#000000><strong>Weather inforamtion</strong></font></div><br />
            <div class="container"><?php
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
            $space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo"<fieldset>";
            echo"<img src='images/weather/$user_conditions.png' width=60x height=60px />" .$user_temp. "°C $space";
            echo "<img src='images/weather/drop.png' width=40px height=40px />","<font color =black>". $user_humidity . "%$space</font>";
            echo"<img src='images/weather/wind(2).png' width=40px height=40px />","<font color =black>". $user_wind . "&nbsp meter/sec $space";
            echo"<img src='images/weather/sunrise.png' width=40px height=40px />","<font color =black>" . $user_sunrise ."$space";
            echo"<img src='images/weather/sunset.png' width=40px height=40px />","<font color =black>" . $user_sunset . "$space";
            echo"</fieldset>";
            ?></div></section>
           
 
   
        
        
        
        
<br /><br />
<section>
    <div class="container">
        <font size="5" color=#000000><b>Facilities on the beach</b></font></div><br />
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
                           $uniform = "row 100% uniform";
                           $u = "1u";

                           $fit = "image fit";
                   

                          echo '<div class="' .$uniform.'">';
                        if ($row["toilet"] ==1 )
                        {
                           echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$toilet_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                        }
                        else
                        {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$notoilet_image.'.png" width=40px height=40px />';
                           echo '</span>';
                            echo '</div>';
                        }
                        if ($row["bin"] ==1)
                            {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$bin_image.'.png"width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                            }
                        else
                        {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$nobin_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                        }
                          if ($row["waterspot"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$tap_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                           echo '<span class="'.$fit.'">';
                            echo '<img src="'.$notap_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                         }
                         if ($row["parking"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$parking_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$noparking_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                         }
                         if ($row["cafe"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$coffee_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$nocoffee_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                         }
                         if ($row["bbq"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$picnic_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$nopicnic_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                         }
                         if ($row["clinic"] ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$hospital_image.'.png" width=40x height=40px />';
                            echo '</span>';
                            echo '</div>';
                               }
                         else
                         {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$nohospital_image.'.png" width=40px height=40px />';
                            echo '</span>';
                            echo '</div>';
                         }
                         echo "</div>";
                     }
                        ?>

        
        </div>
</section>

<hr />

         <section id="main" class="wrapper">
            <div class="container">
          <header class="major">
                <font size=20>
              <b>  <font color = black>
                   <?php  echo "Recommended activities";?>
                  </font>  </b>
               </font>
           </header>
                        <?php
                        $select = $_GET["no"];
                        $servername = "40.126.238.143";
                        $username = "will";
                        $password = "password";
                        $dbname = "beach";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM beachinfo WHERE no = $select";
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
                               if ($row["sand_scccer"] ==1)
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
            <section id="main" class="wrapper">
                <div class="container">
                <header class="major">
                <font size=20>
              <b>  <font color = black>
                   <?php  echo "Check the map here";?>
                  </font>  </b>
               </font>
           </header>
                <div> <iframe src=<?php echo $map_url; ?>  width="100%" height="400px" frameborder="0" style="pointer-events:none" allowfullscreen></iframe></div>
                </div>
            </section>
            <br />
            <section id="main" class="wrapper">
                <div class="container">
                <header class="major">
                <font size=20>
              <b>  <font color = black>
                   <?php  echo "Please rate for this Beach!"; ?>
                  </font>  </b>
               </font>
           </header>
        <div class="row 150%">
            <div class="3u 12u$(small)">
                <h4>Overall Rate:</h4>
            </div>
            <div class="3u 12u$(small)">
        <div id=<?php echo $select; ?> class="overallStar"></div>
            </div>
            <div class="3u 12u$(small)">
        <div id="hint"></div>
            </div>
        </div>
        <div class="row 150%">
            <div class="3u 12u$(small)">
                <h4>Cleanliness Rate:</h4>
            </div>
            <div class="3u 12u$(small)">
        <div id=<?php echo $select; ?> class="cleanStar"></div>
            </div>
            <div class="3u 12u$(small)">
        <div id="hint"></div>
            </div>
        </div>
        <div class="row 150%">
            <div class="3u 12u$(small)">
                <h4>Facility Rate:</h4>
            </div>
            <div class="3u 12u$(small)">
        <div id=<?php echo $select; ?> class="facilityStar"></div>
            </div>
            <div class="3u 12u$(small)">
        <div id="hint"></div>
            </div>
        </div>
        <div class="row 150%">
            <div class="3u 12u$(small)">
                <h4>Beach Safety Rate:</h4>
            </div>
            <div class="3u 12u$(small)">
        <div id=<?php echo $select; ?> class="safetyStar"></div>
            </div>
            <div class="3u 12u$(small)">
        <div id="hint"></div>
            </div>
        </div>
        <div class="row 150%">
            <div class="3u 12u$(small)">
                <h4>Beach View Rate:</h4>
            </div>
            <div class="3u 12u$(small)">
        <div id=<?php echo $select; ?> class="beachViewStar"></div>
            </div>
            <div class="3u 12u$(small)">
        <div id="hint"></div>
            </div>
        </div>
                    <div class="container">

                        <div class="4u 12u$(medium)">
                            <ul class="actions" >
                                <li>
                                    <button class="button small" id="btnSubmit">Submit</button>
                                </li>
                            </ul>
                        </div>


                    </div>
            </div>
            </section>
        

        <?php
        include 'footer.php';
        ?>
</body>
</html>
