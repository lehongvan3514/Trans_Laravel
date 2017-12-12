    <template>

        <fieldset class="job">
            <legend class="text-semibold"><i class="icon-coffee position-left"></i>
                Thối xấu
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
                                    <a v-if="!profile.liquor">Đang cập nhật</a>
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
                                    <a v-if="!profile.smoke">Đang cập nhật</a>
                                </div>

                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </fieldset>

</template>

<style>
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
