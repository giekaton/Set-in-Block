import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Reader from './views/Reader.vue'
import Read from './views/Read.vue'


Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/reader',
      name: 'reader',
      component: Reader,
    },
    {
      path: '/reader/:txHash',
      name: 'Read',
      component: Read,
      props: true,
    },
    {
      path: '/:txHash',
      name: 'Read',
      component: Read,
      props: true,
    },
  ]
})
