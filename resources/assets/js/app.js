require('./bootstrap');

import Vue from 'vue';

import VueResource from 'vue-resource';
Vue.use(VueResource);

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.component('profile-edit',require('./components/ProfileEdit'));
Vue.component('create-post',require('./components/PostCreate'));
//Vue.component('all-posts',require('./components/PostsAll'));

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
    mounted() {
        console.log('mounted');
    }
});