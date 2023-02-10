<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Create your profile</div>

                    <div class="card-body">
                        <form class="row g-3" action="javascript:void(0)" method="POST">
                            <div class="col-12">
                                <input-field v-model="v$.email.$model" :validation="v$.email" name="email"
                                             label="Your email address" type="mail"/>
                            </div>
                            <div class="col-12">
                                <input-field v-model="v$.username.$model" :validation="v$.username" name="username"
                                             label="Your username" prepend="@" type="text"/>
                            </div>
                            <div class="col-md-6 col-12">
                                <input-field v-model="v$.password.$model" :validation="v$.password" name="password"
                                             label="Your password" type="password"/>
                            </div>
                            <div class="col-md-6 col-12">
                                <input-field v-model="v$.confirmPassword.$model" :validation="v$.confirmPassword"
                                             name="confirm_password" label="Confirm your password" type="password"/>
                            </div>

                            <div class="col-12">
                                <button
                                    @click="register"
                                    class="btn"
                                    :class="v$.$invalid ? 'btn-outline-danger' : 'btn-success'"
                                    :disabled="v$.$invalid"
                                    type="submit"
                                >Create now
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
import { reactive, toRef } from 'vue'

import { useStore } from 'vuex'
import { useVuelidate } from '@vuelidate/core'

import {
    helpers,
    required,
    email,
    sameAs,
    minLength,
    maxLength,
} from '@vuelidate/validators'

import InputField from '@/Components/Forms/InputField.vue'

const store = useStore()

const fields = reactive({
    email: '',
    username: '',
    password: '',
    confirmPassword: ''
})

const rules = {
    email: {
        required: helpers.withMessage(
            'You must enter an email address',
            required
        ),

        email: helpers.withMessage(
            'The email address you enter must be valid',
            email
        )
    },

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
        ),

        min: helpers.withMessage(
            ({ $params }) => `The password you enter must be at least ${ $params.min } characters long`,
            minLength(8)
        ),

        max: helpers.withMessage(
            ({ $params }) => `The password you enter must not exceed ${ $params.max } characters`,
            maxLength(32)
        ),

        /**
         * This pattern uses positive lookahead assertions to ensure that the password contains at least one lowercase
         * letter ((?=.*[a-z])), one uppercase letter ((?=.*[A-Z])), one digit ((?=.*\d)), and one special character
         * ((?=.*[!@#\$%\^&\*])). The pattern then specifies that the password must contain at least one of these
         * elements ([a-zA-Z\d!@#\$%\^&\*]{1,}).
         */
        strength: helpers.withMessage(
            'The password you enter must contain at least one special character (!@#$^&*), one number and one upper and lower case letter',
            helpers.regex(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]+$/)
        )
    },

    confirmPassword: {
        required: helpers.withMessage(
            'You must confirm the password entered above',
            required
        ),

        same: helpers.withMessage(
            'The confirmed password you enter must match the password you entered previously',
            sameAs(toRef(fields, 'password'))
        )
    }
}

const v$ = useVuelidate(rules, fields)

async function register() {
    try {
        await axios.get('/sanctum/csrf-cookie')
        await axios.post('/register', {
            name: fields.username,
            email: fields.email,
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
