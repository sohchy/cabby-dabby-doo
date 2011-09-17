$(document).ready(function(){

	$user_destination_txtbox_lat = $("#user_destination_txtbox_lat");
	$user_destination_txtbox_long = $("#user_destination_txtbox_long");
	$user_destination_txtbox = $("#user_destination_txtbox");
	
	
	$user_destination_submit = $("#user_destination_submit");
	
	
	// GEO LOCATION STUFF
	var watchID;
	var geo;
	var MAXIMUM_AGE = 1000; // 1 sec
	var TIMEOUT = 300000 // 5 mins
	var HIGHACCURACY = true;
	
	var lat, long;
	
	
	var starting_lat;
	var starting_long;
	
	var run_once_counter = 0;
	
	
	// if geo can be created
	if((geo = getGeoLocation())) {
		//geo location works on ur browser
		
		watchID = geo.watchPosition(show_coords, geo_error, {
			enableHighAccuracy: HIGHACCURACY,
			maximumAge: MAXIMUM_AGE,
			timeout: TIMEOUT
		});
       geo.getCurrentPosition(show_coords);
	} else {
		//statusMessage('HTML5 Geolocation is not supported');
	}

	$user_destination_txtbox.focus(function(){
		if($(this).val() == "destination?") {
			$(this).val('');
		}
	});
	
	$user_destination_submit.click(function(){	
	    // Creating a MapOptions object with the required properties 
	    var options = { 
	      zoom: 16, 
	      //center: new google.maps.LatLng(parseFloat(starting_lat), parseFloat(starting_long)),
	      center: new google.maps.LatLng(starting_lat, starting_long), 
	      mapTypeId: google.maps.MapTypeId.ROADMAP 
	    }; 
		///// USE DIFFERENT icons for cars
		// ~!!!!!! if starting_lat, starting_long are empty, prefill them
	
		var map = new google.maps.Map(document.getElementById('user_map'), options); 
		var marker = new google.maps.Marker({ 
			position: new google.maps.LatLng($user_destination_txtbox_lat.val(), $user_destination_txtbox_long.val()), 
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
	
	});
	
	
	function getGeoLocation() {
		try{
			if(!!navigator.geolocation) return navigator.geolocation;
			else return undefined;
		} catch(e){
			return undefined;
		}

	}


	// BETTER THAN ALERT
	function geo_error(error) {
		stopWatching();
		switch(error.code) {
			case error.TIMEOUT:
				alert('Geolocation Timeout');
				break;
			case error.POSITION_UNAVAILABLE:
				alert('Geolocation Position unavailable');
				break;
			case error.PERMISSION_DENIED:
				alert('Geolocation Permission denied');
				break;
			default:
				alert('Geolocation returned an unknown error code: ' + error.code);
		}
	}
	
	function show_coords(position) {
		d = new Date();
		lat = position.coords.latitude;
		long = position.coords.longitude;
		if(run_once_counter == 0){
			starting_lat = lat;
			starting_long = long;
			run_once_counter++;
		}
		//41.35, -95.999258
	}
});



// !!!!!!!!! WHAT DOES geo.clearWatch(watchID) do??
	




