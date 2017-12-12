<template>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-bubbles4"></i>
            <span class="visible-xs-inline-block position-right">Messages</span>
            <span class="badge bg-warning-400" v-if="list.length > 0 ">{{list.length}}</span>
        </a>

        <div class="dropdown-menu dropdown-content width-350">
            <div class="dropdown-content-heading">
                Messages
                <ul class="icons-list">
                    <li><a href="#"><i class="icon-compose"></i></a></li>
                </ul>
            </div>

            <ul class="media-list dropdown-content-body">
                <li class="media" v-for="ms in list">
                    <div class="media-left">
                        <img :src="ms.message.sender.profile.avatar" class="img-circle img-sm" alt="">
                        <!--<span class="badge bg-danger-400 media-badge">5</span>-->
                    </div>

                    <div class="media-body">
                        <a :href="'message/'+ms.message.sender_id" class="media-heading">
                            <span class="text-semibold">{{ms.message.sender.first_name}}</span>
                            <span class="media-annotation pull-right">{{ms.created_at}}</span>
                        </a>

                        <span class="text-muted" v-html="ms.message.body"></span>
                    </div>
                </li>

            </ul>

            <div class="dropdown-content-footer">
                <a href="messages" data-popup="tooltip" title="Xem tất cả"><i class="icon-menu display-block"></i></a>
            </div>
        </div>
    </li>
</template>
<style>
</style>
<script>

    export default{
        data: function () {
            return {
                list: []
            };
        },

         created(){
            this.$http.get('userlist').then((response) => {
                this.list = response.body;
//                return response.body;
            }, (response) => {
                console.log(response);
            });

        },
    };

</script>
