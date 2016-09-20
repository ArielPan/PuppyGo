<!DOCTYPE html>
<html lang="en">
<title>Description</title>
    <?php
        include 'header.php';
    ?>
        <script src="js/jquery.raty.min.js"></script>
        <script src="js/newRate.js"></script>
        <link rel="stylesheet" href="css/list-table.css" />
    <body>
    <section width="100%">
        <div class="container" >
            <?php
                        /* @var $select type */
                        require_once 'databaseConnect.php';
                        $select = $_GET["no"];
                        $sql1 = "SELECT * FROM info WHERE no = $select";
                        $sql2 = "SELECT AVG(overallRate) from rating where beachId = $select";
                        $sql3 = "SELECT count(rateId) from rating where beachId = $select";
                        $sql4 = "SELECT * FROM facility WHERE no = $select";
                        $sql5 = "SELECT * FROM activity WHERE no = $select";
                        $sql6 = "SELECT * FROM image WHERE beach_no = $select";
                        $result1 = mysqli_query($dbc, $sql1);
                        $result2 = mysqli_query($dbc, $sql2);
                        $result3 = mysqli_query($dbc, $sql3);
                        $result4 = mysqli_query($dbc, $sql4);
                        $result5 = mysqli_query($dbc, $sql5);
                        $result6 = mysqli_query($dbc, $sql6);
                        //Data Extrated
                         while($row1 = mysqli_fetch_array($result1))
                        {  $desc = $row1["desc"];
                           $lat = $row1["latitude"];
                           $long = $row1["longitude"];
                           $name = $row1["name"];
                           $leashinfo = $row1["on/offleashinfo"];
                           $map_url = $row1["map_link"];
                           $address = $row1["address"];
                           $zone = $row1["zone"];
                        }
                        while($row2 = mysqli_fetch_array($result2)){
                            $overallRate = $row2['AVG(overallRate)'];
                        }
                        while($row3 = mysqli_fetch_array($result3)){
                            $rateNumber = $row3['count(rateId)'];
                        }
                        while($row4 = mysqli_fetch_array($result4)){
                            $toilet = $row4["toilet"];
                            $bin = $row4["bin"];
                            $waterspot = $row4["waterspot"];
                            $parking = $row4["parking"];
                            $cafe = $row4["cafe"];
                            $bbq = $row4["bbq"];
                            $clinic = $row4["clinic"];
                        }
                        while($row5 = mysqli_fetch_array($result5)){
                            $surfing = $row5["surfing"];
                            $volleyball = $row5["sand_volleyball"];
                            $frisbee = $row5["frisbee"];
                            $swimming = $row5["swimming"];
                            $soccer = $row5["sand_soccer"];
                        }
                        while($row6 = mysqli_fetch_array($result6)){
                            $img = $row6["image_url"];
                        }
            ?>
            <header class="major">
                <h2><?php echo $name;?></h2>
                <p><?php echo $address;?></p>
                <div id="star" data-number=<?php echo $overallRate;?>></div> 
                <h5><?php echo $rateNumber;?> users reviews</h5>
            </header>
                    <p><span class="image left"><img src= <?php echo $img;?> alt="" /></span><p style=" font-size:150%; font-weight:bold; margin-bottom:0">Description:</p><?php echo $desc;?></p>
        <p><p style="font-size:150%;font-weight:bold; margin-bottom:0">On-Leash/Off-Leash Information:</p><?php echo $leashinfo;?></p>
        </div>
        </section>
        <input type="hidden" id="lat" value=<?php echo $lat;?> >
        <input type="hidden" id="long" value=<?php echo $long;?>>
        <input type="hidden" id="name" value=<?php echo $name;?>>
        
        <br /><br /><br />
      <hr />
            <section><div class="container" aligen="left"> <font size=5 color=#000000><strong>Weather inforamtion</strong></font></div><br />
            <div class="container"><?php
            // set default timezone
            date_default_timezone_set('Australia/Melbourne');
// api
            $api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $zone . "&mode=json&units=metric&appid=6552ec0a723e855d8c6eb7618a0706aa";
            $api_url = str_replace(" ", "%20", $api_url);
            $weather_data = file_get_contents($api_url);
            $json = json_decode($weather_data, TRUE);
//json
            $user_temp = $json['main']['temp'];
            $user_humidity = $json['main']['humidity'];
            $user_conditions = $json['weather'][0]['main'];
            $user_wind = $json['wind']['speed'];
            $user_sunrise = $json['sys']['sunrise'];
            $user_sunset = $json['sys']['sunset'];
            $user_sunrise = date('d M Y H:i:s', $user_sunrise);
            $user_sunset = date('d M Y H:i:s', $user_sunset);
            function toTextualWind($user_wind) {
                    if ($user_wind < 1) {
                        return 'Calm';} else if ($user_wind >= 1 && $user_wind <= 5) {
                        return 'light air';} else if ($user_wind > 5 && $user_wind < 12) {
                        return 'light breeze';} else if ($user_wind >= 12 && $user_wind < 20) {
                        return 'gentle breeze';} else if ($user_wind >=20 && $user_wind < 29) {
                        return 'moderate breeze'; } else if ($user_wind >=29 && $user_wind < 39) {
                        return 'freash breeze'; } else if ($user_wind >= 39 && $user_wind < 50) {
                        return 'strong gale'; } else if ($user_wind >=50 && $user_wind < 62) {
                        return 'moderate gale'; } else if ($user_wind >=62 && $user_wind < 75) {
                        return 'freach gale'; }else if ($user_wind >=75 && $user_wind < 89) {
                        return 'storng gale';}else if ($user_wind >=89 && $user_wind < 103) {
                        return 'whole gale';}else if ($user_wind >=103 && $user_wind < 117) {
                        return 'storm'; }else if ($user_wind >= 117) { return 'hurricane';
                    }
                   
                }
            
            $space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $space1 ="&nbsp;&nbsp;&nbsp;&nbsp;";
            echo"<fieldset>";
            echo $user_conditions;
            echo"<img src='images/weather/$user_conditions.png' width=60x height=60px />" .$user_temp. "°C $space";
            echo "<img src='images/weather/drop.png' width=40px height=40px />","<font color =black>". $user_humidity . "%$space</font>";
            echo"<img src='images/weather/wind(2).png' width=40px height=40px />","<font color =black>". toTextualWind($user_wind) . "&nbsp meter/sec $space";
            echo"<img src='images/weather/sunrise.png' width=40px height=40px />","<font color =black>" . $user_sunrise ."$space";
            echo"<img src='images/weather/sunset.png' width=40px height=40px />","<font color =black>" . $user_sunset . "$space";
            echo"</fieldset>";
            ?>
        </div></section>
       
<br /><br />
<section>
    <div class="container" aligen="left"> <font size=5 color=#000000><strong>Weather forecast</strong></font></div><br />
            <div class="container"><?php
                $api_url = "http://api.openweathermap.org/data/2.5/forecast?q=" . $zone . "&units=metric&mode=json&appid=6552ec0a723e855d8c6eb7618a0706aa";
                $api_url = str_replace(" ", "%20", $api_url);
                $weather_data = file_get_contents($api_url);
                $json = json_decode($weather_data, TRUE);
//json      
                //because the current time always in the 4th data in the list, so the next 3 hours weather is 5th.
                $next3h_temp = $json['list'][5]['main']['temp'];

                $next3h_conditions = $json['list'][5]['weather'][0]['main'];

                $currenttime = date('H');

                if ($currenttime % 3 == 2) {
                    $currenttime +=1;
                } else if ($currenttime % 3 == 1) {
                    $currenttime-=1;
                }
                $left = 24 - $currenttime;
                $sequence = $left / 3;
                $tommorrowsequence = 4 + $sequence + 4;
                $nextdate_conditions = $json['list'][$tommorrowsequence]['weather'][0]['main'];
                $nextdate_temp = $json['list'][$tommorrowsequence]['main']['temp'];

                $tribledate = $tommorrowsequence + 8;
                $tribledate_conditions = $json['list'][$tribledate]['weather'][0]['main'];
                $tribledate_temp = $json['list'][$tribledate]['main']['temp'];

                $fourthdate = $tribledate + 8;
                $fourthdate_conditions = $json['list'][$fourthdate]['weather'][0]['main'];
                $foutthdate_temp = $json['list'][$fourthdate]['main']['temp'];

                $fifthdate = $fourthdate + 8;
                $fifthdate_conditoins = $json['list'][$fifthdate]['weather'][0]['main'];
                $fifthdate_temp = $json['list'][$fifthdate]['main']['temp'];
             
                
                $trible_day = date("Y-m-d", strtotime("+2 day"));
                $forth_day = date("Y-m-d", strtotime("+3 day"));
                $fifth_day= date("Y-m-d", strtotime("+4 day"));
              //  $sixth_day = date("Y-m-d", strtotime("+5 day"));
                
                echo"<fieldset>";
                echo "next 3 hour weather: " . $space. "Tomorrow:".$space.$space.$trible_day.$space.$space.$forth_day.$space.$space.$space1.$fifth_day.$space.$space;
                echo "<br />\n";
                echo"<img src='images/weather/$next3h_conditions.png' width=60x height=60px />" . $next3h_temp . "°C $space.$space";
                echo"<img src='images/weather/$nextdate_conditions.png' width=60x height=60px />" . "$space.$space.$space1";
                echo"<img src='images/weather/$tribledate_conditions.png' width=60x height=60px />"  . " $space.$space.$space1";
                echo"<img src='images/weather/$fourthdate_conditions.png' width=60x height=60px />" .  "$space.$space.$space1";
                echo"<img src='images/weather/$fifthdate_conditoins.png' width=60x height=60px />" ." $space.$space.$space1";
                echo"</fieldset>";
                ?>
        </div></section>
<section>
    <div class="container">
        <font size="5" color=#000000><b>Facilities on the beach</b></font></div><br />
        <div class="container">
         <?php
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
                        if ($toilet ==1 )
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
                        if ($bin ==1)
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
                          if ($waterspot ==1)
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
                         if ($parking ==1)
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
                         if ($cafe ==1)
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
                         if ($bbq ==1)
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
                         if ($clinic ==1)
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
                        if ($surfing ==1 )
                        {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$surfing_image.'.jpg" />';
                            echo '</span>';
                            echo '</div>';
                        }
                        if ($volleyball ==1)
                            {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$volleyball_image.'.jpg" />';
                            echo '</span>';
                            echo '</div>';
                            }
                          if ($frisbee ==1)
                               {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$frisbee_image.'.jpg" />';
                            echo '</span>';
                            echo '</div>';
                               }
                             if ($swimming ==1)
                                  {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$swimming_image.'.jpg" />';
                            echo '</span>';
                            echo '</div>';
                                  }
                               if ($soccer ==1)
                                      {
                            echo '<div class="'.$u.'">';
                            echo '<span class="'.$fit.'">';
                            echo '<img src="'.$soccer_image.'.jpg" />';
                             echo '</span>';
                            echo '</div>';
                                      }
                         echo "</div>";
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
                <div> <iframe src=<?php echo $map_url; ?>  width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                </div>
            </section>
            <br />
           <script type="text/javascript" src="http://www.panoramio.com/wapi/wapi.js?v=1"></script>
           <section id="main" class="wrapper">
                <div class="container">
                <header class="major">
                <font size=20>
              <b>  <font color = black>
                   <?php  echo "Check the View of the beach"; ?>
                  </font>  </b>
               </font>
           </header>
            <div id="div_photo_ex" style="float: left; margin: 10px 15px"></div>
                </div>
           </section>
        <script type="text/javascript">
          var lat = document.getElementById("lat").value;
          var long = document.getElementById("long").value; 
          var name = document.getElementById("name").value;
          var beaches = new panoramio.PhotoRequest({
          'tag':'beach' ,
          'rect': {'sw': {'lat': parseFloat(lat)-0.03, 'lng': parseFloat(long)-0.03}, 'ne': {'lat': parseFloat(lat)+0.07, 'lng': parseFloat(lat)+0.07}}
        });
          var photo_ex_options = {'width': 900, 'height': 450};
          var photo_ex_widget = new panoramio.PhotoWidget('div_photo_ex',beaches, {'width': 900, 'height': 450});
          photo_ex_widget.setPosition(0);
        </script>
            <section id="main" class="wrapper">
                <div class="container">
                <header class="major">
                <font size=20>
              <b>  <font color = black>
                   <?php  echo "Please rate this Beach!"; ?>
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
        <select id="hint1">
        <option value=""></option>
        <option value="bad">bad</option>
        <option value="poor">poor</option>
        <option value="regular">regular</option>
        <option value="good">good</option>
        <option value="gorgeous">gorgeous</option>
      </select>
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
        <select id="hint2">
        <option value=""></option>
        <option value="bad">dirty</option>
        <option value="poor">decent</option>
        <option value="regular">clean</option>
        <option value="good">very clean</option>
        <option value="gorgeous">spotless</option>
      </select>
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
        <select id="hint3">
        <option value=""></option>
        <option value="bad">insufficient</option>
        <option value="poor">fair</option>
        <option value="regular">sufficient</option>
        <option value="good">abundant</option>
        <option value="gorgeous">plentiful</option>
      </select>
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
        <select id="hint4">
        <option value=""></option>
        <option value="bad">unsafe</option>
        <option value="poor">safe</option>
        <option value="regular">very safe</option>
        <option value="good">protected</option>
        <option value="gorgeous">free from danger</option>
      </select>
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
        <select id="hint5">
        <option value=""></option>
        <option value="bad">unattractive</option>
        <option value="poor">fine</option>
        <option value="regular">attractive</option>
        <option value="good">beautiful</option>
        <option value="gorgeous">gorgeous</option>
      </select>
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
