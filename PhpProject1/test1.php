<?php
session_start();
$no = $_SESSION['no'];
$currentLat = isset($_POST['aa']) ? $_POST['aa'] : null;
$currentLong = isset($_POST['bb']) ? $_POST['bb'] : null;
$servername = "40.126.224.41";
$username = "will";
$password = "password";
$dbname = "beach";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM beachinfo where no= '$no'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc())
        {
        $beachLat = $row['latitude'];
        $beachLong = $row['longitude'];
        $dis = distance($currentLat, $currentLong, $beachLat, $beachLong, "K");
        $distance = round($dis, 2);
        echo $distance;
    }
  } else {
    echo "0 results";
    }
    $conn->close();
    session_abort();
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


