var initialLocation;
var siberia = new google.maps.LatLng(60, 105);
var newyork = new google.maps.LatLng(40.69847032728747, -73.9514422416687);
var browserSupportFlag =  new Boolean();

window.onLoad = initialize();


function initialize() {
  detectBrowser();

  var myOptions = {
    zoom: 14,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
  // Try W3C geolocation (Preferred)
  if(navigator.geolocation){
  	browserSupportFlag = true;
  	navigator.geolocation.getCurrentPosition(function(position){
  		initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  		map.setCenter(initialLocation);
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
  
}

function detectBrowser() {
	var useragent = navigator.userAgent;
	var mapdiv = document.getElementById("map_canvas");
	
	console.log('mapdiv' + mapdiv);
	
	if(useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1) {
		mapdiv.style.width = '100%';
		mapdiv.style.height = '100%';
	} else {
		mapdiv.style.width = '600px';
		mapdiv.style.height = '800px';
	}
}