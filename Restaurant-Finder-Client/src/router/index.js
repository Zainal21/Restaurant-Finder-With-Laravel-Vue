import vue from 'vue'
import Login from '@/views/auth/Login.vue'
import Register from '@/views/auth/Register.vue'
import VueRouter from 'vue-router'

vue.use(VueRouter);

const routes = [
  { path: '/', component: Login },
  { path: '/register', component: Register }
]

const route = new VueRouter({
  routes 
})

export default route;