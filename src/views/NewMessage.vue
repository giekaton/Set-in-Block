<template>
  <div class="reader" style="padding-left:20px;padding-right:20px;">
    
    <!-- New message -->
    <div style="max-width:620px;margin:0 auto;margin-top:100px;">
      <h1 style="font-size:14px;margin-bottom:30px;">To create a new permanent record, enter a message and "set in stone" it on the blockchain</h1>

      <textarea class="message-input" v-model="messageInput"></textarea>

      <div style="float:left;margin-top:5px;text-align:left;line-height:18px;font-size:13px;">
        <span >
          Message size: {{ bytesCalc }} bytes<br>
          Max tx fee: {{ txFeeCalc }} ETH
        </span>
      </div>
      <br>

      <div style="width:180px;float:right;">
        <button style="float:right;" @click="set()">Set</button>
        <div class="link" style="float:right;margin-right:20px;margin-top:13px;font-size:12px;" @click="content = true;">Preview</div>
      </div>

    </div>

    <!-- Feedback -->
    <div v-if="feedback != ''" v-html="feedback" class="feedback" style="text-align:center;padding-top:100px;margin-bottom:-50px;"></div>

    <!-- Preview -->
    <div v-if="content" class="reader-msg serif" style="min-height:55px;margin:0 auto;max-width:620px;margin-top:140px;margin-bottom:100px;box-shadow: #e9e9e9 0px 4px 8px 3px;">  
      <div style="position:absolute;top:3px;right:45px;font-size:13px;color:red;" class="sans-serif">
        Message preview
      </div>
      <div style="position:absolute;top:11px;right:13px;cursor:pointer;font-size:20px;" @click="content = false">✕</div>
      <span v-if="msgType == 'msgPlainText'">
        {{ messageInput }}
      </span>
      <span v-if="msgType == 'msgIpProtection'">
        {{ messageInputIp }}                
      </span>
      <div v-if="message != 'Message is not available. Try a different tx hash.'">
        <div style="border-top:1px solid #cccccc;width:100%;margin-top:50px;padding-top:0px;"></div>
        <div class="reader-tx-details sans-serif" style="line-height:18px;margin-bottom:20px;margin-top:-7px;">
          The above message is stored permanently on the blockchain. It cannot be edited or deleted.<br>
          Message created: Timestamp (available after the message is recorded)
          Ethereum transaction hash: Unique transaction hash (available after the message is recorded)
        </div>
      </div>
      <div v-else style="height:40px;"></div>
    </div>

    <div v-else style="clear:both;display:block;height:100px;"></div>
    
    <div class="reader-footer">
      <div class="width">
        <a href="https://github.com/giekaton/set-in-block" target="_blank" title="GitHub" class="sans-serif" style="margin-right:2px;color:#828282;">
          Set in Block v0.8</a>
        <div style="float:right;" class="sans-serif">
          <router-link to="/about" style="color:#828282;">
            About
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
      message: '',
      messageInput: '',
      feedback: '',
      url: '',
      msgType: 'msgPlainText',
      fileName: 'Waiting for the file',
      fileSize: 0,
      fileHash: 'Waiting for the file',
      feedback: '',
      content: false
    }
  },

  computed: {
    bytesCalc: function () {
      return encodeURI(this.messageInput).split(/%..|./).length - 1;
    },
    txFeeCalc: function () {
      return (((this.bytesCalc * 68) + 30000) * 3) / 1000000000;
    },
    bytesCalcIp: function () {
      return encodeURI(this.messageInputIp).split(/%..|./).length - 1;
    },
    txFeeCalcIp: function () {
      return (((this.bytesCalcIp * 68) + 30000) * 3) / 1000000000;
    },
  },

  mounted () {
    document.getElementById('splashScreen').style.display = 'none';
    window.scrollTo(0, 0);
  },

  methods: {
    set: function () {
      if (typeof window.web3 === 'undefined') {
        this.feedback = '<span class="notice">To broadcast messages, first install <b><a href="https://metamask.io/" target="_blank" class="notice underlined">MetaMask</a></b> browser extension.</span>';
        return;
      }
      else if (typeof web3.currentProvider.publicConfigStore._state.selectedAddress === 'undefined') {
        this.feedback = '<span class="notice">To broadcast the message, first log in to your MetaMask wallet.</span>';
        return;
      }
      
      this.feedback = '<span class="notice-good">Confirm the transaction in the MetaMask popup window.</span>';

      let handleReceipt = (error, receipt) => {
        if (error) console.error(error);
        else {
          this.url = '/'+receipt;
          this.feedback = 'Message recorded<br><span style="cursor:text;font-size:12px;">Transaction hash: '+ receipt +'</span><br><br>Read the message on Set in Block<br><a href="'+this.url+'" style="font-size:12px;" target="_blank">https://setinblock.com/'+receipt+'</a><br><br><br><br><br><br>';
        }
      }

      let message = this.messageInput;
      
      message = this.rstr2utf8(message);
      message = this.str2hex(message);
      eth.sendTransaction({
        from: web3.currentProvider.publicConfigStore._state.selectedAddress,
        to: address,
        value: 0,
        gas: gasCount(message) + 30000,
        gasPrice: 3000000000,
        data: message,
      }, handleReceipt);
    },

    // Converts a raw javascript string into a string of single byte characters using utf8 encoding.
    // This makes it easier to perform other encoding operations on the string.
    // rstr2utf8: function(input) {
    //   let output = "";
    //   for (let n = 0; n < input.length; n++) {
    //     let c = input.charCodeAt(n);
    //     if (c < 128) {
    //         output += String.fromCharCode(c);
    //     } else if ((c > 127) && (c < 2048)) {
    //         output += String.fromCharCode((c >> 6) | 192);
    //         output += String.fromCharCode((c & 63) | 128);
    //     } else {
    //         output += String.fromCharCode((c >> 12) | 224);
    //         output += String.fromCharCode(((c >> 6) & 63) | 128);
    //         output += String.fromCharCode((c & 63) | 128);
    //     }
    //   }
    //   return output;
    // },

    rstr2utf8: function(input) {
      return unescape( encodeURIComponent( input ) );
    },

    str2hex: function(str) {
      let output = "";
      for (let i = 0; i < str.length; i++) {
        output += this.strlpad(str.charCodeAt(i).toString(16), "0", 2).toUpperCase();
      }
      return output;
    },

    strlpad: function(str, pad, len) {
      while (str.length < len) {
        str = pad + str;
      }
      return str;
    }
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
  padding-left: 20px;
  padding-right: 20px;
}

</style>