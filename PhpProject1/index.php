<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PuppyGo</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="distance.js"></script>
        <script src="js/skel-layers.min.js"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>


        <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" /> 
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>

        </noscript>
        <!-- Include Twitter Bootstrap and jQuery: -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <!-- Include the plugin's CSS and JS: -->
        <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>

    </head>
    <script type="text/javascript">
        dvi{
            
        }
    </script>
    <body class="landing">
        <?php
        include 'header.php';
        ?>

        <!-- Banner -->
        <section id="banner" >
            <div clas='container'>
                <div class="row 200%" >
                    <div class="4u 12u$(medium)">

                        
                        <center>       <h3>Suburb </h3></center>
                        

                    </div>
                    <div class="4u 12u$(medium)">

                        
                            <h3>Facilities </h3>
                        

                    </div>
                    <div class="4u 12u$(medium)">

                        
                            <h3>Activities&nbsp;&nbsp; </h3>
                       

                    </div>
                </div>
                </div>
                <div>
                    <select id="Suburb" size="2" >
                        <option value="Melbourne Suburbs">Melbourne Suburbs</option>
                        <option value="Mornington Peninsula">Mornington Peninsula</option>
                        <option value="Philip Island">Philip Island</option>
                        <option value="Bellarine Peninsula">Bellarine Peninsula</option>
                        <option value="Apollo Bay">Apollo Bay</option>
                    </select>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#Suburb').multiselect({
                                buttonWidth: '300px',
                                dropRight: true
                            });
                        });
                    </script>
                    <select id="facility" multiple="multiple">
                        <option value="toilet">toilet</option>
                        <option value="bin">bin</option>
                        <option value="waterspot">waterspot</option>
                        <option value="parking">parking</option>
                        <option value="cafe">cafe</option>
                        <option value="clinic">clinic</option>
                        <option value="bbq">bbq</option>
                    </select>

                    <script type="text/javascript">
                        $(document).ready(function () {

                            $('#facility').multiselect({
                                buttonWidth: '300px',
                                dropRight: true
                            });


                        });
                    </script>
                    <select id="sport" name="sport" multiple="multiple">
                        <option value="frisbee">frisbee</option>
                        <option value="sand_volleyball">sand_volleyball</option>
                        <option value="sand_soccer">sand_soccer</option>
                        <option value="swimming">swimming</option>
                        <option value="surfing">surfing</option>
                    </select>

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
                            <ul class="actions" >
                                <li>
                                    <a class="button medium" id="GO" >Go to your Beach</a>
                                </li>
                            </ul>
                        </div>


                    </div>
            </div>
        </center>
    </section>
    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="8u 12u$(medium)">
                    <ul class="copyright">
                        <li>&copy; Skylark. All rights reserved.</li>
                        <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
                        <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>

</body>
</html>