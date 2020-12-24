<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h1><b>Restaurant Finder</b></h1>
          </div>
          <div class="card-body">
            <form @submit.prevent="handleSubmitLogin()">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="float-left form-label">Email address</label>
                <input type="email" class="form-control" v-model="form.email"  aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1 " class="form-label float-left">Password</label>
                <input type="password" class="form-control" v-model="form.password">
              </div>
              <button type="submit" class="btn btn-primary float-left mr-2">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>

<script>
import swal from 'sweetalert'
import axios from 'axios';
  export default {
    name: 'Login',
    data:() => {
      return {
        form :{email:'',password:''}
      }
    },
    components: {},
    methods: {
    async  handleSubmitLogin(){
        await axios.post('http://localhost:8000/api/v1/login', this.form).then(Response => {
          // console.log(Response)
              const {name,email,token} = Response.data;
              swal({  
                title: "information!",
                text: `Login Successfull`,
                icon: "success",
              }).then(() => {
                localStorage.setItem('name', name);
                localStorage.setItem('email', email);
                localStorage.setItem('token', token);
                this.$router.push('/restaurant-list')
              });
            
           }).catch(error => {
             swal({  
                title: "information!",
                text: `${error}`,
                icon: "warning",
              });
           })
      }
    }
  }
</script>