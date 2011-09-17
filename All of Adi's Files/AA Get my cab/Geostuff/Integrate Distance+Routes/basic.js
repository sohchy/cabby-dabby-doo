var current="Omaha, Nebraska";
var destination;
var map, geocoder, marker, infowindow;

function initialize() { 
   
 
    // Creating a MapOptions object with the required properties 
    var options = { 
      zoom: 3, 
      center: new google.maps.LatLng(37.09, -95.71), 
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    }; 
     
    // Creating the map   
    map = new google.maps.Map(document.getElementById('map'), options);  

}

function getDestination(){
	destination= document.getElementById('search_Text').value;
		getCoordinates(destination); 
	}
	
function displayLocation(){
	}
	
	  // Create a function the will return the coordinates for the address 
  function getCoordinates(address) { 
    // Check to see if we already have a geocoded object. If not we create one 
    if(!geocoder) { 
      geocoder = new google.maps.Geocoder();  
    } 
 
    // Creating a GeocoderRequest object 
    var geocoderRequest = { 
      address: address 
    } 
 
    // Making the Geocode request 
	geocoder.geocode(geocoderRequest, function(results, status) { 
       
      // Check if status is OK before proceeding 
      if (status == google.maps.GeocoderStatus.OK) { 
 
        // Center the map on the returned location 
        map.setCenter(results[0].geometry.location); 
 
        // Check to see if we've already got a Marker object 
        if (!marker) { 
          // Creating a new marker and adding it to the map 
          marker = new google.maps.Marker({ 
            map: map ,
			icon:'http://icons.iconarchive.com/icons/aha-soft/perfect-transport/48/Taxi-icon.png'
          }); 
        } 
         
        // Setting the position of the marker to the returned location 
        marker.setPosition(results[0].geometry.location); 
 
        // Check to see if we've already got an InfoWindow object 
        if (!infowindow) { 
          // Creating a new InfoWindow 
          infowindow = new google.maps.InfoWindow(); 
        } 
 
        // Creating the content of the InfoWindow to the address 
        // and the returned position 
        var content = '<strong>' + results[0].formatted_address + '</strong><br />'; 
        content += 'Lat: ' + results[0].geometry.location.lat() + '<br />'; 
        content += 'Lng: ' + results[0].geometry.location.lng(); 
 
        // Adding the content to the InfoWindow 
        infowindow.setContent(content); 
 
        // Opening the InfoWindow 
        infowindow.open(map, marker); 
 
      }  
       
    }); 
   
  } 