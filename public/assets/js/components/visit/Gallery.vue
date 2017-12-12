<template>
    <div class="col-lg-9">
        <div class="tab-pane fade in active" id="gallery">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Hình ảnh</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4" v-for="photo in list">
                                            <div class="panel panel-flat">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <img :src="photo.thumbnail_path" alt="">
                                                            <div class="caption-overflow">
                												<span>
                													<a :href="photo.path" class="btn bg-warning-300 btn-icon" data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                												</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>

<script>
    export default {

        data: function () {
            return {
                list: []
            };
        },

        props: ['cucai'],

        computed: {
            dauxanh: function () {
                return JSON.parse(this.cucai);
            },
            base_url : function () {

                return '<?php echo base_url();?>'
            }
        },

        created(){
            this.$http.get('api/user/'+ this.dauxanh.user_id +'/photos').then((response) => {
                this.list = response.body;
//                return response.body;
            }, (response) => {
                console.log(response);
            });

            console.log(this.dauxanh);
        },

    }
</script>