<input type="text" id="geocode_text" />

<div id="canvas_map"></div>

<script type="text/javascript">

var text = document.getElementById('geocode_text').value;




var autocomplete = new google.maps.places.Autocomplete(text);

autocomplete.bindTo('bounds',map);




</script>