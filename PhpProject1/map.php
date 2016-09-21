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
                                        <div id="googleMap" style="min-width: 100%; min-height:85%; vertical-align: middle;"></div>
					<p>As Victoria has more than 40 dog-friendly beaches, so we are providing a wide range of dog-friendly beaches for you to choose from. All of them are beautiful and attractive, but some of them may not provide enough facilities. Click on beach icon for more information</p>
                                      </div>>
                        </section>
    <?php
        include 'footer.php';
    ?>
	</body>
</html>