<template>
    <div class="panel panel-flat target" data-toggle="modal" data-target="#modal_target">
        <div class="panel-heading">
            <h5 class="panel-title">
                <span class="label label-success label-rounded label-icon"><i class="icon-file-text3"></i></span>
                <span class="label border-right-success label-striped label-striped-right"><h6>Đối tượng tìm kiếm</h6></span>
            </h5>
            <div class="heading-elements">
                <div class="form-group">
                    <button type="button" class="btn btn-default edit"><i class="icon-pencil3 position-left"></i>
                        Chỉnh sửa
                    </button>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <form class="form-horizontal">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 text-bold">Giới tính</label>
                        <div class="col-lg-8">
                            <span id="js-gender" v-if="target.gender" v-text="target.gender.name"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 text-bold">Tuổi từ</label>
                        <div class="col-lg-8">
                            <span v-if="target.min_age" v-text="target.min_age"></span>
                            <span v-if="!target.min_age">Bất kỳ</span>
                            -
                            <span v-if="target.max_age" v-text="target.max_age"></span>
                            <span v-if="!target.max_age">Bất kỳ</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-8 text-bold">Phải độc thân</label>
                        <div class="col-lg-4">
                            <span v-if="target.single" id="j-status">Có</span>
                            <span v-if="!target.single">Không</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-8 text-bold">Ở gần tôi</label>
                        <div class="col-lg-4">
                            <span v-if="target.near" id="js-height">Có</span>
                            <span v-if="!target.near">Không</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style>
.edit {
    display: none;
}

.target:hover .edit {
    display: block;
}
</style>

<script type="x/templates">
    export default {

        data: function () {
            return {
                target: [],
            }
        },

        created: function(){
            this.$http.get('api/target').then((response) => {
                this.target =  response.body;
            }, (response) => {
                console.log(response);
            });
        },
    }
</script>
