import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

import NewMessage from './views/NewMessage.vue'
import CopyrightProtection from './views/CopyrightProtection.vue'
import MintNFT from './views/MintNFT.vue'

import Read from './views/Read.vue'
import IPProtection from './components/IPProtection.vue'
import CeaseAndDesistLetter from './components/CeaseAndDesistLetter.vue'

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
      path: '/new',
      name: 'new',
      component: Home,
      meta: {
        title: 'Create New Permanent Record - Set in Block',
      }
    },
    {
      path: '/new-message',
      name: 'NewMessage',
      component: NewMessage,
      meta: {
        title: 'New Permanent Message - Set in Block',
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
      path: '/copyright-protection',
      name: 'CopyrightProtection',
      component: CopyrightProtection,
      meta: {
        title: 'Protect Content Copyright with Blockchain - Set in Block',
      }
    },
    {
      path: '/mint-nft',
      name: 'MintNFT',
      component: MintNFT,
      meta: {
        title: 'Mint New NFT Token - Set in Block',
        metaTags: [
          {
            name: 'description',
            content: 'Create a new non-fungible token'
          },
          {
            property: 'og:description',
            content: 'Create a new non-fungible token'
          }
        ],
      }
    },
    {
      path: '/copyright-protection/cease-and-desist-letter',
      name: 'CeaseAndDesistLetter',
      component: CeaseAndDesistLetter,
      meta: {
        title: 'Set in Block - Cease and Desist Letter Generator',
      }
    },
    {
      path: '/copyright-protection/faq',
      name: 'IPProtection',
      component: IPProtection,
      meta: {
        title: 'Set in Block - Intellectual Property Protection with Blockchain',
      }
    },
    {
      path: '/:txHash',
      name: 'reader',
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
