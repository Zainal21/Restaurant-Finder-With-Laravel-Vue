<template>
  <div class="form-group">
    <!-- components search bar -->
    <form  @submit.prevent="handleSearch()">
      <input type="text" v-model="text" class="form-control" placeholder="Search Restaurant....">
      <button type="submit" class="btn btn-primary my-2 float-left">Search Restaurant</button>
    </form>
  </div>
</template>

<script>
  export default {
    name:'RestaurantSearch',
    data :() => {
      return {
        text:""
      }
    },
    methods:{
      // method handle seacrh
      handleSearch(){
        // $emit digunakan saata meng v-on:search-text di parent component
        this.$emit('search-text', this.text);
        this.text = ''
      }
    }
  }
</script>

<style scoped>

</style>