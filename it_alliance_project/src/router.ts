import Vue from 'vue'
import Router from 'vue-router'
import mainPage from '@/components/mainPage.vue'
import login from '@/component/login'
import list_page from '@/component/list_page'

Vue.use(Router);

export default new Router({
    /*mode: "history",
    base: process.env.BASE_URL,*/
    routes: [
    {
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
        path: '/list_page',
        name: 'list_page',
        component: list_page
    }
    ],
});
