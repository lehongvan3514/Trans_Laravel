$(function () {

    $.fn.editable.defaults.params = function (params) {
        params._token = $("#_token").data("token");
        return params;
    };

    // Output template
    $.fn.editableform.template = '<form class="editableform">' +
        '<div class="control-group">' +
        '<div class="editable-input"></div> <div class="editable-buttons"></div>' +
        '<div class="editable-error-block"></div>' +
        '</div> ' +
        '</form>';
    $.fn.editable.defaults.mode = 'inline';


    $('#first-name').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        type: 'text',
        url: 'profile/firstname',
        send: 'always',
        ajaxOptions: {
            dataType: 'json'
        },

        success: function (response, newValue) {
            suc();
        }
    });

    $('#last-name').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        type: 'text',
        url: 'profile/lastname',
        send: 'always',
        ajaxOptions: {
            dataType: 'json'
        },

        success: function (response, newValue) {
            suc();
        }
    });

    $('#status').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        url: 'profile/status',
        send: 'always',
        type: "select",
        inputclass: "form-control",
        source: [
            {value: 1, text: 'Độc thân'},
            {value: 2, text: 'Đang hẹn hò'},
            {value: 3, text: 'Đã cưới'},
            {value: 4, text: 'Quan hệ mở'}
        ],
        success: function (response, newValue) {
            suc();
        }
    });

    $('#gender').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        url: 'profile/gender',
        send: 'always',
        type: "select",
        inputclass: "form-control",
        source: [
            {value: 1, text: 'Nam'},
            {value: 2, text: 'Nữ'},
            {value: 3, text: 'Đồng tính nam'},
            {value: 4, text: 'Đồng tính nữ'},
            {value: 5, text: 'Khác'},
        ],
        success: function (response, newValue) {
            suc();
        }
    });

    $('#dob').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        type: "combodate",
        url: 'profile/dob',
        send: 'always',
        format: "YYYY-MM-DD",
        viewformat: "DD/MM/YYYY",
        template: "DD - MMM - YYYY",
        title: "Chọn ngày sinh",
        class: "editable editable-click",

        success: function (response, newValue) {
            suc();
        }
    });

    $('#height').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        type: "number",
        url: 'profile/height',
        send: 'always',
        title: "Chiều cao",

        success: function (response, newValue) {
            suc();
        }
    });

    $('#weight').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        type: "number",
        url: 'profile/weight',
        send: 'always',
        inputclass: "form-control",
        title: "Cân nặng",

        success: function (response, newValue) {
            suc();
        }
    });

    $('#job-status').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        url: 'profile/job-status',
        send: 'always',
        type: "select",
        inputclass: "form-control",
        source: [
            {value: 1, text: 'Toàn thời gian'},
            {value: 2, text: 'Bán thời gian'},
            {value: 3, text: 'Không có việc làm'},
            {value: 4, text: 'Khác'}
        ],
        success: function (response, newValue) {
            suc();
        }
    });

    $('#job').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        url: 'profile/job',
        send: 'always',
        type: "select",
        inputclass: "form-control",
        source: [
            {value: 1, text: 'Chính trị / Nhà nước / Dịch vụ dân sự'},
            {value: 2, text: 'Du lịch / khách sạn'},
            {value: 3, text: 'Kỹ thuật / Khoa học / Kỹ sư'},
            {value: 4, text: 'Giải trí / Truyền thông'},
            {value: 5, text: 'Nông nghiệp'},
            {value: 6, text: 'Thợ cắt tóc'},
            {value: 7, text: 'Tự kinh doanh'},
            {value: 8, text: 'Điều hành / Quản lý / Nhân sự'},
            {value: 9, text: 'Giáo dục'},
            {value: 10, text: 'Bán hàng / Tiếp thị'},
            {value: 11, text: 'Chữa cháy / hành pháp / bảo vệ'},
            {value: 12, text: 'Giao thông vận tải'},
            {value: 13, text: 'Hành chánh / Thư ký'},
            {value: 14, text: 'Làm về pháp luật'},
            {value: 15, text: 'Người giúp việc'},
            {value: 16, text: 'Phi lợi nhuận / giáo sĩ / công tác xã hội'},
            {value: 17, text: 'Xây dựng / giao dịch'},
            {value: 18, text: 'Bán lẻ / dịch vụ thực phẩm'},
            {value: 19, text: 'Công nghệ thông tin / Truyền thông'},
            {value: 20, text: 'Việc nhà / Nội trợ'},
            {value: 21, text: 'Nghệ thuật / Sáng tạo / Biểu diễn'},
            {value: 22, text: 'Người lao động / công nhân nhà máy'},
            {value: 23, text: 'Quân đội'},
            {value: 24, text: 'Thể thao / giải trí'},
            {value: 25, text: 'Tài chính / Ngân hàng / Bất động sản'},
            {value: 26, text: 'Y khoa / Nha khoa / thú y'},
            {value: 27, text: 'Trông trẻ'},
            {value: 28, text: 'Sinh viên'},
            {value: 29, text: 'Nghỉ hưu'},
            {value: 30, text: 'Khác'}
        ],
        success: function (response, newValue) {
            suc();
        }
    });

    $('#liquor').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        url: 'profile/liquor',
        send: 'always',
        type: "select",
        inputclass: "form-control",
        value: "{{ $profile->liquor }}",
        source: [
            {value: 1, text: 'Không'},
            {value: 2, text: 'Thỉnh thoảng'},
            {value: 3, text: 'Thường xuyên'},
        ],
        success: function (response, newValue) {
            suc();
        }
    });

    $('#smoke').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        url: 'profile/smoke',
        send: 'always',
        type: "select",
        inputclass: "form-control",
        value: "{{ $profile->smoke }}",
        source: [
            {value: 1, text: 'Không'},
            {value: 2, text: 'Thỉnh thoảng'},
            {value: 3, text: 'Thường xuyên'},
        ],
        success: function (response, newValue) {
            suc();
        }
    });

    $('#description').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        type: "textarea",
        url: 'profile/description',
        send: 'always',
        ajaxOptions: {
            dataType: 'json'
        },

        success: function (response, newValue) {
            suc();
        }
    });

    //Target time boiz

    $('#target-gender').editable({
        validate: function (value) {
            if ($.trim(value) == '')
                return 'Value is required.';
        },
        url: 'target/gender',
        send: 'always',
        type: "select",
        inputclass: "form-control",
        value: "{{ $target->gender_id }}",
        source: [
            {value: 1, text: 'Nam'},
            {value: 2, text: 'Nữ'},
            {value: 3, text: 'Đồng tính nam'},
            {value: 4, text: 'Đồng tính nữ'},
            {value: 5, text: 'Khác'},
        ],
        success: function (response, newValue) {
            suc();
            console.log(response);
        }
    });

    var $select = $(".age");

    for (i=18;i<=100;i++){
        $select.append($('<option></option>').val(i).html(i))
    }


});

function suc() {
    new PNotify({
        addclass: 'bg-success',
        text: 'Cập nhật thành công'
    });
};