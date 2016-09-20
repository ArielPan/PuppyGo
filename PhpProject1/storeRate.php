<?php
    require 'databaseConnect.php';
    
    $overallScore = $_POST['overall']; 
    $bid = $_POST['bid'];
    $cleanScore = $_POST['clean'];
    $facilityScore = $_POST['facility'];
    $safetyScore = $_POST['safety'];
    $beachViewScore = $_POST['beachView'];
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

