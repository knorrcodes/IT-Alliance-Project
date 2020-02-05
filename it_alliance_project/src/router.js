import Vue from 'vue'
import Router from 'vue-router'
import listPage from '@/component/listPage'
import login from '@/component/login'
import mainPage from '@/component/mainPage'
import navbar from '@/component/navbar'

Vue.use(Router);

export default new Router({
    mode: "history",
    base: process.env.BASE_URL,
    routes: [{
            path: '/',
            redirect: {
                name: 'mainPage'
            }
        },
        {
            path: '/listPage',
            name: 'listPage',
            component: listPage
        },
        {
            path: '/login',
            name: 'login',
            component: login
        },
        {
            path: '/mainPage',
            name: 'mainPage',
            component: mainPage
        },
        {
            path: '/navbar',
            name: 'navbar',
            component: navbar
        }
    ],
});