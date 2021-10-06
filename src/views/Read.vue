<template>
  <div class="reader">

    <div class="read-content" style="margin-top:-20px;">

      <span v-if="type == 'msg'">
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
      </span>
      <div v-else style="margin-top:-10px;">
        <span v-if="loaded && nftImageSrc">
          <span style="font-size:22px;font-weight:bold;">Non-Fungible Token (NFT)</span>
          <div style="height:20px;"></div>
          Token ID: {{ nftId }}
          <br>
          Contract address: <a target="_blank" :href="'https://'+netLink+'etherscan.io/address/'+nftAddress">{{ nftAddress }}</a>
          <span v-if="net">
            <br>
            Network: <span style="text-transform:capitalize;">{{ net }}</span>
          </span>
          <br>
          <br>
          Name: {{ nftJson.data.name }}
          <br>
          Image: <a :href="nftImageSrc" target="_blank">{{ nftImageSrc }}</a>
          <div style="height:30px;"></div>
          <div style="width:100%;min-height: 55px; margin: 0px auto; box-shadow: rgb(233, 233, 233) 0px 4px 8px 3px;padding: 30px;">
            <img v-bind:src="nftImageSrc" style="width:100%;height:100%;">
          </div>
          <div style="height:20px;"></div>
        </span>
        <span v-else-if="loaded && !nftImageSrc">
          <b>NFT data is not available, or the token is based not on the ERC-721 standard.</b>
          <div style="height:30px;"></div>
          Token ID: {{ nftId }}
          <br>
          <div class="overflow-dots">Contract address: <a target="_blank" :href="'https://'+netLink+'etherscan.io/address/'+nftAddress">{{ nftAddress }}</a></div>
          <!-- Token ID: <a target="_blank" :href="'https://'+netLink+'etherscan.io/token/'+nftAddress+'?a='+nftId">{{ nftId }}</a> -->
        </span>
        <span v-else-if="!loaded">
          Loading...
        </span>
      </div>

    </div>


  </div>
</template>

<script>

export default {
  props: ['txHash', 'net', 'network', 'nftId', 'nftAddress'],
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
      type: '',
      // backendUrl: 'http://localhost/sb-backend/server.php',
      backendUrl: '/backend/server.php',
      nftJson: '',
      etherscan: '',
      
      nftImageSrc: '',
      loaded: false,

      netLink: '',
    }
  },
  
  watch: {
    // network: function(val) {
    //   // console.log(val)
    //   if (val == true) {
    //     this.loadMessage();
    //     this.$parent.networkReload = false;
    //   }
    // }
  },

  beforeMount() {
    // this.network = this.net;
  },

  mounted () {
    // console.log(this.network)
    document.getElementById('splashScreen').style.display = 'none';
    
    if (typeof(this.net) != 'undefined') {
      selectNetwork(this.net);
      this.netLink = this.net+'.';
    }
    else {
      this.net = '';
    }
    
    // console.log(this.$route.name);
    if (this.$route.name == 'readerNft' || this.$route.name == 'readerNetworkNft') {
      this.type = 'nft'
    }
    else if (this.$route.name == 'readerMsg' || this.$route.name == 'readerNetworkMsg') {
      this.type = 'msg';
    }
    this.loadMessage();
  },
  methods: {
    loadMessage: function() {

    window.scrollTo(0, 0);
    let self = this;
    
    if (this.type == 'msg') {
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
      }
      else if (this.type == 'nft') {
        console.log('read nft');
        let net = 'main';
        if (typeof(this.net) != 'undefined') {
          net = this.net;
        }
        if (net == '') net = 'main'
        let call = this.backendUrl + '?type=nft&address='+this.nftAddress+'&id='+this.nftId+'&net='+net;
        axios.get(call)
        .then(
          (response) => {
            console.log(response)
            this.nftJson = response;
            this.loaded = true;
            // console.log(JSON.parse(response));
            // console.log(response.data.image)
            this.nftImageSrc = response.data.image.replace("ipfs://", "https://ipfs.io/ipfs/");
          }
        );
      }

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