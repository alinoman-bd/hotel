$(function () {
    $("#room_selected").change(function () {
        this.form.submit();
    });
    // let holidays = ["2020-06-20"];
    // $("#calander-room-booking").datepicker({
    //     prevText: '<i class="lotus-icon-left-arrow"></i>',
    //     nextText: '<i class="lotus-icon-right-arrow"></i>',
    //     buttonImageOnly: false,
    //     beforeShowDay: function (date) {
    //         var formatedDate = jQuery.datepicker.formatDate("yy-mm-dd", date);
    //         return [true, holidays.indexOf(formatedDate) == -1 ? "" : "booked"];
    //     },
    // });
    let allowed = $("#allowed").val();
    $("#child-number").change(function () {
        if (this.value == 0) {
            $("#booking-form-child").css("display", "none");
            $("#book-sub-btn").removeClass("disabled");
        } else {
            $("#booking-form-child").css("display", "block");
            $("#book-sub-btn").addClass("disabled");
        }
    });

    $("#child-age").change(function () {
        let childage = parseInt(this.value);
        let total_person = parseInt($("#number_of_adult").val());
        if (childage && childage != NaN) {
            total_person = total_person + 1;
        }
        if (total_person > allowed) {
            $("#book-sub-btn").css("display", "none");
            $("#new-room-to-select").css("display", "block");
        } else {
            $("#new-room-to-select").css("display", "none");
            $("#book-sub-btn").css("display", "block");
        }
    });
    let popover_check = 0;
    $(document).on("click", '[data-toggle="popover"]', function () {
        var id = $(this).attr("id");
        colorDateFilter($(this), "td", 0);
        $('[data-toggle="popover"]')
            .not(document.getElementById(id))
            .popover("hide");

        if (popover_check == id) {
            $(".reservation-calendar_tabel td").css({
                "background-color": "#fff",
            });
            popover_check = 0;
        } else {
            popover_check = id;
        }
    });
    $(document).on("click", function (e) {
        // console.log($(e.target).parents(".popover").length);
        if (!e.target.id && $(e.target).parents(".popover").length === 0) {
            $('[data-toggle="popover"]').popover("hide");
            $(".reservation-calendar_tabel td").css({
                "background-color": "#fff",
            });
        }
        if (
            !e.target.id &&
            $(e.target).parents("#admin-booking-selection").length === 0 &&
            $(e.target).parents("#ui-datepicker-div").length === 0 &&
            $(e.target).parents("#admin_booking_modal").length === 0
        ) {
            start_date_data = "";
            end_date_data = "";
            select_start = {};
            select_end = {};
            bookingDateSelection(select_start, select_end);
            setSelectOptions(0, "number_of_adult", "Adult");
            $("[data-id=number_of_child]")
                .val(0)
                .attr("disabled", "")
                .selectpicker("refresh");
            $("#child_age_fields").html("");
        }
    });
});

function getUrlVars() {
    var vars = [],
        hash;
    var hashes = window.location.href
        .slice(window.location.href.indexOf("?") + 1)
        .split("&");
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split("=");
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function getCalendar(month, year, show, position) {
    console.log(window.room.id);
    $('[data-toggle="popover"]').popover("hide");
    $.ajax({
        url: window.get_current_calendar,
        method: "POST",
        data: {
            month: month,
            year: year,
            position: position,
            room_type: window.calendarType
                ? getUrlVars()["room_type"]
                : window.room.id,
            type: window.calendarType,
        },
        success: function (response) {
            $(show).html("");
            $(show).html(response);
            if (window.calendarType) {
                setPopover();
                $(".wich-container").wichSlider({
                    sliderBtn: {
                        prev: '<i class="lotus-icon-left-arrow"></i>',
                        next: '<i class="lotus-icon-right-arrow"></i>',
                    },
                });
            }
        },
        error: function (res) {
            console.log(res);
        },
    });
}
function calendarSwitch(date, btn) {
    $.ajax({
        url: window.get_calendar_date,
        method: "POST",
        data: {
            date: date,
            btn: btn,
        },
        async: false,
        success: function (response) {
            window.current_year = response.current_year;
            window.current_month = response.current_month;
            window.current_date = response.current_date;
            if (window.calendarType) {
                window.next_year = response.next_year;
                window.next_month = response.next_month;
                window.next_date = response.next_date;
            }
        },
        error: function (res) {
            console.log(res);
        },
    });

    getCalendar(window.current_month, window.current_year, "#calendar_one", 1);
    if (window.calendarType) {
        getCalendar(window.next_month, window.next_year, "#calendar_two", 2);
    }
}

function setPopover() {
    $("[data-toggle=popover]").each(function (i, obj) {
        // console.log(i);
        $(this).popover({
            trigger: "manual",
            placement: "auto",
            html: true,
            content: function () {
                var id = $(this).attr("id");
                return $("#popover_" + id).html();
            },
        });
    });
}
let click_count = 0;
let select_start = {};
let select_end = {};
let start_date_data = {};
let end_date_data = {};
let selected_room = 0;
let selected_adults = 0;
let selected_childs = 0;
let allowed_adult = 0;
let child_age = 0;
let button_allowed = false;
function dateSelectAction(e) {
    var id = $(e.currentTarget).attr("id");
    var class_check = $(e.currentTarget)
        .parent()
        .parent()
        .hasClass("past_dates_calendar");
    ++click_count;
    if (click_count == 1) {
        setTimeout(function () {
            if (click_count == 1) {
                if (!class_check) {
                    let month_day = id.split("_");
                    let month_name = month_day[1];
                    let day = parseInt(month_day[2]);
                    let data = window.calendar[month_name];
                    let month_number = data["header"]["month"]["number"];
                    let month_last_day = data["header"]["month"]["last_day"];
                    let year = month_day[0];

                    if (
                        !Object.keys(select_start).length &&
                        Object.keys(select_end).length == 0
                    ) {
                        select_start = {
                            day: day,
                            month: month_name,
                            year: year,
                            month_number: month_number,
                            last_day: month_last_day,
                        };
                        bookingDateSelection(select_start, select_end);
                    } else if (
                        Object.keys(select_start).length &&
                        Object.keys(select_end).length == 0
                    ) {
                        if (select_start.day > day) {
                            select_end = select_start;
                            select_start = {
                                day: day,
                                month: month_name,
                                year: year,
                                month_number: month_number,
                                last_day: month_last_day,
                            };

                            bookingDateSelection(select_start, select_end);
                        } else if (select_start.day == day) {
                            start_date_data = "";
                            end_date_data = "";
                            select_start = {};
                            select_end = {};
                            bookingDateSelection(select_start, select_end);
                        } else {
                            select_end = {
                                day: day,
                                month: month_name,
                                year: year,
                                month_number: month_number,
                                last_day: month_last_day,
                            };

                            bookingDateSelection(select_start, select_end);
                        }
                    } else if (
                        Object.keys(select_start).length &&
                        Object.keys(select_end).length
                    ) {
                        if (
                            select_start.year <= year &&
                            select_start.month_number <= month_number &&
                            select_start.day < day
                        ) {
                            if (select_end.day != day) {
                                select_end = {
                                    day: day,
                                    month: month_name,
                                    year: year,
                                    month_number: month_number,
                                    last_day: month_last_day,
                                };

                                bookingDateSelection(select_start, select_end);
                            } else {
                                $(".selected-color").removeClass(
                                    "selected-color"
                                );
                                start_date_data = "";
                                end_date_data = "";
                                select_start = {};
                                select_end = {};
                                bookingDateSelection(select_start, select_end);
                            }
                        } else {
                            if (select_start.month_number < month_number) {
                                if (select_end.day != day) {
                                    select_end = {
                                        day: day,
                                        month: month_name,
                                        year: year,
                                        month_number: month_number,
                                        last_day: month_last_day,
                                    };

                                    bookingDateSelection(
                                        select_start,
                                        select_end
                                    );
                                } else {
                                    $(".selected-color").removeClass(
                                        "selected-color"
                                    );
                                    start_date_data = "";
                                    end_date_data = "";
                                    select_start = {};
                                    select_end = {};
                                    bookingDateSelection(
                                        select_start,
                                        select_end
                                    );
                                }
                            } else {
                                if (select_start.day != day) {
                                    select_start = {
                                        day: day,
                                        month: month_name,
                                        year: year,
                                        month_number: month_number,
                                        last_day: month_last_day,
                                    };

                                    bookingDateSelection(
                                        select_start,
                                        select_end
                                    );
                                } else {
                                    $(".selected-color").removeClass(
                                        "selected-color"
                                    );
                                    start_date_data = "";
                                    end_date_data = "";
                                    select_start = {};
                                    select_end = {};
                                    bookingDateSelection(
                                        select_start,
                                        select_end
                                    );
                                }
                            }
                        }
                    }
                } else {
                    var x = $("#snackbar");
                    x.addClass("show");
                    x.html(`You can't book for past dates`);
                    setTimeout(function () {
                        x.removeClass("show");
                    }, 6000);
                }
            }
            click_count = 0;
        }, 200);
    } else if (click_count == 2) {
        if (window.calendarType) {
            $("[data-toggle=popover]#" + id).popover("toggle");
        }
        click_count = 0;
    }
}
$("[data-id=number_of_room]").change(function () {
    selected_room = $("[data-id=number_of_room]").val();
    allowed_adult = window.room["allowed_person"];
    setSelectOptions(allowed_adult * selected_room, "number_of_adult", "Adult");
});
$("[data-id=number_of_adult]").change(function () {
    selected_adults = parseInt($(this).val());
    $("[data-id=number_of_child]")
        .removeAttr("disabled")
        .selectpicker("refresh");
    if (selected_adults > 0) {
        setChildAge();
    } else {
        checkChildField();
    }
});
$("[data-id=number_of_child]").change(function () {
    selected_childs = $(this).val();
    addChildAgeSelect();
});
$("#admin_user_information").click(function () {
    let data = seriliziFormData("admin_user_information_form");
    window.bookingForm["user"] = data;
    $("#admin_booking_modal").modal("hide");
    addminBookingFormSubmit();
});
function getdate(data, day) {
    return data.find((element) => element["day"] === day);
}
function getdates(data, dayfirst, daysecond) {
    return data.filter(
        (element) => element["day"] >= dayfirst && element["day"] <= daysecond
    );
}
function setSelectOptions(number, id, name) {
    let html = "";
    let target = $(`[data-id="${id}"]`);
    if (
        Object.keys(start_date_data).length &&
        Object.keys(end_date_data).length
    ) {
        let count = 0;
        let total_room = window.room.total_rooms;
        if (id === "number_of_room") {
            let data = window.calendar[select_start.month];
            let start_day = getdate(data["data"], select_start.day).day;
            let end_day = getdate(data["data"], select_end.day).day;
            if (start_day && end_day) {
                let cart_datas = getdates(data["data"], start_day, end_day);
                cart_datas.forEach((element) => {
                    if (element.bookings.count > count) {
                        if (
                            $.inArray(
                                getdate(data["data"], element.day).date,
                                data["first_booking_dates"]
                            ) == -1
                        ) {
                            count = element.bookings.count;
                        }
                    }
                });
            }
        }
        html = `<option value="0">Select ${name}</option>`;
        for (let index = 1; index <= number; index++) {
            let names = index == 1 ? name : name + "'s";
            html += `<option value="${index}" ${
                index > number - count && count != 0 ? "disabled" : ""
            }>${index} ${names}</option>`;
        }

        // if (count > 0) {
        var x = $("#snackbar");
        x.addClass("show");
        x.html(
            `Only ${total_room - count} room${
                total_room - count > 0 ? "'s" : ""
            } available between selected dates`
        );
        setTimeout(function () {
            x.removeClass("show");
        }, 6000);
        // }
        target.removeAttr("disabled");
    } else {
        target.attr("disabled", "");
        button_allowed = false;
    }

    target.empty();
    target.html(html);
    target.selectpicker("refresh");
}

function addChildAgeSelect() {
    let html = "";
    let target = $("#child_age_fields");
    target.html("");
    for (let index = 1; index <= selected_childs; index++) {
        let title = "";
        switch (index) {
            case 1:
                title = "FIRST CHILD AGE";
                break;
            case 2:
                title = "SECOND CHILD AGE";
                break;
            case 3:
                title = "THIRD CHILD AGE";
                break;
        }
        html = `
        <div class="check_availability-field">
            <label>${title}</label>                 
            <select class="awe-select child-age"  name="age_of_child_${index}" data-id="age_of_child_${index}" value="0" onchange="setChildAge()">
                <option value="0">Bellow three years</option>
                <option value="1">Avobe three yesrs</option>
            </select>
        </div>
        `;
        target.append(html);
        $(`[data-id="age_of_child_${index}"]`).selectpicker("refresh");
    }
}

function setChildAge() {
    child_age = 0;
    for (let index = 1; index <= $("select.child-age").length; index++) {
        child_age += parseInt($(`[data-id="age_of_child_${index}"]`).val());
    }
    if (selected_adults + child_age <= allowed_adult * selected_room) {
        button_allowed = true;
        $("#admin_booking_message").addClass("d-none");
        $("#admin_booking_submit").removeClass("d-none");
    } else {
        $("#admin_booking_message").html("");
        $("#admin_booking_message").html(
            `<p>Too many people, Please check ${
                selected_adults + child_age
            } person room</p>`
        );
        $("#admin_booking_submit").addClass("d-none");
        $("#admin_booking_message").removeClass("d-none");
    }
}

function bookingThisRoom() {
    if (
        $("[data-id=number_of_room]").val() == 0 ||
        $("[data-id=number_of_adult]").val() == 0
    ) {
        button_allowed = false;
    }
    if (button_allowed) {
        let data = seriliziFormData("admin_booking_form");
        window.bookingForm["room"] = data;
        $("#admin_booking_modal").modal("show");
    } else {
        $("#admin_booking_message").html("");
        $("#admin_booking_message").html(
            `<p>Please give all informations.</p>`
        );
        $("#admin_booking_message").removeClass("d-none");
        $("#admin_booking_submit").addClass("d-none");
    }
}

function bookingDateSelection(select_start, select_end) {
    let hasError = 0;
    $(".selected-color").removeClass("selected-color");
    if (Object.keys(select_start).length != 0) {
        if (Object.keys(select_end).length == 0) {
            let data = window.calendar[select_start.month];
            fullOrFreeRoomByDate(
                select_start.year,
                select_start.month,
                select_start.day
            );
            if (isBookedEqualRoom(select_start.month, select_start.day)) {
                start_date_data = "";
            } else {
                start_date_data = getdate(data["data"], select_start.day);
            }
        } else {
            let start_data = window.calendar[select_start.month];
            let end_data = window.calendar[select_end.month];
            if (isBookedEqualRoom(select_start.month, select_start.day)) {
                start_date_data = "";
            } else {
                start_date_data = getdate(start_data["data"], select_start.day);
            }
            if (isBookedEqualRoom(select_end.month, select_end.day)) {
                end_date_data = "";
            } else {
                end_date_data = getdate(end_data["data"], select_end.day);
            }
            if (
                select_start.year == select_end.year &&
                select_start.month_number == select_end.month_number &&
                select_start.day < select_end.day
            ) {
                for (let i = select_start.day; i <= select_end.day; i++) {
                    hasError += fullOrFreeRoomByDate(
                        select_start.year,
                        select_start.month,
                        i
                    );
                }
            } else if (
                (select_start.year == select_end.year &&
                    select_start.month_number < select_end.month_number) ||
                select_start.year < select_end.year
            ) {
                for (
                    let i = select_start.day;
                    i <= select_start.last_day;
                    i++
                ) {
                    hasError += fullOrFreeRoomByDate(
                        select_start.year,
                        select_start.month,
                        i
                    );
                }
                for (let i = 1; i <= select_end.day; i++) {
                    hasError += fullOrFreeRoomByDate(
                        select_end.year,
                        select_end.month,
                        i
                    );
                }
            }
        }
    }
    if (hasError == 0) {
        button_allowed = true;
        $("#admin_booking_message").addClass("d-none");
        $("#admin_booking_submit").removeClass("d-none");
    } else {
        $("#admin_booking_message").html(
            `<p>One or more selected date not available.</p>`
        );
        $("#admin_booking_submit").addClass("d-none");
        $("#admin_booking_message").removeClass("d-none");
    }
    if (Object.keys(start_date_data).length) {
        $('[data-id="arival_date"]').val(start_date_data.date);
    } else {
        $('[data-id="arival_date"]').val("");
    }
    if (Object.keys(end_date_data).length) {
        $('[data-id="depature_date"]').val(end_date_data.date);
    } else {
        $('[data-id="depature_date"]').val("");
    }

    total_avaliable = window.room["total_rooms"];
    setSelectOptions(total_avaliable, "number_of_room", "Room");
}
$(document).on("change", "[data-id=arival_date]", function () {
    let date = $(this).val();
    select_start = connvertDate(date);
    bookingDateSelection(select_start, select_end);
});
$(document).on("change", "[data-id=depature_date]", function () {
    let date = $(this).val();
    select_end = connvertDate(date);
    bookingDateSelection(select_start, select_end);
});
function checkChildField(aults) {
    $("[data-id=number_of_child]")
        .val(0)
        .attr("disabled", true)
        .selectpicker("refresh");
    $("#child_age_fields").html("");
    button_allowed = false;
}
function connvertDate(date) {
    let mlist = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    month_name = mlist[new Date(date).getMonth()];

    let datedata = date.split("/");
    let month = parseInt(datedata[0]);
    let day = parseInt(datedata[1]);
    let year = parseInt(datedata[2]);
    let month_last_day =
        window.calendar[month_name]["header"]["month"]["last_day"];
    return {
        day: day,
        month: month_name,
        year: year,
        month_number: month,
        last_day: month_last_day,
    };
}
function isBookedEqualRoom(month, day) {
    let data = window.calendar[month];
    let total_booked = getdate(data["data"], day).bookings.count;
    let total_room = window.room.total_rooms;
    if (
        $.inArray(
            getdate(data["data"], day).date,
            data["first_booking_dates"]
        ) == -1
    ) {
        return total_booked == total_room;
    } else {
        return false;
    }
}
function fullOrFreeRoomByDate(year, month, day) {
    if (!isBookedEqualRoom(month, day)) {
        $("#" + year + "_" + month + "_" + day)
            .parent()
            .parent()
            .addClass("selected-color");
        return 0;
    } else {
        var x = $("#snackbar");
        x.addClass("show");
        x.html("Selected date not have free room.");
        setTimeout(function () {
            x.removeClass("show");
        }, 6000);
        return 1;
    }
}
function seriliziFormData(id) {
    let formdata = [];
    let data = $("#" + id).serialize();
    data = data.split("&");
    data.forEach(function (value) {
        let val = value.split("=");
        formdata[val[0]] = decodeURIComponent(val[1]);
    });
    return formdata;
}

function addminBookingFormSubmit() {
    $.ajax({
        url: window.admin_room_booking,
        method: "POST",
        data: {
            room: getRoomDataForPost(window.bookingForm.room),
            user: getUserDataForPost(window.bookingForm.user),
        },
        dataType: "json",
        success: function (response) {
            // console.log(33);
            getCalendar(
                window.current_month,
                window.current_year,
                "#calendar_one",
                1
            );
            if (window.calendarType) {
                getCalendar(
                    window.next_month,
                    window.next_year,
                    "#calendar_two",
                    2
                );
            }
        },
        error: function (res) {
            console.log(res);
        },
    });
}
function getRoomDataForPost(room) {
    return {
        arival_date: room.arival_date,
        depature_date: room.depature_date,
        number_of_adult: room.number_of_adult,
        number_of_child: room.number_of_child,
        number_of_room: room.number_of_room,
        room_id: room.room_id,
        room_price: room.room_price,
    };
}
function getUserDataForPost(user) {
    return {
        name: user.name,
        surname: user.surname,
        email: user.email,
        phone: user.phone,
        address: user.address,
        paid: user.paid,
        remark: user.remark,
    };
}
getCalendar(window.current_month, window.current_year, "#calendar_one", 1);
if (window.calendarType) {
    getCalendar(window.next_month, window.next_year, "#calendar_two", 2);
}
let holi_days = window.booked[window.room.id];
DatePicker(holi_days);
