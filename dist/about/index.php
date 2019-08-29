<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"><meta name="image" content="https://setinblock.com/img/social.png?v=001"><meta itemprop="image" content="https://setinblock.com/img/social.png?v=001"><meta name="twitter:site" content="@setinblock"><meta name="twitter:image:src" content="https://setinblock.com/img/social.png?v=001"><meta property="og:image" content="https://setinblock.com/img/social_fb.png?v=001"><meta property="og:type" content="website"><link rel="apple-touch-icon" sizes="180x180" href="https://setinblock.com/img/favicon/apple-touch-icon.png?v=xQOzbvWeR2"><link rel="icon" type="image/png" sizes="32x32" href="https://setinblock.com/img/favicon/favicon-32x32.png?v=xQOzbvWeR2"><link rel="icon" type="image/png" sizes="16x16" href="https://setinblock.com/img/favicon/favicon-16x16.png?v=xQOzbvWeR2"><link rel="manifest" href="https://setinblock.com/img/favicon/site.webmanifest?v=xQOzbvWeR2"><link rel="mask-icon" href="https://setinblock.com/img/favicon/safari-pinned-tab.svg?v=xQOzbvWeR2" color="#686868"><link rel="shortcut icon" href="https://setinblock.com/img/favicon/favicon.ico?v=xQOzbvWeR2"><meta name="apple-mobile-web-app-title" content="Set in Block"><meta name="application-name" content="Set in Block"><meta name="msapplication-TileColor" content="#f4f4f4"><meta name="msapplication-config" content="https://setinblock.com/img/favicon/browserconfig.xml?v=xQOzbvWeR2"><meta name="theme-color" content="#f4f4f4"><link href="https://fonts.googleapis.com/css?family=Arapey|Noto+Sans:400,700" rel="stylesheet"><script src="https://cdn.jsdelivr.net/npm/ethjs@0.3.4/dist/ethjs.min.js"></script><script src="https://unpkg.com/axios/dist/axios.min.js"></script><script>// // TESTNET
      // infura = "https://ropsten.infura.io/v3/74444a880eb74bf1acfb2c32463b7d4a";
      // etherscan = "https://ropsten.etherscan.io";
      // // generate a random Ethereum address
      // address = Eth.keccak256(Math.random().toString()).substring(0, 42);
    
      // MAINNET
      infura = "https://mainnet.infura.io/v3/74444a880eb74bf1acfb2c32463b7d4a";
      etherscan = "https://api.etherscan.io";
      // generate a random Ethereum address
      address = Eth.keccak256(Math.random().toString()).substring(0, 42);

      const eth = new Eth(new Eth.HttpProvider(infura));

      window.addEventListener('load', function() {
        if (typeof window.web3 !== 'undefined' && typeof window.web3.currentProvider !== 'undefined') {
          eth.setProvider(window.web3.currentProvider);
        }
      });

      const gasPerByte = 68;

      function gasCount(string) {
        var bytes = encodeURI(string).split(/%..|./).length - 1;
        return bytes * gasPerByte / 2;
      }</script><script>window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
      ga('create', 'UA-57930548-16', 'auto'); 
      ga('set', 'anonymizeIp', true);
      ga('send', 'pageview');</script><script src="https://www.google-analytics.com/analytics.js" async="" defer=""></script><link href="/css/app.38409ab6.css" rel="preload" as="style"><link href="/js/app.690a98b6.js" rel="preload" as="script"><link href="/js/chunk-vendors.69a19beb.js" rel="preload" as="script"><link href="/css/app.38409ab6.css" rel="stylesheet"><title>Make a Proof of Existence on the Ethereum Blockchain - Set in Block</title>

<!-- Schema.org for Google -->
<meta itemprop="name" content="Make a Proof of Existence on the Ethereum Blockchain - Set in Block">

<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Make a Proof of Existence on the Ethereum Blockchain - Set in Block">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta property="og:title" content="Make a Proof of Existence on the Ethereum Blockchain - Set in Block">
<meta property="og:url" content="https://setinblock.com/about">
<meta property="og:site_name" content="Set in Block"><meta property="og:description" content="Immutable and Indestructible Proof of Existence on the Ethereum Blockchain. Create and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and &quot;set in stone&quot; it on the blockchain." data-vue-router-controlled=""></head><body><noscript><strong>We're sorry but Set in Block doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id="splashScreen" style="position: absolute; width: 100px; height: 100px; top: 50%; left: 50%; margin-top: -50px; margin-left: -50px; background-color: white; display: none;"><svg viewBox="0 0 190.8 190.8"><title>Logo</title><polygon class="logo-container" points="0 0 190.8 0 190.8 190.8 0 190.8 0 0 0 0" style="fill:#606062;fill-rule:evenodd;"></polygon><path class="logo-text" d="M243.69,369.78a17.43,17.43,0,0,1-5.91-1,15.62,15.62,0,0,1-5.27-3.18l3.42-4.1a17.25,17.25,0,0,0,3.71,2.33,9.92,9.92,0,0,0,4.16.87,5.06,5.06,0,0,0,2.8-.66,2.07,2.07,0,0,0,1-1.82V362.1a2.29,2.29,0,0,0-.21-1,2.09,2.09,0,0,0-.79-0.81,8.6,8.6,0,0,0-1.62-.75c-0.69-.25-1.59-0.51-2.7-0.79a33,33,0,0,1-3.62-1.09,10.19,10.19,0,0,1-2.75-1.49,6,6,0,0,1-1.76-2.2,7.67,7.67,0,0,1-.62-3.27v-0.07a7.68,7.68,0,0,1,.67-3.25,7.45,7.45,0,0,1,1.89-2.5,8.5,8.5,0,0,1,2.9-1.62,11.64,11.64,0,0,1,3.72-.56,15.75,15.75,0,0,1,5.32.87,15.42,15.42,0,0,1,4.46,2.48l-3,4.36a19,19,0,0,0-3.46-1.9,8.84,8.84,0,0,0-3.38-.7,4.09,4.09,0,0,0-2.54.66,2,2,0,0,0-.85,1.64v0.08a2.37,2.37,0,0,0,.24,1.11,2.22,2.22,0,0,0,.88.85,8.49,8.49,0,0,0,1.75.71c0.75,0.23,1.68.49,2.81,0.79a26.64,26.64,0,0,1,3.57,1.19,10,10,0,0,1,2.64,1.58,6,6,0,0,1,1.62,2.16,7.36,7.36,0,0,1,.55,3v0.08a8.19,8.19,0,0,1-.71,3.48,7.18,7.18,0,0,1-2,2.56,8.94,8.94,0,0,1-3,1.58,13.16,13.16,0,0,1-3.91.55h0Zm14.67-26.71h19.83v5.15H264.08v5.34h12.41v5.15H264.08v5.53h14.29v5.15h-20V343.07h0Zm31.34,5.34h-8v-5.34H303.5v5.34h-8v21h-5.79v-21h0Zm-55.15,36.23h5.79V411h-5.79V384.64h0Zm12.38,0h5.34l12.34,16.21V384.64h5.72V411h-4.93l-12.75-16.74V411h-5.72V384.64h0Zm-0.11,62.82a5.56,5.56,0,0,0,3-.7,2.38,2.38,0,0,0,1.09-2.16v-0.08a2.48,2.48,0,0,0-1-2.09,5.47,5.47,0,0,0-3.27-.77h-6.7v5.79h6.88Zm-1.54-10.61a6,6,0,0,0,3-.66,2.27,2.27,0,0,0,1.13-2.13V434a2.32,2.32,0,0,0-1-2,4.83,4.83,0,0,0-2.82-.7h-5.72v5.57h5.34Zm-11-10.65h12.21q4.54,0,6.87,2.33a6.1,6.1,0,0,1,1.8,4.48v0.08a6.45,6.45,0,0,1-.28,2,6.18,6.18,0,0,1-.75,1.56,6,6,0,0,1-1.08,1.22,7.27,7.27,0,0,1-1.32.9,8.89,8.89,0,0,1,3.59,2.35,6,6,0,0,1,1.31,4.12v0.08a6.81,6.81,0,0,1-.7,3.16,6.18,6.18,0,0,1-2,2.26,9.37,9.37,0,0,1-3.12,1.35,16.85,16.85,0,0,1-4,.45H234.28V426.2h0Zm27.16,0h5.79v21.1h13.13v5.23H261.44V426.2h0Zm36.15,21.44a7.91,7.91,0,0,0,3.2-.64,7.3,7.3,0,0,0,2.5-1.77,8.3,8.3,0,0,0,1.62-2.61,8.6,8.6,0,0,0,.58-3.18v-0.08a8.75,8.75,0,0,0-.58-3.2,7.88,7.88,0,0,0-4.19-4.42,7.72,7.72,0,0,0-3.2-.66,7.88,7.88,0,0,0-3.22.64,7.35,7.35,0,0,0-2.48,1.77,8.32,8.32,0,0,0-1.62,2.61,8.63,8.63,0,0,0-.58,3.18v0.08a8.77,8.77,0,0,0,.58,3.2,7.93,7.93,0,0,0,1.66,2.63,8,8,0,0,0,2.52,1.79,7.68,7.68,0,0,0,3.22.66h0ZM297.52,453a14.36,14.36,0,0,1-5.61-1.07,13.93,13.93,0,0,1-4.42-2.9,13,13,0,0,1-2.9-4.29,13.52,13.52,0,0,1-1-5.29v-0.08a13.32,13.32,0,0,1,1.05-5.29,13.47,13.47,0,0,1,7.36-7.26,15.24,15.24,0,0,1,11.23,0,13.93,13.93,0,0,1,4.42,2.9,12.94,12.94,0,0,1,2.9,4.29,13.5,13.5,0,0,1,1,5.29v0.08a13.29,13.29,0,0,1-1.05,5.29,13.46,13.46,0,0,1-7.35,7.26,14.49,14.49,0,0,1-5.62,1.07h0ZM329,453a13.63,13.63,0,0,1-5.38-1.05,13,13,0,0,1-7.11-7.19,13.88,13.88,0,0,1-1-5.3v-0.08a13.68,13.68,0,0,1,3.84-9.61,13.09,13.09,0,0,1,4.33-2.93,14.09,14.09,0,0,1,5.57-1.07,17.41,17.41,0,0,1,3.37.3,14.05,14.05,0,0,1,2.76.83,12,12,0,0,1,2.29,1.28,15.43,15.43,0,0,1,2,1.66L336,434.07a14,14,0,0,0-3.14-2.18,8,8,0,0,0-3.59-.79,7.29,7.29,0,0,0-5.49,2.41,8.25,8.25,0,0,0-1.58,2.61,8.88,8.88,0,0,0-.56,3.18v0.08a9,9,0,0,0,.56,3.2,8.35,8.35,0,0,0,1.56,2.63,7.23,7.23,0,0,0,5.51,2.45,8.07,8.07,0,0,0,3.82-.83,14.81,14.81,0,0,0,3.1-2.26l3.69,3.72a19,19,0,0,1-2.11,2,12.29,12.29,0,0,1-5.23,2.43A17.12,17.12,0,0,1,329,453h0Zm15.42-26.78h5.79v11.51l10.68-11.51h7l-10.72,11.17,11.21,15.16h-7l-8.16-11.21-3,3.16v8.05h-5.79V426.2h0Z" transform="translate(-210 -301)" style="fill:#fefefe;"></path></svg></div><div id="app"><div class="header"><div class="header-inner"><a href="/" class="router-link-active"><div><div style="float: left; height: 20px; width: 20px;"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 343.42 343.42"><title>logo</title><polygon points="0 0 343.42 0 343.42 343.42 0 343.42 0 0 0 0" style="fill: rgb(66, 66, 66); fill-rule: evenodd;"></polygon><polygon points="49.99 69.14 168.5 69.14 168.5 96.07 49.99 96.07 49.99 69.14 49.99 69.14" style="fill: rgb(255, 255, 255); fill-rule: evenodd;"></polygon><polygon points="49.99 157.98 111.94 157.98 111.94 184.91 49.99 184.91 49.99 157.98 49.99 157.98" style="fill: rgb(255, 255, 255); fill-rule: evenodd;"></polygon><polygon points="49.99 247.35 231.4 247.35 231.4 274.28 49.99 274.28 49.99 247.35 49.99 247.35" style="fill: rgb(255, 255, 255); fill-rule: evenodd;"></polygon></svg></div><div style="float: left; padding-left: 7px; font-size: 18px; font-family: Arapey, serif; color: black;">Set in Block</div></div></a><!----><div class="sans-serif" style="float: right; font-size: 14px;"><button style="margin-top: -3px; padding-top: 2px; padding-bottom: 2px;">New</button></div></div></div><div class="home router-content"><div class="home-content"><!----><div><div class="content-block" style="margin-top: -20px;"><h2 style="text-align: left; margin-bottom: 40px;">How it works</h2>

      To read a message:
      <ul><li>
          Open it in the <a href="/" class="router-link-active">Set in Block Reader</a><br></li><li style="margin-top: 7px;">
            Use a direct link (https://setinblock.com/your_transaction_hash) as in this example: <div class="overflow-dots" style="padding-bottom: 1px;"><a href="/0x52fcfb8b25daa9a6ea2c99a26cba4a4104ba21cb83fe670a3d296a317b98f097" target="_blank" style="font-size: 13px; line-height: 130%;">https://setinblock.com/0x52fcfb8b25daa9a6ea2c99a26cba4a4104ba21cb83fe670a3d296a317b98f097</a><br></div></li></ul><br><br>
      
      To record a message:
      <ul><li>
          Users can use Set in Block <a target="_blank" href="https://setinblock.com/new-message">submission interface</a> to create Ethereum blockchain messages and broadcast them with their MetaMask wallets. The submission is done on the client side. For privacy reasons, every new Set in Block message is sent to a randomly generated Ethereum address.
        </li></ul><br><br><br><h2 style="text-align: left; margin-bottom: 40px;">About</h2>

      Your message, recorded on the blockchain, is immutable and incorruptible - no one can delete or modify it. It also never expires - it is a <a href="https://setinblock.com/new-message/" target="_blank">permanent record</a>. 
      <br><br>
      By having a message archived on the blockchain, you have a mathematically-based proof of existence that your message is authentic, and that it existed prior to a 
      specific date.
      <br><br>
      The message you enter in this app is encoded into a hexadecimal format and then included in the data field of the Ethereum blockchain transaction.
      <br><br>
      Set in Block message submission interface only encodes and prepares the message. After the submit button is pressed, you will be asked to confirm the transaction with your <a href="https://medium.com/publicaio/a-complete-guide-to-using-metamask-updated-version-cd0d6f8c338f" target="_blank">MetaMask</a> wallet and by doing this, to create a permanent record, which is a proof of existence.
      <br><br>
      The value of your prepared transaction is 0. The longer is your message, the bigger is the transaction fee. Gas Limit is calculated automatically, according to the size of your message. 
      Gas Price is set to 3 Gwei, but can be changed, depending on the network conditions.
      <br><br>
      We never see your private key or any other personal data, as the transaction is broadcast on the client-side, through the MetaMask extension. You can inspect 
      the code of our website by looking into its source and visiting its <a href="https://github.com/giekaton/set-in-block" target="_blank">GitHub</a> repository.
      <br><br>
      After the message is added to the blockchain, it is no longer possible to change or delete it. Also, the time and the date of the message creation 
      is impossible to change - that's the proof of existence. The unique quality of the blockchain is that it is immutable and incorruptible, and because of its decentralized nature, 
      the data you add to the blockchain stays there forever.
      <br><br>
      The message submission is anonymous and for every message, a new random receiving Ethereum address is generated. Besides Google Analytics with IP anonymization, we do not use any trackers or cookies. We do not use a database and do not 
      collect any information about the website users.
      <br><br><br>
      "I'm feeling lucky" is a random list of Ethereum transactions with messages. You can browse through them by repeatedly clicking the lucky button. Tweet your blockchain message link with the #setinblock hashtag - we will include the message in the lucky list.
      <br><br><br>
      Follow and fork on <a href="https://twitter.com/setinblock" target="_blank">Twitter</a> and <a href="https://github.com/giekaton/set-in-block" target="_blank">GitHub</a>.
      <br><br><br>
      To support Set in Block, donate <a href="https://commerce.coinbase.com/checkout/27cfef00-226b-43dc-bf2c-6f85e045624f" target="_blank">BTC, ETH, BCH, LTC</a> or <span onclick="npDonate()" class="link">NIM</span>.
      <br><br><br>
      Contact: info@setinblock.com
      <br><br><br><br>
      Our recommendations:
      <br><br><span style="line-height: 150%;">
        Use Coinwink for <a href="https://coinwink.com/" target="_blank">bitcoin and crypto alerts</a>, and for <a href="https://coinwink.com/portfolio/" target="_blank">crypto portfolio tracking</a>.
        <br>
        Check out the <a href="https://cryptologos.cc/" target="_blank">cryptocurrency logos</a> gallery and the <a href="https://cryptologos.cc/crypto-merch" target="_blank">crypto merchandise</a> store.
        <br>
        Accept <a href="https://nimipay.com" target="_blank">cryptocurrency payments</a> on any website.
        <br>
        Libra testnet <a href="https://librachecker.com" target="_blank">block explorer</a> and a client-side <a href="https://librapaperwallet.com" target="_blank">Libra wallet</a>.
      </span><div style="height: 20px;"></div></div></div></div><div class="reader-footer"><div class="width"><a href="https://github.com/giekaton/set-in-block" target="_blank" title="GitHub" class="sans-serif" style="margin-right: 2px; color: rgb(130, 130, 130);">
        GitHub</a> | <a href="https://twitter.com/setinblock" target="_blank" style="color: rgb(130, 130, 130);">Twitter</a><div class="sans-serif" style="float: right;"><a href="/about" class="router-link-exact-active router-link-active" style="color: rgb(130, 130, 130);">About</a></div></div></div></div></div><script src="/js/chunk-vendors.69a19beb.js"></script><script src="/js/app.690a98b6.js"></script><script>const nimAddress = 'NQ13 KX0N A3H0 QNNC Q9D8 6J92 FDB0 CYB3 B2PG';
    const nimAddressLabel = 'Set in Block';</script><script src="https://nimipay.com/np.0.1.min.dev-sb.js"></script><div id="nimipay"></div><link href="https://nimipay.com/np.0.1.min.dev-sb.css" rel="stylesheet"><script src="/lib/sha256.js"></script><script src="/lib/lib-typedarrays-min.js"></script></body></html>