<template>
  <div >
    
    <!-- New message -->
    <div style="max-width:620px;margin:0 auto;">

      <h1>Create a New Permanent Message</h1>


      <br><br>

      <div style="text-align:left;font-size:13px;border:1px solid #cacaca;border-radius:5px;background-color:#f9f9f9;padding:20px;">
          Enter a message and record it in the Ethereum blockchain for permanent storage.
          <br><br>
          Set in Block message submission interface only encodes and prepares the message. After the Set button is pressed, you will be asked to confirm the transaction with your <a href="https://metamask.io/" target="_blank">MetaMask</a> wallet and by doing this, create a permanent record.
          <br><br>
          The message you enter will be encoded into a hexadecimal format and then included in the data field of the Ethereum blockchain transaction.
          <br><br>
          The value of your prepared transaction is 0. The longer is your message, the bigger is the transaction fee. Gas Limit is calculated automatically, according to the size of your message. The gas price is set to {{gasPrice}} Gwei, but you can change it, depending on the network conditions.
          <br><br>
          We never see your private key or any other personal data, as the transaction is broadcast on the client-side, through the MetaMask extension. You can inspect 
          the code of our website by looking into its source and visiting its <a href="https://github.com/giekaton/set-in-block" target="_blank">GitHub</a> repository.
          <br><br>
          For privacy reasons, every new Set in Block message is sent to a randomly generated Ethereum address.
          <br><br>
          After the message is recorded in the blockchain, it is no longer possible to change or delete it. Your message, recorded in the blockchain, is immutable and incorruptible - no one can delete or modify it. It also never expires - it's a permanent record. 
          <br><br>
          By having a message recorded on the blockchain, you have a mathematically-based proof of existence that your message is authentic, and that it existed prior to a 
          specific date.
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

    <div style="clear:both;height:30px;"></div>

    <!-- Feedback -->
    <div v-if="feedback != ''" v-html="feedback" class="feedback" style="text-align:center;font-weight:bold;"></div>

    <div style="height:30px;"></div>

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

  </div>
</template>

<script>

export default {
  props: ['txHash'],
  
  components: {

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
      gasPrice: 30
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
      document.getElementsByClassName('web3modal-modal-lightbox')[0].style.display = 'block';

      await onConnectLoadWeb3Modal();

      if (web3ModalProv) {
        window.web3 = web3ModalProv;
        try {
          this.setGo();
        } catch (error) {
          console.log(error);
          this.feedback = '<span class="notice">To broadcast the message, first log in to your MetaMask wallet.</span>';
          return;
        }
      }
      else {
        this.feedback = '<span class="notice">To broadcast the message, first install <b><a href="https://metamask.io/" target="_blank" class="notice underlined">MetaMask</a></b> browser extension.</span>';
        return;
      }
    },

    setGo: async function () {  
      this.feedback = '<span class="notice-good">Confirm the transaction in the MetaMask popup window.</span>';

      let handleReceipt = (receipt) => {
        this.url = '/msg/'+receipt;
        this.feedback = 'Message recorded<br><span style="cursor:text;font-size:12px;">Transaction hash: '+ receipt +'</span><br><br>Read the message on Set in Block<br><a href="'+this.url+'" style="font-size:12px;" target="_blank">https://setinblock.com/msg/'+receipt+'</a><br><br><br>';
      }

      let message = this.messageInput;

      let accountsOnEnable = await web3.eth.getAccounts();
      let sender = accountsOnEnable[0].toLowerCase();

      message = this.rstr2utf8(message);
      message = this.str2hex(message);

      handleEthTx().then(handleReceipt);

      let gasPriceReal = this.gasPriceReal;

      function handleEthTx() {
        return new Promise((resolve, reject) =>  
          web3.eth.sendTransaction({
              from: sender,
              to: address,
              value: 0,
              gas: gasCount(message) + 30000,
              gasPrice: gasPriceReal,
              data: message,
            },
            (err, receipt) => {
              if (err) {
                return console.log(err);
              }
              return resolve(receipt);
            }
          )
        );
      }
      
    },

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