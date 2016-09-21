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
// store the latitude and longitude into cookie
function successFunction(position) 
{
    var aa = position.coords.latitude; //get latitude
    var bb = position.coords.longitude; //get longitude
    
    document.cookie="clat"+"="+aa;
    document.cookie="clong"+"="+bb;
}
// fail to get the current location
function errorFunction(position) 
{
    alert('Cannot get your current location! Please check your browser settings.');
}










