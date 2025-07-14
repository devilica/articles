require('./bootstrap');
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import Vue from 'vue';

window.Vue = require('vue').default;


Vue.component('article-list', require('./articles/ArticleList.vue').default);

const app = new Vue({
    el: '#app',
});