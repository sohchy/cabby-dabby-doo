$(document).ready(function(){

	$user_destination_txtbox_lat = $("#user_destination_txtbox_lat");
	$user_destination_txtbox_long = $("#user_destination_txtbox_long");
	
	$user_destination_txtbox = $("#user_destination_txtbox");
	
	
	$user_destination_submit = $("#user_destination_submit");
	
	$user_destination_txtbox.focus(function(){
	
		if($(this).val() == "destination?") {
			$(this).val('');
		}
	});
	
	
	
	$user_destination_submit.click(function(){

		
			
	    // Creating a MapOptions object with the required properties 
	    var options = { 
	      zoom: 14, 
	      center: new google.maps.LatLng(37.09, -95.71), 
	      mapTypeId: google.maps.MapTypeId.ROADMAP 
	    }; 

	
		///// USE DIFFERENT icons for cars
	
	
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
		
	
	
	
	
		/*
		$.ajax({
		
		
			url: "receive_ajax_send_googlemaps.php",
			data: "lat="+$user_destination_txtbox_lat.val()+"&long="+$user_destination_txtbox_long.val(),
			
			success: function(data){
			
				console.log(data);
				$user_destination_txtbox.parent().append(data);
			
			}
			
			
		});
		*/
	
	});
	

});