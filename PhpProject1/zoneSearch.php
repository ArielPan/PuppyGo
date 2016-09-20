<?php

require 'databaseConnect.php';
    if(isset($_POST['beachZone'])){
        $sql = "SELECT no, name, address,longitude, latitude from beachinfo WHERE zone = '{$_POST['beachZone']}' ";
        $result = mysqli_query($dbc, $sql);
        $locationInfo = array();
        while ($data = mysqli_fetch_array($result)){
            $locationInfo[] = $data;
        }
    }  
    echo json_encode($locationInfo);
?>