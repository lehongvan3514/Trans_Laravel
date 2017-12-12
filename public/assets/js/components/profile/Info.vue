<template>
    <div>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <span class="label label-success label-rounded label-icon"><i class="icon-file-text3"></i></span>
                    <span class="label border-right-success label-striped label-striped-right"><h6>THÔNG TIN</h6></span>
                </h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
                <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
            <div class="panel-body">
                <basic :profile="profile"></basic>
                <living :profile="profile"></living>
                <job :profile="profile"></job>
                <vice :profile="profile"></vice>

            </div>
        </div>

        <description :description="profile.description"></description>


    </div>
</template>

<style>
</style>

<script type="x/templates">

    import BasicComponent from './Basic.vue';
    import LivingComponent from './Living.vue';
    import DescriptionComponent from './Description.vue';
    import JobComponent from './Job.vue';
    import ViceComponent from './Vice.vue';

    export default {

        data: function () {
            return {
                profile: [],
            }
        },

        created: function(){
            this.$http.get('api/profile/info').then((response) => {
                this.profile =  response.body;
            }, (response) => {
                console.log(response);
            });
        },

        methods: {
            suc: function() {
                new PNotify({
                    addclass: 'bg-success',
                    text: 'Xóa thành công'
                });
            },
        },

        components:{
            'basic': BasicComponent,
            'living': LivingComponent,
            'description': DescriptionComponent,
            'job': JobComponent,
            'vice': ViceComponent,
        }
    }
</script>
