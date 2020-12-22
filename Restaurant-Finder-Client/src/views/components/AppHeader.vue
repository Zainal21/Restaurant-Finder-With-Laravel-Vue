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
            <router-link class="nav-link active" to="/dashboard" v-show="isLogin = true">Dashboard</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/restaurant-list" v-show="isLogin = true">Restaurant Management</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"  @click="handleLogout()">Logout</a>
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
        isLogin : false,
      }
    },
    mounted(){  
      // console.log(localStorage.getItem('token'))
      this.isLogin = true
      !localStorage.getItem('token') ? this.isLogin = false :  this.isLogin = true    
    },
    methods:{
     async handleLogout(){
       const data = await axios.get('http://localhost:8000/api/v1/logout',{headers:{"Authorization" : 'bearer' + localStorage.getItem("token")}}).then(() => {
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