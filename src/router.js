import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import NewMessage from './views/NewMessage.vue'
import Read from './views/Read.vue'
import Redirect from './views/Redirect.vue'
// import MsgIpProtection from './components/MsgIpProtection.vue';


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
        // title: 'Set in Block - Immutable and Indestructible Messages on the Blockchain',
        // title: 'Set in Block - Immutable and Indestructible Messages on the Blockchain',
        title: 'Set in Block - Immutable and Indestructible Blockchain Messages',
        metaTags: [
          {
            name: 'description',
            content: 'Write and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and "set in stone" it on the blockchain.'
          },
          {
            property: 'og:description',
            content: 'Write and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and "set in stone" it on the blockchain.'
          }
        ]
      }
    },
    {
      path: '/about',
      name: 'about',
      component: Home,
      meta: {
        // title: 'Set in Block - Immutable and Indestructible Messages on the Blockchain',
        // title: 'Set in Block - How to Read and Write Blockchain Messages',
        title: 'Make a Proof of Existence on the Ethereum Blockchain - Set in Block',
        metaTags: [
          {
            property: 'og:description',
            content: 'Immutable and Indestructible Proof of Existence on the Ethereum Blockchain. Create and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and "set in stone" it on the blockchain.'
          }
        ]
      }
    },
    {
      path: '/redirect',
      name: 'redirect',
      component: Redirect,
    },
    {
      path: '/new-message',
      name: 'NewMessage',
      component: NewMessage,
      meta: {
        // title: 'Set in Block - Blockchain Message Reader',
        title: 'Set in Stone: A Permanent Record on the Blockchain - Set in Block',
        metaTags: [
          {
            name: 'description',
            content: 'Enter the message and "set in stone" it on the Ethereum blockchain. You will create a permanent record, which is message permanently recorded in the Ethereum blockchain.'
          },
          {
            property: 'og:description',
            content: 'Enter the message and "set in stone" it on the Ethereum blockchain. You will create a permanent record, which is message permanently recorded in the Ethereum blockchain.'
          }
        ],
      }
    },
    {
      path: '/:txHash',
      name: 'read2',
      component: Read,
      props: true,
      meta: {
        title: 'Set in Block - Everlasting Message',
      }
    }
    // {
    //   path: '/reader/:txHash',
    //   name: 'read',
    //   component: Read,
    //   props: true,
    //   meta: {
    //     title: 'Set in Block - Immutable message, permanently recorded on the blockchain',
    //   }
    // },
    // {
    //   path: '/intellectual-property-copyright-protection',
    //   name: 'msgIpProtection',
    //   component: Home,
    //   props: true,
    //   meta: {
    //     title: 'Set in Block - Intellectual Property and Copyright Protection',
    //     metaTags: [
    //       {
    //         name: 'description',
    //         content: 'You can create a proof of existence for your authentic work, e.g. design, musical composition, code, movie script or anything else that can be considered as intellectual property.'
    //       },
    //       {
    //         property: 'og:description',
    //         content: 'You can create a proof of existence for your authentic work, e.g. design, musical composition, code, movie script or anything else that can be considered as intellectual property.'
    //       }
    //     ]
    //   }
    // },
    // {
    //   path: '/permanent-text-message-on-the-blockchain',
    //   name: 'msgPlainText',
    //   component: Home,
    //   props: true,
    //   meta: {
    //     title: 'Set in Block - Write a permanent text message on the Ethereum blockchain',
    //     metaTags: [
    //       {
    //         name: 'description',
    //         content: 'A message you add to the Ethereum blockchain will stay there permanently.'
    //       },
    //       {
    //         property: 'og:description',
    //         content: 'A message you add to the Ethereum blockchain will stay there permanently.'
    //       }
    //     ]
    //   }
    // },
  ]
})
