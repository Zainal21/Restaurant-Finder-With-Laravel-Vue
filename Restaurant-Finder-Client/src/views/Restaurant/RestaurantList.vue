<template>
  <div>
    <!-- <AppHeader/> -->
    <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h5 class="float-left my-2">Restaurant List</h5>
          </div>
          <div class="card-body shadow">
            <div class="row">
              <div class="col">
                <!-- handle seacrh text dengan membind search text dengan method searchText -->
                <!-- <RestaurantSearch v-on:search-text="searchText" /> -->
                <router-link to="/restaurant-list/create" type="button" class="btn float-right btn-primary mb-2">
                  Add New Restaurant
                </router-link>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in restuarantList" :key="item.id">
                    <th scope="row">{{item.name}}</th>
                    <td>{{item.address}}</td>
                    <td>{{item.rating}}</td>
                    <td><button @click.prevent="handleDeletedata(item.id)" class="btn btn-danger">Delete</button>
                      <router-link :to="`/restaurant-list/update/${item.id}`" class="btn mx-2 btn-info">Update
                      </router-link>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  // import RestaurantSearch from '@/views/components/Restaurant/RestaurantSearch.vue'
  import axios from 'axios'
  import swal from 'sweetalert'
  
  export default {
    name: 'RestaurantList',
    components: {
      // RestaurantSearch,
      // AppHeader
    },
    data: () => {
      return {
        editMode: false,
        form: {
          name: '',
          address: '',
          rating: ''
        },
        restuarantList: []
      }
    },
    mounted() {
      this.onHandleMounted()
    },
    methods: {
      // method fetch data 
      async onHandleMounted() {
        const response = await axios.get("http://127.0.0.1:8000/api/v1/restaurant",{headers:{"Authorization" : 'bearer' + localStorage.getItem("token")}})

        this.restuarantList = response.data.data
      },
      // method handle delete
      async handleDeletedata(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then(async (willDelete) => {
            if (willDelete) {
              await axios.delete(`http://127.0.0.1:8000/api/v1/restaurant/delete/${id}`,{headers:{"Authorization" : 'bearer' + localStorage.getItem("token")}}).then(() => {
                swal("Data Deleted Successfully!", {
                  icon: "success",
                });
                this.onHandleMounted()
              })
            }
          })
      },
      // method hanlde search with pass data to components Seach
      // async searchText(text){
      //     try {
      //        const response =  await axios.get(`http://localhost:8000/api/v1/restaurant?name=${text}`)
      //        this.restuarantList = response.data.data
      //     } catch (error) {
      //       console.log(error)
      //     }
      // }
    }
  }
</script>