<template>
  <div class="content">

    <h1>New Blockchain Message</h1>

    <div style="height:40px;"></div>

    <!-- New message -->
    <div style="max-width:620px;margin:0 auto;">


      <file-input style="font-size:14px;" v-on:file-data="fileData" />

      <div style="height:20px;"></div>

      <textarea class="message-input" v-model="messageInput"></textarea>

      <div style="float:left;margin-top:5px;text-align:left;line-height:18px;font-size:13px;width:200px;">
        <span>
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
    <div>
      <div v-if="feedback != ''" v-html="feedback" class="feedback" style="text-align:center;font-weight:bold;"></div>

      <div v-if="feedback != ''" style="height:40px;"></div>

      <div style="height:30px;"></div>

      <!-- Preview -->
      <div v-if="content" class="reader-msg serif"
        style="min-height:55px;margin:0 auto;max-width:620px;box-shadow: #e9e9e9 0px 4px 8px 3px;">
        <div style="position:absolute;top:18px;right:45px;font-size:13px;color:red;" class="sans-serif">
          Message preview
        </div>
        <div style="position:absolute;top:11px;right:13px;cursor:pointer;font-size:20px;" @click="content = false">✕
        </div>
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

    <!-- New message -->
    <div style="max-width:620px;margin:0 auto;">

      <br><br>

      <div
        style="text-align:left;font-size:13px;border:1px solid #cacaca;border-radius:5px;background-color:#f9f9f9;padding:20px;">


        <div style="width:55px;">
          <svg version="1.1" viewBox="0 0 364.7 364.7" style="enable-background:new 0 0 364.7 364.7;"
            xml:space="preserve">
            <title>Logo</title>
            <g>
              <polygon
                style="fill-rule:evenodd;clip-rule:evenodd;fill:#404041;stroke:#000000;stroke-width:0.5;stroke-miterlimit:2.6131;"
                points="0.3,0.3 364.4,0.3 364.4,364.4 0.3,364.4 0.3,0.3" />
              <path style="fill:#FFFFFF;"
                d="M65.6,154.2c-4.1,0-8.1-0.6-11.8-1.9s-7-3.2-9.9-5.8l7.1-8.6c4.6,3.7,9.6,5.6,15,5.6
                  c1.7,0,3-0.3,3.9-0.8c0.9-0.6,1.4-1.3,1.4-2.3v-0.1c0-0.5-0.1-0.9-0.3-1.3c-0.2-0.4-0.6-0.7-1.2-1.1c-0.6-0.4-1.4-0.7-2.4-1
                  s-2.3-0.7-3.9-1c-2.5-0.6-4.8-1.2-6.9-1.9c-2.1-0.7-4-1.6-5.5-2.6c-1.6-1.1-2.8-2.4-3.7-4c-0.9-1.6-1.4-3.6-1.4-6v-0.1
                  c0-2.2,0.4-4.1,1.2-5.9c0.8-1.8,2-3.4,3.6-4.7c1.6-1.3,3.5-2.3,5.7-3.1c2.2-0.7,4.7-1.1,7.5-1.1c4,0,7.5,0.5,10.6,1.6
                  c3.1,1,5.9,2.6,8.4,4.6l-6.4,9.1c-2.1-1.5-4.3-2.6-6.5-3.4s-4.4-1.2-6.4-1.2c-1.5,0-2.7,0.3-3.5,0.9c-0.8,0.6-1.2,1.3-1.2,2.1v0.1
                  c0,0.5,0.1,1,0.4,1.4c0.2,0.4,0.7,0.8,1.3,1.1c0.6,0.3,1.4,0.7,2.4,1c1,0.3,2.3,0.7,3.9,1c2.6,0.6,5,1.2,7.2,2
                  c2.1,0.8,4,1.7,5.5,2.8c1.5,1.1,2.6,2.4,3.4,4c0.8,1.6,1.2,3.4,1.2,5.6v0.1c0,2.4-0.5,4.5-1.4,6.3c-0.9,1.9-2.2,3.4-3.8,4.7
                  c-1.6,1.3-3.6,2.3-5.9,3C71,153.9,68.5,154.2,65.6,154.2L65.6,154.2z M92.9,107.1h37.2V118h-24.5v7h22.2v10.1h-22.2v7.3h24.9v10.9
                  H92.9V107.1L92.9,107.1z M150.7,118.4h-13.9v-11.2h40.6v11.2h-13.9v35.1h-12.8V118.4L150.7,118.4z M47.7,184.7h12.9V231H47.7V184.7
                  L47.7,184.7z M71.4,184.7h12l19.1,24.5v-24.5h12.6V231h-11.3L84,205.6V231H71.4V184.7L71.4,184.7z M69.9,298.4c2,0,3.5-0.4,4.6-1.1
                  c1.1-0.7,1.6-1.8,1.6-3.1V294c0-1.3-0.5-2.3-1.5-3c-1-0.7-2.6-1.1-4.8-1.1H60v8.5H69.9L69.9,298.4z M68,280.8c2,0,3.5-0.3,4.5-1
                  c1-0.7,1.6-1.7,1.6-3v-0.1c0-1.3-0.5-2.3-1.5-2.9c-1-0.7-2.4-1-4.4-1H60v8.1H68L68,280.8z M47.5,262.4h23.7c2.9,0,5.4,0.4,7.5,1.1
                  c2.1,0.7,3.8,1.7,5.1,3.1c0.9,0.9,1.7,2,2.2,3.2c0.5,1.2,0.8,2.6,0.8,4.2v0.1c0,2.7-0.7,4.9-2,6.5s-3,2.9-5.1,3.8
                  c2.8,0.9,5.1,2.3,6.7,4c1.7,1.7,2.5,4.2,2.5,7.3v0.1c0,4-1.5,7.1-4.6,9.4c-3.1,2.2-7.4,3.4-12.9,3.4H47.5V262.4L47.5,262.4z
                  M97.1,262.4h12.8v35.1h22.4v11.2H97.1V262.4L97.1,262.4z M163.5,298c1.8,0,3.4-0.3,4.8-1c1.5-0.7,2.7-1.6,3.7-2.7s1.8-2.4,2.4-3.9
                  s0.9-3.1,0.9-4.8v-0.1c0-1.7-0.3-3.3-0.9-4.8c-0.6-1.5-1.4-2.8-2.5-4c-1.1-1.1-2.3-2.1-3.8-2.7c-1.5-0.7-3.1-1-4.8-1
                  c-1.8,0-3.4,0.3-4.8,1c-1.4,0.7-2.7,1.6-3.7,2.7s-1.8,2.4-2.4,3.9s-0.8,3.1-0.8,4.8v0.1c0,1.7,0.3,3.3,0.9,4.8
                  c0.6,1.5,1.4,2.8,2.4,4c1,1.1,2.3,2.1,3.7,2.7C160.1,297.7,161.8,298,163.5,298L163.5,298z M163.4,309.6c-3.6,0-6.9-0.6-9.9-1.9
                  s-5.7-3-7.9-5.1s-3.9-4.7-5.2-7.6c-1.3-2.9-1.9-6-1.9-9.3v-0.1c0-3.3,0.6-6.4,1.9-9.4c1.3-2.9,3-5.5,5.3-7.7s4.9-3.9,7.9-5.2
                  c3-1.3,6.4-1.9,9.9-1.9c3.6,0,6.9,0.6,9.9,1.9c3,1.3,5.7,3,7.9,5.1c2.2,2.2,3.9,4.7,5.2,7.6c1.3,2.9,1.9,6,1.9,9.3v0.1
                  c0,3.3-0.6,6.4-1.9,9.4c-1.3,2.9-3,5.5-5.3,7.7c-2.2,2.2-4.9,3.9-7.9,5.2S167,309.6,163.4,309.6L163.4,309.6z M219.7,309.6
                  c-3.3,0-6.4-0.6-9.3-1.8c-2.9-1.2-5.4-2.9-7.6-5c-2.1-2.1-3.8-4.7-5.1-7.6c-1.3-2.9-1.9-6.1-1.9-9.6v-0.1c0-3.4,0.6-6.5,1.9-9.4
                  c1.2-2.9,2.9-5.5,5.1-7.7c2.2-2.2,4.7-3.9,7.7-5.1s6.2-1.9,9.8-1.9c2.4,0,4.5,0.2,6.5,0.7c1.9,0.5,3.7,1.1,5.3,2
                  c1.6,0.9,3.1,1.9,4.4,3.1c1.3,1.2,2.5,2.5,3.5,3.9l-9.7,7.5c-1.3-1.7-2.8-3-4.4-4c-1.6-1-3.5-1.5-5.8-1.5c-1.6,0-3.1,0.3-4.5,1
                  c-1.3,0.6-2.5,1.5-3.5,2.6c-1,1.1-1.7,2.4-2.3,3.9c-0.6,1.5-0.8,3.1-0.8,4.8v0.1c0,1.7,0.3,3.3,0.8,4.9c0.6,1.5,1.3,2.8,2.3,3.9
                  c1,1.1,2.1,2,3.5,2.6c1.3,0.6,2.8,1,4.5,1c1.2,0,2.3-0.1,3.3-0.4c1-0.3,1.9-0.7,2.7-1.2s1.6-1.1,2.3-1.8s1.4-1.4,2.1-2.3l9.7,6.9
                  c-1.1,1.5-2.3,2.9-3.6,4.2c-1.3,1.3-2.8,2.4-4.4,3.3c-1.7,0.9-3.5,1.7-5.6,2.2C224.6,309.3,222.3,309.6,219.7,309.6L219.7,309.6z
                  M248.1,262.4h12.8v18.8l15.9-18.8H292l-17.5,19.9l18.1,26.4h-15.4l-11.6-17.2l-4.7,5.2v12h-12.8V262.4L248.1,262.4z" />
            </g>
          </svg>
        </div>
        <div style="height:25px;"></div>
        <b>About</b>
        <br><br>
        Enter a message and record it in the Ethereum blockchain for permanent storage.
        <br><br>
        Set in Block message submission interface only encodes and prepares the message. After the Set button is
        pressed, you will be asked to confirm the transaction with your <a href="https://metamask.io/"
          target="_blank">MetaMask</a> wallet.
        <br><br>
        The message you enter will be encoded into a hexadecimal format and then included in the data field of the
        Ethereum blockchain transaction.
        <br><br>
        The value of your prepared transaction is 0. The longer is your message, the bigger is the transaction fee. Gas
        Limit is calculated automatically, according to the size of your message. The gas price is set to {{ gasPrice }}
        Gwei, but you can change it, depending on the network conditions.
        <br><br>
        We never see your private key or any other personal data, as the transaction is broadcast on the client-side,
        through the MetaMask extension.
        <br><br>
        For privacy reasons, every new Set in Block message is sent to a randomly generated Ethereum address.
        <br><br>
        After the message is recorded in the blockchain, it is no longer possible to change or delete it. Your message,
        recorded in the blockchain, is immutable and incorruptible - no one can delete or modify it. It also never
        expires - it's a permanent record.
        <br><br>
        By having a message recorded on the blockchain, you have a mathematically-based proof of existence that your
        message is authentic, and that it existed prior to a
        specific date.
        <br><br><br>
        <b>Content Copyright Protection With Ethereum</b>
        <br><br>
        Enter your work's name and description in the message field to record this data in the Ethereum blockchain for
        permanent storage. You can also include first publication date, author's name, etc.
        <br><br>
        Hash the work by selecting its file (.png, .js, or other), and submit only the SHA-256 hash. Keep the original
        file in your archive. Optionally, upload the file to IPFS and include its link in the message.
        <div style="height:20px;"></div>
      </div>

    </div>

  </div>
</template>

<script>
import FileInput from '../components/FileInput.vue';

export default {
  props: ['txHash'],

  components: {
    FileInput,
  },

  data: function () {
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
      gasPrice: 30,
      moreInfo: false,
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
    gasPriceReal: function () {
      return (this.gasPrice * 1000000000);
    }
  },

  mounted() {
    document.getElementById('splashScreen').style.display = 'none';
    window.scrollTo(0, 0);
  },

  methods: {
    fileData: function (data) {
      this.messageInput += '\n\nFile: ' + data.fileName + ' (' + data.fileSize + ' bytes)\nSHA-256 #: ' + data.fileHash;
    },

    set: async function () {
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

      let handleReceipt = (error, receipt) => {
        if (error) console.error(error);
        else {
          this.url = '/msg/' + receipt;
          this.feedback = 'Message recorded<br><span style="cursor:text;font-size:12px;">Transaction hash: ' + receipt + '</span><br><br>Read the message on Set in Block<br><a href="' + this.url + '" style="font-size:12px;" target="_blank">https://setinblock.com/msg/' + receipt + '</a><br><br><br>';
        }
      }

      let message = this.messageInput;

      let accountsOnEnable = await web3.eth.getAccounts();
      let sender = accountsOnEnable[0].toLowerCase();

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

    rstr2utf8: function (input) {
      return unescape(encodeURIComponent(input));
    },

    str2hex: function (str) {
      let output = "";
      for (let i = 0; i < str.length; i++) {
        output += this.strlpad(str.charCodeAt(i).toString(16), "0", 2).toUpperCase();
      }
      return output;
    },

    strlpad: function (str, pad, len) {
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
  clear: both;
  padding-top: 70px;
  font-size: 19px;
  padding-bottom: 120px;
  padding-left: 20px;
  padding-right: 20px;
}

.link-preview {
  float: right;
  margin-right: 19px;
  margin-top: 13px;
  font-size: 12px;
  text-decoration: none;
  color: #4289b9;
  cursor: pointer;
}

.link-set {
  float: right;
}

.set-controls {
  width: 140px;
  float: right;
}

@media only screen and (max-width: 440px) {
  .set-controls {
    clear: both;
    float: left;
    max-width: 100%;
  }

  .link-preview {
    float: left;
    margin-right: 0px;
    margin-left: 10px;
    padding-top: 10px;
  }

  .link-set {
    clear: both;
    float: left;
    margin-top: 15px;
  }
}
</style>