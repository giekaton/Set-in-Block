<template>
  <div class="reader" style="padding-left:20px;padding-right:20px;">
    
    <!-- New message -->
    <div style="max-width:620px;margin:0 auto;padding-top:50px;">

      <h1>Content Copyright Protection With Ethereum</h1>

      <br><br>

      <div style="text-align:left;font-size:13px;border:1px solid #cacaca;border-radius:5px;background-color:#f9f9f9;padding:20px;">
          Enter your work's name and description in the message field to record it in the Ethereum blockchain for permanent storage. You can also include first publication date and author's name.
          <br><br>
          Hash the work by selecting its file (.png, .js or other), and submit only the SHA-256 hash. Keep the original file in your archive.
          <br><br>
          Optionally, upload the file to IPFS and add its link in the message. See <a href="/msg/0x2dc3fcc6a0a23e88a82def9c07248731d98e7178a9fd4cee9ca72fa7e1a28774" target="_blank">example</a>.
          <br><br>
          In case of copyright infringement, use our <router-link to="/cease-and-desist-letter-template" target="_blank">cease and desist letter template</router-link>.
          <br><br>
          <b v-if="!moreInfo"><span class="link" @click="moreInfo = true">More info...</span></b>
          <b v-if="moreInfo"><span class="link" @click="moreInfo = false">Close</span><br><br><br></b>
          
          <span v-if="moreInfo">
            <h2>Intellectual Property and Copyright Protection with Blockchain</h2>

            <p>You can create a proof of existence for your authentic work, e.g. design, musical composition, source code, movie script or anything else that can be considered as intellectual property and falls under copyright protection law.</p>

            <p>As an owner of the work, you can prevent the unauthorized use of your intellectual property. For this, you need to have proof that you are the author or have the licensing rights to the original work.</p>

            <p>Set in Block allows you to create such proof on the blockchain inexpensively and quickly, without the need for third parties or complicated registration procedures. Blockchain-based proofs are immutable and incorruptible, and they never expire.</p>

            <p>In a case of copyright infringement, you are welcome to use our Cease and Desist letter template.</p>

            <br />

            <router-link to="/cease-and-desist-letter-template">
              <button>Cease and desist letter</button>
            </router-link>

            <br />
            <br />

            <span style="font-size: 12px;">
              DISCLAIMER: THIS CEASE AND DESIST LETTER IS A GENERAL TEMPLATE THAT MIGHT NOT FIT YOUR INDIVIDUAL NEEDS. THE PROVIDED INFORMATION IN THE FOLLOWING FAQ AND THE CEASE AND DESIST LETTER TEMPLATE DOES NOT CONSTITUTE LEGAL ADVICE. USING THIS INFORMATION DOES NOT CREATE AN ATTORNEY-CLIENT RELATIONSHIP BETWEEN YOU AND SET IN BLOCK. IF YOU WISH TO RECEIVE LEGAL ADVICE, YOU SHOULD HIRE AN ATTORNEY WHO IS ABLE TO ASSISIST WITH YOUR SPECIFIC SITUATION. USING THE PROOF OF DESIGN OWNERSHIP CREATED WITH SET IN BLOCK, THE ATTORNEY WILL TAILOR HIS/HER ADVICE TO YOUR SPECIFIC NEEDS.
            </span>

            <div style="height: 40px;"></div>

            <h2>FAQ</h2>

            <h4>How can I protect my authentic work using Set in Block?</h4>

            <p>The best practice is to mention the ID (SHA-256 hash) of the authentic work in the Set in Block message. The ID is unique to that work and being written on the blockchain, it mathematically proves that the work existed at the time of the message creation. You can also mention the authorship, ownership.</p>
            
            <div class="faq-spacer"></div>

            <h4>What steps do I need to take to create such blockchain protection for my work?</h4>

            <p>
              Use the <router-link to="/copyright-protection" class>new message</router-link> interface on Set in Block.
            </p>
            <p>
              When you select a file with your authentic work, Set in Block generates the unique ID (SHA-256 hash) that represents that file. The ID is generated
              on your local device, the file itself is not being uploaded to the internet, and its contents are not seen by anyone. This unique ID
              represents your file's integrity. There is no other file in existence that has the same ID.
            </p>
            <p>You can also include a text message that will be added to the blockchain next to your design's ID. For example, you can mention the author's name or anything else that is related to that work. Keep in mind, that this information will be public.</p>
            <p>
              The app then allows you to add the ID and the text message (if provided) to the Ethereum transaction on the blockchain and it shows the date when this data
              was added. This blockchain based information is immutable and incorruptible, and it never expires. By having this information on the
              blockchain, you have a proof that the design file, represented by the particular ID, existed prior to a specific date and that you are
              the author of the design. You can then use this proof to legally defend your original work.
            </p>
            <p>
              Example:
              <br />
              <br />John selects a design file with the ID 'f5eb462944cadc0c387c50f6388b69035224bf9662dc153e2789573bb03be28b' and then adds the message '© Jordan Whitfield'.
              <br />
              <br />When he submits the message to the blockchain, he gets the transaction nr, in this case it is 0x6dc3b8882878f4ff72d59c71ef7a8aaf615c8cc0b8d5f82dbe4822283f877b45. The submission fee was $0.01.
              <br />
              <br />He can view this transaction on
              <a
                href="https://etherscan.io/tx/0x6dc3b8882878f4ff72d59c71ef7a8aaf615c8cc0b8d5f82dbe4822283f877b45"
                target="_blank"
              >Etherscan</a> (or any other Ethereum block explorer). His message is available in the transaction's “Input Data” field.
              <br />
              <br />The same message can also be read on
              <a
                href="https://setinblock.com/0x6dc3b8882878f4ff72d59c71ef7a8aaf615c8cc0b8d5f82dbe4822283f877b45"
                target="_blank"
              >Set in Block</a>.
            </p>

            <div class="faq-spacer"></div>

            <h4>Where can I safely store the original file?</h4>

            <p>Create a new private GitHub repository. This is free and you can manage your files and folders easily with the web interface. When you upload the file and its Ethereum hash on GitHub, you then have also GitHub's timestamp. Even though GitHub is a centralized service, their timestamps are still highly reliable proof of existence.</p>

            <p>Having both, Ethereum and GitHub timestamps, you have a mathematically-based proof (Ethereum) and another highly reliable proof based on the GitHub server's time.</p>

            <p>Now if someday in the future you will see your work stolen, you will have a reliable proof that the work is yours. Having this proof, you can then employ different strategies, starting with the cease and desist letter, to prevent unauthorized use of your work.</p>

            <div class="faq-spacer"></div>

            <h4>If Set in Block shuts down or becomes somehow unreachable, what happens to my record?</h4>

            <p>
              Even if Set in Block is somehow not reachable, your blockchain record is never lost. It can be easily viewed and verified
              directly on the Ethereum blockchain, bypassing Set in Block entirely, as in the Etherscan example above.
            </p>

            <div class="faq-spacer"></div>

            <h4>Can the record expire?</h4>

            <p>The record has no expiration date, it is permanent. Even if at some point Ethereum blockchain stops operating, its archive should be accessible for as long as we can imagine.</p>
            
            <div class="faq-spacer"></div>

            <h4>Can someone change or corrupt my record or can it be lost in any way?</h4>
            
            <p>
              The unique quality of the blockchain is that it is immutable and incorruptible, and because of its
              <a
                href="https://en.wikipedia.org/wiki/Trusted_timestamping#Decentralized_timestamping_on_the_blockchain"
                target="_blank"
              >decentralized</a> nature,
              the data you add to the blockchain is never lost.
            </p>

            <p>Theoretically, there is always a chance that an unknown flaw of blockchain will be discovered or that some new technology will make it obsolete, but from the beginning of the blockchain technology (2008), this has never happened, even though there were <a href="https://www.youtube.com/watch?v=Rw8W92iIHZ8" target="_blank">countless attempts</a> to break it one way or another.</p>

            <div class="faq-spacer"></div>

            <h4>Is a blockchain based proof accepted as legally valid evidence in courts around the globe?</h4>
            
            <p>Below is the excerpt from the Oct 13, 2017 <a href="http://www.grantthornton.com.mt/insights/blockchain-technology-and-intellectual-property-ownership/" target="_blank">article</a>, published on the Grant Thornton website.</p>
            
            <p>
              "With expert testimony, the purely mathematical strength of a blockchain certificate can be presented in court everywhere.
              The main concern, however, is that the application is also not yet widespread enough to prescribe legal validation.
            </p>
            
            <p>
              Thankfully many countries are already taking the necessary steps, having recognised the convenience of the blockchain as a public registry.
              Legislators in many countries such as the US, Sweden, Japan, Brazil, UK and Dubai are pushing forward several initiatives to
              acknowledge evidence and records based on blockchain and distributed ledger technologies. The EU is heading in the same direction, and
              the current eIDAS regulation (an EU regulation on electronic identification and trust services for electronic transactions in the
              internal market) already prohibits courts from denying the legal admissibility of timestamps as evidence on sole grounds that the
              timestamp does not meet the more stringent requirements of an EU-qualified timestamp."
            </p>
            
            <p>Another (Jan 9, 2020) <a href="https://www.coindesk.com/illinois-legalizes-blockchain-contracts" target="_blank">example</a> is from Illinois.</p>

            <div class="faq-spacer"></div>

            <h4>How can I prove that I am the author of a particular blockchain record?</h4>
            
            <p>
              There are two ways how you can do this:
              <br />
              <br />
              1. You can include author's name in the message that you are going to record. The message will be added to the blockchain and can be read by anyone.
              <br />
              <br />
              2. Get proof without disclousing the author's identity? Possible. You can include the author's name in the file, record file's ID on the blockchain and keep the original file in your archive. You then have a proof that the file with the author's name existed prior to the record's creation date.
            </p>
            
            <div class="faq-spacer"></div>

            <h4>How can I defend my authentic work if I see the infringement?</h4>
            
            <p>
              Generate cease and desist letter at the top of this page. Then email this letter to the person or company which is infringing your intellectual property rights. Attach your original authentic work and also screeshots where the infringer is using it without your permission.
              <br />
              <br />
              If the person or company does not collaborate, then send this letter to the authorities, e.g., the hosting provider of the website
              or use the copyright infringement form to contact Facebook, YouTube or any other web platform if the intellectual property infringement is on any of these sites.
              The illegal use of your intellectual property will then be taken down by the authorities.
              <br />
              <br />
              If the above does not help, then the next step is to take legal action. Having a blockchain proof of your authentic work, you are in a good starting position.
            </p>

            <div class="faq-spacer"></div>

            <h4>What kind of authentic works can be protected?</h4>
            
            <p>
              Any kind of original works that fall under copyright law can be protected. You can protect anything that you can represent in image or text.
              <br />
              <br />
              Apart from copyright protection, you can also "protect" ideas, sketches, prototypes... Even though ideas, in general, are not eligible for copyright protection, you can still use a blockchain proof to show that you are the author of the idea. This can be a significant proof, if not on legal, then at least on moral grounds.
            </p>

            <div class="faq-spacer"></div>

            <h4>How the file's ID is generated? Is it enough to add to the blockchain only the ID and not the file itself?</h4>
            
            <p>
              The ID is a <a href="https://en.wikipedia.org/wiki/SHA-2" target="_blank">SHA-256</a> hash. You can generate this hash independently as SHA-256 is a well known and standardized hashing algorithm.
              <br />
              <br />
              When you hash a file, you get a unique string that represents the integrity of your file. If you change your file even slightly, the hash that represents that file will be completely different. If you can prove that a particular hash existed on a specific date, it means that the design file, represented by that hash, also existed.
              <br />
              <br />
              You can create a similar SHA-256 hash from your file without the need of using Set in Block, e.g., by using this online <a href="https://emn178.github.io/online-tools/sha256_checksum.html" target="_blank">SHA-256 hash generator</a>.
              <br />
              <br />
              To add only the file's hash (ID) is entirely sufficient proof for the protection because there is no other file in existence with the same ID. To add the whole file to the blockchain is possible, but that would be highly unpractical. Firstly, because of the privacy reasons - the file's contents would be revealed to everyone. Secondly, adding data to the blockchain is highly expensive because of the distributed nature of the technology. To add the whole image file to the blockchain would cost thousands of dollars.
            </p>
          </span>

      </div>

      <br><br><br>

      <h1>New Copyright Protection</h1>
      
      <div style="height:15px;"></div>

      <file-input style="font-size:14px;" v-on:file-data="fileData" />
      
      <div style="height:20px;"></div>
      
      <textarea class="message-input" v-model="messageInput"></textarea>

      <div style="float:left;margin-top:5px;text-align:left;line-height:18px;font-size:13px;width:200px;">
        <span >
          Message size: {{ bytesCalc }} bytes<br>
          Max tx fee: {{ txFeeCalc }} ETH
        </span>
      </div>

      <div style="float:left;margin-top:5px;text-align:left;line-height:17px;font-size:13px;">
        <span>
          Gas price: <input v-model="gasPrice" type="numeric" style="width:40px;padding-left:3px;height:18px;">
          <br>
          <a href="https://ethgasstation.info/" target="_blank" style="font-size:11px;">Gas Station</a>
        </span>
      </div>

      <br>

      <div class="set-controls">
        <button class="link-set" @click="set()">Set</button>
        <div class="link-preview" @click="content = true;">Preview</div>
      </div>

    </div>

    <div style="clear:both;height:70px;"></div>

    <!-- Feedback -->
    <div v-if="feedback != ''" v-html="feedback" class="feedback" style="text-align:center;font-weight:bold;"></div>

    <div v-if="feedback != ''" style="height:40px;"></div>

    <div style="height:40px;"></div>

    <!-- Preview -->
    <div v-if="content" class="reader-msg serif" style="min-height:55px;margin:0 auto;max-width:620px;box-shadow: #e9e9e9 0px 4px 8px 3px;">
      <div style="position:absolute;top:18px;right:45px;font-size:13px;color:red;" class="sans-serif">
        Message preview
      </div>
      <div style="position:absolute;top:11px;right:13px;cursor:pointer;font-size:20px;" @click="content = false">✕</div>
      <span v-if="msgType == 'msgPlainText'">
        {{ messageInput }}
      </span>
      <span v-if="msgType == 'msgIpProtection'">
        {{ messageInputIp }}                
      </span>
      <div v-if="message != 'Message is not available. Try a different tx hash.'">
        <div style="border-top:1px solid #cccccc;width:100%;margin-top:50px;padding-top:0px;"></div>
        <div class="reader-tx-details sans-serif" style="line-height:18px;margin-bottom:20px;margin-top:10px;">
          The above message is stored permanently on the blockchain. It cannot be edited or deleted.<br>
          Message created: Timestamp (available after the message is recorded)
          Ethereum transaction hash: Unique transaction hash (available after the message is recorded)
        </div>
      </div>
    </div>
    
    <div v-if="content" style="height:40px;"></div>

    <div style="height:40px;"></div>

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
      gasPrice: 3,
      moreInfo: false,
    }
  },

  computed: {
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
  },

  methods: {
    fileData: function (data) {
      this.messageInput += '\n\nFile: '+data.fileName+' ('+data.fileSize+' bytes)\nSHA-256 #: '+data.fileHash;
    },

    set: async function() {
      document.getElementsByClassName('web3modal-modal-lightbox')[0].style.display = 'block';

      await onConnectLoadWeb3Modal();

      if (web3ModalProv) {
        window.web3 = web3ModalProv;
        try {
          this.setGo();
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
          this.url = '/msg/'+receipt;
          this.feedback = 'Message recorded<br><span style="cursor:text;font-size:12px;">Transaction hash: '+ receipt +'</span><br><br>Read the message on Set in Block<br><a href="'+this.url+'" style="font-size:12px;" target="_blank">https://setinblock.com/msg/'+receipt+'</a><br><br><br>';
        }
      }

      let message = this.messageInput;
      
      let accountsOnEnable = await web3.eth.getAccounts();
      let sender = accountsOnEnable[0].toLowerCase();

      message = this.rstr2utf8(message);
      message = this.str2hex(message);
      web3.eth.sendTransaction({
        from: sender,
        to: address,
        value: 0,
        gas: gasCount(message) + 30000,
        gasPrice: this.gasPriceReal,
        data: message,
      }, handleReceipt);
      
    },

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

</style>