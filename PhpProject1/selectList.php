<!DOCTYPE html>
<html lang="en">
    <title>Filtered Dog-friendly Beaches List</title>  
        <?php
        include 'header.php';
        ?>
        <script src="js/jquery.raty.min.js"></script>
        <script src="js/newRate.js"></script>
    <body>
        <!-- Main -->
        <section id="main" class="wrapper">
            <div class="container">

                <header class="major">
                    <h2>Dog-friendly beaches list</h2>
                    <p>This list shows all the dog-friendly beaches in Victoria based on your preferences, as well as the distance from current location. Please click on the beach you would like to explore.</p>
                </header>  
                <form>
                    <?php
                  /* 
                   * receive current location through browser  
                   * get latitude, longitude from cookie
                   */
                    $lat = $_COOKIE['clat'];
                    $long = $_COOKIE['clong'];
                    //set flag number to indicate number of filter items
                    $test = $_GET["w1"];
                    $hello = explode(',', $test);
                    $number = count($hello);
                   
                    $query = "";
                    $n = $hello[0];
                    //define the 5 suburb name for validation
                    $s1 = "Melbourne Suburbs";
                    $s2 = "Mornington Peninsula";
                    $s3 = "Phillip Island";
                    $s4 = "Bellarine Peninsula";
                    $s5 = "Apolo Bay";
                    //define show all beaches if users don't give any choices.
                    if ($number == 0 || $hello[0]==null) {
                        $sql = "select * from beachinfo";
                    } else if (strcasecmp($n, $s1) !== 0 && strcmp($n, $s2) !== 0 && strcmp($n, $s3) !== 0 && strcmp($n, $s4) !== 0 && strcmp($n, $s5) !== 0) {
                        // if user doesn't choose the suburb, the query will like bleow.
                        for ($nq = 0; $nq < $number; $nq++) {
                            if ($nq != $number - 1) {
                                $query = $query . "$hello[$nq] = 1 and ";
                            } else {
                                $query = $query . "$hello[$nq]=1";
                            }
                        }

                        $sql = "select * from beachinfo where " . $query;
                    } else {
                        // define the query when users choose the suburb
                        for ($nq = 0; $nq < $number; $nq++) {
                            if ($number == 1) {
                                $query = "'$n'";
                            } else {
                                if ($nq == 0) {
                                    $query = "'$n' and ";
                                } else {
                                    if ($nq != $number - 1) {
                                        $query = $query . "$hello[$nq] = 1 and ";
                                    } else {
                                        $query = $query . "$hello[$nq]=1";
                                    }
                                }
                            }
                        }

                        $sql = "select * from beachinfo where zone = " . "$query";
                        
                    }
                    require_once 'databaseConnect.php';
                    $result = mysqli_query($dbc, $sql);
                    // define the  'not found' function, when there is no beach meet the requirement.
                    $count=mysqli_num_rows($result);
                    if ($count==0) {
                        echo'<h2>Sorry, no beach found! Please try again with less choices to get more results.<h2>';
                        echo "<br />\n";
                        echo "<img src='images/notfound.jpg' 70%; height: 35% />";
                    }
                    echo '<table>';
                        while (($row = mysqli_fetch_array($result))) {
                        $beachLat = $row['latitude'];
                        $beachLong = $row['longitude'];
                        $beachNo = $row['no'];
                        $sql2 = "SELECT AVG(overallRate) from rating where beachId = $beachNo";
                        $sql3 = "SELECT count(rateId) from rating where beachId = $beachNo";
                        $result2 = mysqli_query($dbc, $sql2); 
                        $result3 = mysqli_query($dbc, $sql3);
                        $overallRate = mysqli_fetch_array($result2)['AVG(overallRate)'];
                        $count = mysqli_fetch_array($result3)['count(rateId)'];
                        $toilet = $row['toilet'];
                        $bin = $row['bin'];
                        $waterspot = $row['waterspot'];
                        $parking = $row['parking'];
                        $cafe = $row['cafe'];
                        $bbq = $row['bbq'];
                        $clinic = $row['clinic'];
                        if ($toilet ==1 )
                        {
                            $toilet_image = "images/facility/toilet.png";
                        }
                        else
                        {
                            $toilet_image = "images/facility/no-toilet.png";
                        }
                        if ($bin ==1)
                            {
                            $bin_image = "images/facility/bin.png";
                            }
                        else
                        {
                            $bin_image = "images/facility/no-bin.png";
                        }
                          if ($waterspot ==1)
                               {
                            $tap_image = "images/facility/tap.png";
                               }
                         else
                         {
                            $tap_image = "images/facility/no-tap.png";
                         }
                         if ($parking ==1)
                               {
                            $parking_image = "images/facility/parking.png";
                               }
                         else
                         {
                            $parking_image = "images/facility/no-parking.png";
                         }
                         if ($cafe ==1)
                               {
                            $coffee_image = "images/facility/coffee-cup.png";
                               }
                         else
                         {
                            $coffee_image = "images/facility/no-coffee-cup.png";
                         }
                         if ($bbq ==1)
                               {
                            $picnic_image = "images/facility/picnic.png";
                               }
                         else
                         {
                            $picnic_image = "images/facility/no-picnic.png";
                         }
                         if ($clinic ==1)
                               {
                            $hospital_image = "images/facility/hospital.png";
                               }
                         else
                         {
                            $hospital_image = "images/facility/no-hospital.png";
                         }
                        $id = 'star';
                        $imgF ='image left';
                        $dis = distance($lat, $long, $beachLat, $beachLong, "K");
                        $distance = round($dis, 2);                                       
                        echo '<section>';
                        
//                        echo '<a href = "description.php?no='.$row['no'].'" ><div><span class="image left" float="left"> <img src= "'.$row['img_url'].'" alt="" style="width: 100%; height:100%;"/> </span></div>';
                        echo '<div class="row">
                                <div class="6u 12u(3)">   
                                 <a href = "description.php?no='.$row['no'].'" ><div><img src= "'.$row['img_url'].'" alt="" style="width: 120%; height:120%;"/></div> 
                                </a></div>
                                
                          <div class="9u 12u(3)"> 
                                ';
//                        echo '<fieldset>
//                                <img src='.$toilet_image.' style="width: 8%; height:4%;" />
//                                <img src='.$bin_image.' style="width: 8%; height:4%;" />
//                                <img src='.$tap_image.' style="width: 8%; height:4%;" />
//                                <img src='.$parking_image.' style="width: 8%; height:4%;" />
//                                <img src='.$picnic_image.' style="width: 8%; height:4%;" />
//                                <img src='.$coffee_image.' style="width: 8%; height:4%;"/>
//                                <img src='.$hospital_image.' style="width: 8%; height:4%;"/>
//                            </fieldset>';
//                        echo '</div>
//                                </div>';
//                        echo '<div class='. $id .' float="left" data-number='. $overallRate .'></div>';
                        echo '<a href = "description.php?no='.$row['no'].'" ><p style=" font-size:130%; font-weight:bold; margin-bottom:0"> '.$row['name'].'</p></a>';  
                        echo '<p><i>'.$row['address'].'&nbsp&nbsp&nbsp&nbsp&nbsp Distance: ' . $distance . ' Km</i></p>'; 
//                        echo '<div class='. $id .' float="left" data-number='. $overallRate .'></div>';                        
                        echo '<fieldset>
                                <img src='.$toilet_image.' style="width: 5%; height:2%;" title="toilet" />
                                <img src='.$bin_image.' style="width: 5%; height:2%;" title="bin"/>
                                <img src='.$tap_image.' style="width: 5%; height:2%;" title="drink water for dog" />
                                <img src='.$parking_image.' style="width: 5%; height:2%;" title="parking lot" />
                                <img src='.$picnic_image.' style="width: 5%; height:2%;" title="picnic"/>
                                <img src='.$coffee_image.' style="width: 5%; height:2%;"title="dog-friendly cafe"/>
                                <img src='.$hospital_image.' style="width: 5%; height:2%;" title="vet"/>
                            </fieldset>';
                        echo '<hr width = "80%" >';
//                        echo '<p><i> Distance: ' . $distance . ' Km</i></p>';
                        echo '</section>';
                        
                    }
                    echo '</table>';
                    /*
                     * Calculate distance between two locations
                     * $lat1  latitude of the first location
                     * $lon1  longitude of the first location
                     * $lat2  latitude of the second location
                     * $lon2  longitude of the second location
                     * $unit  unit of the distance
                     */
                    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

                        $theta = $lon1 - $lon2;
                        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                        $dist = acos($dist);
                        $dist = rad2deg($dist);
                        $miles = $dist * 60 * 1.1515;
                        $unit = strtoupper($unit);
                        // conver to distance based on different unit
                        if ($unit == "K") {
                            return ($miles * 1.609344);
                        } else if ($unit == "N") {
                            return ($miles * 0.8684);
                        } else {
                            return $miles;
                        }
                    }
                    ?>
                </form>   
            </div>
        </section>
                    <?php
                    include 'footer.php';
                    ?>
    </body>
</html>