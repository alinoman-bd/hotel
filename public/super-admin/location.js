$(document).on('submit','#updateLocation',function(event){
	var data = new FormData( $( 'form#updateLocation' )[ 0 ]);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_location_update,
      	success: function(response) {
      		$('#locationModal').modal('hide');
      		toastr["success"]("Saved!");
      		getData();
      	}
    });
    return false;
});

function editLocation(id){
	var data = new FormData();
  	data.append('id',id);
  	data.append('_token',window.csrf_token);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_location_edit,
      	success: function(response) {
      		$('.edit-location-content').html(response);
      		assignEditor();
      		$('#locationModal').modal('show');
      	}
    });
}

function assignEditor(){
	$('#summernote').summernote({
	    tabsize: 2,
	    height: 100
	});
	$('#form-tags-1').tagsInput();
}

function getData()
{ 
    var page = $('#loc-page').val();
    if(page){
        var target_url = window.super_location + '?page=' + page;
    }else{
        var target_url = window.super_location;
    }
    $.ajax({
        url: target_url,
        type: "get",
        beforeSend: function() {
      
        }
    })
    .done(function(response) {
        $('.all-locations').html(response);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
}




