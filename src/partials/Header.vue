<template>
    <div class="header">

      <div class="header-inner">
        <div style="cursor:pointer;">
          <router-link to="/" onclick="window.scrollTo(0, 0);">
            <div style="float:left;height:24px;width:24px;margin-top:-1px;">
              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 343.42 343.42"><title>logo</title><polygon points="0 0 343.42 0 343.42 343.42 0 343.42 0 0 0 0" style="fill:#424242;fill-rule:evenodd"/><polygon points="49.99 69.14 168.5 69.14 168.5 96.07 49.99 96.07 49.99 69.14 49.99 69.14" style="fill:#fff;fill-rule:evenodd"/><polygon points="49.99 157.98 111.94 157.98 111.94 184.91 49.99 184.91 49.99 157.98 49.99 157.98" style="fill:#fff;fill-rule:evenodd"/><polygon points="49.99 247.35 231.4 247.35 231.4 274.28 49.99 274.28 49.99 247.35 49.99 247.35" style="fill:#fff;fill-rule:evenodd"/></svg>
            </div>
            <div class="logo-text" style="float:left;padding-left:10px;padding-top:1px;font-size:18px;font-family:'Arapey',serif;color:black;">Set in Block</div>
          </router-link>
        </div>

        <div class="logo-text sans-serif" 
          v-if="$route.name == 'readerMsg' || $route.name == 'readerNetworkMsg' || $route.name == 'readerNft' || $route.name == 'readerNetworkNft'" 
          style="float:left;padding-left:6px;font-size:9px;padding-top:3px;color:#bebebe;">
            Reader
        </div>

        <div class="logo-text sans-serif" 
          v-if="$route.name == 'MintNFT' || $route.name == 'CopyrightProtection' || $route.name == 'new' || $route.name == 'NewMessage'" 
          style="float:left;padding-left:6px;font-size:9px;padding-top:3px;color:#bebebe;">
            Writer
        </div>

        <div style="float:right;font-size:14px;" class="sans-serif">
          <router-link to="/new"><button style="margin-top:-2px;padding-top:2px;padding-bottom:2px;">New</button></router-link>
        </div>        
        
        <!-- <div @click="phpMM()" class="link-login">
          <svg version="1.1" viewBox="0 0 25.314 25.248" xmlns="http://www.w3.org/2000/svg" data-v-9035a58c=""><path class="svg-button" d="m3.7034 3.6939c2.3722-2.3661 5.5952-3.6939 8.9483-3.6939 6.9965 0 12.662 5.6507 12.662 12.619 0 4.3728-2.2321 8.2264-5.6152 10.493h-0.01001c-1.2412-0.88853-2.6725-1.4576-4.1539-1.797-0.57053-0.12979-1.1511-0.22962-1.7316-0.27954v-1.5974c3.3131-0.54909 5.8354-3.4144 5.8354-6.8687 0-3.8536-3.1229-6.9685-6.9865-6.9685-3.8536 0-6.9765 3.1149-6.9765 6.9685 0 3.4543 2.5223 6.3196 5.8354 6.8687v1.5974c-0.58054 0.04992-1.1611 0.13977-1.7316 0.26956-1.4914 0.34942-2.9027 0.95842-4.1639 1.807-0.68063-0.45924-1.3212-0.97838-1.9118-1.5674-2.3722-2.3661-3.7034-5.5708-3.7034-8.9253 0-3.3445 1.3312-6.5592 3.7034-8.9153zm9.0784 21.554h-0.13012-0.16015 0.17016 0.12011z" data-v-9035a58c=""></path></svg>
        </div> -->

        <router-link class="link-about" to="/about">About</router-link>

        <!-- <router-link style="float:right;margin-right:15px;margin-top:-5px;" to="/about"><button style="margin-top:3px;height:26px;width:26px;">?</button></router-link> -->
        
      </div>
    </div>
</template>

<script>
export default {
  data: function() {
    return {

    }
  },
  methods: {
    phpMM: function() {
      this.$router.push('/php-metamask-user-login');
      userLoginOut();
    }
  }
}
</script>

<style scoped>

.link-login {
  width:25px;float:right;margin-right:40px;cursor:pointer;
}

.link-about {
  float:right;margin-right:45px;font-size:14.5px;padding-top:4px;
}

@media screen and (max-width: 500px) {
  .link-about {
    margin-right:30px;
  }
  .link-login {
    margin-right:30px;
  }
}

@media screen and (max-width: 350px) {
  .logo-text {
    display: none;
  }
  .link-about {
    margin-right:25px;
  }
  .link-login {
    margin-right:25px;
  }
}

.svg-button {
    /* fill: #6a6b6c; */
    fill: #5d5e5e;
    fill-rule: evenodd;
    cursor: pointer;
    transition: fill 0.2s ease;
}
</style>