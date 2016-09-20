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
}
function errorFunction(position) 
{
    alert('Cannot get your current location! Please check your browser settings.');
}










