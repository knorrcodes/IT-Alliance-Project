import Vue from 'vue'
import Router from 'vue-router'
import mainPage from '@/component/mainPage'
import login from '@/component/login'
import listPage from '@/component/listPage'

Vue.use(Router);

export default new Router({
    mode: "history",
    base: process.env.BASE_URL,
    routes: [{
            path: '/',
            redirect: {
                name: "mainPage"
            }
        },
        {
            path: '/mainpage',
            name: 'mainPage',
            component: mainPage
        },
        {
            path: '/login',
            name: 'login',
            component: login
        },
        {
            path: '/listPage',
            name: 'listPage',
            component: listPage
        }
    ],
});