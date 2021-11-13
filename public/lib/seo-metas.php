<?php

$title_home = "Set in Block - Immutable Records, NFT Viewer, Content Creator Tools";
$description_home = "Write and read everlasting messages in the Ethereum blockchain. Make a permanent promise, create a proof of fact, protect content copyrights, mint NFTs.";

$title_about = "Set in Block - Decentralized Publishing, Proof of Existence, DApp for Ethereum Blockchain";
$description_about = "Immutable and Indestructible Proof of Existence on the Ethereum Blockchain. Create and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, protect copyrights, mint NFT tokens.";


$title_new_message = "New Permanent Message - Set in Block";
$description_new_message = "Create a new permanent, everlasting, indestructible blockchain record.";

$title_mint_nft = "Mint New NFT (ERC-721) Token - Set in Block";
$description_mint_nft = "Create a new non-fungible token on the Ethereum blockchain.";

$title_copyright_protection = "Protect Content Copyright with the Ethereum Blockchain - Set in Block";
$description_copyright_protection = "Intellectual property protection with the Ethereum blockchain.";


$title_copyright_protection_faq = "Intellectual Property Protection with Blockchain - Set in Block";
$description_copyright_protection_faq = "Protect content copyright with the Ethereum blockchain.";

$title_cease_desist = "Cease and Desist Letter Template - Set in Block";
$description_cease_desist = "Generate a cease and desist letter to use in case of copyright infringement.";


$title_new = "Create New Permanent Record - Set in Block";
$description_new = "Decentralized digital publishing and content copyright protection tools";

$title_any = "Permanent Message - Set in Block";

$title_nft = "Non-Fungible Token (NFT) - Set in Block";

$thumb_social = "https://setinblock.com/img/social.png?v=001";
$thumb_social_fb = "https://setinblock.com/img/social_fb.png?v=001";
$thumb_msg = "https://setinblock.com/img/social_msg.png?v=001";
$thumb_nft = "https://setinblock.com/img/social_nft.png?v=001";

$link = basename(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

if ($link == "") { 
?>
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
<?php 
}
else if ($link == 'about') { 
?>
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
<?php }
else if ($link == 'new') { 
?>
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
<?php }
else if ($link == 'new-message') { 
?>
    <title><?php echo ($title_new_message); ?></title>
    <meta itemprop="name" content="<?php echo ($title_new_message); ?>">
    <meta name="twitter:title" content="<?php echo ($title_new_message); ?>">
    <meta name="twitter:description" content="<?php echo ($description_new_message); ?>">
    <meta property="og:title" content="<?php echo ($title_new_message); ?>">
    <meta property="og:description" content="<?php echo ($description_new_message); ?>">
    <meta name="twitter:image:src" content="<?php echo ($thumb_social); ?>">
    <meta property="og:image" content="<?php echo ($thumb_social_fb); ?>">
    <meta itemprop="image" content="<?php echo ($thumb_social); ?>">
    <meta name="image" content="<?php echo ($thumb_social); ?>">
<?php }
else if ($link == 'copyright-protection') { 
?>
    <title><?php echo ($title_copyright_protection); ?></title>
    <meta itemprop="name" content="<?php echo ($title_copyright_protection); ?>">
    <meta name="twitter:title" content="<?php echo ($title_copyright_protection); ?>">
    <meta name="twitter:description" content="<?php echo ($description_copyright_protection); ?>">
    <meta property="og:title" content="<?php echo ($title_copyright_protection); ?>">
    <meta property="og:description" content="<?php echo ($description_copyright_protection); ?>">
    <meta name="twitter:image:src" content="<?php echo ($thumb_social); ?>">
    <meta property="og:image" content="<?php echo ($thumb_social_fb); ?>">
    <meta itemprop="image" content="<?php echo ($thumb_social); ?>">
    <meta name="image" content="<?php echo ($thumb_social); ?>">
<?php }
else if ($link == 'mint-nft') { 
?>
    <title><?php echo ($title_mint_nft); ?></title>
    <meta itemprop="name" content="<?php echo ($title_mint_nft); ?>">
    <meta name="twitter:title" content="<?php echo ($title_mint_nft); ?>">
    <meta name="twitter:description" content="<?php echo ($description_mint_nft); ?>">
    <meta property="og:title" content="<?php echo ($title_mint_nft); ?>">
    <meta property="og:description" content="<?php echo ($description_mint_nft); ?>">
    <meta name="twitter:image:src" content="<?php echo ($thumb_social); ?>">
    <meta property="og:image" content="<?php echo ($thumb_social_fb); ?>">
    <meta itemprop="image" content="<?php echo ($thumb_social); ?>">
    <meta name="image" content="<?php echo ($thumb_social); ?>">
<?php }
else if ($link == 'cease-and-desist-letter-template') { 
?>
    <title><?php echo ($title_cease_desist); ?></title>
    <meta itemprop="name" content="<?php echo ($title_cease_desist); ?>">
    <meta name="twitter:title" content="<?php echo ($title_cease_desist); ?>">
    <meta name="twitter:description" content="<?php echo ($description_cease_desist); ?>">
    <meta property="og:title" content="<?php echo ($title_cease_desist); ?>">
    <meta property="og:description" content="<?php echo ($description_cease_desist); ?>">
    <meta name="twitter:image:src" content="<?php echo ($thumb_social); ?>">
    <meta property="og:image" content="<?php echo ($thumb_social_fb); ?>">
    <meta itemprop="image" content="<?php echo ($thumb_social); ?>">
    <meta name="image" content="<?php echo ($thumb_social); ?>">
<?php }
else if ($link == 'faq') { 
?>
    <title><?php echo ($title_copyright_protection_faq); ?></title>
    <meta itemprop="name" content="<?php echo ($title_copyright_protection_faq); ?>">
    <meta name="twitter:title" content="<?php echo ($title_copyright_protection_faq); ?>">
    <meta name="twitter:description" content="<?php echo ($description_copyright_protection_faq); ?>">
    <meta property="og:title" content="<?php echo ($title_copyright_protection_faq); ?>">
    <meta property="og:description" content="<?php echo ($description_copyright_protection_faq); ?>">
    <meta name="twitter:image:src" content="<?php echo ($thumb_social); ?>">
    <meta property="og:image" content="<?php echo ($thumb_social_fb); ?>">
    <meta itemprop="image" content="<?php echo ($thumb_social); ?>">
    <meta name="image" content="<?php echo ($thumb_social); ?>">
<?php }
else if (strpos(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), 'nft')) { 
?>
    <title><?php echo ($title_nft); ?></title>
    <meta name="description" content="NFT ID: <?php echo ($link); ?>"/>
    <meta itemprop="name" content="<?php echo ($title_nft); ?>">
    <meta itemprop="description" content="NFT ID: <?php echo ($link); ?>">
    <meta name="twitter:title" content="<?php echo ($title_nft); ?>">
    <meta name="twitter:description" content="NFT ID: <?php echo ($link); ?>">
    <meta property="og:title" content="<?php echo ($title_nft); ?>">
    <meta property="og:description" content="NFT ID: <?php echo ($link); ?>">
    <meta name="twitter:image:src" content="<?php echo ($thumb_nft); ?>">
    <meta property="og:image" content="<?php echo ($thumb_nft); ?>">
    <meta itemprop="image" content="<?php echo ($thumb_nft); ?>">
    <meta name="image" content="<?php echo ($thumb_nft); ?>">
<?php }
else if (strlen($link) > 0) {
?>
    <title><?php echo ($title_any); ?></title>
    <meta name="description" content="Message transaction hash: <?php echo ($link); ?>"/>
    <meta itemprop="name" content="<?php echo ($title_any); ?>">
    <meta itemprop="description" content="Message transaction hash: <?php echo ($link); ?>">
    <meta name="twitter:title" content="<?php echo ($title_any); ?>">
    <meta name="twitter:description" content="Message transaction hash: <?php echo ($link); ?>">
    <meta property="og:title" content="<?php echo ($title_any); ?>">
    <meta property="og:description" content="Message transaction hash: <?php echo ($link); ?>">
    <meta name="twitter:image:src" content="<?php echo ($thumb_msg); ?>">
    <meta property="og:image" content="<?php echo ($thumb_msg); ?>">
    <meta itemprop="image" content="<?php echo ($thumb_msg); ?>">
    <meta name="image" content="<?php echo ($thumb_msg); ?>">
<?php
}
?>
<meta name="twitter:site" content="@setinblock">
<meta name="twitter:card" content="summary">
<meta property="og:site_name" content="Set in Block">
<meta property="og:type" content="website">



</head>