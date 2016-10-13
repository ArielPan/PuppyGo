<!DOCTYPE html>
<html lang="en">
<title>PuppyGo</title>
<?php
        include 'header.php';
?>    
    <script src="js/distance.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/indexjs.js"></script>
    <body>
    <!-- Banner -->
    
    <section id="banner" >        
        <div clas='container'>
            <h2>Look for dog-friendly beach</h2>
            <div class="row 200%" >
                <!-- add three drop list here-->
                <div class="4u 12u$(medium)">
                    <center>       
                    <font color=#0040ff size="5" face ="impact">Suburb</font></center>
                    <select id="Suburb" class="selectpicker" title="Please select a suburb" >
                        <option value="Melbourne Suburbs">Melbourne Suburbs</option>
                        <option value="Mornington Peninsula">Mornington Peninsula</option>
                        <option value="Phillip Island">Philip Island</option>
                        <option value="Bellarine Peninsula">Bellarine Peninsula</option>
                        <option value="Apolo Bay">Great Ocean Road</option>
                    </select>
                </div>
                <div class="4u 12u$(medium)">
                    <!--add the drop down list --facility -->
                    <center> <font color=#0040ff size="5" face ="impact">Facilities </font></center>
                    <select id="facility" class="selectpicker"data-actions-box="true" multiple title="Please select facilities" data-width="80%" data-selected-text-format="count > 4">
                        <option data-content="<img src='images/facility/toilet.png' style='width: 6%; height:4%;'/>&nbsp&nbsp; Toilet"value="toilet">Toilet</option>
                        <option data-content="<img src='images/facility/bin.png' style='width: 6%; height:4%;'/>&nbsp&nbsp; Bin"value="toilet">Bin</option>
                        <option data-content="<img src='images/facility/tap.png' style='width: 6%; height:4%;'/>&nbsp&nbsp; WaterSupply"value="toilet">DrinkWater</option>
                        <option data-content="<img src='images/facility/parking.png' style='width: 6%; height:4%;'/>&nbsp&nbsp; Parking"value="toilet">Parking</option>
                        <option data-content="<img src='images/facility/coffee-cup.png' style='width: 6%; height:4%;'/>&nbsp&nbsp; Cafe"value="toilet">Cafe</option>
                        <option data-content="<img src='images/facility/hospital.png' style='width: 6%; height:4%;'/>&nbsp&nbsp; Vet"value="toilet">Vet</option>
                        <option data-content="<img src='images/facility/picnic.png' style='width: 6%; height:4%;'/>&nbsp&nbsp; BBQ"value="toilet">BBQ</option>
                    </select>

                </div>
                <div class="4u 12u$(medium)">
                    <!--add the drop down list --sport -->
                    <center><font color=#0040ff size="5" face ="impact">Activities</font></center>
                    <select id="sport" class="selectpicker form-control" multiple data-max-options="3" title="Please select activities" data-width="80%">
                        <option value="frisbee">Frisbee</option>
                        <option value="sand_volleyball">Sand Volleyball</option>
                        <option value="sand_soccer">Sand Soccer</option>
                        <option value="swimming">Swimming</option>
                        <option value="surfing">Surfing</option>
                    </select>

                </div>
            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <center>
            <div class="container">

                <div class="4u 12u$(medium)">
<!--Add a button to send the data of users' choice to selectlist.php and going to the list page.-->
                    
                    <button class="button big" id="GO">Search</button> 
                </div>
                <!-- add  tow buttons to led users to map page or list page.-->
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
        </center>
    </section>
    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>
</html>