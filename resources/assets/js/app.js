
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

Vue.component('member-list', require('./components/member-list.vue'));
Vue.component('wish-list', require('./components/wish-list.vue'));
Vue.component('logout-bar', require('./components/logout-bar.vue'));
Vue.component('wishlist-header', require('./components/wishlist-header.vue'));
Vue.component('wishlist-footer', require('./components/wishlist-footer.vue'));
Vue.component('wishlist-checkbox', require('./components/wishlist-checkbox.vue'));

/*
 * 3rd party vue plugins
 */
// TODO for some unclear reason this doesn't work. Delete or get working.
// var VueAlert = require('vue-alert');
// Vue.use(VueAlert);


const app = new Vue({
    el: 'body'
});
