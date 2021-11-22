function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#crop_modal').modal('show');
            $("#crop_img").attr("src", e.target.result);
            // $("#blah").attr("src", e.target.result);
            // $(".pre-image").css("display", "inline-block");
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function readURLThumb(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#thumb_blah").attr("src", e.target.result);
            $(".pre-thumb").css("display", "inline-block");
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function () {

    $('#openBtn').click(function () {
        $('#myModal').modal({
            show: true
        })
    });

        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });


});
$(".crop-btn").click(function () {
    var crop = $("#crop_img").attr("src");
    $("#blah").attr("src", crop);
    $('#crop_modal').modal('hide');
    $(".pre-image").css("display", "inline-block");
});

// $("#file").change(function () {
//     readURL(this);
// });
// $("#thumb_file").change(function () {
//     readURLThumb(this);
// });
