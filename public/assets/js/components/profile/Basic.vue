<template>

    <fieldset class="basic">
        <legend class="text-semibold">
            <i class="icon-file-text2 position-left"></i>
            Hồ sơ
            <a data-toggle="modal" data-target="#modal_info" class="control-arrow">
                            <span class="edit">
                                <i class="icon-pencil3 position-left"></i>
                                Chỉnh sửa
                            </span>
            </a>
        </legend>

        <div id="demo1" aria-expanded="true">
            <form class="form-horizontal">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-lg-4 text-bold">Giới tính</label>
                            <div class="col-lg-8">
                                <span id="js-gender" v-if="profile.gender" v-text="profile.gender.name"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 text-bold">Ngày sinh</label>
                            <div class="col-lg-8">
                                <span v-if="profile.dob" id="js-dob" v-text="profile.dob"></span>
                                <a v-if="!profile.dob">Thêm thông tin</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 text-bold">Trạng thái</label>
                            <div class="col-lg-8">
                                <span v-if="profile.status_id" id="j-status">{{ profile.status_id | status}}</span>
                                <a v-if="!profile.status_id">Thêm thông tin</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-lg-4 text-bold">Chiều cao</label>
                            <div class="col-lg-8">
                                <span v-if="profile.height" id="js-height">{{ profile.height }} cm</span>
                                <a v-if="!profile.height">Thêm thông tin</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 text-bold">Cân nặng</label>
                            <div class="col-lg-8">
                                <span v-if="profile.weight" id="js-weight">{{ profile.weight }} kg</span>
                                <a v-if="!profile.weight">Thêm thông tin</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </fieldset>




</template>

<style>
.edit {
    display: none;
}



.panel-body hr {
    margin-top: 0px;
    margin-bottom: 0px;
}
.basic:hover .edit {
    display: block;
}






</style>

<script type="x/templates">
    export default {

        props: ['profile'],

        filters: {
         status: function (id, name) {
            if(id === 1){
                return "Độc thân";
            } 
            else if(id === 2){
                return "Đang hẹn hò";
            }
            else if(id === 3){
                return "Đã cưới";
            }
            else if(id === 4){
                return "Quan hệ mở";
            }
            else
                return "Khác";
        },

    },
}






</script>
