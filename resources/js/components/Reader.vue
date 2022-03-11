<template>
  <div class="reader">

    <div v-if="type == 'msg'" class="read-content">

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
            <a v-bind:href="'https://etherscan.io/tx/'+msgData['hash']" target="_blank" title="Link to Etherscan">{{ msgData['hash'] }}</a>
          </div>
          <br><br>
        </div>
      </div>

    </div>

    <div v-else class="read-content-nft overflow-dots">
        <span v-if="loaded && nftImageSrc">
          <div style="margin: 0px auto; box-shadow: rgb(233, 233, 233) 0px 4px 8px 3px;padding: 30px;">
            <img v-bind:src="nftImageSrc" style="width:100%;height:100%;">
          </div>
          <div style="height:30px;"></div>
          <div style="font-size:22px;font-weight:bold;">Non-Fungible Token (NFT)</div>
          <div style="font-size:22px;line-height:160%;">{{ nftData.name }}</div>
          <div style="height:30px;"></div>

          <span class="nft-titles">&nbsp;NFT&nbsp;</span>
          <br>
          Token ID: <a :href="'https://'+netLink+'etherscan.io/token/'+nftAddress+'?a='+nftId" target="_blank">{{ nftId }}</a>
          <span v-if="nftData.name">
            <br>
            Name: {{ nftData.name }}
          </span>
          <span v-if="nftData.owner">
            <br>
            Owner: <a :href="'https://'+netLink+'etherscan.io/address/'+nftData.owner.address" target="_blank">{{ nftData.owner.address }}</a>
          </span>
          <!-- <span v-if="Object.keys(nftData.traits).length > 0">
            <br>
            <span >
              Traits:
              <ul style="margin-top:5px;font-size:14px;margin-bottom:0px;"><li v-for="trait in nftData.traits" style="text-transform: capitalize;">{{ trait['trait_type'] }}</li></ul>
            </span>
          </span> -->
          <span v-if="nftData.description">
            <br>
            Description: <span v-html="nftData.description" style="font-size:14px;"></span>
            <div style="height:20px;"></div>
          </span>
          <span v-else>
            <div style="height:30px;"></div>
          </span>

          <span class="nft-titles">&nbsp;Collection&nbsp;</span>
          <br>
          Name: {{ nftData['collection']['name'] }}
          <span v-if="nftData['collection']['external_url']">
            <br>
            Website: <a :href="nftData['collection']['external_url']" target="_blank">{{nftData['collection']['external_url']}}</a>
          </span> 
          <span v-if="nftData['collection']['description']">
            <br>
            Description: <span v-html="nftData.asset_contract.description" style="font-size:14px;"></span>
            <div style="height:20px;"></div>
          </span>
          <span v-else>
            <div style="height:30px;"></div>
          </span>

          <span class="nft-titles">&nbsp;Contract&nbsp;</span>
          <br>
          Address: <a target="_blank" :href="'https://'+netLink+'etherscan.io/address/'+nftAddress">{{ nftAddress }}</a>
          <br>
          Created: {{ nftData['asset_contract']['created_date'].substring(0,10) }}
          <br>
          Token standard: {{ nftData['asset_contract']['schema_name'] }}
          <br>
          Symbol: {{ nftData['asset_contract']['symbol'] }}
          <br>
          <span v-if="$route.params.net">
            Network: <span style="text-transform: capitalize;">{{$route.params.net}}</span>
          </span>
          <span v-else>
            Network: Mainnet
          </span>

          <div style="height:30px;"></div>
          <span class="nft-titles">&nbsp;Market&nbsp;</span>
          <br>
          Number of sales: {{ nftData.num_sales }}
          <br>
          Marketplace: <a :href="nftData.permalink" target="_blank">OpenSea</a>
          <br>

          <!-- <div style="height:20px;"></div>
          <b>Last sale</b> -->

          <div style="height:10px;"></div>
        </span>
        <span v-else-if="loaded && !nftImageSrc">
          <div style="height:50px;"></div>
          <b>NFT data is not available, or the token is based not on the Ethereum ERC-721 standard.</b>
          <div style="height:30px;"></div>
          Token ID: {{ nftId }}
          <br>
          <div class="overflow-dots">Contract address: <a target="_blank" :href="'https://'+netLink+'etherscan.io/address/'+nftAddress">{{ nftAddress }}</a></div>
          <!-- Token ID: <a target="_blank" :href="'https://'+netLink+'etherscan.io/token/'+nftAddress+'?a='+nftId">{{ nftId }}</a> -->
        </span>
        <span v-else-if="!loaded">
          <div style="height:30px;"></div>
          Loading...
        </span>
      </div>

  </div>
</template>

<script>

export default {
  components: {
    
  },
  data: function() {
    return {
      tempstr: 'Loading...',
      blockNumber: '',
      timestamp: 'Loading...',
      type: '',
      nftImageSrc: '',
      loaded: false,
      
      netLink: '',
      net: '',

      msgData: {},
      nftData: {},
      nftAddress: '',
      nftId: '',
      
    }
  },
  
  beforeMount() {
    if (this.$route.name == 'readerNft' || this.$route.name == 'readerNetworkNft') {
      this.type = 'nft'
      this.nftAddress = this.$route.params.nftAddress;
      this.nftId = this.$route.params.nftId;
      if (nftData != '') {
        this.nftData = JSON.parse(nftData);
        if (this.nftData.asset_contract.description) {
          this.nftData.asset_contract.description = marked.parse(this.nftData.asset_contract.description);
        }
        if (this.nftData.description) {
          this.nftData.description = marked.parse(this.nftData.description);
        }
        this.loadMessage();
      }
      else {
        let apiUrl = '';
        // console.log(this.$route.name)
        if (this.$route.name == 'readerNft') {
          apiUrl = '/api/nft/'+this.$route.params.nftAddress+'/'+this.$route.params.nftId;
        }
        else {
          apiUrl = '/api/'+this.$route.params.net+'/nft/'+this.$route.params.nftAddress+'/'+this.$route.params.nftId;
        }
        axios.get(apiUrl)
        .then((response) => {
          this.nftData = response['data'];
          // console.log(this.nftData);
          if (this.nftData.success == false) {
            this.loaded = true;
          }
          else {
            if (this.nftData.asset_contract.description) {
              this.nftData.asset_contract.description = marked.parse(this.nftData.asset_contract.description);
            }
            if (this.nftData.description) {
              this.nftData.description = marked.parse(this.nftData.description);
            }
            this.loadMessage();
          }
        })
        .catch((error) => {
          console.log(error);
        })
        .then(() => {
          //
        });
      }
    }
    else if (this.$route.name == 'readerMsg' || this.$route.name == 'readerNetworkMsg') {
      this.type = 'msg';
      if (msgData != '') {
        this.msgData = msgData;
        this.loadMessage();
      }
      else {
        let apiUrl = '';
        // console.log(this.$route.name)
        if (this.$route.name == 'readerMsg') {
          apiUrl = '/api/msg/'+this.$route.params.txHash;
        }
        else {
          apiUrl = '/api/'+this.$route.params.net+'/msg/'+this.$route.params.txHash;
        }
        axios.get(apiUrl)
        .then((response) => {
          this.msgData = response['data'];
          this.loadMessage();
        })
        .catch((error) => {
          console.log(error);
        })
        .then(() => {
          // 
        });
      }
    }
  },

  mounted () {
    document.getElementById('splashScreen').style.display = 'none';
    
    if (typeof(this.$route.params.net) != 'undefined') {
      this.netLink = this.$route.params.net+'.';
    }
    
    nftContract = this.nftAddress;
    nftId = this.nftId;
    
    // this.loadMessage();
  },
  methods: {
    loadMessage: function() {

      window.scrollTo(0, 0);
      let self = this;
      
      if (this.type == 'msg') {
        this.hex2utf8(this.msgData["input"]);
        this.blockNumber = this.msgData["blockNumber"];
        
        this.loaded = true;

        axios.get('/api/msg-timestamp/'+this.blockNumber)
        .then(response => {
          let timestamp = response['data']["timestamp"];
          timestamp = parseInt(timestamp, 16);
          self.convert(timestamp);
        });
      }
      else if (this.type == 'nft') {
        this.loaded = true;

        if (typeof(this.nftData.image_url) != 'undefined') {
          this.nftImageSrc = this.nftData.image_url;
        }
        else {
          // this.nftImageSrc = this.nftData.image.replace("ipfs://", "https://ipfs.io/ipfs/");
          this.loaded = false;
        }

      }

    },
    hex2utf8: function(pStr) {
      try {
        this.tempstr = decodeURIComponent(pStr.replace(/\s+/g, '').replace(/[0-9a-f]{2}/g, '%$&')).substring(2);
        // console.log(this.tempstr);
      }
      catch (err) {
        console.log(err);
        for (let b = 0; b < pStr.length; b = b + 2) {
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
  padding-bottom: 30px;
  padding-top:60px;
  padding-left:20px;
  padding-right:20px;
}

.read-content-nft {
  max-width:660px;
  /* padding-bottom:90px;   */
  margin: 0 auto;
  clear:both;
  padding-left:20px;
  padding-right:20px;
  margin-top: -40px;
}

@media only screen and (max-width: 600px) {
  .read-content {
    padding-top:40px;
    padding-bottom:80px;
  }
  .read-content-nft {
    margin-top: -50px;
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
  /* font-family: 'Noto', sans-serif; */
  font-family: Arial, Helvetica, sans-serif;
}

.nft-titles {
  background-color:#424242;
  color: white;
  font-weight: bold;
}
</style>