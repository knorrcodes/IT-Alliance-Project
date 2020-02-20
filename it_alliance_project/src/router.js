import Vue from 'vue'
import Router from 'vue-router'
import listPage from '@/component/listPage'
import login from '@/component/login'
import mainPage from '@/component/mainPage'
import navbar from '@/component/navbar'
import Auth from '@okta/okta-vue'

Vue.use(Auth, {
    issuer: 'https://dev-253896.okta.com/oauth2/default',
    clientId: '0oa242wfbnQmekjOF4x6',
    redirectUri: 'http://localhost:8080/mainPage',
    scope: 'openid profile email',
    pkce: true
})
//router.beforeEach(Vue.prototype.$auth.authRedirectGuard())

Vue.use(Router);
/* const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    meta: {
        requiresAuth: true
    },
    routes: [{
            path: '/implicit/callback',
            component: Auth.handleCallback()
        }, {
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
    ]
}) */



export default new Router({
    mode: "history",
    base: process.env.BASE_URL,
    meta: {
        requiresAuth: true
    },
    routes: [{
            path: '/',
            redirect: {
                name: 'mainPage'
            }
        },
        {
            path: '/implicit/callback',
            component: Auth.handleCallback()
        },
        {
            path: '/listPage',
            name: 'listPage',
            component: listPage //,
            //beforeEnter: requireAuth
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

/*function requireAuth(to, from, next) {
    if (!Auth.isAuthenticated()) {
        next({
            path: '/login',
            query: {
                redirect: to.fullPath
            }
        })
    } else {
        next()
    }
}*/