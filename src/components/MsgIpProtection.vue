<template>
  <div><div>
    <br><br>
                You can create a proof of existence for your authentic work, e.g. design, musical composition, code, movie script or anything else that can be considered as intellectual property and falls under copyright protection law.
                <br><br>
                The best practice is to mention the ID of the authentic work in the Set in Block message. The ID is unique to that work and being written on the blockchain, it mathematically proves that the work existed at the time of the Set in Block message creation. You can also mention the authorship, ownership. For more details, see this blog post.
                <br><br>
                Select a file to generate its ID. It will not be uploaded to the internet or the blockchain, only the file ID with meta information will be generated locally. Keep the copy of the original file in your archive.
                <br><br>
                <div style="padding:10px;background-color:#f1f1f1;border:3px solid #e0e0e0;border-radius:5px;width:auto;">Click to select or drag and drop a file...</div>
                <br>
                <div style="padding-left: 15px;margin-top:-5px;">
                  File name: logo.eps
                  <br>
                  File size: 13254 kb
                  <br>
                  SHA-256 hash: a6sd54a6s5a4e6as5e4a6s51ada6s5d6aa6sd54a6s5a4e6as5e4a6s51ada6s5d6a
                </div>
                <br>
                Below is provided an example template, used for this example message. You can modify it to your needs.
              </span>
            </div>

            <textarea v-if="msgType == 'msgPlainText'" class="message-input" v-model="messageInput"></textarea>
            <textarea v-if="msgType == 'msgIpProtection'" class="message-input" v-model="messageInputIp"></textarea>

            <div style="float:left;margin-top:5px;text-align:left;line-height:18px;font-size:13px;">
              Message size: {{ bytesCalc }} bytes<br>
              Estimated tx fee: {{ txFeeCalc }} ETH
            </div>
            <br>

            <button style="float:right;" @click="set">SET</button>
  </div>
</template>

<script>
export default {
  name: 'MsgIpProtection',
  data: function() {
    return {

    }
  },
  methods: {
    
  }
}
</script>


<style>
 
</style>
