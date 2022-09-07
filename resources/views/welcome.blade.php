<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">

    <!-- Custom Backend SEO Metadata -->
    <?php
      $title_home = "Set in Block - NFT Reader, Immutable Messages, Permanent Records";
      $description_home = "Write and read immutable messages in the Ethereum blockchain. Make a permanent promise, create a proof of existence, protect content copyrights.";

      $title_about = "Decentralized Web3 Publishing and Blockchain-based Content Protection - Set in Block";
      $description_about = "Write and read everlasting Web3 messages on the Ethereum blockchain. Create immutable and indestructible proof of existence.";

      $title_new = "New Permanent Record, Copyright Protection with Ethereum - Set in Block";
      $description_new = "Create new permanent message. Intellectual property protection with the Ethereum blockchain.";

      $thumb_social = "https://setinblock.com/img/social.png?v=001";
      $thumb_social_fb = "https://setinblock.com/img/social_fb.png?v=001";
      $thumb_msg = "https://setinblock.com/img/social_msg.png?v=001";
    ?>

    <!-- NFT READER -->
    @if (Route::currentRouteName() == 'nft')
      <?php $nft_data_php = json_decode($nft_data); ?>
      @if ($nft_data_php->name != null)
        <title>NFT: {{ $nft_data_php->name }} | ID: {{ $nft_data_php->token_id }} - Set in Block</title>
        <meta property="og:title" content="NFT: {{ $nft_data_php->name }} | ID: {{ $nft_data_php->token_id }}">
        <meta name="twitter:title" content="NFT: {{ $nft_data_php->name }} | ID: {{ $nft_data_php->token_id }}">
      @else
        <title>NFT ID: {{ $nft_data_php->token_id }} - Set in Block</title>
        <meta property="og:title" content="NFT ID: {{ $nft_data_php->token_id }}">
        <meta name="twitter:title" content="NFT ID: {{ $nft_data_php->token_id }}">
      @endif

      @if ($nft_data_php->description != null)
        <meta name="description" content="NFT info: {{ $nft_data_php->description }}"/>
        <meta name="twitter:description" content="NFT info: {{ $nft_data_php->description }}">
        <meta name="og:description" content="NFT info: {{ $nft_data_php->description }}">
      @endif

      <meta property="og:site_name" content="Set in Block">

      <meta property="og:image" content="{{$nft_data_php->image_url}}">
      <meta name="twitter:image:src" content="{{$nft_data_php->image_url}}">

      <?php $imagesize = getimagesize($nft_data_php->image_url); ?>
      <?php if($imagesize) { ?>
        <meta property="og:image:width" content="{{$imagesize[0]}}" />
        <meta property="og:image:height" content="{{$imagesize[1]}}" />
      <?php } ?>
    @else
      <!-- For all -->
      <meta property="og:image:width" content="600" />
      <meta property="og:image:height" content="600" />
    @endif

    <!-- MSG READER -->
    @if (Route::currentRouteName() == 'msg')
      <?php 
        function hex_to_string($hex) {
          if (strlen($hex) % 2 != 0) { $hex .= 0; }
          $string = '';
          for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
          }
          return $string;
        }
        $msg_data_php = $msg_data; 
        $msg = hex_to_string($msg_data_php["input"]);
        $msg_description = substr($msg, 0, 156).'...';
        $msg_description = trim($msg_description);
        $msg_description = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $msg_description);
        // echo($msg);
      ?>
      <meta name="twitter:image:src" content="{{ $thumb_msg }}">
      <meta property="og:image" content="{{ $thumb_msg }}">
      <meta itemprop="image" content="{{ $thumb_msg }}">
      <meta name="image" content="{{ $thumb_msg }}">
      <title>Permanent Record: {{substr(hex_to_string($msg_data_php['input']), 0, 80)}}...</title>
      <meta name="twitter:title" content="Permanent record:{{substr(hex_to_string($msg_data_php['input']), 0, 80)}}...">
      <meta property="og:title" content="Permanent record:{{substr(hex_to_string($msg_data_php['input']), 0, 80)}}...">

      <meta name="description" content="{{ $msg_description }}"/>
      <meta itemprop="description" content="{{ $msg_description }}">
      <meta name="twitter:description" content="{{ $msg_description }}">
      <meta property="og:description" content="{{ $msg_description }}">

      <meta itemprop="name" content="Set in Block">
      <meta property="og:site_name" content="Set in Block">
    @elseif (Route::currentRouteName() == 'home')
      <title><?php echo ($title_home); ?></title>
      <meta itemprop="name" content="<?php echo ($title_home); ?>">
      <meta name="twitter:title" content="<?php echo ($title_home); ?>">
      <meta name="twitter:description" content="<?php echo ($description_home); ?>">
      <meta property="og:title" content="<?php echo ($title_home); ?>">
      <meta property="og:description" content="<?php echo ($description_home); ?>">
      <meta name="twitter:image:src" content="<?php echo ($thumb_social); ?>">
      <meta property="og:image" content="<?php echo ($thumb_social_fb); ?>">
      <meta itemprop="image" content="<?php echo ($thumb_social); ?>">
      <meta name="image" content="<?php echo ($thumb_social); ?>">
    @elseif (Route::currentRouteName() == 'about')
      <title><?php echo ($title_about); ?></title>
      <meta itemprop="name" content="<?php echo ($title_about); ?>">
      <meta name="twitter:title" content="<?php echo ($title_about); ?>">
      <meta name="twitter:description" content="<?php echo ($description_about); ?>">
      <meta property="og:title" content="<?php echo ($title_about); ?>">
      <meta property="og:description" content="<?php echo ($description_about); ?>">
      <meta name="twitter:image:src" content="<?php echo ($thumb_social); ?>">
      <meta property="og:image" content="<?php echo ($thumb_social_fb); ?>">
      <meta itemprop="image" content="<?php echo ($thumb_social); ?>">
      <meta name="image" content="<?php echo ($thumb_social); ?>">
    @elseif (Route::currentRouteName() == 'new')
      <title><?php echo ($title_new); ?></title>
      <meta itemprop="name" content="<?php echo ($title_new); ?>">
      <meta name="twitter:title" content="<?php echo ($title_new); ?>">
      <meta name="twitter:description" content="<?php echo ($description_new); ?>">
      <meta property="og:title" content="<?php echo ($title_new); ?>">
      <meta property="og:description" content="<?php echo ($description_new); ?>">
      <meta name="twitter:image:src" content="<?php echo ($thumb_social); ?>">
      <meta property="og:image" content="<?php echo ($thumb_social_fb); ?>">
      <meta itemprop="image" content="<?php echo ($thumb_social); ?>">
      <meta name="image" content="<?php echo ($thumb_social); ?>">
    @endif

    <!-- For all -->
    <meta property="og:url" content="{{ $_SERVER['REQUEST_URI'] }}">
    <meta name="twitter:site" content="@setinblock">
    <meta name="twitter:card" content="summary">
    <meta property="og:site_name" content="Set in Block">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://setinblock.com/img/favicon/apple-touch-icon.png?v=xQOzbvWeR2">
    <link rel="icon" type="image/png" sizes="32x32" href="https://setinblock.com/img/favicon/favicon-32x32.png?v=xQOzbvWeR2">
    <link rel="icon" type="image/png" sizes="16x16" href="https://setinblock.com/img/favicon/favicon-16x16.png?v=xQOzbvWeR2">
    <link rel="manifest" href="https://setinblock.com/img/favicon/site.webmanifest?v=xQOzbvWeR2">
    <link rel="mask-icon" href="https://setinblock.com/img/favicon/safari-pinned-tab.svg?v=xQOzbvWeR2" color="#686868">
    <link rel="shortcut icon" href="https://setinblock.com/img/favicon/favicon.ico?v=xQOzbvWeR2">
    <meta name="apple-mobile-web-app-title" content="Set in Block">
    <meta name="application-name" content="Set in Block">
    <meta name="msapplication-TileColor" content="#f4f4f4">
    <meta name="msapplication-config" content="https://setinblock.com/img/favicon/browserconfig.xml?v=xQOzbvWeR2">
    <meta name="theme-color" content="#f4f4f4">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Arapey" rel="stylesheet">

    <script>
      // Globals
      readerType = 'nft';
      nftContract = null;
      nftId = null;
      txHash = null;
      
      nftData = "";
      msgData = "";
    </script>

    @if (Route::currentRouteName() == 'nft')
      <script>
        // From backend
        nftData = @json($nft_data);
      </script>
    @elseif (Route::currentRouteName() == 'msg')
      <script>
        // From backend
        msgData = @json($msg_data);
      </script>
    @endif
    
    <script>
      function selectNetwork(network) {
        if (network == 'main') {
          // MAINNET
          etherscan = "https://api.etherscan.io";
        }
        else if (network == 'ropsten') {
          // TESTNET
          etherscan = "https://api-ropsten.etherscan.io";
        }
        else if (network == 'rinkeby') {
          // TESTNET
          etherscan = "https://api-rinkeby.etherscan.io";
        }
      }
      selectedNetwork = 'main';
      selectNetwork(selectedNetwork);
      

      const gasPerByte = 68;

      function gasCount(string) {
        var bytes = encodeURI(string).split(/%..|./).length - 1;
        return bytes * gasPerByte / 2;
      }
    </script>

    <script>
      window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
      ga('create', 'UA-57930548-16', 'auto'); 
      ga('set', 'anonymizeIp', true);
      ga('send', 'pageview');
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    </head>
    <body class="antialiased">
      <noscript>
      <strong>We're sorry but Set in Block doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
      </noscript>

      <div id="splashScreen" style="position:absolute;width:100px;height:100px;top:50%;left:50%;margin-top:-50px;margin-left:-50px;background-color:white;">
        <svg version="1.1" viewBox="0 0 364.7 364.7" style="enable-background:new 0 0 364.7 364.7;" xml:space="preserve">
          <title>Logo</title>
          <g>
            <polygon style="fill-rule:evenodd;clip-rule:evenodd;fill:#404041;stroke:#000000;stroke-width:0.5;stroke-miterlimit:2.6131;" points="0.3,0.3 364.4,0.3 364.4,364.4 0.3,364.4 0.3,0.3" />
            <path style="fill:#FFFFFF;" d="M65.6,154.2c-4.1,0-8.1-0.6-11.8-1.9s-7-3.2-9.9-5.8l7.1-8.6c4.6,3.7,9.6,5.6,15,5.6
            c1.7,0,3-0.3,3.9-0.8c0.9-0.6,1.4-1.3,1.4-2.3v-0.1c0-0.5-0.1-0.9-0.3-1.3c-0.2-0.4-0.6-0.7-1.2-1.1c-0.6-0.4-1.4-0.7-2.4-1
            s-2.3-0.7-3.9-1c-2.5-0.6-4.8-1.2-6.9-1.9c-2.1-0.7-4-1.6-5.5-2.6c-1.6-1.1-2.8-2.4-3.7-4c-0.9-1.6-1.4-3.6-1.4-6v-0.1
            c0-2.2,0.4-4.1,1.2-5.9c0.8-1.8,2-3.4,3.6-4.7c1.6-1.3,3.5-2.3,5.7-3.1c2.2-0.7,4.7-1.1,7.5-1.1c4,0,7.5,0.5,10.6,1.6
            c3.1,1,5.9,2.6,8.4,4.6l-6.4,9.1c-2.1-1.5-4.3-2.6-6.5-3.4s-4.4-1.2-6.4-1.2c-1.5,0-2.7,0.3-3.5,0.9c-0.8,0.6-1.2,1.3-1.2,2.1v0.1
            c0,0.5,0.1,1,0.4,1.4c0.2,0.4,0.7,0.8,1.3,1.1c0.6,0.3,1.4,0.7,2.4,1c1,0.3,2.3,0.7,3.9,1c2.6,0.6,5,1.2,7.2,2
            c2.1,0.8,4,1.7,5.5,2.8c1.5,1.1,2.6,2.4,3.4,4c0.8,1.6,1.2,3.4,1.2,5.6v0.1c0,2.4-0.5,4.5-1.4,6.3c-0.9,1.9-2.2,3.4-3.8,4.7
            c-1.6,1.3-3.6,2.3-5.9,3C71,153.9,68.5,154.2,65.6,154.2L65.6,154.2z M92.9,107.1h37.2V118h-24.5v7h22.2v10.1h-22.2v7.3h24.9v10.9
            H92.9V107.1L92.9,107.1z M150.7,118.4h-13.9v-11.2h40.6v11.2h-13.9v35.1h-12.8V118.4L150.7,118.4z M47.7,184.7h12.9V231H47.7V184.7
            L47.7,184.7z M71.4,184.7h12l19.1,24.5v-24.5h12.6V231h-11.3L84,205.6V231H71.4V184.7L71.4,184.7z M69.9,298.4c2,0,3.5-0.4,4.6-1.1
            c1.1-0.7,1.6-1.8,1.6-3.1V294c0-1.3-0.5-2.3-1.5-3c-1-0.7-2.6-1.1-4.8-1.1H60v8.5H69.9L69.9,298.4z M68,280.8c2,0,3.5-0.3,4.5-1
            c1-0.7,1.6-1.7,1.6-3v-0.1c0-1.3-0.5-2.3-1.5-2.9c-1-0.7-2.4-1-4.4-1H60v8.1H68L68,280.8z M47.5,262.4h23.7c2.9,0,5.4,0.4,7.5,1.1
            c2.1,0.7,3.8,1.7,5.1,3.1c0.9,0.9,1.7,2,2.2,3.2c0.5,1.2,0.8,2.6,0.8,4.2v0.1c0,2.7-0.7,4.9-2,6.5s-3,2.9-5.1,3.8
            c2.8,0.9,5.1,2.3,6.7,4c1.7,1.7,2.5,4.2,2.5,7.3v0.1c0,4-1.5,7.1-4.6,9.4c-3.1,2.2-7.4,3.4-12.9,3.4H47.5V262.4L47.5,262.4z
            M97.1,262.4h12.8v35.1h22.4v11.2H97.1V262.4L97.1,262.4z M163.5,298c1.8,0,3.4-0.3,4.8-1c1.5-0.7,2.7-1.6,3.7-2.7s1.8-2.4,2.4-3.9
            s0.9-3.1,0.9-4.8v-0.1c0-1.7-0.3-3.3-0.9-4.8c-0.6-1.5-1.4-2.8-2.5-4c-1.1-1.1-2.3-2.1-3.8-2.7c-1.5-0.7-3.1-1-4.8-1
            c-1.8,0-3.4,0.3-4.8,1c-1.4,0.7-2.7,1.6-3.7,2.7s-1.8,2.4-2.4,3.9s-0.8,3.1-0.8,4.8v0.1c0,1.7,0.3,3.3,0.9,4.8
            c0.6,1.5,1.4,2.8,2.4,4c1,1.1,2.3,2.1,3.7,2.7C160.1,297.7,161.8,298,163.5,298L163.5,298z M163.4,309.6c-3.6,0-6.9-0.6-9.9-1.9
            s-5.7-3-7.9-5.1s-3.9-4.7-5.2-7.6c-1.3-2.9-1.9-6-1.9-9.3v-0.1c0-3.3,0.6-6.4,1.9-9.4c1.3-2.9,3-5.5,5.3-7.7s4.9-3.9,7.9-5.2
            c3-1.3,6.4-1.9,9.9-1.9c3.6,0,6.9,0.6,9.9,1.9c3,1.3,5.7,3,7.9,5.1c2.2,2.2,3.9,4.7,5.2,7.6c1.3,2.9,1.9,6,1.9,9.3v0.1
            c0,3.3-0.6,6.4-1.9,9.4c-1.3,2.9-3,5.5-5.3,7.7c-2.2,2.2-4.9,3.9-7.9,5.2S167,309.6,163.4,309.6L163.4,309.6z M219.7,309.6
            c-3.3,0-6.4-0.6-9.3-1.8c-2.9-1.2-5.4-2.9-7.6-5c-2.1-2.1-3.8-4.7-5.1-7.6c-1.3-2.9-1.9-6.1-1.9-9.6v-0.1c0-3.4,0.6-6.5,1.9-9.4
            c1.2-2.9,2.9-5.5,5.1-7.7c2.2-2.2,4.7-3.9,7.7-5.1s6.2-1.9,9.8-1.9c2.4,0,4.5,0.2,6.5,0.7c1.9,0.5,3.7,1.1,5.3,2
            c1.6,0.9,3.1,1.9,4.4,3.1c1.3,1.2,2.5,2.5,3.5,3.9l-9.7,7.5c-1.3-1.7-2.8-3-4.4-4c-1.6-1-3.5-1.5-5.8-1.5c-1.6,0-3.1,0.3-4.5,1
            c-1.3,0.6-2.5,1.5-3.5,2.6c-1,1.1-1.7,2.4-2.3,3.9c-0.6,1.5-0.8,3.1-0.8,4.8v0.1c0,1.7,0.3,3.3,0.8,4.9c0.6,1.5,1.3,2.8,2.3,3.9
            c1,1.1,2.1,2,3.5,2.6c1.3,0.6,2.8,1,4.5,1c1.2,0,2.3-0.1,3.3-0.4c1-0.3,1.9-0.7,2.7-1.2s1.6-1.1,2.3-1.8s1.4-1.4,2.1-2.3l9.7,6.9
            c-1.1,1.5-2.3,2.9-3.6,4.2c-1.3,1.3-2.8,2.4-4.4,3.3c-1.7,0.9-3.5,1.7-5.6,2.2C224.6,309.3,222.3,309.6,219.7,309.6L219.7,309.6z
            M248.1,262.4h12.8v18.8l15.9-18.8H292l-17.5,19.9l18.1,26.4h-15.4l-11.6-17.2l-4.7,5.2v12h-12.8V262.4L248.1,262.4z"/>
          </g>
        </svg>
      </div>

      <!-- Vue app -->
      <div id="app"></div>
      
      <!-- To access Vue methods -->
      <script>vueVM = null;</script>

      <!-- Vue -->
      <script src="{{asset(mix('js/app.js'), true)}}" defer></script>
  
      <!-- Libraries -->
      <script src="/lib/sha256.js"></script>
      <script src="/lib/lib-typedarrays-min.js"></script>

      <!-- Web3 -->
      <style>
          .web3modal-modal-lightbox { display: none; }
      </style>

      <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>

      <script src="https://unpkg.com/web3modal@1.9.0/dist/index.js"></script>
      <script src="https://unpkg.com/@walletconnect/web3-provider@1.2.1/dist/umd/index.min.js"></script>

      <script src="https://setinblock.com/php-metamask-user-login/js/web3-modal.js"></script>

      <script>
          // Enable web3 connection
          const ethEnabled = async () => {
            if (window.ethereum) {
              // await window.ethereum.send('eth_requestAccounts');
              window.web3 = new Web3(window.ethereum);
              
              // generate a random 'to' Ethereum address for a permanent message
              address = web3.utils.keccak256(Math.random().toString()).substring(0, 42);

              return true;
            }
            return false;
          }

          ethEnabled();
      </script>

    </body>
</html>
