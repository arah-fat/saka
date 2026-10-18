<template>
    <form action="post" @submit.prevent="login">
        <div v-if="errorMessage">{{ errorMessage }}</div>
        <p><label for="email">Email:</label>
        <input
        type="text" 
        placeholder="example@email.com" 
        id="email"
        v-model="user.email"

        ></p>
        <p><label for="email">Password:</label>
        <input 
        type="password"  
        id="password"
        v-model="user.password"
        ></p>
        <button>Sign in</button>
    </form>

</template>
<script setup>
import { useMainStore } from '@/stores/mainStore'
import { useRouter } from 'vue-router'
import {ref} from 'vue'

const mainStore = useMainStore()
const router = useRouter()
const  errorMessage = ref('')

const user = {
    'email': '',
    'password': ''
}

async function login() {
    try{
        await mainStore.login(user)
        router.push({name: 'welcome'})

    }
    catch (err) {
        if (err.response && err.response.data) {
            errorMessage.value = err.response.data.message
        } else {
            errorMessage.value = 'An unexpected error occurred. Please try again.'
        }
    }
}
</script>
<style scoped>
form {
    border: solid, blue, ;
    border-width: 10px;
}
#email {
    height: 2em;
    width: 30em;
}

#password {
    height: 2em;
    width: 30em;
}

button {
    padding: 10px;
    margin: 10px;
    position: relative;
    left: 400px; 
}

</style>