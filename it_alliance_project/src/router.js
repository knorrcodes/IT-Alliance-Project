import Vue from 'vue'
import Router from 'vue-router'
import listPage from '@/component/listPage'
import login from '@/component/login'
import mainPage from '@/component/mainPage'
import navbar from '@/component/navbar'
import Auth from '@okta/okta-vue'



const config = {
    clientId: '0oa242wfbnQmekjOF4x6',
    issuer: 'https://dev-253896.okta.com/oauth2/default',
    redirectUri: 'http://localhost:8080/implicit/callback',
    scopes: ['openid', 'profile', 'email'],
    pkce: true
}
Vue.use(Auth, config)
const CALLBACK_PATH = '/implicit/callback';
const router = new Router({
    mode: 'history',
    routes: [{
        path: CALLBACK_PATH,
        component: Auth.handleCallback()
    }, ]
})
Vue.use(Router);
router.beforeEach(Vue.prototype.$auth.authRedirectGuard())


export default Router({
    mode: "history",
    base: process.env.BASE_URL,
    routes: [{
            path: '/listPage',
            name: 'listPage',
            component: listPage,

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
        },

    ],
});