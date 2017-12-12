<template>

    <!-- <div class="profile-sidebar"> -->
    <!-- PORTLET MAIN -->
    <div class="portlet light profile-sidebar-portlet ">
        <!-- SIDEBAR USERPIC -->
        <div class="img-responsive">
            <div class="thumb">
                <img v-if="profile.avatar" :src="profile.avatar" alt="">
            </div>
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!--&lt;!&ndash; SIDEBAR USER TITLE &ndash;&gt;{{ profile.status_id | status}}-->
        <div class="profile-usertitle">
            <div v-if="profile.user" class="profile-usertitle-name"> {{profile.user | fullname}}</div>
            <div class="profile-usertitle-job">

                <span v-if="profile.dob" id="js-dob">
                    {{age}}
                </span>
                <a v-if="!profile.dob">Đang cập nhật</a>
                -
                <span v-if="profile.vncity_id && profile.vncity" id="js-city">
                                {{profile.vncity.name}}
                </span>
                <a v-if="!profile.vncity_id || !profile.vncity">Đang cập nhật</a>
            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <button type="button" class="btn btn-circle green btn-sm">Kết bạn</button>
            <a :href="'/message/'+profile.user_id" type="button" class="btn btn-primary">Nhắn tin</a>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li :class="{ active: isProfile }">
                    <a :href="'/user/'+ profile.user_id">
                        <i class="icon-home"></i> Thông tin </a>
                </li>
                <li :class="{ active: isPhoto }">
                    <a :href="'/user/'+ profile.user_id +'/photo'">
                        <i class="icon-image2"></i> Ảnh</a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>

</template>

<style>
</style>

<script>

    export default{
        props: ['user', 'side'],

        data: function () {
            return {
                profile: [],
                age: [],
            }
        },
        computed: {
            // a computed getter
            isProfile: function () {
              if(this.side == 1)
                  return true;
            },
            isPhoto: function () {
               if(this.side == 2)
                    return true;
            },
         },

        created: function(){
            this.$http.get('api/user/'+ this.user).then((response) => {
                this.profile =  response.body;
            }, (response) => {
                console.log(response);
            });

            this.$http.get('api/age/'+ this.user).then((response) => {
                this.age =  response.body;
            }, (response) => {
                console.log(response);
            });
        },
        filters: {
            fullname: function (user, name) {
                  return user.last_name + " " +user.first_name;
            },

            age: function(dob, age){
                let today = new Date();
                let birthDate = new Date(dob);
                age = today.getFullYear() - birthDate.getFullYear();

                let m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age;
            },


        }
    }


</script>
