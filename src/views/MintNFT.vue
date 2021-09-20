<template>
  <div class="reader" style="padding-left:20px;padding-right:20px;">
    
    <!-- New message -->
    <div style="max-width:620px;margin:0 auto;padding-top:50px;">

      <h1><b>Mint NFT</b></h1>

      <br><br>

      <div style="text-align:left;font-size:13px;border:1px solid #cacaca;border-radius:5px;background-color:#f9f9f9;padding:20px;">
        NFT minting is coming soon.
      </div>

    </div>

    <div style="clear:both;height:70px;"></div>

    <div style="height:40px;"></div>
    
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

      // Modern dapp browsers...
      if (window.ethereum) {
        window.web3 = new Web3(ethereum);
        try {
          const accounts = await ethereum.enable();
          web3.currentProvider.publicConfigStore._state.selectedAddress = accounts[0];
          this.setGo();
        } catch (error) {
          console.log(error);
          self.feedback = '<span class="notice">To broadcast the message, first log in to your MetaMask wallet.</span>';
          return;
        }
      }
      // Legacy dapp browsers...
      else if (window.web3) {
          window.web3 = new Web3(web3.currentProvider);
          this.setGo();
      }
      // Non-dapp browsers...
      else {
        self.feedback = '<span class="notice">To broadcast the message, first install <b><a href="https://metamask.io/" target="_blank" class="notice underlined">MetaMask</a></b> browser extension.</span>';
        return;
      }


    },

    setGo: function () {
      // if (typeof window.web3 === 'undefined') {
      //   this.feedback = '<span class="notice">To broadcast messages, first install <b><a href="https://metamask.io/" target="_blank" class="notice underlined">MetaMask</a></b> browser extension.</span>';
      //   return;
      // }
      // else if (typeof web3.currentProvider.publicConfigStore._state.selectedAddress === 'undefined') {
      //   this.feedback = '<span class="notice">To broadcast the message, first log in to your MetaMask wallet.</span>';
      //   return;
      // }
      
      this.feedback = '<span class="notice-good">Confirm the transaction in the MetaMask popup window.</span>';

      let handleReceipt = (error, receipt) => {
        if (error) console.error(error);
        else {
          this.url = '/'+receipt;
          this.feedback = 'Message recorded<br><span style="cursor:text;font-size:12px;">Transaction hash: '+ receipt +'</span><br><br>Read the message on Set in Block<br><a href="'+this.url+'" style="font-size:12px;" target="_blank">https://setinblock.com/'+receipt+'</a><br><br><br>';
        }
      }

      let message = this.messageInput;
      
      message = this.rstr2utf8(message);
      message = this.str2hex(message);
      web3.eth.sendTransaction({
        from: web3.currentProvider.publicConfigStore._state.selectedAddress,
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