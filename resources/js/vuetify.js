// You still need to register Vuetify itself
// src/plugins/vuetify.js

import Vue from 'vue'
import '@mdi/font/css/materialdesignicons.css'
import Vuetify from 'vuetify/lib'


Vue.use(Vuetify)

const opts = {}

export default new Vuetify(opts)