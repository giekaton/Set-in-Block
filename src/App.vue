<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<style>
html {
  position: relative;
  min-height: 100%;
}

body {
  margin: 0 0 50px;
  font-family: 'Roboto', sans-serif;
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

#app {
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
