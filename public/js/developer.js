$(document).ready(function () {
    $("#is_active").click(function (event) {
        event.stopImmediatePropagation();
        var val = parseInt($("#is_active").val());
        if (val == 0) {
            $("#is_active").val(1);
        } else {
            $("#is_active").val(0);
        }
    });
});

function getThisPost(cat, post_id) {
    $.ajax({
        url: window.get_this_post,
        method: "POST",
        data: {
            cat: cat,
            post_id: post_id,
        },
        success: function (response) {
            $("#postId").val(post_id);
            $(".pre-img-box .pre-img").show();
            if (cat == "room") {
                $("#title").val(response.title);
                $("#summernote").text(response.description);
                $("#blah").show();
                $("#price").val(response.price);
                $("#allowed_person").val(response.allowed_person);
                $("#total_rooms").val(response.total_rooms);
                $("#main_preview").attr(
                    "src",
                    window.img_path + response.images[0].image_path
                    );
                $("#alt_preview").attr(
                    "src",
                    window.img_path + response.images[1].image_path
                    );
                $("#is_active").val(response.is_active);
                if (response.is_active) {
                    $("#is_active").attr("checked", "checked");
                } else {
                    $("#is_active").removeAttr("checked");
                }
            } else if (cat == "about") {
                $("#blah").show();
                $("#title").val(response.title);
                $(".pre-img-box .pre-img").show();
                $("#summernote").val(response.description);
                $("#main_preview").attr(
                    "src",
                    window.img_path + response.images[0].image_path
                    );
                $("#is_active").val(response.is_active);
                if (response.is_active) {
                    $("#is_active").attr("checked", "checked");
                } else {
                    $("#is_active").removeAttr("checked");
                }
            } else if (cat == "gallery") {
                $("#galleyName").hide();
                $("#blah").show();
                $("#title").val(response.title);
                $("#main_preview").attr(
                    "src",
                    window.img_path + response.image_path
                    );
            } else if (cat == "slider") {
                $("#title").val(response.title);
                $("#titleText").val(response.title_text);
                $("#buttonText").val(response.button_text);
                $("#buttonLink").val(response.button_link);
                $("#main_preview").attr(
                    "src",
                    window.img_path + response.images[0].image_path
                    );
                $("#is_active").val(response.is_active);
                if (response.is_active) {
                    $("#is_active").attr("checked", "checked");
                } else {
                    $("#is_active").removeAttr("checked");
                }
            } else if (cat == "attraction") {
                console.log(response);
                $("#title").val(response.title);
                $(".pre-img-box .pre-img").show();
                $("#summernote").val(response.description);
                $("#main_preview").attr(
                    "src",
                    window.img_path + response.images[0].image_path
                    );
                $("#is_active").val(response.is_active);
                if (response.is_active) {
                    $("#is_active").attr("checked", "checked");
                } else {
                    $("#is_active").removeAttr("checked");
                }
            }
        },
        error: function (res) {
            console.log(res);
        },
    });
}

function checkContactinfo() {
    $.ajax({
        url: window.check_contact_info,
        method: "POST",
        data: {},
        success: function (response) {
            if (response.status == 1) {
                $("#contact_heading").val(response.contact.contact_heading);
                $("#contact_text").val(response.contact.contact_text);
                $("#address").val(response.contact.contact_address);
                $("#contact_phone").val(response.contact.contact_phone);
                $("#contact_mail").val(response.contact.contact_mail);
            } else {
                console.log(response.status);
            }
        },
        error: function (res) {
            console.log(res);
        },
    });
}

$(document).ready(function () {
    $("#summernote").summernote();
});
$.ajax({
    url: window.check_contact_info,
    method: "POST",
    data: {},
    success: function (response) {
        if (response.status == 1) {
            $("#contact_heading").val(response.contact.contact_heading);
            $("#contact_text").val(response.contact.contact_text);
            $("#address").val(response.contact.contact_address);
            $("#contact_phone").val(response.contact.contact_phone);
            $("#contact_mail").val(response.contact.contact_mail);
        } else {
            // console.log(response.status);
        }
    },
    error: function (res) {
        console.log(res);
    },
});


function getThisRoomForAdImgs(room_id){
    $("#room_id_multi").val(room_id);
}

function deleteItem(type,post_id){
    swal({      
        title: "Delete Item!",
        text: "Do you want to remove this item?",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((removePost) => {
        if (removePost) {
            $.ajax({
                url: window.delete_this_item,
                method: 'post',
                data: {
                    type: type,
                    post_id: post_id,
                },
                success: function(response){
                    console.log(response);
                    location.reload();
                    // $( ".existingData" ).load(window.location.href + " .existingData");
                    // $( "#returnData" ).load(window.location.href + " #returnData");
                    swal('item deleted successfully!', {
                        icon: "success",
                    });
                },
                error: function(res){
                    console.log(res);
                }
            });
        } 
    });
}