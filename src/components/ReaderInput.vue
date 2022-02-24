<template>
  <div class="reader-input">

    <div style="height:20px;"></div>

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
        '0x2dc3fcc6a0a23e88a82def9c07248731d98e7178a9fd4cee9ca72fa7e1a28774',
        '0xea8ffdabd3dc2a43b643640be59a93953fa25d273d5beaa34ed96b7fc5f3d033',
        '0x87411bb61a6bf1cbc81a8f193906f0aeb331309696c1d5167053144d13332d49',
        '0xa988c166bcbf94726180acd7bfa313319dcf85d9a5ad980af6b5db809f0ce338',
      ],
      // nftArray: [
      //   '/nft/0xBC4CA0EdA7647A8aB7C2061c2E118A18a936f13D/8580',
      //   '/nft/0xa7d8d9ef8D8Ce8992Df33D8b8CF4Aebabd5bD270/13000109',
      //   '/nft/0xC8BcbE0E8ae36D8f9238cd320ef6dE88784B1734/3926',
      //   '/nft/0x41A322b28D0fF354040e2CbC676F0320d8c8850d/11',
      //   '/rinkeby/nft/0x2D4Fc4476B168057dc7589aA28e72f2af2017b5A/2',
      //   '/nft/0xa7d8d9ef8D8Ce8992Df33D8b8CF4Aebabd5bD270/23000213',
      //   '/nft/0x60e4d786628fea6478f785a6d7e704777c86a7c6/4849',
      //   '/nft/0x60e4d786628fea6478f785a6d7e704777c86a7c6/4850',
      //   '/nft/0x60e4d786628fea6478f785a6d7e704777c86a7c6/4851',
      //   '/nft/0x60e4d786628fea6478f785a6d7e704777c86a7c6/4852',
      //   '/nft/0x60e4d786628fea6478f785a6d7e704777c86a7c6/4853',
      //   '/nft/0x60e4d786628fea6478f785a6d7e704777c86a7c6/4854',
      //   '/nft/0x1CB1A5e65610AEFF2551A50f76a87a7d3fB649C6/360',
      //   '/nft/0x1CB1A5e65610AEFF2551A50f76a87a7d3fB649C6/361',
      //   '/nft/0x1CB1A5e65610AEFF2551A50f76a87a7d3fB649C6/362',
      //   '/nft/0x1CB1A5e65610AEFF2551A50f76a87a7d3fB649C6/363',
      //   '/nft/0x1CB1A5e65610AEFF2551A50f76a87a7d3fB649C6/364',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/374',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/376',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/378',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/379',
      //   '/nft/0x1a92f7381b9f03921564a437210bb9396471050c/1490',
      //   '/nft/0x1a92f7381b9f03921564a437210bb9396471050c/1491',
      //   '/nft/0x1a92f7381b9f03921564a437210bb9396471050c/1492',
      //   '/nft/0x1a92f7381b9f03921564a437210bb9396471050c/1493',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/86',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/87',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/16',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/5',
      //   '/nft/0x41a322b28d0ff354040e2cbc676f0320d8c8850d/4',
      //   '/nft/0xb47e3cd837dDF8e4c57F05d70Ab865de6e193BBB/20',
      //   '/nft/0xb47e3cd837dDF8e4c57F05d70Ab865de6e193BBB/22',
      //   '/nft/0xb47e3cd837dDF8e4c57F05d70Ab865de6e193BBB/24',
      //   '/nft/0xb47e3cd837dDF8e4c57F05d70Ab865de6e193BBB/26',
      // ],
      nftRandom: {
        'cryptoPunks': {
          contract: '0xb47e3cd837dDF8e4c57F05d70Ab865de6e193BBB',
          count: 9999,
        },
        'superRare': {
          contract: '0x41a322b28d0ff354040e2cbc676f0320d8c8850d',
          count: 100
        },
        'coolCats': {
          contract: '0x1a92f7381b9f03921564a437210bb9396471050c',
          count: 8888
        },
        'crypToadz': {
          contract: '0x1CB1A5e65610AEFF2551A50f76a87a7d3fB649C6',
          count: 5000,
        },
        'mutantApes': {
          contract: '0x60e4d786628fea6478f785a6d7e704777c86a7c6',
          count: 9999
        },
        'boredApes': {
          contract: '0xBC4CA0EdA7647A8aB7C2061c2E118A18a936f13D',
          count: 9999
        },
        'winterBears': {
          contract: '0xC8BcbE0E8ae36D8f9238cd320ef6dE88784B1734',
          count: 9999
        },
        'cryptoBulls': {
          contract: '0x469823c7b84264d1bafbcd6010e9cdf1cac305a3',
          count: 5000
        },
        'apeWives': {
          contract: '0xf1268733c6fb05ef6be9cf23d24436dcd6e0b35e',
          count: 5000
        },
        'voxCollectibles': {
          contract: '0xad9fd7cb4fc7a0fbce08d64068f60cbde22ed34c',
          count: 5000
        },
        'cyberKongz': {
          contract: '0xad9fd7cb4fc7a0fbce08d64068f60cbde22ed34c',
          count: 3000
        },
        'doodles': {
          contract: '0x8a90cab2b38dba80c64b7734e58ee1db38b8992e',
          count: 5000
        },
        'thingdoms': {
          contract: '0x0aa7420c43b8c1a7b165d216948870c8ecfe1ee1',
          count: 5000
        },
        'flowerGirls': {
          contract: '0x2efa07cac3395599db83035d196f2a0e7263f766',
          count: 5000
        },
        'wodlfOfWomen': {
          contract: '0xe785e82358879f061bc3dcac6f0444462d4b5330',
          count: 9999
        },
        'apesInSpace': {
          contract: '0x7a3b97a7400e44dadd929431a3640e4fc47daebd',
          count: 9999
        },
        'zenApe': {
          contract: '0x838804a3dd7c717396a68f94e736eaf76b911632',
          count: 5000
        },
        'creatureWorld': {
          contract: '0xc92ceddfb8dd984a89fb494c376f9a48b999aafc',
          count: '9999'
        },
        'cryptoMories': {
          contract: '0x1a2f71468f656e97c2f86541e57189f59951efe7',
          count: '9999'
        },
        'theLittles': {
          contract: '0xc6ec80029cd2aa4b0021ceb11248c07b25d2de34',
          count: 9999
        },
        'littleLemon': {
          contract: '0x0b22fe0a2995c5389ac093400e52471dca8bb48a',
          count: 5000
        },
        'cryptoCoven': {
          contract: '0x5180db8f5c931aae63c74266b211f580155ecac8',
          count: 5000
        },
        'theHumanoids': {
          contract: '0x3a5051566b2241285be871f650c445a88a970edd',
          count: 9999
        },
        'humansMetaverse': {
          contract: '0x8a9ece9d8806eb0cde56ac89ccb23a36e2c718cf',
          count: 5000
        },
        'gutterCatGang': {
          contract: '0xedb61f74b0d09b2558f1eeb79b247c1f363ae452',
          count: 3000
        },
        'swampVerse': {
          contract: '0x95784f7b5c8849b0104eaf5d13d6341d8cc40750',
          count: 5000
        },
        'deadFellaz': {
          contract: '0x2acab3dea77832c09420663b0e1cb386031ba17b',
          count: 9999
        },
        'mfers': {
          contract: '0x79fcdef22feed20eddacbb2587640e45491b757f',
          count: 9999
        },
        'theShiboshis': {
          contract: '0x11450058d796b02eb53e65374be59cff65d3fe7f',
          count: 9999
        },
        'boonjiProject': {
          contract: '0x4cd0ea8b1bdb5ab9249d96ccf3d8a0d3ada2bc76',
          count: 9999
        },
        'alphaGirl': {
          contract: '0x8c5029957bf42c61d19a29075dc4e00b626e5022',
          count: 5000
        },
        'asmBrains': {
          contract: '0xd0318da435dbce0b347cc6faa330b5a9889e3585',
          count: 3000
        },
        'mutantCats': {
          contract: '0xaadba140ae5e4c8a9ef0cc86ea3124b446e3e46a',
          count: 9999
        },
        'galacticApes': {
          contract: '0x12d2d1bed91c24f878f37e66bd829ce7197e4d14',
          count: 5000
        },
        'robotos': {
          contract: '0x099689220846644f87d1137665cded7bf3422747',
          count: 5000
        },
        'hashMasks': {
          contract: '0xc2c747e0f7004f9e8817db2ca4997657a7746928',
          count: 9999
        },
        'slimHoods': {
          contract: '0x2931b181ae9dc8f8109ec41c42480933f411ef94',
          count: 5000
        },
        // 'other': [
        //   '/nft/0xa7d8d9ef8D8Ce8992Df33D8b8CF4Aebabd5bD270/13000109',
        //   '/rinkeby/nft/0x2D4Fc4476B168057dc7589aA28e72f2af2017b5A/2',
        //   '/nft/0xa7d8d9ef8D8Ce8992Df33D8b8CF4Aebabd5bD270/23000213',
        // ]
      },
      message: 'Loading...',
      content: false,
      timestamp: '',
      type: 'nft',

      selectedNetwork: '',
    }
  },


  methods: {
    embed: function() {
      alert("This feature is coming soon. Please come back in a few days.")
    },
    readExamples: function(hash) {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0;
      
      this.txHash = hash;
      this.read();
    },
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

              // return [key, randomCollection['contract'], id];
              
          };

          // console.log(randomProperty(this.nftRandom));
          // return;

          // this.$router.push({ path: url })
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
