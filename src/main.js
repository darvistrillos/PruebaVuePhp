// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import BootstrapVue from "bootstrap-vue"
import cors from "cors"
import App from './App'




 import "bootstrap/dist/css/bootstrap.min.css"
 import "bootstrap-vue/dist/bootstrap-vue.css"

 Vue.use(BootstrapVue);
  
 Vue.use(cors);


 require('./assets/Css/myStyle.css');
// require('./assets/Js/Custumer.js');
 Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  components: { App },
  template: '<App/>'
})
