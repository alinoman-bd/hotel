// set dropdown value to hidden field
function setDropdownValue(e, value, className){
	if(value == 0){
		$('.'+className).val('');
	}else{
		$('.'+className).val(value);
	}
}

function mainCity(city){
    $('#loader').addClass('loading');
    var url1 = window.search_url+'/';
    var type = $('#menu_type').val();
    if(type){
        url1+= type+'/'; 
    }
    url1+= city+'/'; 
    window.location.href = url1;
}

function mainLocation(location){
    $('#loader').addClass('loading');
    var url1 = window.search_url+'/';

    var type = $('#menu_type').val();
    if(type){
        url1+= type+'/'; 
    }
    url1+= location+'/'; 
    
    window.location.href = url1;

}
function locationLake(location,lake){
    $('#loader').addClass('loading');
    var url1 = window.search_url+'/';

    var type = $('#menu_type').val();
    if(type){
        url1+= type+'/'; 
    }
    url1+= lake+'/';
    if(type == ''){
        url1+= location+'/';
    } 
    window.location.href = url1;
}

function locationRiver(location, river){
    $('#loader').addClass('loading');
    var url1 = window.search_url+'/';

    var type = $('#menu_type').val();
    if(type){
        url1+= type+'/'; 
    }
    url1+= river+'/'; 
    if(type == ''){
        url1+= location+'/';
    }  
    window.location.href = url1;
}

function mainType(type)
{
    $('#loader').addClass('loading');
    var url1 = window.search_url+'/'+type+'/';

    var lake = $('#menu_lake').val();
    if(lake){
        url1+= lake+'/';
        window.location.href = url1; 
    }
    var river = $('#menu_river').val();
    if(river){
        url1+= river+'/';
        window.location.href = url1; 
    }
    var location = $('#menu_location').val();
    if(location){
        url1+= location+'/'; 
        window.location.href = url1;
    }
    var city = $('#menu_city').val();
    if(city){
        url1+= city+'/'; 
        window.location.href = url1;
    }
    window.location.href = url1;
}

// $(document).on('click','.resetFilter',function(){
//     $('#loader').addClass('loading');
//     var url1 = window.searchResource+'/';
//     window.location.href = url1;
// });

$(document).ready(function(){
    var location = $('#menu_location_id').val();
    var city = $('#menu_city_id').val();
    if(location || city){
        $.ajax({
          url: window.menuFilter + '?location_id=' + location+'&city_id='+city,
          type: "get",
            beforeSend: function() {
          
            } 
        })
        .done(function(response) {
           $('.location_lake').html(response.location_lake);
           $('.location_river').html(response.location_river); 
           //  alert(city);
           //console.log(response); 
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {

        });
    }
});


$(document).on('submit','#mainSearchForm',function(e){
    var val = $('#mainSearchName').val();
    if($.trim(val) == ''){
        return false;
    }
})

$(document).on('keyup','#mainSearchName',function(){
    var val  = $(this).val();
    if($.trim(val.length) > 2){
        var data = new FormData();
        data.append('val',val);
        data.append('_token',window.csrf_token);
        $.ajax( {
            processData: false,
            contentType: false,
            data: data, 
            type: 'POST',
            url:window.mainSearchSuggestion,
            success: function( response ){
                if($.trim(response) == ''){
                    $('.input-search-box').hide(); 
                }else{
                    $('.put-main-suggestion').html(response);
                    $('.input-search-box').show();
                }

            }
        });
    }else{
        $('.input-search-box').hide(); 
    }
})

function putSuggestion(title)
{
    $('#mainSearchName').val(title);
    $('#mainSearchForm').submit();

}


// main city click 

$(document).on('click','.main-city',function(){
  $('#loader').addClass('loading');
	var city_id = $(this).attr('city-id');
  $('.m_city_id').val(city_id);
  var text = $(this).text();
  $('.m_city').val(text);

  $('.m_location_id').val('');
  $('.m_location').val('');

  $('.m_lake_id').val('');
  $('.m_lake').val('');

  $('.m_river_id').val('');
  $('.m_river').val('');

  $('.m_sea_id').val('');
  $('.m_sea').val('');


	$.ajax({
    	url: window.locationLakeRiver + '?city_id=' + city_id,
    	type: "get",
      	beforeSend: function() {
      
      	}
    })
    .done(function(response) {
    	$('.location_lake').html(response.location_lake);
    	$('.location_river').html(response.location_river);

    // 	var current_url = window.location.href;
    // 	if (current_url.indexOf("?") >= 0) {
    //          var current_url = current_url.split('?')[0];
    //     }
        
    // 	var new_url = current_url+'?city_id='+city_id;
		  // window.history.pushState("object or string", "Title", new_url);
      $('#searchForm').submit();

      	//console.log(response.location_lake);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
}); 

$(document).on('click','.main-location',function(){
  $('#loader').addClass('loading');
	var location_id = $(this).attr('location-id');
  $('.m_location_id').val(location_id);
  var text = $(this).text();
  $('.m_location').val(text);

  $('.m_lake_id').val('');
  $('.m_lake').val('');

  $('.m_river_id').val('');
  $('.m_river').val('');

  $('.m_sea_id').val('');
  $('.m_sea').val('');


	$.ajax({
    	url: window.locationLakeRiver + '?location_id=' + location_id,
    	type: "get",
      	beforeSend: function() {
      
      	}
    })
    .done(function(response) {
    	$('.location_lake').html(response.location_lake);
    	$('.location_river').html(response.location_river);

    // 	var current_url = window.location.href;
    // 	if (current_url.indexOf("?") >= 0) {
    //          var current_url = current_url.split('?')[0];
    //     }
    // 	var new_url = current_url+'?location_id='+location_id;
		  // window.history.pushState("object or string", "Title", new_url);

      $('#searchForm').submit();

      	//console.log(response.location_lake);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
});

$(document).on('click','.second-location',function(){
    $('#loader').addClass('loading');
    var location_id = $(this).attr('location-id');
    $('.m_location_id').val(location_id);
    var text = $(this).text();
    $('.m_location').val(text);

    $('.m_lake_id').val('');
    $('.m_lake').val('');

    $('.m_river_id').val('');
    $('.m_river').val('');

    $('.m_sea_id').val('');
    $('.m_sea').val('');

    $('#searchForm').submit();
});

$(document).on('click','.main-lake',function(){
    $('#loader').addClass('loading');
    var lake_id = $(this).attr('lake-id');
    $('.m_lake_id').val(lake_id);
    var text = $(this).text();
    $('.m_lake').val(text);
    $('#searchForm').submit();
});

$(document).on('click','.third-location',function(){
    $('#loader').addClass('loading');
    var location_id = $(this).attr('location-id');
    $('.m_location_id').val(location_id);
    var text = $(this).text();
    $('.m_location').val(text);
    $('.m_lake_id').val('');
    $('.m_lake').val('');

    $('.m_river_id').val('');
    $('.m_river').val('');

    $('.m_sea_id').val('');
    $('.m_sea').val('');

    $('#searchForm').submit();
});

$(document).on('click','.main-river',function(){
    $('#loader').addClass('loading');
    var river_id = $(this).attr('river-id');
    var text = $(this).text();
    $('.m_river_id').val(river_id);
    $('.m_river').val(text);
    $('#searchForm').submit();
});

$(document).on('click','.main-type-id',function(){
    $('#loader').addClass('loading');
    var type_id = $(this).attr('type-id');
    var text = $(this).text();
    $('.m_type_id').val(type_id);
    $('.m_type').val(text);
    $('#searchForm').submit();
});


$(document).on('click','.main-sea-id',function(){
    $('#loader').addClass('loading');
    var sea_id = $(this).attr('sea-id');
    $('.m_sea_id').val(sea_id);
    var text = $(this).text();
    $('.m_sea').val(text);

    $('.m_river_id').val('');
    $('.m_river').val('');

    $('.m_location_id').val('');
    $('.m_location').val('');

    $('.m_lake_id').val('');
    $('.m_lake').val('');

    $('.m_city_id').val('');
    $('.m_city').val('');

    $('#searchForm').submit();
});


//login 

$(document).on('submit','#loginForm',function(event){
    event.preventDefault();
    $('#loader').addClass('loading');
    var data = new FormData( $( 'form#loginForm' )[ 0 ] );
    $.ajax( {
        processData: false,
        contentType: false,
        data: data, 
        type: 'POST',
        url:window.vendor_login_url,
        success: function( response ){
           if(response.error){
              $('#loader').removeClass('loading');
              toastr["error"](response.error);
           }else{
              window.location = response;
           }

        }
    });
});

function makeFavrite(rec_id)
{
    var data = new FormData();
    data.append('rec_id',rec_id);
    data.append('_token',window.csrf_token);
    $.ajax( {
        processData: false,
        contentType: false,
        data: data, 
        type: 'POST',
        url:window.resourceMakeFavorite,
        success: function( response ){
           $('.add-fav_color').css('color','red');

        }
    });
}

function removeFavrite(rec_id)
{
    var data = new FormData();
    data.append('rec_id',rec_id);
    data.append('_token',window.csrf_token);
    $.ajax( {
        processData: false,
        contentType: false,
        data: data, 
        type: 'POST',
        url:window.deleteFavrite,
        success: function( response ){
           $('.fav-content').html(response);

        }
    });
}

function viewedResource(rec_id)
{
    var data = new FormData();
    data.append('rec_id',rec_id);
    data.append('_token',window.csrf_token);
    $.ajax( {
        processData: false,
        contentType: false,
        data: data, 
        type: 'POST',
        url:window.resourceViewed,
        success: function( response ){
        }
    });
}

$(document).on('keyup','#slug',function(){
    var item = $(this).val();
    var id = $(this).attr('ed-id');
    var model = $(this).attr('model');
    var data = new FormData();
    data.append('item',item);
    data.append('id',id);
    data.append('model',model);
    data.append('_token',window.csrf_token);
    if($.trim(item)){
        $.ajax( {
            processData: false,
            contentType: false,
            data: data, 
            type: 'POST',
            url:window.check_slug,
            success: function( response ){
                if(response == 'exist'){
                    $('.slug-div').html('Slug nama already exist please try another');
                    $('.slug-div').addClass('exist-slug');
                    $('.btn-dis').prop('disabled', true);
                }else{
                    $('.slug-div').removeClass('exist-slug');
                    $('.slug-div').html('Your slug name is: '+response);
                    $('.btn-dis').prop('disabled', false);
                }
            }
        });
    }

})