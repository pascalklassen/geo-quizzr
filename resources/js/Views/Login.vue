<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form class="row g-3" action="javascript:void(0)" method="POST">
                            <div class="col-12">
                                <input-field v-model="v$.username.$model" :validation="v$.username" name="username"
                                             label="Your username" prepend="@" type="text"/>
                            </div>
                            <div class="col-md-6 col-12">
                                <input-field v-model="v$.password.$model" :validation="v$.password" name="password"
                                             label="Your password" type="password"/>
                            </div>

                            <div class="col-12">
                                <button
                                    @click="login"
                                    class="btn"
                                    :class="v$.$invalid ? 'btn-outline-danger' : 'btn-success'"
                                    :disabled="v$.$invalid"
                                    type="submit"
                                >Sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue'

import { useStore } from 'vuex'
import { useVuelidate } from '@vuelidate/core'

import { helpers, required } from '@vuelidate/validators'

import InputField from '@/Components/Forms/InputField.vue'

const store = useStore()

const fields = reactive({
    username: '',
    password: '',
})

const rules = {
    username: {
        required: helpers.withMessage(
            'You must enter a username',
            required
        )
    },

    password: {
        required: helpers.withMessage(
            'You must enter a password',
            required
        )
    }
}

const v$ = useVuelidate(rules, fields)

async function login() {
    try {
        await axios.get('/sanctum/csrf-cookie')
        await axios.post('/login', {
            username: fields.username,
            password: fields.password
        })
        await store.dispatch('auth/login')
    } catch (e) {
        console.error(e)
    }
}
</script>

<style scoped>
</style>
