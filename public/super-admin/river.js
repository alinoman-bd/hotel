$(document).on('submit','#updateRiver',function(event){
	var data = new FormData( $( 'form#updateRiver' )[ 0 ]);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_river_update,
      	success: function(response) {
      		$('#riverModal').modal('hide');
      		toastr["success"]("Saved!");
      		getData();
      	}
    });
    return false;
});

function editRiver(id){
	var data = new FormData();
  	data.append('id',id);
  	data.append('_token',window.csrf_token);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_river_edit,
      	success: function(response) {
      		$('.edit-river-content').html(response);
      		assignEditor();
      		$('#riverModal').modal('show');
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
    var page = $('#river-page').val();
    if(page){
        var target_url = window.super_river + '?page=' + page;
    }else{
        var target_url = window.super_river;
    }
    $.ajax({
        url: target_url,
        type: "get",
        beforeSend: function() {
      
        }
    })
    .done(function(response) {
        $('.all-rivers').html(response);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
}




