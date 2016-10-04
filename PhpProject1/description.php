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
        <div class="container">
            <?php
                        require_once 'databaseConnect.php';
                        $select = $_GET["no"]; //get beach no
                        /*
                         * define sqls to get data from database based on passed in BeachNo
                         */
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
                        //Data Extrated from info table
                         while($row1 = mysqli_fetch_array($result1))
                        {  $desc = $row1["desc"];
                           $lat = $row1["latitude"];
                           $long = $row1["longitude"];
                           $name = $row1["name"];
                           $leashinfo = $row1["on/offleashinfo"];
//                           $sleashinfo = ereg_replace(";","<br/>",$leashinfo);
                           $map_url = $row1["map_link"];
                           $address = $row1["address"];
                           $zone = $row1["zone"];
                        }
                        //Data Extrated from rating table
                        while($row2 = mysqli_fetch_array($result2)){
                            $overallRate = $row2['AVG(overallRate)'];
                        }
                        //Data Extrated from rating table
                        while($row3 = mysqli_fetch_array($result3)){
                            $rateNumber = $row3['count(rateId)'];
                        }
                        //Data Extrated from facility table
                        while($row4 = mysqli_fetch_array($result4)){
                            $toilet = $row4["toilet"];
                            $bin = $row4["bin"];
                            $waterspot = $row4["waterspot"];
                            $parking = $row4["parking"];
                            $cafe = $row4["cafe"];
                            $bbq = $row4["bbq"];
                            $clinic = $row4["vet"];
                        }
                        // Data Extracted from activity table
                        while($row5 = mysqli_fetch_array($result5)){
                            $surfing = $row5["surfing"];
                            $volleyball = $row5["sand_volleyball"];
                            $frisbee = $row5["frisbee"];
                            $swimming = $row5["swimming"];
                            $soccer = $row5["sand_soccer"];
                        }
                        // Data Extracted from image table
                        while($row6 = mysqli_fetch_array($result6)){
                            $img = $row6["image_url"];
                        }
            ?>
           <!--get weather condition-->
            <?php
            // set default timezone
            date_default_timezone_set('Australia/Melbourne');
            // api
            $api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $zone . "&mode=json&units=metric&appid=6552ec0a723e855d8c6eb7618a0706aa";
            $api_url = str_replace(" ", "%20", $api_url);
            $weather_data = file_get_contents($api_url);
            $json = json_decode($weather_data, TRUE);;
            //json
            $user_temp = round($json['main']['temp'],0);
            $user_humidity = $json['main']['humidity'];
            $user_conditions = $json['weather'][0]['main'];
            $user_wind = $json['wind']['speed'];
            $user_sunrise = $json['sys']['sunrise'];
            $user_sunset = $json['sys']['sunset'];
            $user_sunrise = date('h:i', $user_sunrise);
            $user_sunset = date('H:i', $user_sunset);
            //translate wind speed into wind level
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
                $api_url1 = "http://api.openweathermap.org/data/2.5/forecast?q=" . $zone . "&units=metric&mode=json&appid=6552ec0a723e855d8c6eb7618a0706aa";
                $api_url1 = str_replace(" ", "%20", $api_url1);
                $weather_data = file_get_contents($api_url1);
                $json1 = json_decode($weather_data, TRUE);
                //because the current time always in the 4th data in the list, so the next 3 hours weather is 5th.
                $next3h_temp = $json1['list'][5]['main']['temp'];

                $next3h_conditions = $json1['list'][5]['weather'][0]['main'];
                // get current date and time
                $currenttime = date('H');

                if ($currenttime % 3 == 2) {
                    $currenttime +=1;
                } else if ($currenttime % 3 == 1) {
                    $currenttime-=1;
                }
                $left = 24 - $currenttime;
                $sequence = $left / 3;
                $tommorrowsequence = 4 + $sequence + 4; //set tomorrow date
                $nextdate_conditions = $json1['list'][$tommorrowsequence]['weather'][0]['main'];
                $nextdate_temp = round($json1['list'][$tommorrowsequence]['main']['temp'], 0);;

                $tribledate = $tommorrowsequence + 8;
                $tribledate_conditions = $json1['list'][$tribledate]['weather'][0]['main'];
                $tribledate_temp = $json1['list'][$tribledate]['main']['temp'];

                $fourthdate = $tribledate + 8;
                $fourthdate_conditions = $json1['list'][$fourthdate]['weather'][0]['main'];
                $foutthdate_temp = $json1['list'][$fourthdate]['main']['temp'];

                $fifthdate = $fourthdate + 8;
                $fifthdate_conditoins = $json1['list'][$fifthdate]['weather'][0]['main'];
                $fifthdate_temp = $json1['list'][$fifthdate]['main']['temp'];

                $trible_day = date("Y-m-d", strtotime("+2 day"));
                $forth_day = date("Y-m-d", strtotime("+3 day"));
                $fifth_day= date("Y-m-d", strtotime("+4 day"));
            ?>
            <input type="hidden" id="lat" value=<?php echo $lat;?> >
            <input type="hidden" id="long" value=<?php echo $long;?>>
            <input type="hidden" id="name" value=<?php echo $name;?>>
            <!--show beach name and address-->
            <header class="major">
                <h2><?php echo $name;?></h2>
                <p><?php echo $address;?></p>    
            </header>
            <script type="text/javascript">
            function showhide(id) {
               var e = document.getElementById(id);
               e.style.display = (e.style.display == 'block') ? 'none' : 'block';
            }
           </script>
           <!--show average rating score-->
            <section>
                <div class="row">
                  <div class="6u 12u(3)">   
                    <div id="star" float="left" data-number=<?php echo $overallRate;?>></div> 
                    <div float="left"><h5>(<?php echo $rateNumber;?> users reviews)</h5></div>
                  </div>
                    <!--show current weather condition-->
            <div class="6u 12u(3)">
                <fieldset>
                    <img src='images/weather/<?php echo $user_conditions;?>.png' style="width: 10%; height:5%;" /><font color =black><?php echo $user_temp ,"°C";?></font>
                    <img src='images/weather/drop.png' style="width: 10%; height:5%;" /><font color =black><?php echo $user_humidity,"%";?></font>
                    <img src='images/weather/wind(2).png' style="width: 10%; height:5%;" /><font color =black><?php echo toTextualWind($user_wind);?>
                    <img src='images/weather/sunrise.png' style="width: 10%; height:5%;" /><font color =black><?php echo $user_sunrise;?></font>
                    <img src='images/weather/sunset.png' style="width: 10%; height:5%;" /><font color =black><?php echo $user_sunset;?></font>
                </fieldset>
                <!--click to show weather forecast-->
                <h5><a href="javascript:showhide('forecast')">
               Click to Show Weather Forecast 
                </a></h5>
                <div id="forecast" style="display:none;">
		    <table alt="">
			<thead>
			<tr>
			    <th>Next 3 hours</th>
                            <th>Tomorrow</th>
                            <th><?php echo $trible_day;?></th>
                            <th><?php echo $forth_day;?></th>
                            <th><?php echo $fifth_day;?></th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td><img src='images/weather/<?php echo $next3h_conditions;?>.png' style="width: 70%; height:75%;" /></td>
			<td><img src='images/weather/<?php echo $nextdate_conditions;?>.png' style="width: 70%; height:75%;" /></td>
			<td><img src='images/weather/<?php echo $tribledate_conditions;?>.png' style="width: 70%; height:75%;" /></td>
                        <td><img src='images/weather/<?php echo $fourthdate_conditions;?>.png' style="width: 70%; height:75%;" /></td>
                        <td><img src='images/weather/<?php echo $fifthdate_conditoins;?>.png' style="width: 70%; height:75%;" /></td>
                        </tr>
			</tbody>
                    </table>
		</div>         
                
            </div>
 </div>
                
            </section>
           <!--checking facility condition from database-->
<?php
                        if ($toilet ==1 )
                        {
                            $toilet_image = "images/facility/toilet";
                        }
                        else
                        {
                            $toilet_image = "images/facility/no-toilet";
                        }
                        if ($bin ==1)
                            {
                            $bin_image = "images/facility/bin";
                            }
                        else
                        {
                            $bin_image = "images/facility/no-bin";
                        }
                          if ($waterspot ==1)
                               {
                            $tap_image = "images/facility/tap";
                               }
                         else
                         {
                            $tap_image = "images/facility/no-tap";
                         }
                         if ($parking ==1)
                               {
                            $parking_image = "images/facility/parking";
                               }
                         else
                         {
                            $parking_image = "images/facility/no-parking";
                         }
                         if ($cafe ==1)
                               {
                            $coffee_image = "images/facility/coffee-cup";
                               }
                         else
                         {
                            $coffee_image = "images/facility/no-coffee-cup";
                         }
                         if ($bbq ==1)
                               {
                            $picnic_image = "images/facility/picnic";
                               }
                         else
                         {
                            $picnic_image = "images/facility/no-picnic";
                         }
                         if ($clinic ==1)
                               {
                            $hospital_image = "images/facility/hospital";
                               }
                         else
                         {
                            $hospital_image = "images/facility/no-hospital";
                         }
                         
    ?>
        <!--show picture for the beach-->        
        <p><span class="image left"><img src= <?php echo $img;?> alt="" /></span>
        <!--show facility icons-->
        <p style=" font-size:150%; font-weight:bold; margin-bottom:0">On-Leash/Off-Leash Information:</p><?php echo $leashinfo;?></p>
        <br/>
        <fieldset>
            <img src='<?php echo $toilet_image;?>.png' style="width: 10%; height:5%;" />
            <img src='<?php echo $bin_image;?>.png' style="width: 10%; height:5%;" />
            <img src='<?php echo $tap_image;?>.png' style="width: 10%; height:5%;" />
            <img src='<?php echo $parking_image;?>.png' style="width: 10%; height:5%;" />
            <img src='<?php echo $picnic_image;?>.png' style="width: 10%; height:5%;" />
            <img src='<?php echo $coffee_image;?>.png' style="width: 10%; height:5%;"/>
            <img src='<?php echo $hospital_image;?>.png' style="width: 10%; height:5%;"/>
        </fieldset>
       <br/> 
       <br/>
       <!--show description of the beach-->
        <p><p style="font-size:150%;font-weight:bold; margin-bottom:0">Description:</p><?php echo $desc;?></p>
        </div>
        </section>
<br/>
<!--show recommended activities-->
         <section >
            <div class="container">
                <header class="major">
                    <h3>Recommended activities</h3> 
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
<!--show map with beach location and parking lot, toilet-->
            <section id="main" class="wrapper">
                <div class="container">
                <header class="major">
                    <h3>Check the map here</h3>
           </header>
                <div> <iframe src=<?php echo $map_url; ?>  width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                </div>
            </section>
<!--show picture gallery around the beach-->
           <script type="text/javascript" src="http://www.panoramio.com/wapi/wapi.js?v=1"></script>
           <section id="main" class="wrapper" >
                <div class="container">
                <header class="major">
                    <h3>View more pictures around the beach</h3>
           </header>
                    <div id="div_photo_ex" style="float: left; margin: 10px 15px;"></div>
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
          var photo_ex_widget = new panoramio.PhotoWidget('div_photo_ex',beaches,photo_ex_options );
          photo_ex_widget.setPosition(0);
        </script>
        <!--show rate section-->
            <section id="main" class="wrapper">
                <div class="container">
                <header class="major">
                    <h3>Please Rate this beach!</h3>
           </header>
        <div class="row 150%">
            <div class="3u 12u$(small)">
                <h4>Overall Rating:</h4>
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
                <h4>Cleanliness:</h4>
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
                <h4>Facility for Dog:</h4>
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
                <h4>Beach Safety for Dog:</h4>
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
                <h4>Beach View:</h4>
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
                                    <button class="button small" id="btnSubmit">Click to Rate</button>
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
