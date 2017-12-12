<template>
    <fieldset class="living">
        <legend class="text-semibold"><i class="icon-earth position-left"></i>
            Nơi cư trú
            <a data-toggle="modal" data-target="#modal_country" class="control-arrow">
                            <span class="edit">
                                <i class="icon-pencil3 position-left"></i>
                                Chỉnh sửa
                            </span>
            </a>
        </legend>
        <div id="demo2" class="collapse in">
            <div class="row">
                <div class="form-group">
                    <label class="col-lg-3 text-bold">Nơi cư trú</label>
                    <div class="col-lg-9">
                            <span v-if="profile.vncity_id && profile.vncity" id="js-city">
                                {{profile.vncity.name}}
                            </span>,
                        <span v-if="profile.country_id && profile.country" id="js-country">
                                {{profile.country.name}}
                            </span>
                        <a v-if="!profile.country_id">Thêm thông tin</a>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</template>
<style>
    .edit {
        display: none;
    }

    .living:hover .edit {
        display: block;
    }
</style>
<script>

    export default{
        props: ['profile'],
    }
</script>
