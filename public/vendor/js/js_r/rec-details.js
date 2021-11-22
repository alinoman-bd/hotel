
function openRoom(room_id,rec_id)
{
	$.ajax({
    	url: window.singleRoom + '?room_id=' + room_id+'&rec_id='+rec_id,
    	type: "get",
      	beforeSend: function() {
      
      	}
    }) 
    .done(function(response) {
    	$('.singleRoom').html(response);

      var galleryThumbs2 = new Swiper('.gallery-thumbs2', {
        spaceBetween: 10,
        slidesPerView: 5,
        loop: false,
        freeMode: true,
          loopedSlides: 5, //looped slides should be the same
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
          breakpoints: {
            450: {
              slidesPerView: 2,
            },
            767: {
              slidesPerView: 3,
            },
            1200: {
              slidesPerView: 4,
            },
          }
      });
      var galleryTop2 = new Swiper('.gallery-top2', {
        spaceBetween: 10,
        loop: false,
          loopedSlides: 5, //looped slides should be the same
          thumbs: {
            swiper: galleryThumbs2,
          }
      });

      var more_ph2 = $(".gallery-thumbs2 .swiper-slide").width();
      $(".more-photos2").width(more_ph2);
      $('#details_modal').addClass('show-modal-d');

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {

    });
}

  $(document).on("click", ".d-close-m", function () {
      $("#details_modal").removeClass("show-modal-d");
  });