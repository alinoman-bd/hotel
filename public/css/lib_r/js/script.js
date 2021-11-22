function openTotalBed()
{
	var text = $("#bed_type option:selected").text();
	if(text != 'Select bed type'){
		$('.bed_type_name').text('Total '+text);
		$('.bed_type_name_open').show();
	}else{
		$('.bed_type_name_open').hide();
	}
}

$(document).on('submit','.roomAddForm',function(event){
    
    var des = $('.addRoomModalDes').val();
    if(des == ''){
      toastr["error"]("Description is required");
      return false;
    }

    var img = $('.checkImageValid').attr('src');
    if(img == '#'){
      toastr["error"]("Image is required");
      return false;
    }

    $('.roomAddForm').submit();
})





$(document).ready(function(){

    $('#rcMultipleImage').ajaxForm({
      beforeSend:function(){
        $('#success').empty();
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      },
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar').text('Uploaded');
          $('.progress-bar').css('width', '100%');
          //$('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          $('.allAllRoomImg').html(data.image);
          $('#rcMultipleImage').trigger("reset");
        }
      }
    });

});

function removeRoomImg(room_id, img_id){
	$.ajax({
      url: window.room_img_delete + '?room_id=' + room_id +'&img_id='+img_id,
      type: "get",
        beforeSend: function() {
          return confirm("Are you sure to delete this item?");
        }
    })
    .done(function(response) {
      //$('.uploadedImage').html(response);
      // console.log(response);
      $('.allAllRoomImg').html(response);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
}