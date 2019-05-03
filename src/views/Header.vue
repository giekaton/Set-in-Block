<template>
    <div class="header">
      aaaaaaaa
      <div class="header-inner">
        <router-link to="/">
          <div style="float:left;height:20px;width:20px;background-color:#767676;"></div>
          <div style="float:left;padding-left:7px;font-size:18px;font-family:'Arapey',serif;color:black;">Set in Block</div>
        </router-link>

        <!-- <div style="float:left;height:23px;width:23px;background-color:#767676;"></div>
        <div style="float:left;padding-left:8px;padding-top:1px;font-size:19px;font-family:'Arapey'">Set in Block</div> -->

        <div style="float:right;padding-top:2px;font-size:14px;" class="sans-serif">
          <router-link to="/new-message">New</router-link>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  props: [''],
  components: {
    
  },
  data: function() {
    return {

    }
  },
  mounted () {

  },
  methods: {

  }
}
</script>