<template>
  <div class="reader-input">

    <div style="font-size:18px;margin-top:-20px;margin-bottom:60px;">
      <b>Blockchain message reader</b>
    </div>

		<div style="font-size:14px;">
      Ethereum transaction hash
    </div>

    <div style="max-width:600px;margin:0 auto;">
		  <input type="text" v-model="txHash" style="text-align:center;width:100%;height:35px;padding:5px;padding-top:6px;margin-bottom:2px;font-size:15px;margin-top:5px;outline:0;" autofocus>
    </div>

    <div class="overflow-dots">
      <a v-bind:href="'/reader/'+txHash" target="_blank" style="font-size:12px;">https://setinblock.com/reader/{{txHash}}</a>
    </div>

  	<button @click="read" style="margin-top:15px;">READ</button>

    <div v-if="content" class="reader-msg serif" style="min-height:55px;">      
      <div style="position:absolute;top:11px;right:13px;cursor:pointer;font-size:20px;" @click="content = false">✕</div>
      {{ message }}
      <div v-if="message != 'Message is not available. Try a different tx hash.'">
        <div style="border-top:1px solid #cccccc;width:100%;margin-top:50px;padding-top:0px;"></div>
        <div class="reader-tx-details sans-serif" style="line-height:18px;margin-bottom:20px;margin-top:-7px;">
          The above message is stored permanently on the blockchain. It cannot be edited or deleted.<br>
          Message created: <a v-bind:href="'https://etherscan.io/tx/'+txHash" target="_blank"><span class="sans-serif" title="Link to Etherscan">{{ timestamp }}</span></a>
          Ethereum transaction hash: <a v-bind:href="'https://etherscan.io/tx/'+txHash" target="_blank" title="Link to Etherscan">{{ txHash }}</a>
        </div>
      </div>
      <div v-else style="height:40px;"></div>
    </div>

    <div style="text-align:center;margin-top:60px;font-size:15px;">
      Other examples
      <div style="line-height:24px;font-size:14px;margin-top:5px;">
        <a href="/reader/0xddfa3b28394d52d0e2c168c42d0f853179b3e482ee4bf507851c95da6d68d1c1" target="_blank">File hash for intellectual property protection</a>
        <br>
        <a href="/reader/0x77ed505f790493db0e47a0379e8455843bb5ecac9d03ba88602696e346d84828" target="_blank">Archived software licence</a>
        <br>
        <a href="/reader/0xc8a7249826e78349bbe63652d80747118f7927f10884cd2ccf0ae344a5b13a1f" target="_blank">SVG image added directly to the blockchain</a>
        <br>
        <a href="/reader/0x2d6a7b0f6adeff38423d4c62cd8b6ccb708ddad85da5d3d06756ad4d8a04a6a2" target="_blank">An open letter to China's Peking University</a>
        <br>
        <a href="/reader/0x8006d703a45663cab96a85a4ef3e6ab94a1410d6e70119139eea807a63ecb79e" target="_blank">What If Linus Torvalds Gets Hit by a Bus?</a>
      </div>
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
    margin-top: 40px;
    margin-bottom: 50px;
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
