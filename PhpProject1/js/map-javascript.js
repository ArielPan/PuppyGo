var map; 
var markers = [];
var infowindow;
var address;
var pyrmont = {lat: -37.925, lng: 145.020}; // Victoria center location
var locationList = new Array();

function initMap() {
  var s = document.createElement("script");
  // initial a map
  map = new google.maps.Map(document.getElementById('googleMap'), {
    center: pyrmont,
    scrollwheel: false,
    scaleControl: false,
    zoom: 9
  });
  // Create the DIV to hold the control and call the CenterControl() constructor
  // passing in this DIV.
  var centerControlDiv = document.createElement('div');
  var centerControl = new CenterControl(centerControlDiv, map);
  centerControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
   // get all the beaches from database and set markers on the map
    beachList();
//    get the beaches based on different areas from filter
    showBeach();
    infowindow = new google.maps.InfoWindow();
}
//create markers on the map
function createMarker(no, lng, lat, name, address) {
//    get the location needed to be marker on the map
var placeLoc = {lat: lng, lng: lat};
// get beachNo
var number = no;
// set the format of infowindow
  var contentString = '<div id="content">'+
      '<a href="description.php?no='+ number +'">More Info</a> '+
      '</div>';
  var content1 = '<div id="content">' + '</div>';
  // add marker on the map
    var marker = 
          new google.maps.Marker({
    map: map,
    position: placeLoc,
    title: 'Click to zoom in',
  });
  markers.push(marker);
  // zoom in when click the marker and show the infowindow
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(name + content1 + address + contentString);
    infowindow.open(map, this);
    map.setZoom(12);
    map.setCenter(marker.getPosition());
  });
}
// show beaches based on different areas
function showBeach(){
    //listen to the button from web page
    $('#btnSearch').click(function(){
        // delete all the marker on the map
        deleteMarkers();
        // recieve value passing from select area on web page
    var areaSelect = $('#zone').val();
    var zoneName = "";
    // set zone name according to selected value
    if (areaSelect !== "0")
    {
        switch(areaSelect){
            
            case '1': zoneName = "Apollo Bay";
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
        //using ajax to send the zone name to php file and receiving a json file 
    $.ajax({
        url   : "zoneSearch.php",
        type  : "POST",
        datatype : "json",
        data: {
            beachZone: zoneName
        },
        
        success:function(data){
        // decode json file
        var loc = JSON.parse(data);
        for(var i in loc){
            //split each column of data
            var rows = loc[i];
            var no = rows[0]; // beachNo
            var name = rows[1]; // beachName
            var address = rows[2]; //beachAddress
            var lng = rows[3]; // longitude
            var lat = rows[4]; //latitude
        createMarker(no, parseFloat(lat), parseFloat(lng), name, address);    
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
// get all the beaches from database
function beachList(){
    $.ajax({
        url   : "queryDatabase.php",
        type  : "POST",
        datatype : "json",
        success:function(data){
            // decode json file
        var loc = JSON.parse(data);
        for(var i in loc){
            //split each column of data
            var rows = loc[i];
            var no = rows[0];
            var name = rows[1];
            var address = rows[2];
            var lng = rows[3];
            var lat = rows[4];
        createMarker(no, parseFloat(lat), parseFloat(lng), name, address);      
    }
    }   
    });
}
// set all markers on the map
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}
// set map with no markers
function deleteMarkers() {
  setMapOnAll(null);
  markers = [];
}

// reset the map back to center
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
    
