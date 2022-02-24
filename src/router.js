import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

import NewMessage from './views/NewMessage.vue'
import MintNFT from './views/NewMintNFT.vue'
import CopyrightProtection from './views/NewCopyrightProtection.vue'
import CeaseAndDesistLetter from './views/CeaseAndDesistLetter.vue'

import Reader from './views/Reader.vue'

// import EthLogin from './components/EthLogin.vue'

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
        title: 'Set in Block - NFT Reader, Immutable Messages, Permanent Records',
        metaTags: [
          // {
          //   name: 'description',
          //   content: 'Write and read everlasting messages in the Ethereum blockchain. Make a permanent promise, create a proof of fact, protect content copyrights, mint NFTs.'
          // },
          {
            property: 'og:description',
            content: 'Write and read everlasting messages in the Ethereum blockchain. Make a permanent promise, create a proof of fact, protect content copyrights, mint NFTs.'
          }
        ]
      }
    },
    {
      path: '/about',
      name: 'about',
      component: Home,
      meta: {
        title: 'Web3 Decentralized Publishing and Content Protection Tools - Set in Block',
        metaTags: [
          {
            property: 'og:description',
            content: 'Immutable and Indestructible Proof of Existence on the Ethereum Blockchain. Create and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, protect copyrights, mint NFT tokens.'
          }
        ]
      }
    },
    {
      path: '/new',
      name: 'new',
      component: Home,
      meta: {
        title: 'Web3 Interfaces - Set in Block Writer',
      }
    },
    {
      path: '/new-message',
      name: 'NewMessage',
      component: NewMessage,
      meta: {
        title: 'Create New Permanent Record, Proof of Existence - Set in Block Writer',
        metaTags: [
          // {
          //   name: 'description',
          //   content: 'Create a new permanent, everlasting, indestructible blockchain record.'
          // },
          {
            property: 'og:description',
            content: 'Create a new permanent, everlasting, indestructible blockchain record.'
          }
        ],
      }
    },
    {
      path: '/copyright-protection',
      name: 'CopyrightProtection',
      component: CopyrightProtection,
      meta: {
        title: 'Decentralized Content Protection with Ethereum Blockchain - Set in Block Writer',
        metaTags: [
          // {
          //   name: 'description',
          //   content: 'Intellectual property protection on the Ethereum blockchain.'
          // },
          {
            property: 'og:description',
            content: 'Intellectual property protection on the Ethereum blockchain.'
          }
        ],
      }
    },
    {
      path: '/mint-nft',
      name: 'MintNFT',
      component: MintNFT,
      meta: {
        title: 'Mint a New Non-Fungible Token (NFT) - Set in Block Writer',
        metaTags: [
          // {
          //   name: 'description',
          //   content: 'Create a new non-fungible token on the Ethereum blockchain.'
          // },
          {
            property: 'og:description',
            content: 'Create a new non-fungible token on the Ethereum blockchain.'
          }
        ],
      }
    },
    {
      path: '/cease-and-desist-letter-template',
      name: 'CeaseAndDesistLetter',
      component: CeaseAndDesistLetter,
      meta: {
        title: 'Cease and Desist Letter Generator, Template - Set in Block',
      }
    },

    // {
    //   path: '/php-metamask-user-login',
    //   name: 'EthLogin',
    //   component: EthLogin,
    //   meta: {
    //     title: 'Sign-In With Ethereum - Passwordless User Authentication With PHP & MetaMask',
    //   }
    // },

    {
      path: '/msg/:txHash',
      name: 'readerMsg',
      component: Reader,
      props: true,
      meta: {
        title: 'Permanent Message - Set in Block Reader',
      }
    },
    {
      path: '/:net/msg/:txHash',
      name: 'readerNetworkMsg',
      component: Reader,
      props: true,
      meta: {
        title: 'Permanent Message - Set in Block Reader',
      }
    },
    {
      path: '/nft/:nftAddress/:nftId',
      name: 'readerNft',
      component: Reader,
      props: true,
      meta: {
        title: 'Non-Fungible Token (NFT) - Set in Block Reader',
      }
    },
    {
      path: '/:net/nft/:nftAddress/:nftId',
      name: 'readerNetworkNft',
      component: Reader,
      props: true,
      meta: {
        title: 'Non-Fungible Token (NFT) - Set in Block Reader',
      }
    },
    
    {
      path: '/:any',
      name: '404',
      component: Home,
      props: true,
      meta: {
        title: '404',
      }
    }


  ]
})
