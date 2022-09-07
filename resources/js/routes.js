import Home from './components/Home.vue';

import Reader from './components/Reader.vue'
import About from './components/About.vue'
import New from './components/New.vue'

export default {
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
      meta: {
        title: 'Set in Block - NFT Reader, Immutable Messages, Permanent Records',
        metaTags: [
          {
            property: 'og:description',
            content: 'Write and read immutable messages in the Ethereum blockchain. Make a permanent promise, create a proof of existence, protect content copyrights.'
          }
        ]
      }
    },
    {
      path: '/about',
      name: 'about',
      component: About,
      meta: {
        title: 'Decentralized Web3 Publishing and Blockchain-based Content Protection - Set in Block',
        metaTags: [
          {
            property: 'og:description',
            content: 'Write and read everlasting Web3 messages on the Ethereum blockchain. Create immutable and indestructible proof of existence.'
          }
        ]
      }
    },
    {
      path: '/new',
      name: 'new',
      component: New,
      meta: {
        title: 'New Permanent Record, Copyright Protection with Ethereum - Set in Block',
        metaTags: [
          {
            property: 'og:description',
            content: 'Create new permanent message. Intellectual property protection with the Ethereum blockchain.'
          }
        ]
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
};