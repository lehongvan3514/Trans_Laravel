<template>
    <div class="panel panel-flat">
        <div class="panel-heading description">
            <h5 class="panel-title">
                <span class="label label-warning label-icon"><i class="icon-pencil"></i></span>
                <span class="label border-right-success label-striped label-striped-right"><h6>GIỚI THIỆU VỀ BẢN THÂN</h6></span>
            </h5>
        </div>
        <div class="panel-body">
            <div v-if="description" v-html="description.body" class="click2edit" style="display: block;">
            </div>
        </div>
    </div>
</template>

<style>

</style>

<script>
    export default{
        props: ['description'],
    }
</script>
