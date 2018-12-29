<template>
  <div class="reader">

    <!-- Header -->
    <div style="float:left;height:20px;width:20px;background-color:#767676;"></div>
    <div style="float:left;padding-left:7px;font-size:18px;font-family:'Arapey',serif;color:black;">Set in Block</div>
    <div style="float:left;padding-left:6px;font-size:9px;padding-top:3px;color:#bebebe;" class="sans-serif">Reader</div>
    <div style="float:right;padding-top:2px;font-size:14px;" class="sans-serif"><router-link to="/">New message</router-link></div>

    <div class="read-content">

      <span class="pre-formatted serif">{{ tempstr }}</span>

      <div v-if="tempstr != 'Message is not available. Try a different tx hash.'">
        <div style="border-top:1px solid #cccccc;width:100%;margin-top: 80px;padding-top:10px;"></div>
          <div class="reader-tx-details sans-serif" style="line-height:18px;">
            The above message is stored permanently on the blockchain. It cannot be edited or deleted.<br><br>
            Message creation date: 
            <a v-bind:href="'https://etherscan.io/tx/'+txHash" target="_blank"><span class="sans-serif" title="Link to Etherscan">{{ timestamp }}</span>
          </a>
          <br>    
          <div class="overflow-dots">
            Ethereum transaction hash: 
            <a v-bind:href="'https://etherscan.io/tx/'+txHash" target="_blank" title="Link to Etherscan">{{ txHash }}</a>
          </div>
          <br><br>
        </div>
      </div>
    </div>

    <div class="reader-footer">
      <div class="width">
        <a href="https://github.com/giekaton/set-in-block" target="_blank" title="GitHub" class="sans-serif" style="margin-right:2px;color:#828282;">
          Set in Block v0.7</a>
        <div style="float:right;" class="sans-serif">
          <router-link to="/" style="color:#828282;">Home</router-link>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script>
export default {
  props: ['txHash'],
  name: 'home',
  components: {
    
  },
  data: function() {
    return {
      tempstr: 'Loading...',
      output: '',
      decoded: '',
      blockNumber: '',
      timestamp: 'Loading...',
      title: 'asd'
    }
  },
  mounted () {
    document.getElementById('splashScreen').style.display = 'none';
    window.scrollTo(0, 0);
    let self = this;
    
    axios.get(etherscan + '/api?module=proxy&action=eth_getTransactionByHash&txhash=' + this.txHash)
    .then(
      function (response) {
        // console.log(response);
        self.hex2utf8(response["data"]["result"]["input"]);
        self.blockNumber = response["data"]["result"]["blockNumber"];
        axios.get(etherscan + '/api?module=proxy&action=eth_getBlockByNumber&tag='+self.blockNumber+'&boolean=true')
          .then (
            function (response) {
              // console.log(response);

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
  methods: {
    hex2utf8: function(pStr) {
      try {
        this.tempstr = decodeURIComponent(pStr.replace(/\s+/g, '').replace(/[0-9a-f]{2}/g, '%$&')).substring(2);
        console.log(this.tempstr);
      }
      catch (err) {
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
  margin-top: 20px;
}

.read-content {
  max-width: 700px;
  margin: 0 auto;
  clear:both;
  padding-bottom: 120px;
  padding-top:140px;
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

.reader-footer {
  background-color: rgb(231, 231, 231);
  border-top: 1px solid rgb(179, 179, 179);
  position: absolute;
  left: 0;
  bottom: 0;
  height: 50px;
  width: 100%;
  overflow: hidden;
  font-size: 14px;
  padding-top: 15px;
}

.width {
  max-width: 1032px;
  padding-left: 20px;
  padding-right: 20px;
  margin: 0 auto;
}

.social-icon {
  width: 20px;
  margin-right: 10px;
  margin-top: 10px;
}

.sans-serif {
  font-family: 'Roboto', sans-serif;
}
</style>