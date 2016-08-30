var map;
var markers = [];
var infowindow;
var address;
var img;
var pyrmont = {lat: -37.925, lng: 145.020};
var locationList = new Array();
//var beach = new Array();

function initMap() {
  
  var s = document.createElement("script");
  map = new google.maps.Map(document.getElementById('googleMap'), {
    center: pyrmont,
    zoom: 9
  });
  // Create the DIV to hold the control and call the CenterControl() constructor
  // passing in this DIV.
  var centerControlDiv = document.createElement('div');
  var centerControl = new CenterControl(centerControlDiv, map);

  centerControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);

//  beachList();
    showBeach()
  infowindow = new google.maps.InfoWindow();
//  var request = {
//    location: pyrmont,
//    query: 'dog friendly beach in Victoria in Autrialia'
//  };
  
//    for (var i = 0; i < locationList.length; i++)
//    {
//      var beachP = locationList[i];
//      new google.maps.Marker({
//      position: {lat: parseInt(beachP[0]), lng: parseInt(beachP[1])},
//      map: map
//    });
//    }

//  var service = new google.maps.places.PlacesService(map);
//  service.textSearch(request, callback);
}



//function callback(results, status) {
//  if (status === google.maps.places.PlacesServiceStatus.OK) {
//    for (var i = 0; i < results.length; i++) {
//      createMarker(results[i]);
//    }
//  }
//}

//function geocodeLocation(geocoder, location) {
//  geocoder.geocode({'location': location}, function(results, status) {
//    if (status === google.maps.GeocoderStatus.OK) {
//        address = results[1].formatted_address;
////        img = results[1].
//    }
//  });
//}
function createMarker(lng, lat, name, address) {
//  var placeLoc = place.geometry.location;
var placeLoc = {lat: lng, lng: lat};
  var contentString = '<div id="content">'+
      '<a href="desc.php?no=1">More Info</a> '+
      '</div>';
  var content1 = '<div id="content">' + '</div>';
  var marker = 
          new google.maps.Marker({
    map: map,
    position: placeLoc,
    title: 'Click to zoom in',
//    icon: photos[0].getUrl({'maxWidth': 35, 'maxHeight': 35})
  });
  markers.push(marker);
  google.maps.event.addListener(marker, 'click', function() {
//    infowindow.setContent(content);
    infowindow.setContent(name + content1 + address + contentString);
    infowindow.open(map, this);
    map.setZoom(12);
    map.setCenter(marker.getPosition());
  });
}
function showBeach(){
    $('#btnSearch').click(function(){
        deleteMarkers();
    var areaSelect = $('#zone').val();
    var zoneName = "Phillip Island";
    if (areaSelect !== "0")
    {
        switch(areaSelect){
            
            case '1': zoneName = "Great Ocean Road";
                break;
            case '2': zoneName = "Melbourne Suburbs";
                break;
            case '3': zoneName = "Mornington Peninsula";
                break;
            case '4': zoneName = "Phillip Island";
                break;
            case '5': zoneName = "Bellarine Peninsula";
                break;
        }
    $.ajax({
        url   : "zoneSearch.php",
        type  : "POST",
        datatype : "json",
        data: {
//            flag: 1,
            beachZone: zoneName
        },
        success:function(data){
        var loc = JSON.parse(data);
        for(var i in loc){
            var rows = loc[i];
            var name = rows[0];
            var address = rows[1];
            var lng = rows[2];
            var lat = rows[3];
        createMarker(parseFloat(lat), parseFloat(lng), name, address);    
    }
    }   
    });
    }
    else
    {
        beachList();
    }   
 })
    
}

function beachList(){
    $.ajax({
        url   : "queryDatabase.php",
        type  : "POST",
        datatype : "json",
        success:function(data){
//            locationList = locationInfo;
        var loc = JSON.parse(data);
        for(var i in loc){
            var rows = loc[i];
            var name = rows[0];
            var address = rows[1];
            var lng = rows[2];
            var lat = rows[3];
        createMarker(parseFloat(lat), parseFloat(lng), name, address);      
    }
    }   
    });
}

function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}
function deleteMarkers() {
  setMapOnAll(null);
  markers = [];
}
function CenterControl(controlDiv, map) {

  // Set CSS for the control border.
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#fff';
  controlUI.style.border = '2px solid #fff';
  controlUI.style.borderRadius = '3px';
  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
  controlUI.style.cursor = 'pointer';
  controlUI.style.marginBottom = '22px';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to recenter the map';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control interior.
  var controlText = document.createElement('div');
  controlText.style.color = 'rgb(25,25,25)';
  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
  controlText.style.fontSize = '12px';
  controlText.style.lineHeight = '30px';
  controlText.style.paddingLeft = '5px';
  controlText.style.paddingRight = '5px';
  controlText.innerHTML = 'Home Map';
  controlUI.appendChild(controlText);

  // Setup the click event listeners: simply set the map to Chicago.
  controlUI.addEventListener('click', function() {
    map.setCenter(pyrmont);
    map.setZoom(9);
  });

}
    
