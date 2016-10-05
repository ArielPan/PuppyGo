<!DOCTYPE html>
<html lang="en">
<title>PuppyGo</title>
<?php
        include 'header.php';
?>    
    <script src="js/distance.js"></script>
    <link rel="stylesheet" href="css/button.css" />        
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <!-- Latest compiled and minified JavaScript -->
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
                    <font color=#DAF7A6 size="5" face ="impact">Suburb</font></center>
                    <select id="Suburb" class="selectpicker" title="Please select a suburb" >
                        <option value="Melbourne Suburbs">Melbourne Suburbs</option>
                        <option value="Mornington Peninsula">Mornington Peninsula</option>
                        <option value="Phillip Island">Philip Island</option>
                        <option value="Bellarine Peninsula">Bellarine Peninsula</option>
                        <option value="Apolo Bay">Apollo Bay</option>
                    </select>


                </div>
                <div class="4u 12u$(medium)">

                    <!--add the drop down list --facility -->
                    <center> <font color=#FFC300 size="5" face ="impact">Facilities </font></center>
                    <select id="facility" class="selectpicker form-control" multiple title="Please select facilities">
                        <option value="toilet">toilet</option>
                        <option value="bin">bin</option>
                        <option value="waterspot">waterspot</option>
                        <option value="parking">parking</option>
                        <option value="cafe">cafe</option>
                        <option value="clinic">clinic</option>
                        <option value="bbq">bbq</option>
                    </select>

                </div>
                <div class="4u 12u$(medium)">
                    <!--add the drop down list --sport -->
                    <center><font color=#FF5733 size="5" face ="impact">Activities</font></center>
                    <select id="sport" class="selectpicker form-control" multiple data-max-options="3" title="Please select activities">
                        <option value="frisbee">frisbee</option>
                        <option value="sand_volleyball">sand volleyball</option>
                        <option value="sand_soccer">sand soccer</option>
                        <option value="swimming">swimming</option>
                        <option value="surfing">surfing</option>
                    </select>

                </div>
            </div>
        </div>
        <br />
        <br />
        <center>
            <div class="container">

                <div class="4u 12u$(medium)">
<!--Add a button to send the data of users' choice to selectlist.php and going to the list page.-->
                    <ul1>
                        <li1><a href="#" class="round green" id="GO">GO!<span class="round">Get the beaches based on your choices.</span></a></li1>                       
                    </ul1> 
                </div>
                <!-- add  tow buttons to led users to map page or list page.-->
            <li1><a href="#" class="round red" id="map">Map<span class="round">See all the beaches on a map. </span></a></li1>
                        <li1><a href="#" class="round yellow" id="list">List<span class="round">See all the beaches on a list.</span></a></li1>
                <br />
            </div>

        </center>
    </section>
    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>
</html>