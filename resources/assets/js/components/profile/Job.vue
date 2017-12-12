<template>

    <fieldset class="job">
        <legend class="text-semibold"><i class="icon-hammer2 position-left"></i>
            Nghề nghiệp
            <a data-toggle="modal" data-target="#modal_job" class="control-arrow">
                            <span class="edit">
                                <i class="icon-pencil3 position-left"></i>
                                Chỉnh sửa
                            </span>
            </a>
        </legend>
        <div>
            <form class="form-horizontal" action="#">
                <div class="form-group">
                    <label class="col-lg-3 text-bold">Công việc</label>
                    <div class="col-lg-9">
                            <span v-if="profile.job_id && profile.job" id="js-job">
                                {{ profile.job.name}}
                            </span>
                        <a v-if="!profile.job_id">+ Thêm công việc của bạn</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 text-bold">Tình trạng việc làm</label>
                    <div class="col-lg-9">
                            <span v-if="profile.job_status" id="js-job-status">
                                {{profile.job_status | status}}
                            </span>

                        <a v-if="!profile.job_status">+ Thêm tình trạng công việc của bạn</a>
                    </div>

                </div>
            </form>
        </div>
    </fieldset>

    <!--<div class="panel panel-flat job" data-toggle="modal" data-target="#modal_job">-->
        <!--<div class="panel-heading">-->
            <!--<h5 class="panel-title">-->
                <!--</span>-->
                <!--<span class="label border-right-blue label-striped label-striped-right"><h6>NGHỀ NGHIỆP</h6></span>-->
            <!--</h5>-->
            <!--<div class="heading-elements">-->
                <!--<div class="form-group">-->
                    <!--<button type="button" class="btn btn-default edit"><i class="icon-pencil3 position-left"></i>-->
                        <!--Chỉnh sửa-->
                    <!--</button>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="panel-body">-->
            <!---->
        <!--</div>-->
    <!--</div>-->
</template>

<style>
.edit {
    display: none;
}

.job:hover .edit {
    display: block;
}

</style>

<script>

    export default{
        props: ['profile'],

        filters: {
            status: function (id, name) {
                if(id === 1){
                    return "Toàn thời gian";
                }
                else if(id ===2){
                    return "Bán thời gian";
                }
                else if(id===3)
                    return "Không có việc làm";
                else
                    return "Khác";
            },

        },

    }

</script>
