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
  	
  	
  		$.ajax({
  			url: "get_cabbie_location.php",
  			data: "cabbie_id="+location.href.substr(location.href.length-2),
  			success: function(data) {
  			
  				var lat_lng = data.split('#');
  			
  				initial_lat = lat_lng['0'];
  				initial_long = lat_lng['1'];
  			
  				//initial_lat = position.coords.latitude;
		  		//initial_long = position.coords.longitude;
		  	
		  		initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		  		map.setCenter(initialLocation);
		  		
		  		var input = document.getElementById("searchTextField");
		  		
		  		var defaultBounds = new google.maps.LatLngBounds(
		  			new google.maps.LatLng(position.coords.latitude-.2, position.coords.longitude-.2),
		  			new google.maps.LatLng(position.coords.latitude+.2, position.coords.longitude+.2));
		  		
		  		var autocomplete_options = {
		  		
		  			bounds: defaultBounds,
		  		}
  			
  			}
  			
  		});
	
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

$(document).ready(function(){

	setInterval(simple_ajax_call,10000);
});

function simple_ajax_call() {
		$.ajax({
	
		url: "includes/find_open_customer.php",
		success: function(data) {
		
			if(data.match('customer_found#') != null) {
					
					clearInterval(simple_ajax_call);
					
					$("#pinging_the_server_cab").html('We have found a customer!');
					
					var customer_id = data.replace("customer_found#",'');
					
					var cabbie_id = location.href.substr(location.href.length-2);
					
					$.ajax({
					
						url: "includes/get_distance_for_cabbie.php",
						data: "cabbie_id="+cabbie_id+"&enduser_id="+customer_id,
						success: function(data2) {
							$("#pinging_the_server_cab").append("Your customer is "+data2+"miles from your location");
						}
					
					});
					
					
					
			}
		
		}
	});


}