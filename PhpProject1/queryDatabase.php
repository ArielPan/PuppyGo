<?php
//connect to the database
require 'databaseConnect.php';
    //select all the beaches in the database
    $sql = "select no, name, address, longitude,latitude from beachinfo";
    $result = mysqli_query($dbc, $sql);
    $locationInfo = array();
    // retrive data from database and sent into an array
    while ($data = mysqli_fetch_array($result)){
        $locationInfo[] = $data;
    }  
    //convert array to json
    echo json_encode($locationInfo);
?>