import Vue from 'vue'
import Router from 'vue-router'
import listPage from '@/component/listPage'
import login from '@/component/login'
import mainPage from '@/component/mainPage'
import navbar from '@/component/navbar'
import Auth from '@okta/okta-vue'

Vue.use(Auth, {
    issuer: 'https://dev-253896.okta.com/oauth2/default/',
    clientId: '0oa242wfbnQmekjOF4x6',
    redirectUri: 'http://localhost:8080/mainPage',
    scopes: ['openid', 'profile', 'email'],
    pkce: true
})

const router = new Router({
    mode: 'history',
    routes: [{
        path: '/implicit/callback',
        component: Auth.handleCallback()
    }, ]
})



Vue.use(Router);

router.beforeEach(Vue.prototype.$auth.authRedirectGuard())

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
        /*
                {
                    path: '/protected',
                    component: Protected,
                    meta: {
                        requiresAuth: true
                    }
                }*/
    ],
});