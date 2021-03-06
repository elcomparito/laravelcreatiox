/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// BootstrapVue
window.Vue = require('vue');
import Vue from 'vue';
window.Fire = new Vue();
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

// Toastr
import VueToastr from "vue-toastr";

Vue.use(VueToastr, {
  defaultTimeout: 3000,
  defaultPosition: "toast-bottom-right",
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Datatables 
// Include jquery
const jQuery = require('jquery');
window.jQuery = jQuery;

// Include datatables and plugins
require('datatables.net');
require('datatables.net-bs4');
require('datatables.net-responsive-bs4');
require('datatables.net-responsive');
require('datatables.net-select');
require('datatables.net-select-bs4');

// Components
Vue.component('user-login-component', require('./components/UserLoginComponent.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-component', require('./components/UserComponent.vue').default);

Vue.component('empresa-component', require('./components/EmpresaComponent.vue').default);
Vue.component('institucion-component', require('./components/InstitucionComponent.vue').default);
Vue.component('practicante-component', require('./components/PracticanteComponent.vue').default);

Vue.component('carrera-component', require('./components/CarreraComponent.vue').default);
Vue.component('comuna-component', require('./components/ComunaComponent.vue').default);
Vue.component('oferta-component', require('./components/OfertaComponent.vue').default);
Vue.component('postulacion-component', require('./components/PostulacionComponent.vue').default);

// Web components
Vue.component('form-practicante-component', require('./components/WebFormPracticanteComponent.vue').default);
Vue.component('form-empresa-component', require('./components/WebFormEmpresaComponent.vue').default);
Vue.component('oferta-list-component', require('./components/WebOfertaListComponent.vue').default);

// Web practicante components
Vue.component('web-practicante-postulaciones-component', require('./components/WebPracticantePostulacionesComponent.vue').default);

// MomentsJS
var moment = require('moment');

Vue.filter("date", function (created) {
  return moment(created).format('YYYY-MM-DD HH:mm:ss');
});

// SweetAlert2
// const Swal = require('sweetalert2');
import Swal from 'sweetalert2';
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;

// VForm
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//require('./component');

const app = new Vue({
  el: '#app',
});