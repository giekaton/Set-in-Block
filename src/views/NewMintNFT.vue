<template>
  <div class="reader" style="padding-left:20px;padding-right:20px;">
    
    <!-- New message -->
    <div style="max-width:620px;margin:0 auto;padding-top:50px;">

      <h1>Mint NFT</h1>

      <br><br>

      <span style="font-size:13px;">
        This is a generic ERC-721 non-fungible token (NFT) contract for the Ethereum blockchain, based on the <a href="https://openzeppelin.com/" target="_blank">OpenZeppelin</a> contract standarts. The contract is deployed on the <a href="https://rinkeby.etherscan.io/address/0x2D4Fc4476B168057dc7589aA28e72f2af2017b5A" target="_blank">Rinkeby testnet</a>. Get free Rinkeby ETH <a href="https://faucet.rinkeby.io/" target="_blank">here</a>. Contract source-code is available on <a href="https://github.com/setinblock/nft-erc721-contract" target="_blank">GitHub</a>. To mint a new NFT is free, but you'll need to cover the network transaction fee, using your <a href="https://metamask.io/" target="_blank">MetaMask</a> wallet. You can find your newly minted tokens on <a href="https://testnets.opensea.io/" target="_blank">OpenSea testnet</a>.
      </span>

      <div style="height:40px;"></div>

      <div style="display:grid;grid-template-columns: 1fr 1fr;">
        <div @click="type = 'sb'" class="nft-tab"  v-bind:class="{ 'active-tab': type == 'sb' }" style="margin-right:10px;">
          <b>Automatic script</b>
          <br>
          Not recommended
        </div>

        <div @click="type = 'ipfs'" class="nft-tab"  v-bind:class="{ 'active-tab': type == 'ipfs' }" style="margin-left:10px;">
          <b>Using decentralized storage</b>
          <br>
          Recommended
        </div>
      </div>

      <div style="height:30px;"></div>

      <span v-if="type == 'sb'" >
        <span style="font-size:13px;">The metadata file required for the NFT is generated automatically, using a script hosted on Set in Block, and JSON data encoded in the token's URI. Set in Block itself doesn't host any data, only reads the data from the URI and returns it as JSON. This is a quick and easy approach, but it's not recommended, because the script itself is hosted on a centralized Set in Block server.</span>
        <br>
        <br>
        Name: <input type="text" v-model="json.name">
        <br><br>
        Image URL: <input type="text" v-model="json.image">
        <br>
        <br>
        <div class="overflow-dots">Metadata URI: <a :href="metaLink" style="white-space: nowrap;" target="_blank" >{{metaLink}}</a></div>
        <br>
        <br>
        Gas price: <input type="text" v-model="gasPrice" style="width:80px;">
        <br>
        <br>
        Maximum transaction fee: {{(gasPrice * gasLimit * 0.000000001).toFixed(3)}} ETH
        <br>
        <br>
        Network: <b>Rinkeby Testnet</b>

        <br><br>
        <div class="set-controls" style="float:left;width:94px;">
          <button class="link-set" @click="set()">Mint NFT</button>
        </div>
      </span>

      <span v-if="type == 'ipfs'">
        <span style="font-size:13px;">Upload your image to IPFS, arweave or similar. Create your metadata JSON file by adding token's name, link to token's image on IPFS, description, any attritubes if needed. Upload this metadata file to IPFS, and provide its link for the NFT below.</span>
        <br>
        <br>
        Metadata URI: <input type="text" v-model="metaLink">
        <div style="height:30px;"></div>
        Gas price: <input type="text" v-model="gasPrice" style="width:80px;">
        <br>
        <br>
        Maximum transaction fee: {{(gasPrice * gasLimit * 0.000000001).toFixed(4)}} ETH
        <br>
        <br>
        Network: <b>Rinkeby Testnet</b>

        <br><br>
        <div class="set-controls" style="float:left;width:94px;">
          <button class="link-set" @click="set()">Mint NFT</button>
        </div>
      </span>

      <div style="clear:both;height:20px;"></div>

      <!-- Feedback -->
      <div v-if="feedback != ''" v-html="feedback" class="feedback" style="margin-top:50px;text-align:center;font-weight:bold;"></div>
    </div>

    <div style="clear:both;height:110px;"></div>

  </div>
</template>

<script>
import FileInput from '../components/FileInput.vue';

export default {
  props: ['txHash'],
  
  components: {
    FileInput,
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
      gasPrice: 50,

      json: {
        name: '',
        image: ''
      },
      metaLink: '',
      type: 'sb',
      gasLimit: 240000,
    }
  },

  watch: {
    jsonName() {
      this.updateMetaLink();
    },
    jsonImage() {
      this.updateMetaLink();
    },
    type(val) {
      if(val == 'sb') {
        this.updateMetaLink();
        this.feedback = '';
      }
      else {
        this.metaLink = '';
        this.feedback = '';
      }
    }
  },

  computed: {
    jsonName() {
      return this.json.name;
    },
    jsonImage() {
      return this.json.image;
    },
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

    this.updateMetaLink();
  },

  methods: {
    updateMetaLink() {
      this.metaLink = appDomain+'/nft-metadata/?json='+encodeURIComponent(JSON.stringify(this.json));
    },

    fileData: function (data) {
      this.messageInput += '\n\nFile: '+data.fileName+' ('+data.fileSize+' bytes)\nSHA-256 #: '+data.fileHash;
    },

    set: async function() {
      document.getElementsByClassName('web3modal-modal-lightbox')[0].style.display = 'block';

      await onConnectLoadWeb3Modal();

      if (web3ModalProv) {
        window.web3 = web3ModalProv;
        try {
          web3.eth.net.getId().then(id=>{
            if(id==4){
              try {
                this.setGo();
              } catch (error) {
                console.log(error);
                self.feedback = '<span class="notice">To broadcast the message, first log in to your MetaMask wallet.</span>';
                return;
              }
            }
            else {
              this.feedback = '<span class="notice">Wrong network selected. Change your network to Rinkeby in your MetaMask wallet.</span>';
              return;
            }
          });
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
          this.url = 'https://rinkeby.etherscan.io/tx/'+receipt;
          this.feedback = 'Message recorded<br><span style="cursor:text;font-size:12px;">Transaction hash: '+ receipt +'</span><br><a target="_blank" href="'+this.url+'" style="font-size:12px;" target="_blank">'+this.url+'</a><br>';
        }
      }

      var accountsOnEnable = await ethereum.request({method: 'eth_requestAccounts'});
      let sender = accountsOnEnable[0];

      const contract = require("./../../public/lib/NFT.json")

      const contractAddress = '0x2D4Fc4476B168057dc7589aA28e72f2af2017b5A';
      
      const nftContract = new web3.eth.Contract(contract.abi, contractAddress)

      web3.eth.sendTransaction({
        from: sender,
        to: contractAddress,
        value: 0,
        gas: this.gasLimit,
        gasPrice: this.gasPriceReal,
        data: nftContract.methods.mintNFT(sender, this.metaLink).encodeABI(),
      }, handleReceipt);
      
    },

    // Converts a raw javascript string into a string of single byte characters using utf8 encoding.
    // This makes it easier to perform other encoding operations on the string.
    // rstr2utf8: function(input) {
    //   let output = "";
    //   for (let n = 0; n < input.length; n++) {
    //     let c = input.charCodeAt(n);
    //     if (c < 128) {
    //         output += String.fromCharCode(c);
    //     } else if ((c > 127) && (c < 2048)) {
    //         output += String.fromCharCode((c >> 6) | 192);
    //         output += String.fromCharCode((c & 63) | 128);
    //     } else {
    //         output += String.fromCharCode((c >> 12) | 224);
    //         output += String.fromCharCode(((c >> 6) & 63) | 128);
    //         output += String.fromCharCode((c & 63) | 128);
    //     }
    //   }
    //   return output;
    // },

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
    
    hex2a: function(hexx) {
        var hex = hexx.toString();
        var str = '';
        for (var i = 0; i < hex.length; i += 2)
            str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
        return str;
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

.nft-tab {
  cursor:pointer;text-align:left;font-size:13px;border:1px solid #cacaca;border-radius:5px;background-color:#f9f9f9;padding:20px;
}

.active-tab {
 border: 3px solid rgb(95, 95, 95);
 background: white;
}
</style>