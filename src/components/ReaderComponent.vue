<template>
  <div class="reader-input">

    <!-- <div style="font-size:18px;margin-top:-20px;margin-bottom:60px;">
      <b>Blockchain message reader</b>
    </div> -->

		<!-- <div style="font-size:14px;">
      Ethereum transaction hash:
    </div> -->


    <div style="height:20px;"></div>

    <div style="max-width:600px;margin:0 auto;">
		  <input type="text" placeholder="Your Ethereum transaction hash" v-model="txHash" class="tx-input-field">
    
      <!-- <div class="effect-9-parent">
        <input type="text" v-model="txHash" placeholder="Your Ethereum transaction hash" class="effect-9" style="width:100%;height:35px;padding:5px;padding-top:6px;font-size:15px;margin-top:5px;outline:0;">
        <span class="focus-border">
          <i></i>
        </span>
      </div> -->

    </div>

    <div style="clear:both;height:15px;"></div>
  	
    <button @click="read" class="two-buttons">Read the message</button>
    <button @click="read('lucky')" class="two-buttons">I'm feeling lucky</button>

    <div style="height:20px;"></div>

    <div v-if="$parent.$parent.content" class="reader-msg serif" style="min-height:55px;">      
      <div style="position:absolute;top:11px;right:13px;cursor:pointer;font-size:20px;" @click="close()">✕</div>
      <div style="height:15px;"></div>
      {{ message }}
      <div v-if="message != 'Message is not available. Try a different tx hash.'">
        <div style="border-top:1px solid #cccccc;width:100%;margin-top:60px;padding-top:0px;"></div>
        <div class="reader-tx-details sans-serif" style="line-height:130%;margin-bottom:20px;margin-top:-7px;">
          The above message is stored permanently on the blockchain. It cannot be edited or deleted.
          <div style="height:15px;"></div>
          Message created: <a v-bind:href="'https://etherscan.io/tx/'+txHash" target="_blank"><span class="sans-serif" title="Link to Etherscan">{{ timestamp }}</span></a>
          <div style="height:0px;"></div>
          Ethereum transaction hash: <a v-bind:href="'https://etherscan.io/tx/'+txHash" target="_blank" title="Link to Etherscan">{{ txHash }}</a>
          <div style="height:0px;"></div>
        </div>
      </div>
      <div v-else style="height:45px;"></div>
    </div>
    
    <div  v-if="$parent.$parent.content">
      Share the above message using its unique link:
      <div style="height:5px;"></div>
      <a v-bind:href="'/'+txHash" target="_blank" style="font-size:12px;">https://setinblock.com/{{txHash}}</a>
        
      <div style="height:25px;"></div>
    </div>

  </div>
</template>

<script>
export default {
  name: 'ReaderComponent',
  data: function() {
    return {
      txHash: '',
      txHashArray: [
        '0x52fcfb8b25daa9a6ea2c99a26cba4a4104ba21cb83fe670a3d296a317b98f097',
        '0x35dbf0e5c933db547022fbb61ed06458e028d34e388d253ab14a2b686582dd6c',
        '0x2d6a7b0f6adeff38423d4c62cd8b6ccb708ddad85da5d3d06756ad4d8a04a6a2',
        '0x8006d703a45663cab96a85a4ef3e6ab94a1410d6e70119139eea807a63ecb79e',
        '0xddfa3b28394d52d0e2c168c42d0f853179b3e482ee4bf507851c95da6d68d1c1',
        '0x77ed505f790493db0e47a0379e8455843bb5ecac9d03ba88602696e346d84828',
        '0xeff50e090d8490266b9b122c75fb661b5967bc5789a51540875ca7d2554f7e01',
        '0x3ce1ef698a5fe2e505014d5468f80b10e10a150929b9ea52ce79d466ba158b62',
        '0x6361ac23362b8761490addad58636f1f3d5748451fcc9b4f8182b9776809e710',
        // '0xc8a7249826e78349bbe63652d80747118f7927f10884cd2ccf0ae344a5b13a1f',
        '0xcc1f5ee8e08b38adee27f397565690fdd882f295492ded96fb6d9e6b81000a6a',
        // '0xdad229813cdcb0b26d0dd824fcd820b1f4c4c9b1b37347f369496b9fc990ea54',
        '0xcd98780f0f4d21835f24781eabffdfad3369c7e10ad4cf97cd81e14283a8c48e',
        '0xca8836d2e9ac00053a4549b7f2dfa48c3c9eea60296b658e8bc95a3926ded010',
        '0xd065be0f5777e4a16e2c9e2750bde15c27ab5a4ab866736f3cb6041b450f6ee6',
        '0xc7377190e9c0b40d3e5e7d434430ffeff5df3394dd4e6b56581802ee125185de',
        '0x98f619c174b21b28a5820f9be61cd4f86b51d7889b0eb38840028df34a6ac2c7',
        '0xf750f5c105bc9692d065ebfb7f6abd483336682490106b409e15c295b34b217a',
        '0x7975bf9cf6ce32b3f04cafcca60b1a7bb214d66c5c47ca8c6e65faab787079b6',
        '0xa0904c7011c4195630b4fbffee67df687112a6bae9770fedc1d90179fa838cfb',

      ],
      message: 'Loading...',
      content: false,
      timestamp: ''
    }
  },
  methods: {
    embed: function() {
      alert("This feature is coming soon. Please come back in a few days.")
    },
    close: function() {
      this.$parent.$parent.content = false;
      // this.$emit('isContent', false);
    },
    readExamples: function(hash) {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0;
      
      this.txHash = hash;
      this.read();
    },
    read: function(lucky) {
      if (lucky == 'lucky') {
        this.txHash = this.txHashArray[Math.floor(Math.random()*this.txHashArray.length)];
      }

      if (this.txHash == '') {
        return alert('Enter Ethereum transaction hash');
      }

      this.$emit('isContent', true);

      this.message = "Loading...";
      this.$parent.$parent.content = true;
      let self = this;

      axios.get(etherscan + '/api?module=proxy&action=eth_getTransactionByHash&txhash=' + this.txHash)
      .then(
        function (response) {
          // console.log(response);
          if (typeof(response["data"]["result"]["input"]) == 'undefined') {
            self.message = "NO";
            return;
          }
          self.hex2utf8(response["data"]["result"]["input"]);
          self.blockNumber = response["data"]["result"]["blockNumber"];
          axios.get(etherscan + '/api?module=proxy&action=eth_getBlockByNumber&tag='+self.blockNumber+'&boolean=true')
            .then (
              function (response) {
                console.log(response);

                if (typeof response["data"]["error"] === 'undefined') {
                    let timestamp = response["data"]["result"]["timestamp"];
                    timestamp = parseInt(timestamp, 16);
                    self.convert(timestamp);
                }
                else {
                    self.timestamp = "Processing..."
                }
              }
            )
            .catch (
              function (error) {
                console.log (error);
              }
            );
        }
      )
      .catch (
        function (error) {
          console.log (error);
          self.message = "Message is not available. Try a different tx hash.";
        }
      );
    },
    hex2utf8: function(pStr) {
      try {
        this.message = decodeURIComponent(pStr.replace(/\s+/g, '').replace(/[0-9a-f]{2}/g, '%$&')).substring(2);
        // console.log(this.tempstr);
      }
      catch (err) {
        for (b = 0; b < pStr.length; b = b + 2) {
          this.message = this.tempstr + String.fromCharCode(parseInt(pStr.substr(b, 2), 16));
        }
      }            
    },
    convert: function(unixtimestamp) {
      this.timestamp = new Date(new Date(unixtimestamp*1000)).toUTCString();
    }
  }
}
</script>


<style>
  .tx-input-field {
    width:100%;
    text-align:center;
    vertical-align:center;
    height:35px;
    /* padding:5px; */
    /* padding-top:6px; */
    margin-bottom:2px;
    font-size:15px;
    margin-top:5px;
    outline:0;
  }

  .two-buttons {
    margin:5px;
    display:inline-block;
    padding: 4px 8px 4px 8px;
    width:154px;
  }

  @media screen and (max-width:480px) {
    .two-buttons {
      font-size:13px;
      padding: 5px;
      width:125px;
    }
  }

  .reader-input {
    text-align: center;
  }

  .hover:hover {
    border-bottom: 1px solid black;
    cursor:pointer;
  }

  
  .reader-tx-details {
    color: grey;
    font-size: 12px;
    clear: both;
  }

  .reader-msg {
    border: 1px #ccc solid;
    padding: 30px;
    padding-top: 40px;
    padding-bottom: 20px;
    -webkit-rtl-ordering: logical;
    flex-direction: column;
    white-space: pre-line;
    word-wrap: break-word;
    text-align: left;
    margin-top: 40px;
    margin-bottom: 20px;
    position:relative;
  }

  @media only screen and (max-width: 600px) {
    .reader-msg {
      padding: 15px;
      padding-top: 40px;
      padding-bottom: 20px;
    }
  }

  /*= input focus effects css
  =========================== */
  :focus{outline: none;}

  .effect-9 ~ .focus-border {position: absolute; bottom: 0; left: 0; width: 0; height: 1.2px; background-color: rgb(104, 121, 130); transition: 0.4s;}
  .effect-9:focus ~ .focus-border {width: 100%; transition: 0.4s;}

  .effect-9-parent{float: left; width: 100%; position: relative;} /* necessary to give position: relative to parent. */
  
  input[type="text"]{
    color: #333;
    width: 100%;
    /* letter-spacing: 1px; */
    border: 1px solid rgb(179, 179, 179);
    height:34px;
    padding:5px;
    padding-left: 7px;
    font-size: 15px;
    font-family: inherit;
  }

  ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: rgb(190, 190, 190);
    opacity: 1; /* Firefox */
    font-size: 14px;
  }

  :-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: rgb(190, 190, 190);
    font-size: 14px;
  }

  ::-ms-input-placeholder { /* Microsoft Edge */
    color: rgb(190, 190, 190);
    font-size: 14px;
  }
  
</style>
