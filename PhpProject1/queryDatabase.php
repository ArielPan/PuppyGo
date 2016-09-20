<?php
require 'databaseConnect.php';
    
    $sql = "select no, name, address, longitude,latitude from beachinfo";
    $result = mysqli_query($dbc, $sql);
    $locationInfo = array();
    while ($data = mysqli_fetch_array($result)){
        $locationInfo[] = $data;
    }  
    echo json_encode($locationInfo);
?>