import Home from './components/Home.vue';

import NewMessage from './components/NewMessage.vue'
import MintNFT from './components/NewMintNFT.vue'
import CopyrightProtection from './components/NewCopyrightProtection.vue'
import CeaseAndDesistLetter from './components/CeaseAndDesistLetter.vue'
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
            content: 'Write and read everlasting messages in the Ethereum blockchain. Make a permanent promise, create a proof of fact, protect content copyrights, mint NFTs.'
          }
        ]
      }
    },
    {
      path: '/about',
      name: 'about',
      component: About,
      meta: {
        title: 'Decentralized Publishing and Content Protection Tools - Set in Block',
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
      component: New,
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
        title: 'Mint a New Non-Fungible Token (NFT) ERC-721 - Set in Block Writer',
        metaTags: [
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
};