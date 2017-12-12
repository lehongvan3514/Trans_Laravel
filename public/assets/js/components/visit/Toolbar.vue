<template>
    <!-- Toolbar -->
    <div class="navbar navbar-default navbar-xs navbar-component">
        <ul class="nav navbar-nav visible-xs-block">
            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="navbar-filter">
            <ul class="nav navbar-nav element-active-slate-400">
                <li><a :href="'/user/'+uid"><i class="icon-profile position-left"></i> Hồ sơ</a></li>
                <li><a :href="'user/'+uid+'/photo'"><i class="icon-images3 position-left"></i> Hình ảnh</a></li>
            </ul>
        </div>
    </div>
     <!--/toolbar -->
</template>

<style>

</style>
<script>
    export default {

        props: ['uid'],

        mounted() {
            console.log('Component toolbar ready.')
        }
    }
</script>
