const path = require('path')
const PrerenderSPAPlugin = require('prerender-spa-plugin')

// vue.config.js
module.exports = {
  configureWebpack: {
    plugins: [
      new PrerenderSPAPlugin({

        // Required - The path to the webpack-outputted app to prerender.
        staticDir: path.join(__dirname, 'dist'),

        routes: [ '/', '/redirect/' ],

        postProcessHtml: function (context) {
          var titles = {
            '/': '<?php \n  \/\/ HOME\n  $link = basename(parse_url($_SERVER[\'REQUEST_URI\'], PHP_URL_PATH));\n  if (strlen($link) > 0) {\n    \/\/ page meta\n    ?>\n    <title>Set in Block - Everlasting Message<\/title>\n    <meta name=\"description\" content=\"Message transaction hash: <?php echo ($link); ?>\"\/>\n\n    <!-- Schema.org for Google -->\n    <meta itemprop=\"name\" content=\"Set in Block - Everlasting Message\">\n    <meta itemprop=\"description\" content=\"Message transaction hash: <?php echo ($link); ?>\">\n\n    <!-- Twitter -->\n    <meta name=\"twitter:card\" content=\"summary\">\n    <meta name=\"twitter:title\" content=\"Set in Block - Everlasting Message\">\n    <meta name=\"twitter:description\" content=\"Message transaction hash: <?php echo ($link); ?>\">\n\n    <!-- Open Graph general (Facebook, Pinterest & Google+) -->\n    <meta property=\"og:title\" content=\"Set in Block - Everlasting Message\">\n    <meta property=\"og:description\" content=\"Message transaction hash: <?php echo ($link); ?>\">\n    <!-- <meta name=\"og:url\" content=\"https:\/\/setinblock.com\"> -->\n    <meta property=\"og:site_name\" content=\"Set in Block\">\n    <?php\n    } else { \n    \/\/ message meta\n    ?>\n    <title>Set in Block - Immutable and Indestructible Records in the Ethereum Blockchain Archive<\/title>\n    <meta name=\"description\" content=\"Write and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and \'set in stone\' it on the blockchain.\"\/>\n    \n    <!-- Schema.org for Google -->\n    <meta itemprop=\"name\" content=\"Set in Block - Immutable and Indestructible Blockchain Messages\">\n    <meta itemprop=\"description\" content=\"Write and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and \'set in stone\' it on the blockchain.\">\n\n    <!-- Twitter -->\n    <meta name=\"twitter:card\" content=\"summary\">\n    <meta name=\"twitter:title\" content=\"Set in Block - Immutable and Indestructible Blockchain Messages\">\n    <meta name=\"twitter:description\" content=\"Write and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and \'set in stone\' it on the blockchain.\">\n\n    <!-- Open Graph general (Facebook, Pinterest & Google+) -->\n    <meta property=\"og:title\" content=\"Set in Block - Immutable and Indestructible Blockchain Messages\">\n    <meta property=\"og:description\" content=\"Write and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, bypass censorship. Enter a message and \'set in stone\' it on the blockchain.\">\n    <meta property=\"og:url\" content=\"https:\/\/setinblock.com\">\n    <meta property=\"og:site_name\" content=\"Set in Block\">\n<?php } ?>',

            '/redirect/': '<?php \n  $link = basename(parse_url($_SERVER[\'REQUEST_URI\'], PHP_URL_PATH));\n?>\n<title>Set in Block - Everlasting Message<\/title>\n<meta name=\"description\" content=\"Message transaction hash: <?php echo ($link); ?>\"\/>\n<!-- Schema.org for Google -->\n<meta itemprop=\"name\" content=\"Set in Block - Everlasting Message\">\n<meta itemprop=\"description\" content=\"Message transaction hash: <?php echo ($link); ?>\">\n\n<!-- Twitter -->\n<meta name=\"twitter:card\" content=\"summary\">\n<meta name=\"twitter:title\" content=\"Set in Block - Everlasting Message\">\n<meta name=\"twitter:description\" content=\"Message transaction hash: <?php echo ($link); ?>\">\n\n<!-- Open Graph general (Facebook, Pinterest & Google+) -->\n<meta property=\"og:title\" content=\"Set in Block - Everlasting Message\">\n<meta property=\"og:description\" content=\"Message transaction hash: <?php echo ($link); ?>\">\n<meta property=\"og:site_name\" content=\"Set in Block\">'
          }
          return context.html.replace(
            /<title>[^<]*<\/title>/i,
            titles[context.route]
          )
        }
        
      })
    ]
  }
}
