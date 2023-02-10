import { createRouter, createWebHistory } from 'vue-router'
import store from '@/store'

const Login = () => import('@/Views/Login.vue')
const Register = () => import('@/Views/Register.vue')

const App = () => import('@/App.vue')

const routes = [
    {
        path: '/',
        component: App,
        meta: {
            middleware: 'auth'
        }
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            middleware: 'guest',
            title: 'Login'
        }
    },
    {
        name: 'register',
        path: '/register',
        component: Register,
        meta: {
            middleware: 'guest',
            title: 'Register'
        }
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title

    if (to.meta.middleware === 'guest') {
        if (store.state.auth.authenticated) {
            next({ name: '/dashboard' })
            return
        }

        next()
        return
    }

    if (store.state.auth.authenticated) {
        next()
        return
    }

    next({ name: 'login' })
})

export default router
