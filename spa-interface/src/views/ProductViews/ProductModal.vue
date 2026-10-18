<template>
    
    <form action="post" @submit.prevent="publish">
        <p>
            <label for="title">Title:</label>
            <input type="text" id="title" v-model="product.product_name">
        </p>
        
        <p>

            <label for="image">Image:</label>
            <input type="file" id="image" @change="e => product.product_image = e.target.files[0]">
        </p>
        <p>
            <label for="description">Description:</label>
        </p>
        <p>
            <textarea name="" id="description" cols="80" rows="20" v-model="product.description"></textarea>
        </p>
        <p> 
            <label for="price">price:</label>
            <input type="text" id="price" v-model="product.price">
        </p>
        <button type="submit">Publish Product</button>
    </form>
    

</template>
<script setup>

import { ref, reactive} from 'vue'
import { useMainStore } from '@/stores/mainStore'

const mainStore = useMainStore()

const product = reactive({
    'product_name': '',
    'product_image': '',
    'description': '',
    'price': ''

})

// async function publish() {
    
//         await mainStore.publishProduct(product)
// }
async function publish() {
    console.log("1. Starting publish method...")
    try {
        const response = await mainStore.publishProduct(product)
        console.log("Created Product:", response.data)
    } catch (error) {
        if (error.response && error.response.status === 422) {
            // Logs the exact validation messages from Laravel
            console.log("Validation Errors:", error.response.data.errors)
        }
    }
}

</script>