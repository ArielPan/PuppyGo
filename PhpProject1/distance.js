//var cLatitude;
//var cLongitude;

// Check for geolocation support
$(document).ready(function() { 
    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
    }
    else 
    {
        alert('It seems like Geolocation, which is required for this page, is not enabled in your browser.');
    }       
});

function successFunction(position) 
{
    var aa = position.coords.latitude;
    var bb = position.coords.longitude;
    
    document.cookie="clat"+"="+aa;
    document.cookie="clong"+"="+bb;
//    document.getElementById("testVar").value = aa;
//    pass(cLatitude,cLongitude);
//    alert('Your latitude is :'+cLatitude+' and longitude is '+cLongitude);
//    $.ajax({
//                url : "test.php",
//                type : "POST",
//                datatype: "json",
////                async: false,
//                data : {
//                    aa : aa,  
//                    bb : bb
//                },  
//                success: function(data) {
////                    alert('Your latitude is :'+cLatitude+' and longitude is '+cLongitude);
//                    alert(data);
//                      document.getElementById("distance").innerHTML = "Distance: " + data;
//                }
//            });
//    
//       $.post('test.php',{aa:cLatitude, bb:cLongitude});
}

function errorFunction(position) 
{
    alert('Error!');
}
//if (navigator.geolocation) {
//        //Use method getCurrentPosition to get coordinates
//        navigator.geolocation.getCurrentPosition(function (position) {
//        // Access them accordingly
//        cLatitude = position.coords.latitude;
//        cLongitude = position.coords.longitude;
//        beachList();
////        document.getElementById("cLat").value = cLatitude;
////        document.getElementById("cLong").value = cLongitude;
////            beachList();
//    });
//}

//function distance(lat1, lon1, lat2, lon2, unit) {
//	var radlat1 = Math.PI * lat1/180;
//	var radlat2 = Math.PI * lat2/180;
//	var theta = lon1-lon2;
//	var radtheta = Math.PI * theta/180;
//	var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
//	dist = Math.acos(dist);
//	dist = dist * 180/Math.PI;
//	dist = dist * 60 * 1.1515;
//	if (unit==="K") { dist = dist * 1.609344; }
//	if (unit==="N") { dist = dist * 0.8684; };
//        document.getElementById("hidden1").value = dist;
//}
//
//function pass(cLatitude,cLongitude){
//    var lat = cLatitude;
//    var long = cLongitude;
//    $.ajax({
//                url : "selectList.php",
//                type : "POST",
//                data : {
//                    aa: lat,
//                    bb: long
//                },
//                success: function( data ) {
//                console.log( data );
//        }
//    });
//}









