<!DOCTYPE html>

<html lang="en">
    <title>Filtered Dog-friendly Beaches List</title>  
        <?php
        include 'header.php';
        ?>
    <body>
        <!-- Main -->
        <section id="main" class="wrapper">
            <div class="container">

                <header class="major">
                    <h2>Dog-friendly beaches list</h2>
                    <p>This map shows all the dog-friendly beaches in Victoria based on your preferences, as well as the distance to current location. Feel free to click on the beach you would like to explore.</p>
                </header>  

                <form>
                    <?php
                    $lat = $_COOKIE['clat'];
                    $long = $_COOKIE['clong'];
                    $test = $_GET["w1"];
                    $hello = explode(',', $test);
                    $number = count($hello);
                   
                    $query = "";
                    $n = $hello[0];
                    $s1 = "Melbourne Suburbs";
                    $s2 = "Mornington Peninsula";
                    $s3 = "Philip Island";
                    $s4 = "Bellarine Peninsula";
                    $s5 = "Apollo Bay";
                    if ($number == 0 || $hello[0]==null) {
                        $sql = "select * from beachinfo";
                    } else if (strcasecmp($n, $s1) !== 0 && strcmp($n, $s2) !== 0 && strcmp($n, $s3) !== 0 && strcmp($n, $s4) !== 0 && strcmp($n, $s5) !== 0) {

                        for ($nq = 0; $nq < $number; $nq++) {
                            if ($nq != $number - 1) {
                                $query = $query . "$hello[$nq] = 1 and ";
                            } else {
                                $query = $query . "$hello[$nq]=1";
                            }
                        }

                        $sql = "select * from beachinfo where " . $query;
                    } else {
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
                    $rowNo = mysqli_fetch_row($result);
                    if($rowNo == 0){
                    echo'<h2>Sorry, there is not beach found, maybe make less choices of the requirement will be better.<h2>' ;
                    echo "<br />\n";
                    echo "<img src='images/notfound.jpg' 70%; height: 35% />";
                    }
                        while (($row = mysqli_fetch_array($result))) {
                        $beachLat = $row['latitude'];
                        $beachLong = $row['longitude'];
                        $dis = distance($lat, $long, $beachLat, $beachLong, "K");
                        $distance = round($dis, 2);
                        echo '<div class = "image">
                                <a href = "description.php?no=' . $row['no'] . '"> <img style="width: 70%; height: 35%"; src="' . $row['img_url'] . '" width="1600" height="60" />
                                <h3><a href = "description.php?no=' . $row['no'] . '" > ' . $row['name'] . '</a></h3>
                                <p>' . $row['address'] .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Distance: ' . $distance . ' Km</p> 
                                </div>'; 
                    }
                    
                    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

                        $theta = $lon1 - $lon2;
                        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
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
                </form>   
            </div>
        </section>
                    <?php
                    include 'footer.php';
                    ?>
    </body>
</html>