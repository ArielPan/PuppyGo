<!DOCTYPE html>
<html lang="en">
    <title>Dog-friendly beaches map</title>           
    <?php
    include 'header.php';
    ?>
    <script src="js/map-javascript.js"></script>
    <!--Google Maps API key-->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiLXg6ivkh7RzzeZpEAgoaILl8JcYcbRs&signed_in=true&libraries=places&callback=initMap"></script>
    <body>

        <!-- Main -->
        <section id="main" class="wrapper">
            <div class="container">

                <header class="major">
                    <h2>Dog-friendly beaches map</h2>
                    <p>This map will show all the dog-friendly beaches in Victoria. Feel free to click on the beach you would like to explore.</p>
                </header>
                <div class="box" id ="select">
                    <div >
                        <div >
                            <h4>Find Beaches by Area</h4>
                        </div>
                        <div >
                            <div >
                                <!--select list for different areas-->
                                <select  id="zone">
                                    <option value="0" selected = "true">All BEACHES IN VIC</option>
                                    <option value="1">GREAT OCEAN ROAD</option>
                                    <option value="2">MELBOURNE SUBURBS</option>
                                    <option value="3">MORNINGTON PENINSULA</option>
                                    <option value="4">PHILLIP ISLAND</option>
                                    <option value="5">BELLARINE PENINSULA</option>
                                </select>
                            </div>
                        </div>
                        <div> 
                        </div>
                        <button class="button small" id="btnSearch">Show</button>
                    </div>
                </div>
                <div id="googleMap" style="width: 100%; height:500px; vertical-align: middle;"></div>
            </div>
        </section>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>