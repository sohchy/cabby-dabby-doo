(function() { 
  window.onload = function() { 
 
    // Creating a MapOptions object with the required properties 
    var options = { 
      zoom: 3, 
      center: new google.maps.LatLng(37.09, -95.71), 
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    }; 
     
    // Creating the map   
    var map = new google.maps.Map(document.getElementById('map'), options); 
     
		 
	
	// Adding a marker to the map 
	var marker = new google.maps.Marker({ 
	position: new google.maps.LatLng(40.7257, -74.0047), 
	map: map, 
	title: 'Click me',  	icon:'http://icons.iconarchive.com/icons/aha-soft/perfect-transport/48/Ta	xi-icon.png'
	}); 
	
	var infowindow = new google.maps.InfoWindow({ 
	content:'<div class="info">Hello world</div>' 
	});
	
	google.maps.event.addListener(marker, 'click', function() { 
	// Calling the open method of the infoWindow 
	infowindow.open(map, marker); 
	}); 
	
	
  }; 
})();