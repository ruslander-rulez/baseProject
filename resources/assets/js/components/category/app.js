
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../bootstrap');

window.Vue = require('vue');

import * as uiv from 'uiv'
import ToggleButton from 'vue-js-toggle-button'


window.Vue.use(uiv, {prefix: 'uiv'});

window.Vue.use(ToggleButton);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('pagination', require('../Pagination.vue'));
Vue.component('error-block', require('../ErrorFormGroupBlock.vue'));
Vue.component('dropzone', require('../Dropzone.vue'));

Vue.component('category-table', require('./Table.vue'));
Vue.component('category-row', require('./Row.vue'));
Vue.component('category-edit', require('./Edit.vue'));


