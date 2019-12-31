<template>
  <div id="app">
    <div class="header">

      <div class="header-inner">
        <router-link to="/" >
          <div @click="content = false" >
            <div style="float:left;height:24px;width:24px;margin-top:-1px;">
              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 343.42 343.42"><title>logo</title><polygon points="0 0 343.42 0 343.42 343.42 0 343.42 0 0 0 0" style="fill:#424242;fill-rule:evenodd"/><polygon points="49.99 69.14 168.5 69.14 168.5 96.07 49.99 96.07 49.99 69.14 49.99 69.14" style="fill:#fff;fill-rule:evenodd"/><polygon points="49.99 157.98 111.94 157.98 111.94 184.91 49.99 184.91 49.99 157.98 49.99 157.98" style="fill:#fff;fill-rule:evenodd"/><polygon points="49.99 247.35 231.4 247.35 231.4 274.28 49.99 274.28 49.99 247.35 49.99 247.35" style="fill:#fff;fill-rule:evenodd"/></svg>
            </div>
            <div style="float:left;padding-left:10px;padding-top:1px;font-size:18px;font-family:'Arapey',serif;color:black;">Set in Block</div>
          </div>
        </router-link>

        <!-- <div style="float:left;height:23px;width:23px;background-color:#767676;"></div>
        <div style="float:left;padding-left:8px;padding-top:1px;font-size:19px;font-family:'Arapey'">Set in Block</div> -->

        <div v-if="$route.name == 'read2'" style="float:left;padding-left:6px;font-size:9px;padding-top:3px;color:#bebebe;" class="sans-serif">Reader</div>

        <div style="float:right;font-size:14px;" class="sans-serif">
          <button @click="routerNewMsg()" style="margin-top:-3px;padding-top:2px;padding-bottom:2px;">New</button>
          <!-- <router-link v-if="$route.name == 'home'" to="/new-message">New</router-link> -->
          <!-- <router-link v-else to="/"><span @click="content = false">Home</span></router-link> -->
        </div>
      </div>
    </div>

    <router-view class="router-content"></router-view>

  </div>
</template>

<script>
// import Header from './views/Header.vue';
export default {
  props: [''],
  components: {
    // Header
  },
  data: function() {
    return {
      content: false
    }
  },
  mounted () {

  },
  methods: {
    routerNewMsg: function() {
      this.$router.push({ path: '/new-message/' })
    }
  }
}
</script>

<style>
html {
  position: relative;
  min-height: 100%;
}

body {
  margin: 0 0 50px;
  font-family: 'Noto', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #181818;
}

* {
  box-sizing: border-box;
}

a {
  text-decoration: none;
  color: #4289b9;
  /* color: black; */
  /* color: #42b983; Vue style */
  /* color: #18b1ab; */
}

a:hover {
  /* border-bottom: 1px solid #4289b9; */
  text-decoration:underline;
}

.link {
  text-decoration: none;
  color: #4289b9;
  cursor: pointer;
}

.link:hover {
  text-decoration:underline;
  /* border-bottom: 1px solid #4289b9; */
}

.mono {
  font-family: "SF Mono", "Monaco", "Andale Mono", "Lucida Console", "Bitstream Vera Sans Mono", "Courier New", Courier, monospace!important;
  font-size: 13px!important;
}

.router-content {
  margin-left: 20px;
  margin-right: 20px;
}

h1 {
  font-size: 19px;
  font-weight: bold;
  text-align: center;
}

h2 {
  font-size: 18px;
  font-weight: bold;
  text-align: left;
  margin-bottom: 24px;
}

h3 {
  font-size: 17px;
  font-weight: bold;
  text-align: left;
  margin-bottom: 20px;
}
</style>
