
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.min.css';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.use(VueMaterial);
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('modal', require('./components/modal_v1.vue'));
Vue.component('todo', require('./components/todo.vue'));
// Vue.component('dinmenucomp', require('./components/DinMenuComp.vue'));
// Vue.component('tab', require('./components/tab.vue'));

const app = new Vue({
    el: '#app'
});
