<template>

    <div class="category-content no-padding">
        <ul class="media-list media-list-linked">
            <li class="media hover" v-for="ms in list">
                <a :href="'message/'+ms.message.sender.id" class="media-link">
                    <div class="media-left">
                        <img :src="ms.message.sender.profile.avatar" alt="" class="img-circle">
                    </div>
                    <div class="media-body">
                    <span class="media-heading text-semibold">
                        {{ms.message.sender.first_name}}
                    </span>
                        <span class="text-muted" v-html="ms.message.body">
                    </span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
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
    }



</script>
