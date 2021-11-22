$(document).on('submit','#updateLake',function(event){
	var data = new FormData( $( 'form#updateLake' )[ 0 ]);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_lake_update,
      	success: function(response) {
      		$('#lakeModal').modal('hide');
      		toastr["success"]("Saved!");
      		getData();
      	}
    });
    return false;
});

function editLake(id){
	var data = new FormData();
  	data.append('id',id);
  	data.append('_token',window.csrf_token);
  	$.ajax({
      	processData: false,
      	contentType: false,
      	data: data,
      	type: 'POST',
      	url: window.super_lake_edit,
      	success: function(response) {
      		$('.edit-lake-content').html(response);
      		assignEditor();
      		$('#lakeModal').modal('show');
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
    var page = $('#lak-page').val();
    if(page){
        var target_url = window.super_lake + '?page=' + page;
    }else{
        var target_url = window.super_lake;
    }
    $.ajax({
        url: target_url,
        type: "get",
        beforeSend: function() {
      
        }
    })
    .done(function(response) {
        $('.all-lakes').html(response);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
}




