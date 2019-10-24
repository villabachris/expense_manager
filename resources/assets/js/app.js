
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueCurrencyFilter from 'vue-currency-filter';
import store from './store/index';



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueCurrencyFilter,
    {
    symbol : 'Php',
    thousandsSeparator: ',',
    fractionCount: 2,
    fractionSeparator: '.',
    symbolPosition: 'front',
    symbolSpacing: true
    });

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('my-expenses', require('./components/Dashboard.vue'));
Vue.component('add-role', require('./components/AddRole.vue'));
Vue.component('user-roles', require('./components/UserRoles.vue'));
Vue.component('all-users', require('./components/Users.vue'));
Vue.component('add-user', require('./components/AddUser.vue'));
Vue.component('all-categories', require('./components/Category.vue'));
Vue.component('add-category', require('./components/AddCategory.vue'));
Vue.component('all-expenses', require('./components/Expense.vue'));
Vue.component('add-expense', require('./components/AddExpense.vue'));
Vue.component('bar-chart', require('./components/BarChart.vue'));
const app = new Vue({
    el: '#app',
    store
});
