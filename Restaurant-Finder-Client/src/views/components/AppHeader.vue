<template>
  <b-navbar type="dark" toggleable="lg" variant="dark">
    <div class="container">
      <h3>Restaurant Finder</h3>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    <b-collapse id="nav-collapse" is-nav></b-collapse>
    <b-navbar-nav class="ml-auto">
      <b-nav-item><router-link to="/" class="router-link">Dashboard</router-link></b-nav-item>
      <b-nav-item><router-link to="/" class="router-link">Restaurant List</router-link> </b-nav-item>
      <b-nav-item><router-link to="/login" class="router-link">Logout</router-link> </b-nav-item>
    </b-navbar-nav>
    </div>
  </b-navbar>
</template>

<script>
  export default {
    name: 'AppHeader'
  }
</script>

<style scoped>
  .router-link{
    color: #ddd !important;
    text-decoration: none;
  }
  h3{
    color: white;
    font-weight: bold;
    position: fixed;
  }
</style>