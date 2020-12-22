<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h5 class="float-left my-2"> Created New Restaurant List</h5>
          </div>
          <div class="card-body">
            <form class="form-group" @submit.prevent="onHandleSumbit()">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label float-left">Name</label>
                <input type="text" class="form-control" placeholder="The Name of The Restaurant" v-model="form.name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label float-left">Address</label>
                <input type="text" class="form-control" placeholder="The Address of The Restaurant"
                  v-model="form.address">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label float-left">Rating</label>
                <input type="number" min="0" max="10" class="form-control" placeholder="The Rating of The Restaurant"
                  v-model="form.rating">
              </div>
              <div class="mb-3">
                <router-link to="/restaurant-list" class="btn btn-danger float-left mx-2">Back to Home</router-link>
                <button type="submit" class="btn btn-primary float-left mx-2">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import swal from 'sweetalert';
  import axios from 'axios'
  export default {
    name: 'CreateRestaurant',
    data: () => {
      return {
        form: {
          name: '',
          address: '',
          rating: 'rating'
        }
      }
    },
    methods: {
      async onHandleSumbit() {
      let data = {
                name:this.form.name,
                address:this.form.address,
                rating:this.form.rating,
              }
        await axios.post('http://127.0.0.1:8000/api/v1/restaurant',data,
          {headers:{"Authorization" : 'bearer' + localStorage.getItem("token")}})
          .then(() => {
            swal({
              title: "information!",
              text: "Data Created Successfully",
              icon: "success",
            });
            this.$router.push('/restaurant-list')
          }).catch(errr =>{
            console.log(errr)
          })
        
      }
    }
  }
</script>

<style scoped>

</style>