<template>
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container">
            <router-link :to="{ name: 'register' }" class="navbar-brand">
                <i class="bi bi-globe-europe-africa text-success"></i> Geo Quizzr
            </router-link>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link :to="{ name: 'register' }" class="nav-link">Play!</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                        <ul class="dropdown-menu">
                            <li>
                                <router-link :to="{ name: 'register' }" class="dropdown-item">
                                    <i class="bi bi-people-fill"></i> Team
                                </router-link>
                            </li>
                            <li>
                                <a href="https://github.com" class="dropdown-item"><i class="bi bi-github"></i> GitHub</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a @click="login" href="javascript:void(0)" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'register' }" class="nav-link">Register</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { useStore } from 'vuex'

const store = useStore()

const login = () => store.dispatch('auth/login')
</script>

<style scoped>
</style>
