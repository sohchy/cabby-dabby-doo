// SET UP BOUNDS ON SEARCH !!

var initialLocation;
var siberia = new google.maps.LatLng(60, 105);
var newyork = new google.maps.LatLng(40.69847032728747, -73.9514422416687);
var browserSupportFlag =  new Boolean();

var enduser_id,cabbie_id,trip_distanc2,trip_duration2;

var geocoder,addressLocation,directionsDisplay,trip_distance,trip_duration;

var directionsService = new google.maps.DirectionsService();

var initial_lat,initial_long;
			
function initialize() {
	
	directionsDisplay = new google.maps.DirectionsRenderer();
	
	
	var mapOptions = {
		//center: new google.maps.LatLng(-33.8688,151.2195),
		zoom:13,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	var map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
	
	directionsDisplay.setMap(map);


	/**** from all2.js *****/
	// Try W3C geolocation (Preferred)
  if(navigator.geolocation){
  	browserSupportFlag = true;
  	navigator.geolocation.getCurrentPosition(function(position){
  	
  		initial_lat = position.coords.latitude;
  		initial_long = position.coords.longitude;
  	
  		initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  		map.setCenter(initialLocation);
  		
  		var input = document.getElementById("searchTextField");
  		  		
  		var defaultBounds = new google.maps.LatLngBounds(
  			new google.maps.LatLng(position.coords.latitude-.2, position.coords.longitude-.2),
  			new google.maps.LatLng(position.coords.latitude+.2, position.coords.longitude+.2));
  		
  		var autocomplete_options = {
  		
  			bounds: defaultBounds,
  		}
  		
  		
		var autocomplete = new google.maps.places.Autocomplete(input, autocomplete_options);
		
		autocomplete.bindTo('bounds', map);
		
		var infowindow = new google.maps.InfoWindow();
		var origin_image = 'http://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png';
		
		
		var marker_original = new google.maps.Marker({
			map: map,
			position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
			title: "testing",
			animation: google.maps.Animation.DROP,
			icon: origin_image,
		});
		var marker = new google.maps.Marker({map: map});
		
		//infowindow.setContent('<div><strong>asdfasdf</strong></div>');
		//infowindow.open(map,marker_original);
		
  		google.maps.event.addListener(autocomplete, 'place_changed', function(){
			
		
			infowindow.close();
			var place = autocomplete.getPlace();
			var destination_image = "flag.png";
			/*
			var image = new google.maps.MarkerImage(
				place.icon,
				new google.maps.Size(71,71),
				new google.maps.Point(0,0),
				new google.maps.Point(17,34),
				new google.maps.Size(35,35)
			);
			*/
			
			
			
			if(place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(13);
			}
			
			marker.setIcon(destination_image);
			marker.setPosition(place.geometry.location);
			
			var address = '';
			if(place.address_components) {
				address = [(place.address_components[0] &&
							place.address_components[0].short_name || ''),
							(place.address_components[1] && 
							place.address_components[1].short_name || ''),
							(place.address_components[2] && 
							place.address_components[2].short_name || '')
							].join(' ');
			}
			
			//infowindow.setContent('<div><strong>'+place.name+'</strong><br>'+address);
			//infowindow.open(map, marker);
			
			if(!geocoder) {
				geocoder = new google.maps.Geocoder();
			}
			var geocoderRequest = {address: address};
			
			geocoder.geocode(geocoderRequest, function(results,status){
				if(status==google.maps.GeocoderStatus.OK) {
					var result=results[0].geometry.location;
					
					/** COME BACK TO IT !!
					if(!destination) {
						//var destination = 
					}
					 **/
					 
				}
			});
			
			var request = {
				origin: initialLocation,
				destination: address,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			directionsService.route(request, function(response,status){
			
				if(status==google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
				}
			});
			
			var service = new google.maps.DistanceMatrixService();
			service.getDistanceMatrix({
				origins: [initialLocation],
				destinations: [address],
				travelMode: google.maps.TravelMode.DRIVING,
				unitSystem: google.maps.UnitSystem.IMPERIAL,
				avoidHighways: false,
				avoidTolls: false,	
			}, callback_calculate);
			
			function callback_calculate(response,status) {
			
				if(status == google.maps.DistanceMatrixStatus.OK) {
					var origins_array = response.originAddresses;
					var destination_array = response.destinationAddresses;
					
					for(var i=0;i<origins_array.length;i++){
						var results = response.rows[i].elements;
						for(var j=0;j<results.length;j++){
							var element=results[j];
							trip_distance = element.distance.text;
							trip_duration = element.duration.text;
							
							var from = origins_array[i];
							var to = destination_array[j];
						}
					}								
				}
				
				call_ajax();
				//alert('Distance' + trip_distance+'Time'+trip_duration);
				
			}
			
			
			
	
		});	// end of google.maps.event.addlistener
	}, function(){
  		handleNoGeoLocation(browserSupportFlag);
  	});
  	//Try google gears geolocation
  } else if (google.glears) {
  	browserSupportFlag = true;
  	var geo = google.gears.factory.create('beta.geolocation');
  	geo.getCurrentPosition(function(position){
  		initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
  		map.setCenter(initialLocation);
  	}, function(){
  		handleNoGeoLocation(browserSupportFlag);
  	});
  // browser doesn't support geolocation
  } else {
  	browserSupportFlag = false;
  	handleNoGeoLocation(browserSupportFlag);
  }
  
  function handleNoGeoLocation(errorFlag) {
  	if(errorFlag == true) {
  		alert('Geolocation service failed');
  		initialLocation = newyork;
  	} else {
  		alert("your browser doesn't support geolocation.we have placed u in siberia");
  		initialLocation = siberia;
  	}
  	map.setCenter(initialLocation);
  }
 
 /*** end from all2.js ******/

}
//google.maps.event.addDomListener(window,'load',initialize);


window.onLoad = initialize();

function call_ajax() {
	var key=13;
	/*
	if(window.event)
		key=window.event.keyCode;
	else
		key=event.which;

	*/

	if(key == 13){
		
		var more_date = new Date();
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange=function(){
		
			if(ajax.readyState==4) {
			
				var data = ajax.responseText;
				
				var pass_array = data.split("#");
				
				console.log(pass_array);
				
				 enduser_id = pass_array[1];
				var enduser_lat = pass_array[2];
				var enduser_long = pass_array[3];
				
				
				var initialLocation2 = new google.maps.LatLng(enduser_lat,enduser_long); 
				var address2 = '';
				
				for(var k=4;k<pass_array.length-1;k=k+3){
					
					
					cabbie_id = pass_array[k];
					
					
					console.log(cabbie_id + ":cabbie_id");
					
					
					var cabbie_lat = pass_array[k+1];
					
					var cabbie_long = pass_array[k+2];
					
					var address2 = new google.maps.LatLng(cabbie_lat, cabbie_long);
					
					var service = new google.maps.DistanceMatrixService();
					
					service.getDistanceMatrix({
						origins: [initialLocation2],
						destinations: [address2],
						travelMode: google.maps.TravelMode.DRIVING,
						unitSystem: google.maps.UnitSystem.IMPERIAL,
						avoidHighways: false,
						avoidTolls: false,	
					}, callback_calculate2);
					
							
										
				} // end of for loop k=3
				
			}
		}// end of ajax.onreadystatechange
		
		var tmp_url = "includes/add_user_session.php?lat="+initial_lat+"&long="+initial_long+"&type=enduser&trip_distance="+trip_distance+"&trip_duration="+trip_duration;
		ajax.open("GET", tmp_url,false);
		ajax.send();
		
		
	}		
		
}


function call_more_ajax(){
	var more_date = new Date();

	var ajax2 = new XMLHttpRequest();
	ajax2.onReadyStateChange=function(){
					
		if(ajax2.readyState==4){
		
			console.log("ajax2: "+ajax2.responseText);
		
		}
		
		
					
	}
	
	var tmp_url2= "includes/add_distance_to_db.php?user_id_enduser="+enduser_id+"&user_id_cabbie="+cabbie_id+"&distance="+trip_distance2+"&time="+trip_duration2;
	ajax2.open("GET", tmp_url2, false);
	ajax2.send();	
	
}







function callback_calculate2(response,status) {
	
	if(status == google.maps.DistanceMatrixStatus.OK) {
		var origins_array = response.originAddresses;
		var destination_array = response.destinationAddresses;
		
		for(var i=0;i<origins_array.length;i++){
			var results = response.rows[i].elements;
			for(var j=0;j<results.length;j++){
				var element=results[j];
				trip_distance2 = element.distance.text;
				trip_duration2 = element.duration.text;
				
				var from = origins_array[i];
				var to = destination_array[j];
			}
		}								
	} // end of status == google.maps.DistanceMatrixStatus.OK
	
	
	call_more_ajax();
}// end of function callback_calculate2
	
