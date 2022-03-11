/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
window.marked = require('marked');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// window.axios.defaults.baseURL = 'http://ma-nft-laravel.local/';


import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes.js';

const router = createRouter({
  history: createWebHistory(),
  routes: routes.routes,
});

router.beforeEach((to, from, next) => {
  if (to.name == 'readerNft' || to.name == 'readerNetworkNft') {
    let nftInstanceData = '';
    if (nftData != '') {
      nftInstanceData = JSON.parse(nftData);
      // console.log(nftInstanceData)
      // console.log(to.params.nftId)
      if (nftInstanceData['token_id'] != to.params.nftId) { 
        nftData = '';
        nftInstanceData = '';
      }
    }
    // console.log(nftInstanceData);
    if (nftInstanceData['name'] != null) {
      document.title = "NFT: " + nftInstanceData['name'] + " | ID: " + nftInstanceData['token_id'] + " - Set in Block";
    }
    else {
      document.title = "NFT ID: " + to.params.nftId + " - Set in Block";
    }
  }
  else if (to.name == 'readerMsg' || to.name == 'readerNetworkMsg') {
    let msgInstanceData = '';
    if (msgData != '') {
      msgInstanceData = msgData;
      // console.log(nftInstanceData)
      // console.log(to.params.nftId)
      if (msgInstanceData['hash'] != to.params.msgHash) {
        msgData = '';
        msgInstanceData = '';
      }
    }

    document.title = "Permanent record: " + to.params.txHash;
  }
  else {
    document.title = to.meta.title;
  }
  next()
})
 
import { createApp } from 'vue'
import App from './App.vue'

createApp(App).use(router).mount('#app')