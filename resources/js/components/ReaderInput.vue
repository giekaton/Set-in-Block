<template>
  <div class="title-slogan">
    Set in Block Reader
  </div>

  <div style="height:5px;"></div>

  <span class="slogan2">Read permanent messages and NFTs set in the Ethereum blockchain</span>

  <div style="height:40px;"></div>

  <div class="reader-input">

    <div style="display:grid;grid-template-columns: 1fr 1fr;width:286px;margin:0 auto;">
      <div style="display:grid;grid-template-columns: 1fr 1fr;width:143px;">
        <div @click="changeType('nft')" class="msg-nft-tab"  v-bind:class="{ 'active-nft-tab': type == 'nft' }" title="Read non-fungible token">
          NFT
        </div>
        <div @click="changeType('msg') " class="msg-nft-tab"  v-bind:class="{ 'active-nft-tab': type == 'msg' }" title="Read permanent message">
          MSG
        </div>
      </div>
      <div class="select-network-div-reader" >
        <select name="select-network-reader" id="select-network-reader" v-model="selectedNetwork" title="Select network">
          <option value="main">Main network</option>
          <option v-if="type == 'msg'" value="ropsten">Ropsten</option>
          <option value="rinkeby">Rinkeby</option>
        </select>
      </div>
    </div>

    <div style="height:10px;"></div>

    <div style="max-width:600px;margin:0 auto;">
		  <input v-show="type == 'msg'" type="text" placeholder="Ethereum transaction hash" v-model="txHash" id="tx-input-field" class="tx-input-field">
    
      <div v-show="type == 'nft'" style="display:grid;grid-template-columns:0.79fr 0.01fr 0.2fr;">
        <input type="text" placeholder="NFT Contract Address" v-model="nftContract" id="nft-contract" class="tx-input-field">
        <div></div>
        <input type="text" placeholder="NFT ID" v-model="nftId" id="nft-id" class="tx-input-field">
      </div>

    </div>

    <div style="clear:both;height:15px;"></div>
  	
    <button @click="read" class="two-buttons">Read</button>
    <button @click="read('lucky')" class="two-buttons">Random</button>

    <div style="height:20px;"></div>

  </div>
</template>

<script>
import NFTs from '../../../public/sitemap_urls.json';

export default {
  name: 'ReaderComponent',
  data: function() {
    return {
      nftContract: '',
      nftId: '',
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
        '0xcc1f5ee8e08b38adee27f397565690fdd882f295492ded96fb6d9e6b81000a6a',
        '0xcd98780f0f4d21835f24781eabffdfad3369c7e10ad4cf97cd81e14283a8c48e',
        '0xca8836d2e9ac00053a4549b7f2dfa48c3c9eea60296b658e8bc95a3926ded010',
        '0xd065be0f5777e4a16e2c9e2750bde15c27ab5a4ab866736f3cb6041b450f6ee6',
        '0xc7377190e9c0b40d3e5e7d434430ffeff5df3394dd4e6b56581802ee125185de',
        '0x98f619c174b21b28a5820f9be61cd4f86b51d7889b0eb38840028df34a6ac2c7',
        '0xf750f5c105bc9692d065ebfb7f6abd483336682490106b409e15c295b34b217a',
        '0x7975bf9cf6ce32b3f04cafcca60b1a7bb214d66c5c47ca8c6e65faab787079b6',
        '0xa0904c7011c4195630b4fbffee67df687112a6bae9770fedc1d90179fa838cfb',
        '0x2dc3fcc6a0a23e88a82def9c07248731d98e7178a9fd4cee9ca72fa7e1a28774',
        '0xea8ffdabd3dc2a43b643640be59a93953fa25d273d5beaa34ed96b7fc5f3d033',
        '0x87411bb61a6bf1cbc81a8f193906f0aeb331309696c1d5167053144d13332d49',
        '0xa988c166bcbf94726180acd7bfa313319dcf85d9a5ad980af6b5db809f0ce338',
      ],
      nftRandom: NFTs['nftRandom'],
      message: 'Loading...',
      content: false,
      timestamp: '',
      type: 'nft',

      selectedNetwork: '',
    }
  },
  methods: {
    changeType(type) {
      this.type = type;
      readerType = type;
    },
    read: function(lucky) {
      selectNetwork(this.selectedNetwork);

      if (lucky == 'lucky' && this.type == 'msg') {
        this.selectedNetwork = 'main';
        selectNetwork(this.selectedNetwork);
        this.txHash = this.txHashArray[Math.floor(Math.random()*this.txHashArray.length)];
      }

      if (this.type == 'msg' && this.txHash == '') {
        return alert('Enter Ethereum transaction hash');
      }
      
      let network = '';
      if (this.selectedNetwork != 'main') {
        network = '/'+this.selectedNetwork;
      }

      if (this.type == 'msg') {
        txHash = this.txHash;
        this.$router.push({ path: network+'/msg/'+this.txHash })
      }
      else if (this.type == 'nft') {
        // console.log("R", this.nftId, this.nftContract);
        // nftId = this.nftId;
        // nftContract = this.nftContract;
        if (lucky == 'lucky' && this.type == 'nft') {
          this.selectedNetwork = 'main';
          selectNetwork(this.selectedNetwork);
          // let url = this.nftArray[Math.floor(Math.random()*this.nftArray.length)];

          let randomProperty = function (obj) {
              let keys = Object.keys(obj);
              let random = keys.length * Math.random() << 0;
              let randomCollection = obj[keys[random]];
              let key = keys[random];
              let id = null;

              if (key == 'other') {
                id = randomCollection[Math.floor(Math.random()*randomCollection.length)]
                return (id)
              }
              else {
                id = Math.floor(Math.random()*randomCollection['count'])
                return ('/nft/'+randomCollection['contract']+'/'+id)
              }
          }
          this.$router.push(randomProperty(this.nftRandom))
        }
        else {
          
          if (this.nftContract == "") {
            document.getElementById('nft-contract').focus();
            return;
          }
          if (this.nftId == "") {
            document.getElementById('nft-id').focus();
            return;
          }

          this.$router.push({ path: network+'/nft/'+this.nftContract+'/'+this.nftId })
        }
      }

    },
    hex2utf8: function(pStr) {
      try {
        this.message = decodeURIComponent(pStr.replace(/\s+/g, '').replace(/[0-9a-f]{2}/g, '%$&')).substring(2);
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
  },

  mounted () {
    if (txHash) {
      this.txHash = txHash;
    }
    if (readerType) {
      this.type = readerType;
    }
    if (nftContract && nftId) {
      this.nftContract = nftContract;
      this.nftId = nftId;
    }
    this.selectedNetwork = selectedNetwork;
  }
}
</script>


<style>

  .select-network-div-reader {
    width:143px;
    padding: 6px;
    height: 40px;
  }

  select {
    width: 132px;
    -webkit-appearance: button;
    -moz-appearance: button;
    -webkit-user-select: none;
    -moz-user-select: none;
    -webkit-padding-end: 20px;
    -moz-padding-end: 20px;
    -webkit-padding-start: 2px;
    -moz-padding-start: 2px;
    background-color: #F9F9F9;
    border: 1px solid #cacaca;
    border-radius: 5px;
    color: rgb(23, 23, 23);
    font-size: inherit;
    overflow: hidden;
    white-space: nowrap;
    font-size: 13px;
    padding: 6px;
    height:30px;
}

  @media screen and (max-width: 500px) {
    .select-network-div-reader {
      display:block;
      float:left;
      padding-left: 0px;
    }
    select {
      width: 120px;
    }
  }

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
  
  .msg-nft-tab {
  cursor:pointer;
  text-align:center;
  font-size:13px;
  border:1px solid #cacaca;
  border-radius:5px;
  background-color:#f9f9f9;
  /* padding:3px; */
  padding-top:8px;
  margin:6px;
  /* box-sizing: content-box; */
  height:30px;
}

.active-nft-tab {
 border: 3px solid rgb(95, 95, 95);
 background: white;
 padding-top:6px;
}
</style>
