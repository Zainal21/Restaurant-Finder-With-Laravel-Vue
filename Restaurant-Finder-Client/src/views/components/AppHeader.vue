<template>
  <b-navbar type="dark" toggleable="lg" variant="dark">
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav class="ml-auto">
        <b-nav-item href="#">Link</b-nav-item>
        <b-nav-item href="#" disabled>Disabled</b-nav-item>
      </b-navbar-nav>
  </b-navbar>
</template>

<script>
export default {
  name :'AppHeader'
}
</script>

<style scoped>

</style>