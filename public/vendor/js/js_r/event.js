// autocomplet address
$(function() {
  	var autocomplete;
  	autocomplete = new google.maps.places.Autocomplete((document.getElementById('evt_address_auto')), {
    	types: ['geocode'],
  	});
  	google.maps.event.addListener(autocomplete, 'place_changed', function() {
    
  	});
});
