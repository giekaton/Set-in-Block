<template>
  <div class="reader" style="padding-left:20px;padding-right:20px;">
    
    <!-- New message -->
    <div style="max-width:620px;margin:0 auto;padding-top:50px;">

      <h1><b>Protect Content Copyright</b></h1>


      <br><br>

      <div style="text-align:left;font-size:13px;border:1px solid #cacaca;border-radius:5px;background-color:#f9f9f9;padding:20px;">
          Enter your work's name and description in the message field to record it in the Ethereum blockchain for permanent storage. You can also include first publication date and author's name.
          <br><br>
          Hash the work by selecting its file (.png, .js or other), and submit only the SHA-256 hash. Keep the original file in your archive.
          <br><br>
          Optionally, upload the file to IPFS and add its link in the message. See <a href="/0x2dc3fcc6a0a23e88a82def9c07248731d98e7178a9fd4cee9ca72fa7e1a28774" target="_blank">example</a>.
          <br><br>
          For more details see the <router-link to="/copyright-protection/faq">FAQ</router-link>. In case of copyright infringement, use our <router-link to="/copyright-protection/cease-and-desist-letter">cease and desist letter generator</router-link>.
          <br><br>
          <file-input style="font-size:14px;" v-on:file-data="fileData" />
      </div>

      <br><br><br>

      <h1>Your permanent message</h1>
      <div style="height:7px;"></div>
      <textarea class="message-input" v-model="messageInput"></textarea>

      <div style="float:left;margin-top:5px;text-align:left;line-height:18px;font-size:13px;width:200px;">
        <span >
          Message size: {{ bytesCalc }} bytes<br>
          Max tx fee: {{ txFeeCalc }} ETH
        </span>
      </div>

      <div style="float:left;margin-top:5px;text-align:left;line-height:17px;font-size:13px;">
        <span>
          Gas price: <input v-model="gasPrice" type="numeric" style="width:40px;padding-left:3px;height:18px;">
          <br>
          <a href="https://ethgasstation.info/" target="_blank" style="font-size:11px;">Gas Station</a>
        </span>
      </div>

      <br>

      <div class="set-controls">
        <button class="link-set" @click="set()">Set</button>
        <div class="link-preview" @click="content = true;">Preview</div>
      </div>

    </div>

    <div style="clear:both;height:70px;"></div>

    <!-- Feedback -->
    <div v-if="feedback != ''" v-html="feedback" class="feedback" style="text-align:center;font-weight:bold;"></div>

    <div v-if="feedback != ''" style="height:40px;"></div>

    <div style="height:40px;"></div>

    <!-- Preview -->
    <div v-if="content" class="reader-msg serif" style="min-height:55px;margin:0 auto;max-width:620px;box-shadow: #e9e9e9 0px 4px 8px 3px;">
      <div style="position:absolute;top:18px;right:45px;font-size:13px;color:red;" class="sans-serif">
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
        <div class="reader-tx-details sans-serif" style="line-height:18px;margin-bottom:20px;margin-top:10px;">
          The above message is stored permanently on the blockchain. It cannot be edited or deleted.<br>
          Message created: Timestamp (available after the message is recorded)
          Ethereum transaction hash: Unique transaction hash (available after the message is recorded)
        </div>
      </div>
    </div>
    
    <div v-if="content" style="height:40px;"></div>

    <div style="height:40px;"></div>

    <!-- <div class="reader-footer">
      <div class="width">
        <a href="https://github.com/giekaton/set-in-block" target="_blank" title="GitHub" class="sans-serif" style="margin-right:2px;color:#828282;">
          GitHub</a> | <a href="https://twitter.com/setinblock" target="_blank" style="color:#828282;">Twitter</a>
        <div style="float:right;" class="sans-serif">
          <router-link to="/about" style="color:#828282;">About</router-link>
        </div>
      </div>
    </div> -->
    
    <footer-component />

  </div>
</template>

<script>
import ReaderComponent from '../components/ReaderComponent.vue';
import FileInput from '../components/FileInput.vue';
import FooterComponent from '../components/Footer.vue';

export default {
  props: ['txHash'],
  
  components: {
    ReaderComponent,
    FileInput,
    FooterComponent
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
      url: '',
      msgType: 'msgPlainText',
      fileName: 'Waiting for the file',
      fileSize: 0,
      fileHash: 'Waiting for the file',
      feedback: '',
      content: false,
      gasPrice: 3
    }
  },

  computed: {
    bytesCalc: function () {
      return encodeURI(this.messageInput).split(/%..|./).length - 1;
    },
    txFeeCalc: function () {
      return (((this.bytesCalc * 68) + 30000) * this.gasPrice) / 1000000000;
    },
    bytesCalcIp: function () {
      return encodeURI(this.messageInputIp).split(/%..|./).length - 1;
    },
    txFeeCalcIp: function () {
      return (((this.bytesCalcIp * 68) + 30000) * this.gasPrice) / 1000000000;
    },
    gasPriceReal: function() {
      return(this.gasPrice * 1000000000);
    }
  },

  mounted () {
    document.getElementById('splashScreen').style.display = 'none';
    window.scrollTo(0, 0);
  },

  methods: {
    fileData: function (data) {
      this.messageInput += '\n\nFile: '+data.fileName+' ('+data.fileSize+' bytes)\nSHA-256 #: '+data.fileHash;
    },
    set: async function() {
      try {
        this.setGo();
      } catch (error) {
        console.log(error);
        self.feedback = '<span class="notice">To broadcast the message, first log in to your MetaMask wallet.</span>';
        return;
      }
    },
    setGo: async function () {
      if (typeof window.web3 === 'undefined') {
        this.feedback = '<span class="notice">To broadcast messages, first install the <b><a href="https://metamask.io/" target="_blank" class="notice underlined">MetaMask</a></b> browser extension.</span>';
        return;
      }
      
      this.feedback = '<span class="notice-good">Confirm the transaction in the MetaMask popup window.</span>';

      let handleReceipt = (error, receipt) => {
        if (error) console.error(error);
        else {
          this.url = '/'+receipt;
          this.feedback = 'Message recorded<br><span style="cursor:text;font-size:12px;">Transaction hash: '+ receipt +'</span><br><br>Read the message on Set in Block<br><a href="'+this.url+'" style="font-size:12px;" target="_blank">https://setinblock.com/'+receipt+'</a><br><br><br>';
        }
      }

      let message = this.messageInput;
      
      var accountsOnEnable = await ethereum.request({method: 'eth_requestAccounts'});
      let sender = accountsOnEnable[0];

      message = this.rstr2utf8(message);
      message = this.str2hex(message);
      web3.eth.sendTransaction({
        from: sender,
        to: address,
        value: 0,
        gas: gasCount(message) + 30000,
        gasPrice: this.gasPriceReal,
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

.link-preview {
  float:right;
  margin-right:19px;
  margin-top:13px;
  font-size:12px;
  text-decoration: none;
  color: #4289b9;
  cursor: pointer;
}

.link-set {
  float:right;
}

.set-controls {
  width:140px;
  float:right;
}

@media only screen and (max-width: 440px) {
  .set-controls {
    clear:both;
    float:left;
    max-width: 100%;
  }

  .link-preview {
    float:left;
    margin-right:0px;
    margin-left: 10px;
    padding-top: 10px;
  }

  .link-set {
    clear:both;
    float:left;
    margin-top: 15px;
  }


}

</style>