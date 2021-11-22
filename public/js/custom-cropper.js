$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function inputChangeAddEvent(e, image, $modal) {
    var files = e.target.files;
    var done = function (url) {
        image.src = url;
        $modal.modal({
            backdrop: "static",
            keyboard: false,
        });
    };
    var reader;
    var file;
    var url;
    if (files && files.length > 0) {
        file = files[0];
        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
}
function cropUpload($modal, width, height, config, selectors) {
    let canvas;
    $modal.modal("hide");
    if (cropper) {
        canvas = cropper.getCroppedCanvas({
            width: width,
            height: height,
        });
        canvas.toBlob(function (blob) {
            let formData = new FormData();
            formData.append("avatar", blob);
            formData.append("type", config.type);
            formData.append("session_name", config.session_name);
            $.ajax(config.url, {
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = new XMLHttpRequest();
                    xhr.upload.onprogress = function (e) {
                        var percent = "0";
                        if (e.lengthComputable) {
                            percent = Math.round((e.loaded / e.total) * 100);
                        }
                    };

                    return xhr;
                },
                success: function (res) {
                    // console.log(res);
                    $(selectors.class).css({ display: "block" });
                    $(selectors.id1).attr("src", res);
                    $(selectors.id2).val("");
                },
            });
        });
    }
}
function cropperRun(ids, config) {
    var image = document.getElementById(ids.image);
    var input = document.getElementById(ids.input);
    var width = document.getElementById(ids.width).innerHTML.trim();
    var height = document.getElementById(ids.height).innerHTML.trim();
    var $modal = $(ids.modal);
    $('[data-toggle="tooltip"]').tooltip();
    input.addEventListener("change", function (e) {
        inputChangeAddEvent(e, image, $modal);
    });
    $modal
        .on("shown.bs.modal", function () {
            cropper = new Cropper(image, {
                aspectRatio: width / height,
                viewMode: 3,
                autoCropArea: 1,
            });
        })
        .on("hidden.bs.modal", function () {
            $(ids.selectors.id2).val("");
            cropper.destroy();
            cropper = null;
        });
    document.getElementById(ids.crop).addEventListener("click", function () {
        cropUpload($modal, width, height, config, ids.selectors);
    });
}
window.addEventListener("DOMContentLoaded", function () {
    if ($("#alt_file").length) {
        cropperRun(
            {
                image: "cropper_alt_image",
                input: "alt_file",
                width: "alt_width",
                height: "alt_height",
                modal: "#cropper_alt_modal",
                crop: "cropper_alt_crop",
                selectors: {
                    class: ".pre-thumb",
                    id1: "#alt_preview",
                    id2: "#alt_file",
                },
            },
            {
                url: window.cropper_tmp_img,
                type: "alt",
                session_name: "alt_image",
            }
        );
    }
    if ($("#main_file").length) {
        console.log("test");
        cropperRun(
            {
                image: "cropper_main_image",
                input: "main_file",
                width: "main_width",
                height: "main_height",
                modal: "#cropper_main_modal",
                crop: "cropper_main_crop",
                selectors: {
                    class: ".pre-thumb",
                    id1: "#main_preview",
                    id2: "#main_file",
                },
            },
            {
                url: window.cropper_tmp_img,
                type: "main",
                session_name: "main_image",
            }
        );
    }
});
