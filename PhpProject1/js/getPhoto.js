var pyrmont = {lat: -37.925, lng: 145.020};
$(document).ready(function(){
//    var $attrib = $('<div id="attributions"></div>');
//    $('#main').append($attrib);
    map = new google.maps.Map(document.getElementById('map'), {
    center: pyrmont,
    scrollwheel: false,
    scaleControl: false,
    zoom: 9
  });
    var lat = document.getElementById("lat").value;
    var long = document.getElementById("long").value;
    var location = {lat: parseFloat(lat), lng: parseFloat(long)};
var id = "ChIJgVzxzHpo1moRDcuRdYX20XU";
//var id = "ChIJoyoBvjx-j4ARNUWlMkjGUL4";
//    var address = "2224 Mission St, San Francisco, CA 94110, United States";
    var geocoder = new google.maps.Geocoder();
    geocodeLocation(geocoder, location); 
//    geocodeLocation(geocoder, address);
//    var request = {
////    location: pyrmont,
//    query: 'St Klida Beach, St Kilda Foreshore, St Kilda, Victoria, 3182 '
//    };
//  var service = new google.maps.places
//          .PlacesService(map);
//  service.textSearch(request, callback);
});

//function callback(place, status) {
//   if (status === google.maps.places.PlacesServiceStatus.OK) {
//                
//        var placeId = place[0].place_id;
//                
//              }
//              var request1 = {
//                  placeId: placeId
//              };
//              var service = new google.maps.places
//            .PlacesService(map);
//              service.getDetails(request1, callback1);
// 
//            }    

function geocodeLocation(geocoder, location) {
            geocoder.geocode({'location': location }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                var placeId = results[0].place_id;
                var request = {
            placeId: 'ChIJgVzxzHpo1moRDcuRdYX20XU'
            };
           }
           else{
               window.alert('No results found');
           }
          var service = new google.maps.places
          .PlacesService(map);
          service.getDetails(request, callback);
           }
           else{
               window.alert('Geocoder failed due to: ' + status);
           }
    });
}
  
  
  


function callback(place, status) {
   if (status === google.maps.places.PlacesServiceStatus.OK) {
                var photos = place.photos;
                if (!photos) {
                    return;
                  }
              }
              var photo1 = photos[0].getUrl({'maxWidth': 250, 'maxHeight': 150});
              var photo2 = photos[1].getUrl({'maxWidth': 250, 'maxHeight': 150});
              var photo3 = photos[2].getUrl({'maxWidth': 250, 'maxHeight': 150});
              $.post('testImage.php',{photo1:photo1, photo2:photo2, photo3:photo3},
                    function(data){    
                        alert(data);
                });
            }           
        
            
