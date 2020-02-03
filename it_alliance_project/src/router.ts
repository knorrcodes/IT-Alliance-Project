import Vue from "vue";
import Router from "vue-router";
import login from "@/component/login.vue";
import mainPage from "@/component/mainPage.vue";

Vue.use(Router);

export default new Router({
    mode: "history",
    base: process.env.BASE_URL,
    routes: [{
        path: '/',
        component: login
    },
    {
        path: '/mainpage',
        component: mainPage
    }
    ],
});
