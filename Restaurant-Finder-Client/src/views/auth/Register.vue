<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h1><b>Register</b></h1>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="float-left form-label">Email address</label>
                <input type="email" class="form-control"  aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1 " class="form-label float-left">Password</label>
                <input type="password" class="form-control  ">
              </div>
              <button type="submit" class="btn btn-primary float-left mr-2">Register</button>
              <router-link to="/" class="btn btn-primary float-right">Kembali</router-link>
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
  export default {
    name: 'Register',
    components: {}
  }
</script>