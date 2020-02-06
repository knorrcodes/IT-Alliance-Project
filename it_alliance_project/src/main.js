import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { NavbarPlugin } from 'bootstrap-vue'

import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'




Vue.config.productionTip = false

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(NavbarPlugin)

new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App },
    render: h => h(App),
}).$mount('#app')