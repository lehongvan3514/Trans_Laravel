<template>
    <div class="container">
        <div class="row">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active">
                    </li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div id="ca1" class="item active">
                        <div class="col-lg-3 col-sm-6" v-for="profile in list1">
                            <div class="thumbnail">
                                <div class="thumb thumb-rounded"><img src="assets/images/placeholder.jpg" alt="">
                                    <div class="caption-overflow">
                                        <span>
                                            <a href="user/5" class="btn border-white text-white btn-flat btn-icon btn-rounded">
                                            <i class="icon-profile"></i></a>
                                            <a href="message/5" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5">
                                                <i class="icon-bubbles10"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="caption text-center">
                                    <h6 class="text-semibold no-margin"> {{profile.user.last_name}} {{profile.user.first_name}}
                                        <small class="display-block"><a href="categories?gender=2">{{profile.gender.name}}</a> - <a
                                                href="categories?age=40">{{profile.dob}}</a> - <a href="categories?city=1">{{profile.vncity.name}}</a></small>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ca2" class="item">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
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
                list1: []
            };
        },

        created(){
            this.$http.get('api/target?page=1').then((response) => {
                this.list1 = response.body;
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
