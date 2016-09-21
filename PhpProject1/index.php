<!DOCTYPE html>
<html lang="en">
<title>PuppyGo</title>
<?php
        include 'header.php';
?>    
    <script src="js/distance.js"></script>
    <link rel="stylesheet" href="css/button.css" />        
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <body>
    <!-- Banner -->
    
    <section id="banner" >
         
        <div clas='container'>
           <font color=white face="Lucida Sans Unicode" size="16">Look for dog-friendly beach</font>
            <div class="row 200%" >
                <div class="4u 12u$(medium)">
                <center><font color=#DAF7A6 size="6" face=" Impact">Suburb</font></center>
                    <select id="Suburb" size="2" >
                        <option value="Melbourne Suburbs">Melbourne Suburbs</option>
                        <option value="Mornington Peninsula">Mornington Peninsula</option>
                        <option value="Phillip Island">Philip Island</option>
                        <option value="Bellarine Peninsula">Bellarine Peninsula</option>
                        <option value="Apollo Bay">The Great Ocean Road</option>
                    </select>
                </div>
            <div class="4u 12u$(medium)">


                    <center> <font color=#FFC300 size="6" face=" Impact">Facilities </font></center>
                    <select id="facility" multiple="multiple">
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


                    <center><font color=#FF5733 size="6" face=" Impact">Activities</font></center>
                    <select id="sport" name="sport" multiple="multiple">
                        <option value="frisbee">frisbee</option>
                        <option value="sand_volleyball">sand_volleyball</option>
                        <option value="sand_soccer">sand_soccer</option>
                        <option value="swimming">swimming</option>
                        <option value="surfing">surfing</option>
                    </select>

                </div>
            </div>
        </div>
        <div>


            <script type="text/javascript">
                $(document).ready(function () {
                    $('#Suburb').multiselect({
                        buttonWidth: '300px',
                        dropRight: true
                    });
                });
            </script>


            <script type="text/javascript">
                $(document).ready(function () {

                    $('#facility').multiselect({
                        buttonWidth: '300px',
                        dropRight: true
                    });


                });
            </script>


            <script type="text/javascript">
                $(document).ready(function () {

                    $('#sport').multiselect({
                        buttonWidth: '300px',
                        dropRight: true
                    });

                    var last_valid_selection = [];

                    $('#sport').change(function (event) {
                        if ($(this).val().length > 3) {
                            alert('You can only choose 3!');
                            $(this).val(last_valid_selection);
                        } else {
                            last_valid_selection = $(this).val();
                        }
                    });
                });
            </script>


            <script type="text/javascript">
                $(document).ready(function () {

                    $("#GO").click(function () {
                        var res2 = $.map($("select[name='sport']"), function (ele) {
                            return $(ele).val();
                        }).join(', ');

                        var res1 = $.map($("select[id='facility']"), function (ele) {
                            return $(ele).val();
                        }).join(', ');

                        var res0 = $.map($("select[id='Suburb']"), function (ele) {
                            return $(ele).val();
                        }).join(', ');

                        var result = "";
                        if (res0 !== "")
                        {
                            if (res1 !== "" && res2 !== "") {
                                result = res0 + "," + res1 + "," + res2;
                            } else if (res1 === "" && res2 !== "") {
                                result = res0 + "," + res2;
                            } else if (res1 !== "" && res2 === "") {
                                result = res0 + "," + res1;
                            } else {
                                result = res0;
                            }
                        } else if (res0 === "")
                        {
                            if (res1 === "" && res2 !== "") {
                                result = res2;
                            } else if (res1 !== "" && res2 === "") {
                                result = res1;
                            } else {
                                result = "";
                            }
                        }

                        window.location.href = "selectList.php?w1=" + result;
                    });
                });
            </script>
        </div>                          

        <br />

        <br />
        <center>
            <div class="container">

                <div class="4u 12u$(medium)">

                    <ul1>
                        <li1><a href="#" class="round green" id="GO">GO!<span class="round">Get the beaches based on your choices.</span></a></li1>
                       
                    </ul1> 

                </div>
                <script type="text/javascript">
                $(document).ready(function () {
                    $("#map").click(function () {
                        window.location.href = "map.php";

                    });
                    $("#list").click(function () {
                        window.location.href = "list.php";

                    });
                });

            </script>
            
              
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