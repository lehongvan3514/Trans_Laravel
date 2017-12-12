

$("#range-age").ionRangeSlider({
    type: "double",
    min: 18,
    max: 100,
});


$("#range-height").ionRangeSlider({
    type: "double",
    min: 135,
    max: 200,
});

$("#range-weight").ionRangeSlider({
    type: "double",
    min: 135,
    max: 200,
});


let page = 0;

$(function () {
    loadMoreData(page);
    page++;

    const $select = $(".age");

    for (let i = 18; i <= 100; i++) {
        $select.append($('<option></option>').val(i).html(i))
    }

    $("#searchxxx").submit(function (e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $("#ketqua").empty();
        page = 1;
        loadMoreData(page);

    });


});

$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        loadMoreData(page);
    }
});



function loadMoreData(page) {
    let url = "/search"; // the script where you handle the form input.
    let data = $("#searchxxx").serializeArray();

    let range_age = $("#range-age");
    data.push({
        name: 'minage',
        value: range_age.data("from"),
    },{
        name:'maxage',
        value:range_age.data("to"),

    });

    let advance = $("#advance-search").serializeArray();
    data.push(advance);

    data =$.param(data);
    console.log(data);

    $.ajax({
        type: "POST",
        url: url + '?page=' + page,
        data: data,
        success: function (data) {
            // console.log(data);
            inketqua(data); // show response from the php script.
        }
    });
}

function inketqua(data) {


    /**
     * @typedef {Object} profile
     * @property {integer} vncity_id
     * @property {string} vncity
     * @property {string} dob
     * @property {string} gender_id
     * @property {string} user_id
     */

    /**
     * @typedef {Object} profile.user
     * @property {string} first_name
     * @property {string} last_name

     */

    $.each(data, function (i, profile) {

        let avatar;
        if (profile.avatar != null) {
            avatar = profile.avatar;
        } else {
            avatar = 'assets/images/placeholder.jpg';
        }

        let city, city_name;
        if (profile.vncity_id != null) {
            city = profile.vncity_id;
            city_name = profile.vncity.name;
        } else {
            city = "";
            city_name = "Đang cập nhật";
        }

        let aaa;
        let age;
        if (profile.dob) {
            aaa = getAge(profile.dob);
            age = getAge(profile.dob) + " tuổi";
        } else {
            aaa = "";
            age = "Đang cập nhật";
        }

        let gender_id, gen;
        if (profile.gender_id) {
            gender_id = profile.gender_id;
            if (gender_id == 3 || gender_id == 1) {
                gen = "men";
            }
            else {
                gen = "women";
            }
        } else {
            aaa = "";
            age = "Đang cập nhật";
        }

//                console.log(i);

        let xxx = '<div class="col-lg-3 col-sm-6">' +
            '<div class="thumbnail">' +
            '<div class="thumb thumb-rounded">' +
            '<img src="' + avatar + '" alt="">' +
            '<div class="caption-overflow">' +
            '<span>' +
            '<a href="user/' + profile.user_id + '" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-profile"></i></a>' +
            '<a href="message/' + profile.user_id + '" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-bubbles10"></i></a>' +
            '</span>' +
            '</div>' +
            '</div>' +

            '<div class="caption text-center">' +
            '<h6 class="text-semibold no-margin">' + profile.user.last_name + " " + profile.user.first_name + '<a href="categories?gender=' + gender_id + '"> <i class="'+ gen +'"></i></a>' +
            '<small class="display-block">' +
            '<a href="categories?age=' + aaa + '">' + age + '</a>' +
            ' - ' +
            '<a href="categories?city=' + city + '">' + city_name + '</a>' +
            '</small>' +
            '</h6>' +
            '</div>' +
            '</div>' +
            '</div>' ;

        $("#ketqua").append(xxx);


    });
}

function getAge(dateString) {
    let today = new Date();
    let birthDate = new Date(dateString);
    let age = today.getFullYear() - birthDate.getFullYear();
    let m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}