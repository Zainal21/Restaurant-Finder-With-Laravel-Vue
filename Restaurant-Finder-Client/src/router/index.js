import vue from 'vue'
import VueRouter from 'vue-router'
import Login from '@/views/auth/Login.vue'
import Register from '@/views/auth/Register.vue'
import RestaurantList from '@/views/Restaurant/RestaurantList.vue'
import Dashboard from '@/views/Dashboard/DashboardPage.vue'
import CreateRestaurant from '@/views/components/Restaurant/FormHandle/CreateRestaurant.vue'
import EditRestaurant from '@/views/components/Restaurant/FormHandle/EditRestaurant.vue'

vue.use(VueRouter);

const routes = [
  { path: '/', component: Login },
  { path: '/register', component: Register },
  { path:'/dashboard', component:Dashboard},
  { path:'/restaurant-list',component:RestaurantList},
  { path: '/restaurant-list/create', component: CreateRestaurant },
  { path: '/restaurant-list/update/:id', component: EditRestaurant },
]

const route = new VueRouter({
  routes 
})

export default route;