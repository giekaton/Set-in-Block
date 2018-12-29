<template>
  <div class="reader">

    <!-- Header -->
    <div style="float:left;height:20px;width:20px;background-color:#767676;"></div>
    <div style="float:left;padding-left:7px;font-size:18px;font-family:'Arapey',serif;color:black;" class="serif">Set in Block</div>
    <div style="float:left;padding-left:6px;font-size:9px;padding-top:3px;color:#bebebe;" class="sans-serif">Reader</div>
    <div style="float:right;padding-top:2px;font-size:14px;" class="sans-serif"><router-link to="/">New message</router-link></div>
    
    <div class="reader-content">
      <reader-component style="margin-top:30px;"></reader-component>
    </div>

    <div class="reader-footer">
      <div class="width">
        <a href="https://github.com/giekaton/set-in-block" target="_blank" title="GitHub" class="sans-serif" style="margin-right:2px;color:#828282;">
          Set in Block v0.7</a>
        <div style="float:right;" class="sans-serif">
          <router-link to="/" style="color:#828282;">
            Home
          </router-link>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import ReaderComponent from '../components/ReaderComponent.vue';

export default {
  props: ['txHash'],
  name: 'home',
  components: {
    ReaderComponent
  },
  data: function() {
    return {
      tempstr: 'Loading...',
      output: '',
      decoded: '',
      blockNumber: '',
      timestamp: 'Loading...',
    }
  },
  mounted () {
    document.getElementById('splashScreen').style.display = 'none';
    window.scrollTo(0, 0);
  },
  methods: {
    
  }
}
</script>

<style>

.reader {
  max-width: 1032px;
  height: 100%;
  margin: 0 auto;
  margin-top: 20px;
}

.reader-content {
  max-width: 700px;
  margin: 0 auto;
  clear:both;
  padding-top: 70px;
  font-size: 19px;
  padding-bottom: 120px;
}

</style>