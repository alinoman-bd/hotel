$(function () {
    $.fn.wichSlider = function (options) {
        this.each(function () {
            let items = $(this).find(".wich-slider__item").length;
            let width = $(this).parent().width();
            let mar = 2 * parseInt($(this).css("margin"));
            $(this)
                .find(".wich-slider")
                .width(width * items);
            $(this).width(width - mar);
            $(this)
                .find(".wich-slider__item")
                .width(width - mar);
            $(this)
                .find(".wich-slider__control_prev")
                .html(options.sliderBtn.prev);
            $(this)
                .find(".wich-slider__control_next")
                .html(options.sliderBtn.next);
            if (items == 1) {
                $(this)
                    .find(
                        ".wich-slider__control_prev, .wich-slider__control_next"
                    )
                    .addClass("d-none");
            }
        });
    };
});
let prev = 1;
$(document).on("click", ".wich-slider__control_prev", function () {
    if (prev) {
        prev = 0;
        let items = $(this).parent().find(".wich-slider__item").length;
        let mar = 2 * items * parseInt($(this).parent().css("margin"));
        let width = $(this).parent().find(".wich-slider").width() - mar;
        let current_left = Math.abs(
            parseInt($(this).parent().find(".wich-slider").css("left"))
        );
        let item_width = $(this).parent().find(".wich-slider__item").width();

        if (current_left > 0) {
            let left = current_left - item_width;
            let locate = left / item_width;
            colorDateFilter($(this), ".popover-content", locate);
            $(this)
                .parent()
                .find(".wich-slider")
                .animate({ opacity: "0" }, 600, function () {
                    $(this)
                        .parent()
                        .find(".wich-slider")
                        .css({ left: "-" + left + "px" });
                    $(this)
                        .parent()
                        .find(".wich-slider")
                        .animate({ opacity: "1" }, 600);
                });
        } else {
            $(this)
                .parent()
                .find(".wich-slider")
                .animate({ opacity: "0" }, 600, function () {
                    $(this)
                        .parent()
                        .find(".wich-slider")
                        .css({ left: "-" + (width - item_width) + "px" });
                    $(this)
                        .parent()
                        .find(".wich-slider")
                        .animate({ opacity: "1" }, 600);
                });
            let locate = (width - item_width) / item_width;
            colorDateFilter($(this), ".popover-content", locate);
        }
        setTimeout(() => {
            prev = 1;
        }, 500);
    }
    // console.log(current_left);
});
let next = 1;
$(document).on("click", ".wich-slider__control_next", function () {
    if (next) {
        next = 0;
        let items = $(this).parent().find(".wich-slider__item").length;
        let mar = 2 * items * parseInt($(this).parent().css("margin"));
        let width = $(this).parent().find(".wich-slider").width() - mar;
        let current_left = Math.abs(
            parseInt($(this).parent().find(".wich-slider").css("left"))
        );
        let item_width = $(this).parent().find(".wich-slider__item").width();
        let left;
        if (current_left + item_width < width) {
            left = current_left + item_width;
            let locate = left / item_width;
            colorDateFilter($(this), ".popover-content", locate);
            $(this)
                .parent()
                .find(".wich-slider")
                .animate({ opacity: "0" }, 600, function () {
                    $(this)
                        .parent()
                        .find(".wich-slider")
                        .css({ left: "-" + left + "px" });
                    $(this)
                        .parent()
                        .find(".wich-slider")
                        .animate({ opacity: "1" }, 600);
                });
        } else {
            $(this)
                .parent()
                .find(".wich-slider")
                .animate({ opacity: "0" }, 600, function () {
                    $(this).parent().find(".wich-slider").css({ left: 0 });
                    $(this)
                        .parent()
                        .find(".wich-slider")
                        .animate({ opacity: "1" }, 600);
                });
            colorDateFilter($(this), ".popover-content", 0);
        }
        setTimeout(() => {
            next = 1;
        }, 500);
    }
});

// color data filter
function colorDateFilter(__this, parent, locate) {
    var monthIdentifier = __this
        .parents(parent)
        .find(".month-identifier")
        .val();
    var indexIdentifier = __this
        .parents(parent)
        .find(".index-identifier")
        .val();
    // console.log(monthIdentifier);
    if (window.calendar[monthIdentifier].data[indexIdentifier].bookings.count) {
        let start = parseInt(
            window.calendar[monthIdentifier].data[
                indexIdentifier
            ].bookings.carts[locate].arival_date.split("-")[2]
        );
        let end = parseInt(
            window.calendar[monthIdentifier].data[
                indexIdentifier
            ].bookings.carts[locate].depature_date.split("-")[2]
        );
        $(".reservation-calendar_tabel td").css({
            "background-color": "#fff",
        });
        for (i = start; i <= end; i++) {
            $("#td_" + monthIdentifier + "_" + i).css({
                "background-color": "rgba(255, 117, 0, 0.65)",
            });
        }
    } else {
        $(".reservation-calendar_tabel td").css({
            "background-color": "#fff",
        });
    }
}
