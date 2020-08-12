require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use(CKEditor);
window.CKEditor = CKEditor
Vue.filter('striphtml', function (value) {
  var div = document.createElement("div");
  div.innerHTML = value;
  var text = div.textContent || div.innerText || "";
  return text;
});
import { Form, HasError, AlertError } from 'vform'
window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

window.$ = require('jquery')
window.JQuery = require('jquery')

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import {routes} from './routes'
const router = new VueRouter({
    routes,
});
import Swal from 'sweetalert2'
      window.Swal = Swal
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
 window.Toast = Toast


const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');