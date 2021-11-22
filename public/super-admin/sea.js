$(document).on('submit','#updateSea',function(event){
	var data = new FormData( $( 'form#updateSea' )[ 0 ]);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_sea_update,
      	success: function(response) {
      		$('#seaModal').modal('hide');
      		toastr["success"]("Saved!");
      		$('.all-seas').html(response);
      	}
    });
    return false;
});

function editSea(id){
	var data = new FormData();
  	data.append('id',id);
  	data.append('_token',window.csrf_token);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_sea_edit,
      	success: function(response) {
      		$('.edit-sea-content').html(response);
      		assignEditor();
      		$('#seaModal').modal('show');
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




