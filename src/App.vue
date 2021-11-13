<template>
  <div id="app">
    <header-component />

    <router-view class="router-content"></router-view>

    <footer-component />

  </div>
</template>

<script>
import FooterComponent from './partials/Footer.vue';
import HeaderComponent from './partials/Header.vue';

export default {
  props: [''],
  components: {
    FooterComponent,
    HeaderComponent,
  },
  data: function() {
    return {

    }
  },
  mounted () {
    document.getElementById('splashScreen').style.display = 'none';
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
  /* font-family: 'Noto', sans-serif; */
  font-family: Arial, Helvetica, sans-serif;
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
