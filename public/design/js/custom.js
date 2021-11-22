$(document).on("click", function (e) {
  if (
    !$(e.target).hasClass("ctm-select-txt") &&
    $(e.target).parents(".ctm-select-txt").length === 0 &&
    $(e.target).parents(".ctm-option-box").length === 0
    ) {
    $(".ctm-option-box").hide();
  $(".ctm-select-txt").removeClass("ctm-slct-hide");
}
if (
  !$(e.target).hasClass("li-cnt-show") &&
  $(e.target).parents(".li-cnt-show").length === 0 &&
  $(e.target).parents(".main-cnt-show").length === 0
  ) {
  $('.main-cnt-show').addClass('d-none');
$(".li-cnt-show").removeClass("active");
}
});

$(function(){

  var more_ph = $(".gallery-thumbs1 .swiper-slide").width();
  // console.log(more_ph);
  $(".gallery-thumbs1 .more-photos").width(more_ph);

  var td_w = $(".td-width-unc211").height();
  // console.log(td_w);
  $(".price-tbl").height(td_w+30);
  $(window).resize(function () {
    var more_ph = $(".gallery-thumbs1 .swiper-slide").width();
  // console.log(more_ph);
  $(".gallery-thumbs1 .more-photos").width(more_ph);
});
  $(document).on("click", ".panel-heading", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    } else {
      $(this).addClass("active");
    }
  });
  $(document).on("click", ".ctm-select-txt", function () {
    $(".ctm-select-txt").removeClass("active-ctm-s");
    $(this).addClass("active-ctm-s");
    $(".ctm-select-txt").each(function () {
      if ($(this).hasClass("active-ctm-s")) {
        if ($(this).hasClass("ctm-slct-hide")) {
          $(this).removeClass("ctm-slct-hide");
          $(this).parent().find(".ctm-option-box").hide();
        } else {
          $(this).addClass("ctm-slct-hide");
          $(this).parent().find(".ctm-option-box").show();
        }
      } else {
        $(this).removeClass("ctm-slct-hide");
        $(this).parent().find(".ctm-option-box").hide();
      }
    });
  });
  $(document).on("click", ".ctm-option", function () {
    var option_val = $(this).text();
    $(this).parents().find(".active-ctm-s .select-txt").text(option_val);
    $(".ctm-option-box").hide();
    $(".ctm-select .ctm-select-txt").removeClass("ctm-slct-hide");
    // console.log(option_val);
  });
  $(document).on("click", ".edit-reply", function () {
    $(this).parent().siblings(".hide-box").toggle(300);
  });
  $(document).on("click", ".li-cnt-show", function () {
    $('.li-cnt-show').removeClass('active');
    $(this).addClass('active');
    tabShow(event,1);
    // console.log(111);
  });
});

function tabShow(e,n) {
  if(n==1) {
    $('.main-menu .li-cnt-show').each(function(i, v){
      if($(this).hasClass('active')) {
        x=i;
      }
    });
     // $(e.target).addClass('active');
     // console.log(x);
     $('.main-cnt-show').addClass('d-none');
     $('.main-cnt-show').eq(x).removeClass('d-none');
   }
 }

  var galleryThumbs = new Swiper('.gallery-thumbs1', {
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
  var galleryTop = new Swiper('.gallery-top1', {
    spaceBetween: 10,
    loop: false,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      }
  });
  var galleryThumbs = new Swiper('.gallery-thumbs2', {
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
  var galleryTop = new Swiper('.gallery-top2', {
    spaceBetween: 10,
    loop: false,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      }
  });
  var swiper = new Swiper('.swiper-container1', {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
