import axios from 'axios'
import router from '@/router'

export default {
    namespaced: true,

    state: {
        authenticated: false,
        user: {}
    },

    getters: {
        authenticated(state) {
            return state.authenticated
        },
        user(state) {
            return state.user
        }
    },

    mutations: {
        SET_AUTHENTICATED(state, value) {
            state.authenticated = value
        },
        SET_USER(state, value) {
            state.user = value
        }
    },

    actions: {
        async login({ commit }) {
            try {
                const data = await axios.get('/api/user')

                commit('SET_AUTHENTICATED', true)
                commit('SET_USER', data)

                await router.push({ name: 'dashboard' })
            } catch (e) {
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', {})
            }
        },

        logout({ commit }) {
            commit('SET_AUTHENTICATED', false)
            commit('SET_USER', {})
        }
    }
}
