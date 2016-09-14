<!DOCTYPE html>

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
//                                        $sql = "SELECT * FROM beachinfo where zone= '$beachzone' AND $facility= 1 AND $sports =1";
                    $result = mysqli_query($dbc, $sql);
                    //   for ($row = mysqli_fetch_array($result) && $row['no']=1; $row['no']<42; $row['no']++)
                    while (($row = mysqli_fetch_array($result))) {
                        $name = "distance";
                        $beachLat = $row['latitude'];
                        $beachLong = $row['longitude'];
                        $dis = distance($lat, $long, $beachLat, $beachLong, "K");
                        $distance = round($dis, 2);
                        echo '<div class = "image">
                                            <a href = "description.php?no=' . $row['no'] . '"> <img style="width: 70%; height: 35%"; src="' . $row['img_url'] . '" width="1600" height="60" />
                                            <h2><a href = "description.php?no=' . $row['no'] . '" > ' . $row['name'] . '</a></h2>
                                            <p>' . $row['address'] . '</p>
                                             <p>Distance: ' . $distance . ' Km</p>   
                                            </div>';
//                                            echo '<p class="wordText" id="'.$name.'">distance</p>';
//                                            session_abort();   
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
<!--                                        <input id="distance" name="distance" type="text" value="" />-->
                </form>   
            </div>
        </section>
                    <?php
                    include 'footer.php';
                    ?>
    </body>
</html>