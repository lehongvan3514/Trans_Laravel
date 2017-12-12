    <template>

        <fieldset class="job">
            <legend class="text-semibold"><i class="icon-coffee position-left"></i>
                Thối xấu
                <a data-toggle="modal" data-target="#modal_vice" class="control-arrow">
                            <span class="edit">
                                <i class="icon-pencil3 position-left"></i>
                                Chỉnh sửa
                            </span>
                </a>
            </legend>
            <div>
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-4 text-bold">Rượu/Bia </label>
                                <div class="col-lg-8">
                                    <span v-if="profile.liquor" id="js-liquor">
                                        {{profile.liquor | vice}}
                                    </span>
                                    <a v-if="!profile.liquor">+ Bạn có uống rượu/bia không?</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-4 text-bold">Hút thuốc</label>
                                <div class="col-lg-8">
                                <span v-if="profile.smoke" id="js-smoke">
                                    {{profile.smoke | vice}}
                                </span>
                                    <a v-if="!profile.smoke">+ Bạn có hút thuốc không?</a>
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

.vice:hover .edit {
    display: block;
}

</style>
<script>
    export default{
        props: ['profile'],

        filters: {
            vice: function (id, name) {
                if(id === 1){
                    return "Không";
                }
                else if(id ===2){
                    return "Thỉnh thoảng";
                }
                else
                    return "Thường xuyên";
            },

        },
    }

</script>
