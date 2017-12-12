<template>
    <div class="col-md-12">
        <div class="tab-pane fade in active" id="gallery">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Hình ảnh</h6>
                    <div class="heading-elements">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_upload"><i class="icon-pencil3 position-left"></i>
                            Thêm ảnh
                        </button>
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
                                            <a :href="photo.path" class="btn bg-warning-300 btn-icon"
                                            data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                                            <a class="btn bg-warning-300 btn-icon"
                                            v-on:click="warmD(photo)"><i class="icon-bin"></i></a>
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

        created(){
            this.$http.get('api/profile/photos').then((response) => {
                this.list = response.body;
//                return response.body;
            }, (response) => {
                console.log(response);
            });
        },

        methods: {
            deletePhoto : function(photo){
                var vm = this;
                console.log(photo);
                this.$http.delete('api/photo/' + photo.id)
                .then((response) => {
                    vm.list = vm.list.filter(e => e.id !== photo.id);
                    swal("Đã xóa!", "Xóa ảnh thành công.", "success");
                }, (response) => {
                    swal("Error!", "Something wrong.", "error");
                });
            },

            warmD: function (photo) {
                var vm = this;
                swal({   
                    title: "Xóa ảnh?",
                    text: "Ảnh này sẽ bị xóa và bạn sẽ không thể khôi phục!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Xóa",
                    cancelButtonText: "Hủy bỏ",
                    closeOnConfirm: true,
                    closeOnCancel: true 
                }, function(isConfirm){
                    if (isConfirm) {
                        vm.deletePhoto(photo);
                    } else {
                        // swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });

            },

            suc: function() {
                new PNotify({
                    addclass: 'bg-success',
                    text: 'Xóa thành công'
                });
            },
        }
    }









</script>