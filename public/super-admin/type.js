$(document).on('submit','#updateType',function(event){
	var data = new FormData( $( 'form#updateType' )[ 0 ]);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_type_update,
      	success: function(response) {
      		$('#typeModal').modal('hide');
      		toastr["success"]("Saved!");
      		$('.all-types').html(response);
      	}
    });
    return false;
});

function editCity(id){
	var data = new FormData();
  	data.append('id',id);
  	data.append('_token',window.csrf_token);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_type_edit,
      	success: function(response) {
      		$('.edit-type-content').html(response);
      		assignEditor();
      		$('#typeModal').modal('show');
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




