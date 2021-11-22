function deleteResource(rec_id,user_id)
{
	$.ajax({
    	url: window.resourceDelete + '?rec_id=' + rec_id +'&user_id='+user_id,
    	type: "get",
      	beforeSend: function() {
      		return confirm("Are you sure to delete this item?");
      	}
    })
    .done(function(response) {
    	$('.resourceListing').html(response);
    	 toastr["success"]("Deleted!");
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
}


function changeStatus(status, resource)
{
    $.ajax({
      url: window.resourceUserChange + '?status=' + status +'&resource='+resource,
      type: "get",
        beforeSend: function() {
        }
    })
    .done(function(response) {
        $('.resourceListing').html(response);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
}