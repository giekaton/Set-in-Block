<template>
  <div class="home">

    <div class="home-content">

      <New v-if="$route.name == 'new'" />

      <div class="centered" v-else-if="$route.name == 'home'">

        <div style="margin-bottom:60px;margin-top:-20px;">

          <div class="title-slogan">
            Set in Block Reader
          </div>

          <div style="height:5px;"></div>

          <span class="slogan2">Read permanent messages and NFTs set in the Ethereum blockchain</span>
          <!-- <span class="slogan2">Immutable and Everlasting Records in the Ethereum Blockchain Archive</span> -->
          <!-- <span class="slogan2">Read and Write Immutable and Everlasting Data in the Ethereum Blockchain</span> -->

        </div>

        <div class="content-block">
          <reader-component />
        </div>

        <div style="height:120px;"></div>

        <home-info />

      </div>

      <about v-if="$route.name == 'about'"/>

      <div v-if="$route.name == '404'" style="text-align:center;">
        <span style="font-size:28px;font-weight:bold;">404</span>
        <div style="height:15px;"></div>
        The page you were looking for does not exist.
      </div>

    </div>

  </div>
</template>

<script>

// import FileInput from '../components/FileInput.vue';
import ReaderComponent from '../components/ReaderInput.vue';
import About from './About.vue';
import HomeInfo from '../components/HomeInfo.vue';
import New from './New.vue';

export default {
  name: 'home',
  data: function() {
    return {
      txHash: '',
    }
  },
  components: {
    // FileInput,
    ReaderComponent,
    About,
    HomeInfo,
    New,
  },

  beforeMount () {
    
  },
  mounted () {
    window.scrollTo(0, 0);
  },
  rendered () {
    window.scrollTo(0, 0);
  },
  updated () {
    window.scrollTo(0, 0);
  },
  methods: {

    toTop: function() {
      window.scrollTo(0, 0);
    },

    fileData: function(el) {
      this.fileName = el.fileName;
      this.fileSize = el.fileSize;
      this.fileHash = el.fileHash;
    },
    
  }
}
</script>

<style>
  h1 {
    margin-top:20px;
    margin-bottom:7px;
    font-size:20px;
  }

  h3 {
    margin-top:10px;
    font-size:15px;
    text-align: center;
    font-weight:normal;
  }

  .home {
    max-width: 1032px;
    height: 100%;
    margin: 0 auto;
    margin-top: 20px;
  }

  /* .header {
    position:fixed;
    width: 100%;
    height:60px;
    top:0px;
    left: 0px;
    padding-top: 20px;
    border-bottom: 1px solid rgb(221, 221, 221);
    background-color:white;
  } */

  .header {
    position:sticky;
    /* margin: 0 auto; */
    z-index: 10;
    width: 100%;
    height:60px;
    top:0px;
    left: 0px;
    padding-top: 20px;
    border-bottom: 1px solid rgb(221, 221, 221);
    background-color:white;
  }

  .header-inner {
    max-width:1032px;
    margin:0 auto;
    padding:0 10px 0 10px;
  }

  @media only screen and (max-width: 600px) {
    .header-inner {
      padding:0 20px 0 20px;
    }
    .home {
      margin-top:0px;
    }
  }
  
  .title-slogan {
    font-size: 19px;
    font-weight:bold;
    line-height: 140%;
  }

  .slogan2 {
   font-size: 14px; 
  }

  .logo-div {
    width: 80px;
    margin: 0 auto;
    margin-top: 60px;
    margin-bottom: 10px;
  }

  .home-content {
    max-width: 740px;
    margin: 0 auto;
    clear:both;
    padding-top: 90px;
    padding-bottom: 80px;
    text-align: left;
    font-size: 14px;
    padding-left:20px;
    padding-right:20px;
  }

  .use-cases-container {
    padding: 20px;
    font-size:14px;
    line-height:150%;
  }

  @media screen and (max-width: 600px) {
    .use-cases-container {
      padding: 2px;
      padding-top:20px;
    }
  }

  /* @media only screen and (max-width: 370px) {
    .home-content {
      padding-top: 80px;
      padding-bottom: 60px;
    }
  } */

  /* @media only screen and (max-width: 330px) {
    .home-content {
      padding-top: 60px;
      padding-bottom: 40px;
    }
  } */

  .content-block {
    margin-top: -30px;
  }

  .centered {
    text-align: center;
  }

  .border-top {
    border-top: 1px solid rgb(179, 179, 179);
    padding-top: 15px;
  }

  button {
    font-size: 15px;
    padding: 4px 15px 4px 13px;
    margin-top: 5px;
    margin-bottom: 5px;
    background-color: rgb(99, 99, 99);
    border-color: rgb(140, 140, 140);
    color: white;
    cursor: pointer;
  }

  button:focus {
    outline:0;
  }

  button:hover {
    background-color: rgb(113, 113, 113);
  }

  .button {
    font-size: 15px;
    padding: 4px 15px 4px 13px;
    margin-top: 5px;
    margin-bottom: 5px;
    background-color: rgb(134, 134, 134);
    border-color: rgb(170, 170, 170);
    color: white;
    cursor: pointer;
  }

  .button:focus {
    outline:0;
  }

  .sb-button {
    display: inline-block;
    width: 180px;
    border: 1px solid rgb(137, 137, 137);
    padding: 3px;
    margin-bottom:15px;
    background-color: #f1f1f1;  
  }

  .sb-button a,
  .sb-button a:active, 
  .sb-button a:visited, 
  .sb-button a:hover {
    text-decoration:none!important;
    color:rgb(66, 66, 66)!important;
    font-weight:bold;
    font-size:13px;
  }

  .overflow-dots {
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .message-input {
    width:100%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    height:220px;
    resize: vertical;
    border-color:1px solid rgb(145, 145, 145);
    padding: 4px;
  }

  .feedback {
    margin-top: 14px;
  }

  .notice {
    font-size: 14px;
    color: rgb(255, 94, 0);
  }

  .underlined {
    border-bottom: 2px solid rgb(255, 94, 0);
  }

  .underlined:hover {
    border-bottom: 2px solid rgb(255, 94, 0);
    text-decoration: none;
  }

  /* 20 09 27 */

.row {
  position: relative;
  width: 100%;
  text-align: center;
}

.row .col {
  float: left;
  margin: 0.5rem 2%;
  min-height: 0.125rem;
  margin-top: 20px;
}

.row::after {
  content: "";
  display: table;
  clear: both;
}

.col {
  width: 96%;
}

@media only screen and (min-width: 720px) {
  .col {
    width: 29.33%;
  }
}

.home-info {
  line-height: 140%;
}

.button-wire {
  background-color: white;
  margin:5px;
  padding: 6px 16px 6px 16px;
  border: 1px solid #4289b9;
  color: #4289b9;
}

.button-wire:hover {
  color: white;
  border: 1px solid grey;
}
</style>