<!DOCTYPE html>
<html lang="en">
<title>Dog-friendly Beaches List</title>
    <?php
        include 'header.php';
    ?>
<body>
                    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Dog-friendly beaches list</h2>
						<p>This list shows all the dog-friendly beaches in Victoria. Please click on the beach you would like to explore.</p>
					</header>    
                                    <form>
                                        <?php
                                        // set up database connection
                                                $lat = $_COOKIE['clat'];
                                                $long = $_COOKIE['clong'];
                                                require_once 'databaseConnect.php';
                                                // select all odd number beaches
                                                $sql = "SELECT * FROM beachinfo";
                                                
                                                $result = mysqli_query($dbc, $sql);
                                                
                                                //retrive data from database and show all the data in a table
                                           while(($row = mysqli_fetch_array($result)))
                                            {
                                                $beachLat = $row['latitude'];
                                                $beachLong = $row['longitude'];
                                                $beachNo = $row['no'];
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
                                 <a href = "description.php?no='.$row['no'].'"><div><img src= "'.$row['img_url'].'" alt="" style="width: 120%; height:120%;"/></div> 
                                </a></div>
                                
                          <div class="9u 12u(3)"> ';
                        echo '<a href = "description.php?no='.$row['no'].'"><p style=" font-size:130%; font-weight:bold; margin-bottom:0"> '.$row['name'].'</p></a>';  
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