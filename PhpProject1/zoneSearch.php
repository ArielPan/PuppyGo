<?php

require 'databaseConnect.php';

    $sql = "SELECT name, address,longitude, latitude from beachinfo WHERE zone = '{$_POST['beachZone']}' ";
    $result = mysqli_query($dbc, $sql);
    $locationInfo = array();
    while ($data = mysqli_fetch_array($result)){
        $locationInfo[] = $data;
    }  
    echo json_encode($locationInfo);
?>