<?php
//set up database connection
    require 'databaseConnect.php';
    // receive variable value from javascript
    $overallScore = (isset($_POST['overall'])) ? $_POST['overall'] : 0; //overall rate value
    $bid = (isset($_POST['bid'])) ? $_POST['bid'] : 0; //current beachNo
    $cleanScore = (isset($_POST['clean'])) ? $_POST['clean'] : 0; //cleanliness rate value
    $facilityScore = (isset($_POST['facility'])) ? $_POST['facility'] : 0; //facility rate value
    $safetyScore = (isset($_POST['safety'])) ? $_POST['safety'] : 0; //safety rate value
    $beachViewScore = (isset($_POST['beachView'])) ? $_POST['beachView'] : 0; //beachview rate value
    $sql = "insert into rating(beachId, overallRate, cleanliness, facility, safety, beachView) values ('$bid', '$overallScore', '$cleanScore','$facilityScore','$safetyScore','$beachViewScore')";
    $result = mysqli_query($dbc, $sql);
    if($result)
    {
        echo "Rated Successfully!";
    }
    else
    {
        echo "Fail to rate the beach, please try again!";
    }
?>

