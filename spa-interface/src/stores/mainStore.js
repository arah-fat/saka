import { ref, reactive, computed } from 'vue'
import { defineStore } from 'pinia'
import axiosClient from '@/axios'


export const useMainStore = defineStore('main', () => {
  const user = reactive({
    token: sessionStorage.getItem('TOKEN') || '',
    data: {}
  })

  function setUser(Userdata) {
    user.data = Userdata
    console.log(user)
    
  }

  function setToken(Tokendata) {
    user.token = Tokendata
    sessionStorage.setItem('TOKEN', Tokendata)
    console.log('this is the token:', Tokendata)
    
  }

  function publishProduct(product) {
    //if (product.image instanceof File) {
      const form = new FormData()
      form.append('product_name', product.product_name)
      form.append('product_image', product.product_image)
      form.append('description', product.description)
      form.append('price', product.price)
    //}
    return axiosClient.post('/products', form, {
      headers: {
        'Authorization': `Bearer ${user.token}`,
        'Content-Type': 'multipart/form-data'
      }
    })
  }
  

  async function login(data) {
    const response = await axiosClient.post('/login', data)
    setUser(response.data.user)
    setToken(response.data.token)
    return response.data
  }
  return {
    user,
    setUser,
    setToken,
    login,
    publishProduct
  }

})
