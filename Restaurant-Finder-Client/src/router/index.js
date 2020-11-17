import vue from 'vue'
import Home from '@/views/Home.vue'
import About from '@/views/About.vue'
import VueRouter from 'vue-router'

vue.use(VueRouter);

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About }
]

const route = new VueRouter({
  routes 
})

export default route;