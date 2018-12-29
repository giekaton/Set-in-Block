<template>
  <div class="reader-input">

    <div style="font-size:18px;margin-bottom:20px;">
      <b>Blockchain message reader</b>
    </div>

		<div style="font-size:14px;">
      Paste your transaction hash or check the example provided below:
    </div>

    <div style="max-width:570px;margin:0 auto;">
		  <input type="text" v-model="txHash" style="width:100%;padding:5px;margin-bottom:5px;margin-top:4px;border-color:rgb(131, 131, 131);border-width:1px;">
    </div>

  	<button @click="read">READ</button>

    <div style="font-size:13px;margin-top:15px;">
      <div style="margin-bottom:2px;">Or view it on its own page:</div>
      <div class="overflow-dots" style="padding-bottom:1px;">
        <a v-bind:href="'/'+txHash" target="_blank" style="font-size:12px;">https://setinblock.com/{{txHash}}</a>
      </div>
    </div>

    <div v-if="content" class="reader-msg serif" style="min-height:55px;">      
      <div style="position:absolute;top:11px;right:13px;cursor:pointer;font-size:20px;" @click="content = false">✕</div>
      {{ message }}
      <div v-if="message != 'Message is not available. Try a different tx hash.'">
        <div style="border-top:1px solid #cccccc;width:100%;margin-top:50px;padding-top:0px;"></div>
        <div class="reader-tx-details sans-serif" style="line-height:18px;margin-bottom:20px;margin-top:-7px;">
          The above message is stored permanently on the blockchain. It cannot be edited or deleted.<br>
          Message creation date: <a href="https://etherscan.io/tx/0x52fcfb8b25daa9a6ea2c99a26cba4a4104ba21cb83fe670a3d296a317b98f097" target="_blank"><span class="sans-serif" title="Link to Etherscan">{{ timestamp }}</span></a>
          Ethereum transaction hash: <a href="https://etherscan.io/tx/0x52fcfb8b25daa9a6ea2c99a26cba4a4104ba21cb83fe670a3d296a317b98f097" target="_blank" title="Link to Etherscan">{{ txHash }}</a>
        </div>
      </div>
      <div v-else style="height:40px;"></div>

    </div>

  </div>
</template>

<script>
export default {
  name: 'ReaderComponent',
  data: function() {
    return {
      txHash: '0x52fcfb8b25daa9a6ea2c99a26cba4a4104ba21cb83fe670a3d296a317b98f097',
      message: 'Loading...',
      content: false,
      timestamp: ''
    }
  },
  methods: {
    read: function() {
      this.message = "Loading...";
      this.content = true;
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
          // console.log (error);
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
    margin-top: 60px;
    position:relative;
  }

  @media only screen and (max-width: 600px) {
    .reader-msg {
      padding: 15px;
      padding-top: 40px;
      padding-bottom: 20px;
    }
  }

</style>
