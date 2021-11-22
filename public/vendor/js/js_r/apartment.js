//get location 
$(function(){
  var container = $('.container-d'), inputFile = $('#file'), img, btn, txt = 'Browse picture', txtAfter = 'Browse another pic';

  if(!container.find('#upload').length){
    container.find('.input').append('<input type="button" value="'+txt+'" id="upload">');
    btn = $('#upload');
    container.append('<img src="" class="hidden" alt="Uploaded file" id="uploadImg" width="100">');
    img = $('#uploadImg');
  }

  btn.on('click', function(){
    img.animate({opacity: 0}, 300);
    inputFile.click();
  });

  inputFile.on('change', function(e){
    container.find('label').html( inputFile.val() );

    var i = 0;
    for(i; i < e.originalEvent.srcElement.files.length; i++) {
      var file = e.originalEvent.srcElement.files[i], 
      reader = new FileReader();

      reader.onloadend = function(){
        img.attr('src', reader.result).animate({opacity: 1}, 700);
      }
      reader.readAsDataURL(file);
      img.removeClass('hidden');
    }

    btn.val( txtAfter );
  });
});

function getLocation(city_id)
{
  if(city_id == 0)
  {
    $('.app_location').val('');
    $('.app_lake').val('');
    $('.app_river').val('');
  }
  $.ajax({
    url: window.getLocationUrl + '?city_id=' + city_id,
    type: "get",
    beforeSend: function() {
      
    }
  })
  .done(function(response) {
    $('.set-location').html('');
    $('.set-location').html(response.locations);
    $('.app_location').val($('.main_rec_location_id').val());

    var loc_name = $('.main_rec_location_name').val();
    if(loc_name == ''){
      $('.set-lakes').html('');
      $('.set-lakes').html(response.lakes);

      $('.set-rivers').html('');
      $('.set-rivers').html(response.rivers);
    }else{
      $('.set-location-name').text(loc_name);
      $('.main_rec_location_name').val('');
    }
    



  })
  .fail(function(jqXHR, ajaxOptions, thrownError) {

  });
}
//get lakes

function getLakes(location_id)
{
  if(location_id == 0)
  {
    $('.app_lake').val('');
  }
  $.ajax({
    url: window.getLakesUrl + '?location_id=' + location_id,
    type: "get",
    beforeSend: function() {
      
    }
  })
  .done(function(response) {
    $('.set-lakes').html('');
    $('.set-lakes').html(response);

    var lake_name = $('.main_rec_lake_name').val();
    if(lake_name){
      $('.set-lake-name').text(lake_name);
      $('.app_lake').val($('.main_rec_lake_id').val());
      $('.main_rec_lake_name').val('');
    } 
    

  })
  .fail(function(jqXHR, ajaxOptions, thrownError) {

  });
}
//get rivers
function getRivers(location_id)
{
  if(location_id == 0)
  {
    $('.app_river').val('');
  }
  $.ajax({
    url: window.getRiversUrl + '?location_id=' + location_id,
    type: "get",
    beforeSend: function() {
      
    }
  })
  .done(function(response) {
    $('.set-rivers').html('');
    $('.set-rivers').html(response);
    var river_name = $('.main_rec_river_name').val(); 
    if(river_name){
      $('.set-river-name').text(river_name);
      $('.app_river').val($('.main_rec_river_id').val());
      $('.main_rec_river_name').val('');
    }
  })
  .fail(function(jqXHR, ajaxOptions, thrownError) {

  });
}
// autocomplet address
$(function() {
  var autocomplete;
  autocomplete = new google.maps.places.Autocomplete((document.getElementById('app_address_auto')), {
    types: ['geocode'],
  });
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    
  });

});

//validate email
$(document).on('keyup','.app_email',function(){
  var email = $(this).val();
  var rc_id = $('.main_rec_id').val();
  var data = new FormData();
  data.append('email',email);
  data.append('id',rc_id);
  data.append('_token',window.csrf_token);
  $.ajax({
    processData: false,
    contentType: false,
    data: data,
    type: 'POST',
    url: window.checkAppEmail,
    success: function(response) {
      if(response == 'block'){
        $('.app_email_status').val(1);
      }else{
        $('.app_email_status').val(0);
      }
        //console.log(response);
      }

    });
});

//validate phone
$(document).on('keyup','.app_phone',function(){
  var phone = $(this).val();
  var rc_id = $('.main_rec_id').val();
  var data = new FormData();
  data.append('phone',phone);
  data.append('id',rc_id);
  data.append('_token',window.csrf_token);
  $.ajax({
    processData: false,
    contentType: false,
    data: data,
    type: 'POST',
    url: window.checkAppPhone,
    success: function(response) {
      if(response == 'block'){
        $('.app_phone_status').val(1);
      }else{
        $('.app_phone_status').val(0);
      }
    }

  });
});

// Appartment form validation
$(document).on('submit','#apartment-form',function(){
	//block 1 validation
	var message = ' is required';
	if ($('.app_type:checked').length < 1) {
   toastr["error"]("Apgyvendinimo tipas"+message);
   return false;
 }
 if ($.trim($('.app_location').val()) == '') {
   toastr["error"]("Location"+message);
   return false;
 }
 if ($.trim($('.app_city').val()) == '') {
   toastr["error"]("Miestas/ rajonas"+message);
   return false;
 }
 if ($.trim($('.app_lake').val()) == '') {
   toastr["error"]("Ežerai"+message);
   return false;
 }
 if ($.trim($('.app_river').val()) == '') {
   toastr["error"]("Upės"+message);
   return false;
 }
 if ($.trim($('.app_sea').val()) == '') {
   toastr["error"]("Sea"+message);
   return false;
 }
 if ($.trim($('.app_resource_name').val()) == '') {
   toastr["error"]("Pavadinimas/ antraštė"+message);
   return false;
 }
 if ($.trim($('.app_sort_title').val()) == '') {
   toastr["error"]("Sort title"+message);
   return false;
 }
 if ($.trim($('.app_description').val()) == '') {
   toastr["error"]("Description"+message);
   return false;
 }
 if ($.trim($('.app_address').val()) == '') {
   toastr["error"]("Adresas"+message);
   return false;
 }
 if ($.trim($('.nearest_location').val()) == '') {
   toastr["error"]("Nearest location"+message);
   return false;
 }
 if ($.trim($('.app_phone').val()) == '') {
   toastr["error"]("Telefonai"+message);
   return false;
 }
 if ($.trim($('.app_email').val()) == '') {
   toastr["error"]("El. pašto adresai"+message);
   return false;
 }
 if ($.trim($('.app_single_min_price').val()) == '') {
   toastr["error"]("Kaina parai"+message);
   return false;
 }
 if ($.trim($('.app_single_max_price').val()) == '') {
   toastr["error"]("Kaina parai"+message);
   return false;
 }
 if ($.trim($('.app_single_price_type').val()) == '') {
   toastr["error"]("Kaina parai"+message);
   return false;
 }
 if ($.trim($('.app_total_min_price').val()) == '') {
   toastr["error"]("Viso komplekso nuomos kaina parai"+message);
   return false;
 }
 if ($.trim($('.app_total_max_price').val()) == '') {
   toastr["error"]("Viso komplekso nuomos kaina parai"+message);
   return false;
 }
 if ($.trim($('.app_total_room').val()) == '') {
   toastr["error"]("Bendras numerių skaičus"+message);
   return false;
 }
 if ($.trim($('.app_total_people').val()) == '') {
   toastr["error"]("Bendras vietų skaičius"+message);
   return false;
 }
 if ($.trim($('.app_seasion').val()) == '') {
   toastr["error"]("Dirba"+message);
   return false;
 }
 if ($.trim($('.app_payment_type').val()) == '') {
   toastr["error"]("Atsiskaitymas banko kortelėmis"+message);
   return false;
 }
 if ($.trim($('.app_note').val()) == '') {
   toastr["error"]("Pastabos, klausimai"+message);
   return false;
 }
 if ($.trim($('.app_contact_person').val()) == '') {
   toastr["error"]("Kontaktinis asmuo"+message);
   return false;
 }
 if ($.trim($('.app_phone_status').val()) == 1) {
   toastr["error"]("Phone already exist please try another");
   return false;
 }
 if ($.trim($('.app_email_status').val()) == 1) {
   toastr["error"]("Email already exist please try another");
   return false;
 }
  var fac = parseInt($('input[name="facilities[]"]:checked').val());
  if(isNaN(fac)){
    toastr["error"]("Facilities"+message);
    return false;
  }

  var main_file = $('#main_preview').attr('src').split("/")[4];
  if(main_file == 'choose-logo.png'){
    toastr["error"]("Image"+message);
    return false;
  }

});

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
          $('.uploadedImage').html(data.image);
          $('#rcMultipleImage').trigger("reset");
        }
      }
    });

});


function removeRecImage(rec_id,img_id)
{
  $.ajax({
    url: window.resourceImageDelete + '?rec_id=' + rec_id +'&img_id='+img_id,
    type: "get",
    beforeSend: function() {
      return confirm("Are you sure to delete this item?");
    }
  })
  .done(function(response) {
    $('.uploadedImage').html(response);
    console.log(response);
  })
  .fail(function(jqXHR, ajaxOptions, thrownError) {

  });
}

$(document).ready(function(){
  
  var city_id = $('.main_rec_city_id').val();
  var location_id = $('.main_rec_location_id').val();

  
  if(location_id){
    getLakes(location_id);
    getRivers(location_id);
  }

  if(city_id){
    getLocation(city_id);
  }
  
  


});