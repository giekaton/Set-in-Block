import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import NewMessage from './views/NewMessage.vue'
import Read from './views/Read.vue'
import Redirect from './views/Redirect.vue'
import IPProtection from './components/IPProtection.vue'


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
        title: 'Set in Block - Immutable and Indestructible Records in the Ethereum Blockchain Archive',
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
        title: 'Set in Block - Hidden Messages in the Ethereum, Proof-of-Existence',
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
        title: 'Set in Block - Record a New Permanent Message',
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
      path: '/intellectual-property-protection',
      name: 'IPProtection',
      component: IPProtection,
      meta: {
        title: 'Set in Block - Intellectual Property Protection with Blockchain',
        // metaTags: [
        //   {
        //     name: 'description',
        //     content: 'Enter the message and "set in stone" it on the Ethereum blockchain. You will create a permanent record, which is message permanently recorded in the Ethereum blockchain.'
        //   },
        //   {
        //     property: 'og:description',
        //     content: 'Enter the message and "set in stone" it on the Ethereum blockchain. You will create a permanent record, which is message permanently recorded in the Ethereum blockchain.'
        //   }
        // ],
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

    // Set in Block - Immutable and Indestructible Messages on the Blockchain
    // Set in Block - How to Read and Write Blockchain Messages
    // Set in Block - Immutable message, permanently recorded on the blockchain
    // Set in Block - Blockchain Message Reader


  ]
})
