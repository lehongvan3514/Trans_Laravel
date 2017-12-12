
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


Vue.component(
    'gallery',
    require('./components/profile/Gallery.vue')
);


Vue.component(
    'info',
    require('./components/profile/Info.vue')
);

Vue.component(
    'visit',
    require('./components/visit/Visit.vue')
);

Vue.component(
    'sidebar',
    require('./components/visit/Sidebar.vue')
);

Vue.component(
    'target',
    require('./components/target/Target.vue')
);

Vue.component(
    'userlist',
    require('./components/message/UsersList.vue')
);


Vue.component(
    'message',
    require('./components/message/Message.vue')
);

Vue.component(
    'login',
    require('./components/auth/Login.vue')
);


// Vue.component(
//     'search',
//     require('./components/search/Search.vue')
// );

require('./lang');
require('./visit');

const app = new Vue({
    el: '#app'
});
