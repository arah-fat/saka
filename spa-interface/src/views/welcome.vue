<template>
    <h1>Welcome to Saka</h1>
    <div v-if="user">
            <p>Email: {{ user.email }}</p>
            <p>Name: {{ user.name }}</p>
        </div>
</template>
<script setup>
import { useMainStore } from '@/stores/mainStore'
import {computed} from 'vue'

const mainStore = useMainStore()

const user = computed(() => mainStore.user)
</script>