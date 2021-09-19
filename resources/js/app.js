require('./bootstrap');
import Vue from 'vue';

import router from './router'
import Vuetify from './vuetify'
import filter from './filter'
import validation from './validation'
import storeData from './store'


import Vuex from 'vuex'
Vue.use(Vuex)
const store = new Vuex.Store(
    storeData
)

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

Vue.mixin(validation)


Vue.component('mainapp',require('./components/mainapp.vue').default)


import Form from "vform";
import { Button, HasError, AlertError } from "vform/src/components/bootstrap5";
Vue.component(Button.name, Button);
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

window.Form = Form;
new Vue({
    vuetify:Vuetify,
    el:'#app',
    router,
    store,
    filter

})
