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
      meta: {
        title: 'Set in Block - Immutable and Indestructible Messages on the Blockchain',
        metaTags: [
          {
            name: 'description',
            content: 'Create and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and "set in stone" it on the blockchain.'
          },
          {
            property: 'og:description',
            content: 'Create and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and "set in stone" it on the blockchain.'
          }
        ]
      }
    },
    {
      path: '/reader',
      name: 'reader',
      component: Reader,
      meta: {
        title: 'Set in Block Reader - Indestructible Messages',
        metaTags: [
          {
            name: 'description',
            content: 'Read immutable and indestructible messages on the blockchain.'
          },
          {
            property: 'og:description',
            content: 'Read immutable and indestructible messages on the blockchain.'
          }
        ]
      }
    },
    {
      path: '/:txHash',
      name: 'Read',
      component: Read,
      props: true,
      meta: {
        title: 'Set in Block - The Immutable Message',
        metaTags: [
          {
            name: 'description',
            content: 'A direct link to the message permanently recorded on the blockchain.'
          },
          {
            property: 'og:description',
            content: 'A direct link to the message permanently recorded on the blockchain.'
          }
        ]
      }
    },
  ]
})
