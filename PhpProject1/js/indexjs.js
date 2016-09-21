
                $(document).ready(function () {
                  
                    //set the style of suburb
                    $('#Suburb').multiselect({
                        buttonWidth: '300px',
                        dropRight: true
                    });
                   
                    //set the facilty length
                    $('#facility').multiselect({
                        buttonWidth: '300px',
                        dropRight: true
                    });
                   
                    //set the sport lenght
                    $('#sport').multiselect({
                        buttonWidth: '300px',
                        dropRight: true
                    });

                    var last_valid_selection = [];
                   
                    // set the maxium choices of thr sport
                    $('#sport').change(function (event) {
                        if ($(this).val().length > 3) {
                            alert('You can only choose 3!');
                            $(this).val(last_valid_selection);
                        } else {
                            last_valid_selection = $(this).val();
                        }
                    });
                    
                    //define the function of go button, what the value will it send to the select list funciton.
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
                    
                    // define the click function of map and list
                     $("#map").click(function () {
                        window.location.href = "map.php";

                    });
                    $("#list").click(function () {
                        window.location.href = "list.php";

                    });
                    
                    
                });
     