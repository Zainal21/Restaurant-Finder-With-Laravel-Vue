import vue from 'vue'
import VueRouter from 'vue-router'
import Login from '@/views/auth/Login.vue'
import RestaurantList from '@/views/Restaurant/RestaurantList.vue'
import Dashboard from '@/views/Dashboard/DashboardPage.vue'
import CreateRestaurant from '@/views/components/Restaurant/FormHandle/CreateRestaurant.vue'
import EditRestaurant from '@/views/components/Restaurant/FormHandle/EditRestaurant.vue'

vue.use(VueRouter);

const routes = [
  { path: '/', component: Login },
  { path:'/dashboard', component:Dashboard, meta:{requiresAuth:true}},
  { path:'/restaurant-list',component:RestaurantList, meta:{requiresAuth:true}},
  { path: '/restaurant-list/create', component: CreateRestaurant ,meta:{requiresAuth:true}},
  { path: '/restaurant-list/update/:id', component: EditRestaurant ,meta:{requiresAuth:true}},
  { path: '/logout', meta:{requiresAuth:true}},
]

const route = new VueRouter({
  routes 
})

route.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.requiresAuth)){
    if(!localStorage.getItem('token')){
      next({
        path:'/',
        query:{redirect:to.fullPath}
      })
    }else{
      next()
    }
  }else{
    next()
  }
})

export default route;