<?php
   $currentLat = $_POST['aa'];
   $currentLong = $_POST['bb'];
   require_once 'databaseConnect.php';
   $sql = "SELECT * FROM beachinfo where no = 3";
   $result = mysqli_query($dbc, $sql);
                                              //   for ($row = mysqli_fetch_array($result) && $row['no']=1; $row['no']<42; $row['no']++)
                                           while(($row = mysqli_fetch_array($result)))
                                            {
                                               $beachLat = $row['latitude'];
                                               $beachLong = $row['longitude'];
                                               $dis = distance($currentLat, $currentLong, $beachLat, $beachLong, "K");
                                               
                                               echo '<div class = "image">
                                               <a href = "desc.php?no='.$row['no'].'"> <img style="width: 600px; height: 300px"; src="'.$row['img_url'].'" width="1600" height="60" />
                                               <h2><a href = "desc.php?no='.$row['no'].'" > '.$row['name'].'</a></h2>
                                               <p>'.$row['address'].'</p>
                                               </div>';
                                               echo $dis;
                                             }
                                             function distance($lat1, $lon1, $lat2, $lon2, $unit) {

                                                $theta = $lon1 - $lon2;
                                                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                                                $dist = acos($dist);
                                                $dist = rad2deg($dist);
                                                $miles = $dist * 60 * 1.1515;
                                                $unit = strtoupper($unit);

                                                if ($unit == "K") {
                                                    return ($miles * 1.609344);
                                                } else if ($unit == "N") {
                                                    return ($miles * 0.8684);
                                                } else {
                                                    return $miles;
                                                }
}
                                        ?>

