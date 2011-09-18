<!DOCTYPE HTML>
<html>

	<head>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
		<style type="text/css">
		
			#map_canvas {
				height: 400px;
				width: 600px;
				margin-top: 0.6em;
			}
		</style>
	
		<script type="text/javascript">
			var initialLocation;
			var siberia = new google.maps.LatLng(60, 105);
			var newyork = new google.maps.LatLng(40.69847032728747, -73.9514422416687);
			var browserSupportFlag =  new Boolean();
			
						
			function initialize() {
				
				var mapOptions = {
					//center: new google.maps.LatLng(-33.8688,151.2195),
					zoom:15,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				
				var map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
			
			
			
				/**** from all2.js *****/
				// Try W3C geolocation (Preferred)
			  if(navigator.geolocation){
			  	browserSupportFlag = true;
			  	navigator.geolocation.getCurrentPosition(function(position){
			  	
			  	
			  		initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			  		map.setCenter(initialLocation);
			  		
			  		var input = document.getElementById("searchTextField");
					var autocomplete = new google.maps.places.Autocomplete(input);
					
					autocomplete.bindTo('bounds', map);
					
					var infowindow = new google.maps.InfoWindow();
					var image = 'cab.jpg';
					
					
					var marker_original = new google.maps.Marker({
						map: map,
						position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
						title: "testing",
						animation: google.maps.Animation.DROP,
						icon: image,
					});
					var marker = new google.maps.Marker({map: map});
					
					//infowindow.setContent('<div><strong>asdfasdf</strong></div>');
					//infowindow.open(map,marker_original);
					
					console.log(initialLocation);
		
			  		google.maps.event.addListener(autocomplete, 'place_changed', function(){
				
						infowindow.close();
						var place = autocomplete.getPlace();
						if(place.geometry.viewport) {
							map.fitBounds(place.geometry.viewport);
						} else {
							map.setCenter(place.geometry.location);
							map.setZoom(17);
						}
						
						var image = new google.maps.MarkerImage(
							place.icon,
							new google.maps.Size(71,71),
							new google.maps.Point(0,0),
							new google.maps.Point(17,34),
							new google.maps.Size(35,35)
						);
						marker.setIcon(image);
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
						
						infowindow.setContent('<div><strong>'+place.name+'</strong><br>'+address);
						infowindow.open(map, marker);
				
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
			google.maps.event.addDomListener(window,'load',initialize);
							
				
		</script>
	</head>
	<body>
		<div>
			<input id="searchTextField" type="text" size="50">
		</div>
		<div id="map_canvas">
		</div>
	
	</body>
	

</html>