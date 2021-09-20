<template>
  <div class="reader">

    <div class="read-content" style="margin-top:-20px;">

      <span class="pre-formatted serif" v-html="tempstr"></span>

      <div v-if="tempstr != 'Message is not available. Try a different tx hash.'">
        <div style="border-top:1px solid #cccccc;width:100%;margin-top: 80px;padding-top:10px;"></div>
          <div class="reader-tx-details sans-serif" style="line-height:18px;">
            The above message is stored permanently on the blockchain. It cannot be edited or deleted.<br><br>
            Message created: 
            <span class="sans-serif" title="Link to Etherscan" style="color:#222;">{{ timestamp }}</span>
          <br> 
          <div class="overflow-dots">
            Ethereum transaction hash: 
            <a v-bind:href="'https://etherscan.io/tx/'+txHash" target="_blank" title="Link to Etherscan">{{ txHash }}</a>
          </div>
          <br><br>
        </div>
      </div>

    </div>


  </div>
</template>

<script>

export default {
  props: ['txHash', 'network'],
  components: {
    
  },
  data: function() {
    return {
      tempstr: 'Loading...',
      output: '',
      decoded: '',
      blockNumber: '',
      timestamp: 'Loading...',
      apiKey: 'RCQRV7SVG3MWCWZ9W1INYXTSVSGKBQTPAX',
      networkReload: this.$parent.networkReload,
    }
  },
  
  watch: {
    network: function(val) {
      // console.log(val)
      if (val == true) {
        this.loadMessage();
        this.$parent.networkReload = false;
      }
    }
  },

  mounted () {
    // console.log(this.network)
    document.getElementById('splashScreen').style.display = 'none';
    
    this.loadMessage();
  },
  methods: {
    loadMessage: function() {

    window.scrollTo(0, 0);
    let self = this;
    
    axios.get(etherscan + '/api?module=proxy&action=eth_getTransactionByHash&txhash=' + this.txHash + '&apikey=' + this.apiKey)
    .then(
      function (response) {
        // console.log('a',response);
        // decode the message
        self.hex2utf8(response["data"]["result"]["input"]);
        // console.log(response["data"]["result"]);
        self.blockNumber = response["data"]["result"]["blockNumber"];
        axios.get(etherscan + '/api?module=proxy&action=eth_getBlockByNumber&tag='+self.blockNumber+'&boolean=true' + '&apikey=' + self.apiKey)
          .then (
            function (response) {
              // console.log('b',response);

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
          self.tempstr = "Message is not available. Try a different tx hash.";
        }
      );
    },
    hex2utf8: function(pStr) {
      try {
        this.tempstr = decodeURIComponent(pStr.replace(/\s+/g, '').replace(/[0-9a-f]{2}/g, '%$&')).substring(2);
        // console.log(this.tempstr);
      }
      catch (err) {
        console.log(err);
        for (b = 0; b < pStr.length; b = b + 2) {
          this.tempstr = this.tempstr + String.fromCharCode(parseInt(pStr.substr(b, 2), 16));
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
.reader {
  max-width: 1032px;
  height: 100%;
  margin: 0 auto;
  margin-top: 10px;
}

.read-content {
  max-width: 740px;
  margin: 0 auto;
  clear:both;
  padding-bottom: 120px;
  padding-top:140px;
  padding-left:20px;
  padding-right:20px;
}

@media only screen and (max-width: 600px) {
  .read-content {
    padding-top:100px;
    padding-bottom:80px;
  }
}

.serif {
  font-family: 'Arapey', serif;
  font-size: 19px;
}

.pre-formatted {
  white-space: pre-line;
  word-break: break-word;
}

.reader-tx-details {
  color: grey;
  font-size: 12px;
  clear: both;
}


.social-icon {
  width: 20px;
  margin-right: 10px;
  margin-top: 10px;
}

.sans-serif {
  font-family: 'Noto', sans-serif;
}
</style>