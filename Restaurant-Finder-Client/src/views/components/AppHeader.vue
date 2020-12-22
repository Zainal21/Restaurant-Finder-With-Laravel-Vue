<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><b>Restaurant Finder</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link class="nav-link active" to="/dashboard">Dashboard</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/restaurant-list">Restaurant Management</router-link>
          </li>
          <li class="nav-item" v-show="isLogin">
            <a class="nav-link" href="#" @click="handleLogout()">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import axios from 'axios'
  export default {
    name: 'AppHeader',
    data:() => {
      return {
        isLogin : true,
      }
    },
    mounted(){  
      console.log(localStorage.getItem('token'))
      if(!localStorage.getItem('token') === null){
        this.isLogin = false
      }
      this.isLogin = true
    },
    methods:{
     async handleLogout(){
       const data = await axios.get('http://localhost:8000/api/v1/logout').then(() => {
          localStorage.removeItem('token')
          this.$router.push('/')
        })
        console.log(data)
      }
    }
  }
</script>

<style scoped>
  .router-link {
    color: #ddd !important;
    text-decoration: none;
  }

  h3 {
    color: white;
    font-weight: bold;
    position: fixed;
  }
</style>