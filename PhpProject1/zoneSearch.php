<?php
//connect to the database
require 'databaseConnect.php';
//receive beach zone variable from javascript
    if(isset($_POST['beachZone'])){
        $sql = "SELECT no, name, address,longitude, latitude from beachinfo WHERE zone = '{$_POST['beachZone']}' ";
        $result = mysqli_query($dbc, $sql);
        $locationInfo = array();
        // retrive data from database and sent into an array
        while ($data = mysqli_fetch_array($result)){
            $locationInfo[] = $data;
        }
    }
    //convert array to json
    echo json_encode($locationInfo);
?>