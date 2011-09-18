
// need vars
var map,marker,geocoder,address,directionDisplay,origin,destination;


// will need directions service
var directionsService= new google.maps.DirectionsService();

// will need these vars too
var trip_distance, trip_duration;

function start() { 
 
  
     directionsDisplay = new google.maps.DirectionsRenderer();
    // Creating an object literal containing the properties  
    // you want to pass to the map
    
       
    var options = { 
      zoom: 3, 
      center: new google.maps.LatLng(37.09, -95.71), 
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    }; 
 
    // Creating the map   
    map = new google.maps.Map(document.getElementById('map'), options); 
	
	/** create the map with the starting point */
	
	
	directionsDisplay.setMap(map);
	
	origin=new google.maps.LatLng(40.7257, -74.0047);
	
	var originMarker= new google.maps.Marker({ 
	position: new google.maps.LatLng(40.7257, -74.0047), 
	map: map
	}); 
 
}

function getDestination(){

var address=document.getElementById('search_Text').value;

getCoordinates(address);

}

function getCoordinates(address){

if(!geocoder) { 
    geocoder = new google.maps.Geocoder();  
  } 
  
  var geocoderRequest = { 
  address: address 
}; 

geocoder.geocode(geocoderRequest,function(results,status){
if(status== google.maps.GeocoderStatus.OK){
	var result=results[0].geometry.location;
	if(!destination){
	var destination= new google.maps.Marker({
	map: map});
	
	destination.setPosition(results[0].geometry.location);}
}

}); 

calcRoute();

}

 function calcRoute() {
    
    destination = document.getElementById('search_Text').value;
    var request = {
        origin:origin, 
        destination:destination,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });
	calculateDistances();
  }
  
 function calculateDistances() {
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix(
          {
            origins: [origin],
            destinations: [destination],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.IMPERIAL,
            avoidHighways: false,
            avoidTolls: false
          }, callback);
      }

function callback(response, status) {
  if (status == google.maps.DistanceMatrixStatus.OK) {
    var origins = response.originAddresses;
    var destinations = response.destinationAddresses;

    for (var i = 0; i < origins.length; i++) {
      var results = response.rows[i].elements;
      for (var j = 0; j < results.length; j++) {
        var element = results[j];
        trip_distance = element.distance.text;
		
        trip_duration = element.duration.text;
	
        var from = origins[i];
        var to = destinations[j];
      }
    }
  }
  alert('Distance'+trip_distance+'Time'+trip_duration);
  
}	  
  
  
  
  
  