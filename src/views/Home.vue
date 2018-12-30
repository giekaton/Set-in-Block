<template>
  <div class="home">

    <!-- Header -->
    <div style="float:left;height:20px;width:20px;background-color:#767676;"></div>
    <div style="float:left;padding-left:7px;font-size:18px;font-family:'Arapey',serif;color:black;">Set in Block</div>

    <!-- <div style="float:left;height:23px;width:23px;background-color:#767676;"></div>
    <div style="float:left;padding-left:8px;padding-top:1px;font-size:19px;font-family:'Arapey'">Set in Block</div> -->

    <div style="float:right;padding-top:2px;font-size:14px;" class="sans-serif">
      <router-link to="/reader">Reader</router-link>
    </div>

    <div class="home-content">

      <div class="centered">

        <div style="width:120px;margin:0 auto;margin-top:20px;">
          <svg viewBox="0 0 190.8 190.8">
            <title>Logo</title>
            <polygon class="logo-container" points="0 0 190.8 0 190.8 190.8 0 190.8 0 0 0 0" style="fill:#606062;fill-rule:evenodd;"/>
            <path class="logo-text" d="M243.69,369.78a17.43,17.43,0,0,1-5.91-1,15.62,15.62,0,0,1-5.27-3.18l3.42-4.1a17.25,17.25,0,0,0,3.71,2.33,9.92,9.92,0,0,0,4.16.87,5.06,5.06,0,0,0,2.8-.66,2.07,2.07,0,0,0,1-1.82V362.1a2.29,2.29,0,0,0-.21-1,2.09,2.09,0,0,0-.79-0.81,8.6,8.6,0,0,0-1.62-.75c-0.69-.25-1.59-0.51-2.7-0.79a33,33,0,0,1-3.62-1.09,10.19,10.19,0,0,1-2.75-1.49,6,6,0,0,1-1.76-2.2,7.67,7.67,0,0,1-.62-3.27v-0.07a7.68,7.68,0,0,1,.67-3.25,7.45,7.45,0,0,1,1.89-2.5,8.5,8.5,0,0,1,2.9-1.62,11.64,11.64,0,0,1,3.72-.56,15.75,15.75,0,0,1,5.32.87,15.42,15.42,0,0,1,4.46,2.48l-3,4.36a19,19,0,0,0-3.46-1.9,8.84,8.84,0,0,0-3.38-.7,4.09,4.09,0,0,0-2.54.66,2,2,0,0,0-.85,1.64v0.08a2.37,2.37,0,0,0,.24,1.11,2.22,2.22,0,0,0,.88.85,8.49,8.49,0,0,0,1.75.71c0.75,0.23,1.68.49,2.81,0.79a26.64,26.64,0,0,1,3.57,1.19,10,10,0,0,1,2.64,1.58,6,6,0,0,1,1.62,2.16,7.36,7.36,0,0,1,.55,3v0.08a8.19,8.19,0,0,1-.71,3.48,7.18,7.18,0,0,1-2,2.56,8.94,8.94,0,0,1-3,1.58,13.16,13.16,0,0,1-3.91.55h0Zm14.67-26.71h19.83v5.15H264.08v5.34h12.41v5.15H264.08v5.53h14.29v5.15h-20V343.07h0Zm31.34,5.34h-8v-5.34H303.5v5.34h-8v21h-5.79v-21h0Zm-55.15,36.23h5.79V411h-5.79V384.64h0Zm12.38,0h5.34l12.34,16.21V384.64h5.72V411h-4.93l-12.75-16.74V411h-5.72V384.64h0Zm-0.11,62.82a5.56,5.56,0,0,0,3-.7,2.38,2.38,0,0,0,1.09-2.16v-0.08a2.48,2.48,0,0,0-1-2.09,5.47,5.47,0,0,0-3.27-.77h-6.7v5.79h6.88Zm-1.54-10.61a6,6,0,0,0,3-.66,2.27,2.27,0,0,0,1.13-2.13V434a2.32,2.32,0,0,0-1-2,4.83,4.83,0,0,0-2.82-.7h-5.72v5.57h5.34Zm-11-10.65h12.21q4.54,0,6.87,2.33a6.1,6.1,0,0,1,1.8,4.48v0.08a6.45,6.45,0,0,1-.28,2,6.18,6.18,0,0,1-.75,1.56,6,6,0,0,1-1.08,1.22,7.27,7.27,0,0,1-1.32.9,8.89,8.89,0,0,1,3.59,2.35,6,6,0,0,1,1.31,4.12v0.08a6.81,6.81,0,0,1-.7,3.16,6.18,6.18,0,0,1-2,2.26,9.37,9.37,0,0,1-3.12,1.35,16.85,16.85,0,0,1-4,.45H234.28V426.2h0Zm27.16,0h5.79v21.1h13.13v5.23H261.44V426.2h0Zm36.15,21.44a7.91,7.91,0,0,0,3.2-.64,7.3,7.3,0,0,0,2.5-1.77,8.3,8.3,0,0,0,1.62-2.61,8.6,8.6,0,0,0,.58-3.18v-0.08a8.75,8.75,0,0,0-.58-3.2,7.88,7.88,0,0,0-4.19-4.42,7.72,7.72,0,0,0-3.2-.66,7.88,7.88,0,0,0-3.22.64,7.35,7.35,0,0,0-2.48,1.77,8.32,8.32,0,0,0-1.62,2.61,8.63,8.63,0,0,0-.58,3.18v0.08a8.77,8.77,0,0,0,.58,3.2,7.93,7.93,0,0,0,1.66,2.63,8,8,0,0,0,2.52,1.79,7.68,7.68,0,0,0,3.22.66h0ZM297.52,453a14.36,14.36,0,0,1-5.61-1.07,13.93,13.93,0,0,1-4.42-2.9,13,13,0,0,1-2.9-4.29,13.52,13.52,0,0,1-1-5.29v-0.08a13.32,13.32,0,0,1,1.05-5.29,13.47,13.47,0,0,1,7.36-7.26,15.24,15.24,0,0,1,11.23,0,13.93,13.93,0,0,1,4.42,2.9,12.94,12.94,0,0,1,2.9,4.29,13.5,13.5,0,0,1,1,5.29v0.08a13.29,13.29,0,0,1-1.05,5.29,13.46,13.46,0,0,1-7.35,7.26,14.49,14.49,0,0,1-5.62,1.07h0ZM329,453a13.63,13.63,0,0,1-5.38-1.05,13,13,0,0,1-7.11-7.19,13.88,13.88,0,0,1-1-5.3v-0.08a13.68,13.68,0,0,1,3.84-9.61,13.09,13.09,0,0,1,4.33-2.93,14.09,14.09,0,0,1,5.57-1.07,17.41,17.41,0,0,1,3.37.3,14.05,14.05,0,0,1,2.76.83,12,12,0,0,1,2.29,1.28,15.43,15.43,0,0,1,2,1.66L336,434.07a14,14,0,0,0-3.14-2.18,8,8,0,0,0-3.59-.79,7.29,7.29,0,0,0-5.49,2.41,8.25,8.25,0,0,0-1.58,2.61,8.88,8.88,0,0,0-.56,3.18v0.08a9,9,0,0,0,.56,3.2,8.35,8.35,0,0,0,1.56,2.63,7.23,7.23,0,0,0,5.51,2.45,8.07,8.07,0,0,0,3.82-.83,14.81,14.81,0,0,0,3.1-2.26l3.69,3.72a19,19,0,0,1-2.11,2,12.29,12.29,0,0,1-5.23,2.43A17.12,17.12,0,0,1,329,453h0Zm15.42-26.78h5.79v11.51l10.68-11.51h7l-10.72,11.17,11.21,15.16h-7l-8.16-11.21-3,3.16v8.05h-5.79V426.2h0Z" 
            transform="translate(-210 -301)" style="fill:#fefefe;"/>
          </svg>
        </div>

        <h1 style="margin-top:20px;margin-bottom:7px;">
          <!-- <b>Create and Read Immutable Messages on the Blockchain</b> -->
          <!-- <b>Create and Read Indestructible Blockchain-based Messages</b> -->
          Create and Read Everlasting Messages on the Blockchain
        </h1>

        Make a permanent promise, create a proof of fact, bypass censorship...
    
        <div style="margin-top:70px;">

          <h3 style="margin-bottom:5px;text-align:center;">
            Enter a message and "set in stone" it on the blockchain:
          </h3>

          <div style="max-width:590px;margin:0 auto;">
            <textarea class="message-input" v-model="messageInput"></textarea>
          </div>
          <button @click="set">SET</button><br>
        </div>

        <div v-if="feedback != ''" v-html="feedback" class="feedback"></div>
           
      </div>

      <div class="content-block">
        <h2 style="text-align:left;margin-bottom:20px;">How it works</h2>

        The message you enter above will be encoded into a hexadecimal format and then included in the data field of the Ethereum transaction.
        <br><br>
        To add this message to the blockchain, you will be asked to confirm the transaction with your <a href="https://metamask.io/" target="_blank">MetaMask</a> 
        browser extension. You only need to pay the transaction fee, as the value of the transaction is 0.
        <br><br>
        The longer is your message, the bigger is the transaction fee. Gas Limit is calculated automatically, according to the size of your message, so do not change it. 
        Gas Price is set to 3 Gwei, but you can change it freely, depending on the network conditions.
        <br><br>
        We never see your private key or any other sensitive data, as the transaction is executed on the client side, through the MetaMask extension. You can inspect 
        the code of our website by looking into its source and visiting its <a href="https://github.com/giekaton/set-in-block" target="_blank">GitHub</a> repository.
        <br><br>
        After the message is added to the blockchain, it is no longer possible to change or delete it. Also, the time and the date of the message creation 
        cannot be changed. The unique quality of the blockchain is that it is immutable and incorruptible, and because of its decentralized nature, 
        the data you add to the blockchain stays there forever.
        <br><br>
        <!-- You can also download the application package from GitHub and launch it from your local disk by opening index.html in your browser.
        <br><br> -->
        The message submission is anonymous. Besides Google Analytics with IP anonymization, we do not use any trackers or cookies. We do not use a database and do not 
        collect any information about the website users.
        <br><br>
        For updates, follow Set in Block on <a href="https://twitter.com/setinblock" target="_blank">Twitter</a>.
      </div>

      <!-- <reader-component class="content-block"></reader-component> -->
      <div class="content-block">
        <h2>
          Blockchain message reader
        </h2>
        To read the message:
        <ul>
          <li>
            Open it in the <router-link to="/reader">Set in Block Reader</router-link><br>
          </li>
          <li style="margin-top:7px;">
            
              Or use a direct link (https://setinblock.com/tx_hash) as in this example: <div class="overflow-dots" style="padding-bottom:1px;"><a href="/0x52fcfb8b25daa9a6ea2c99a26cba4a4104ba21cb83fe670a3d296a317b98f097" style="font-size:13px;line-height:130%;" target="_blank">https://setinblock.com/0x52fcfb8b25daa9a6ea2c99a26cba4a4104ba21cb83fe670a3d296a317b98f097</a><br>
            </div>
          </li>
        </ul>
      </div>

      <div class="content-block">
        <h2>
          Check the examples
        </h2>
        <div style="line-height:24px;">
          <a href="/0x4716c347636d9b345a227e031588312882d8e7a06e23e73b5d6da3e0d1597696" target="_blank">File hash for the intellectual property protection</a>
          <br>
          <a href="/0x77ed505f790493db0e47a0379e8455843bb5ecac9d03ba88602696e346d84828" target="_blank">Archived software licence</a>
          <br>
          <a href="/0x450120b8114b71d9fc2013e3eb0d768373b9a2b396705fb70cb870137a662325" target="_blank">SVG image added directly to the blockchain</a>
          <br>
          <a href="/0x2d6a7b0f6adeff38423d4c62cd8b6ccb708ddad85da5d3d06756ad4d8a04a6a2" target="_blank">An open letter to China's Peking University</a>
        </div>
        <br>
        Have other interesting examples? Tweet the tx hash with the #setinblock hashtag or send it to &#x68;i&#x40;s&#x65;&#116;i&#x6e;b&#x6c;o&#x63;&#107;&#46;&#x63;o&#x6d; - 
        if it's an interesting use case, we will put it near the other examples.
      </div>

      <!-- @todo -->
      <!-- <div class="content-block">
        <h2>
          Add Set in Block Reader to your website
        </h2>
        Include the following JavaScript code into your page.
        <br><br>
        Pass placeholder parameter...
      </div> -->

    </div>

    <div class="reader-footer">
      <div class="width">
        <a href="https://github.com/giekaton/set-in-block" target="_blank" title="GitHub" class="sans-serif" style="margin-right:2px;">
          Set in Block v0.7
        </a>
        <div style="float:right;" class="sans-serif">
          <router-link to="/reader">Reader</router-link>
        </div>
      </div>
    </div>

  </div>
</template>

<script>

export default {
  name: 'home',
  data: function() {
    return {
      message: '',
      messageInput: '',
      feedback: '',
      url: ''
    }
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
        this.feedback = '<span class="notice">To broadcast the message, first login to your MetaMask wallet.</span>';
        return;
      }
      
      this.feedback = '<span class="notice-good">Confirm the transaction in the MetaMask popup window.</span>';

      let handleReceipt = (error, receipt) => {
        if (error) console.error(error);
        else {
          this.url = '/'+receipt;
          this.feedback = 'Message recorded<br><span style="cursor:text;font-size:12px;">Transaction hash: '+ receipt +'</span><br><br>Read the message on Set in Block:<br><a href="'+this.url+'" style="font-size:12px;" target="_blank">https://setinblock.com/'+receipt+'</a>';
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
    rstr2utf8: function(input) {
      let output = "";
      for (let n = 0; n < input.length; n++) {
        let c = input.charCodeAt(n);
        if (c < 128) {
            output += String.fromCharCode(c);
        } else if ((c > 127) && (c < 2048)) {
            output += String.fromCharCode((c >> 6) | 192);
            output += String.fromCharCode((c & 63) | 128);
        } else {
            output += String.fromCharCode((c >> 12) | 224);
            output += String.fromCharCode(((c >> 6) & 63) | 128);
            output += String.fromCharCode((c & 63) | 128);
        }
      }
      return output;
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
  .home {
    max-width: 1032px;
    height: 100%;
    margin: 0 auto;
    margin-top: 20px;
  }

  .home-content {
    max-width: 700px;
    margin: 0 auto;
    clear:both;
    padding-top: 40px;
    padding-bottom: 120px;
    text-align: left;
    font-size: 14px; 
  }

  .content-block {
    margin-top: 80px;
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
    padding: 4px 17px 4px 15px;
    margin-top: 5px;
    margin-bottom: 5px;
    background-color: rgb(134, 134, 134);
    border-color: rgb(170, 170, 170);
    color: white;
    cursor: pointer;
  }

  button:focus {
    outline:0;
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
    color: rgb(255, 94, 0);
  }

  .underlined {
    border-bottom: 2px solid rgb(255, 94, 0);
  }

  .underlined:hover {
    border-bottom: 2px solid rgb(255, 94, 0);
  }
</style>