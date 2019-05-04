<template>
  <div id="app">
    <div class="header">

      <div class="header-inner">
        <router-link to="/" >
          <div @click="content = false">
            <div style="float:left;height:20px;width:20px;background-color:#767676;"></div>
            <div style="float:left;padding-left:7px;font-size:18px;font-family:'Arapey',serif;color:black;">Set in Block</div>
          </div>
        </router-link>

        <div v-if="$route.name == 'read2'" style="float:left;padding-left:6px;font-size:9px;padding-top:3px;color:#bebebe;" class="sans-serif">Reader</div>

        <!-- <div style="float:left;height:23px;width:23px;background-color:#767676;"></div>
        <div style="float:left;padding-left:8px;padding-top:1px;font-size:19px;font-family:'Arapey'">Set in Block</div> -->

        <div style="float:right;padding-top:2px;font-size:14px;" class="sans-serif">
          <router-link v-if="$route.name == 'home'" to="/new-message">New</router-link>
          <router-link v-else to="/"><span @click="content = false">Home</span></router-link>
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
  border-bottom: 1px solid #4289b9;
}

.link {
  text-decoration: none;
  color: #4289b9;
  cursor: pointer;
}

.link:hover {
  border-bottom: 1px solid #4289b9;
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
