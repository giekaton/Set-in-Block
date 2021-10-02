<?php

$title_home = "Set in Block - Immutable and Indestructible Records in the Ethereum Blockchain Archive";
$description_home = "Write and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, protect content copyrights, mint NFTs.";

$title_any = "Set in Block - Everlasting Message";

$title_copyright_protection = "Set in Block";
$description_copyright_protection = "Protect Content Copyright with Blockchain";

$title_copyright_protection_faq = "Set in Block";
$description_copyright_protection_faq = "Intellectual Property Protection with Blockchain";

$title_cease_desist = "Set in Block";
$description_cease_desist = "Cease and Desist Letter Generator";

$title_new_message = "New Permanent Message";
$description_new_message = "Set in Block";

$title_mint_nft = "Mint New NFT Token - Set in Block";
$description_mint_nft = "Create a new non-fungible token";

$title_new = "Create New Permanent Record";
$description_new = "Set in Block";

$title_about = "Set in Block - Hidden Messages in the Ethereum, Proof-of-Existence";
$description_about = "Immutable and Indestructible Proof of Existence on the Ethereum Blockchain. Create and read everlasting messages on the blockchain. Make a permanent promise, create a proof of fact, protect copyrights, mint NFT tokens.";

$link = basename(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

if ($link == "") { 
?>
    <title><?php echo ($title_home); ?></title>
    <meta itemprop="name" content="<?php echo ($title_home); ?>">
    <meta name="twitter:title" content="<?php echo ($title_home); ?>">
    <meta name="twitter:description" content="<?php echo ($description_home); ?>">
    <meta property="og:title" content="<?php echo ($title_home); ?>">
    <meta property="og:description" content="<?php echo ($description_home); ?>">
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
<?php }
else if ($link == 'new') { 
?>
    <title><?php echo ($title_new); ?></title>
    <meta itemprop="name" content="<?php echo ($title_new); ?>">
    <meta name="twitter:title" content="<?php echo ($title_new); ?>">
    <meta name="twitter:description" content="<?php echo ($description_new); ?>">
    <meta property="og:title" content="<?php echo ($title_new); ?>">
    <meta property="og:description" content="<?php echo ($description_new); ?>">
<?php }
else if ($link == 'new-message') { 
?>
    <title><?php echo ($title_new_message); ?></title>
    <meta itemprop="name" content="<?php echo ($title_new_message); ?>">
    <meta name="twitter:title" content="<?php echo ($title_new_message); ?>">
    <meta name="twitter:description" content="<?php echo ($description_new_message); ?>">
    <meta property="og:title" content="<?php echo ($title_new_message); ?>">
    <meta property="og:description" content="<?php echo ($description_new_message); ?>">
<?php }
else if ($link == 'copyright-protection') { 
?>
    <title><?php echo ($title_copyright_protection); ?></title>
    <meta itemprop="name" content="<?php echo ($title_copyright_protection); ?>">
    <meta name="twitter:title" content="<?php echo ($title_copyright_protection); ?>">
    <meta name="twitter:description" content="<?php echo ($description_copyright_protection); ?>">
    <meta property="og:title" content="<?php echo ($title_copyright_protection); ?>">
    <meta property="og:description" content="<?php echo ($description_copyright_protection); ?>">
<?php }
else if ($link == 'mint-nft') { 
?>
    <title><?php echo ($title_mint_nft); ?></title>
    <meta itemprop="name" content="<?php echo ($title_mint_nft); ?>">
    <meta name="twitter:title" content="<?php echo ($title_mint_nft); ?>">
    <meta name="twitter:description" content="<?php echo ($description_mint_nft); ?>">
    <meta property="og:title" content="<?php echo ($title_mint_nft); ?>">
    <meta property="og:description" content="<?php echo ($description_mint_nft); ?>">
<?php }
else if ($link == 'cease-and-desist-letter') { 
?>
    <title><?php echo ($title_cease_desist); ?></title>
    <meta itemprop="name" content="<?php echo ($title_cease_desist); ?>">
    <meta name="twitter:title" content="<?php echo ($title_cease_desist); ?>">
    <meta name="twitter:description" content="<?php echo ($description_cease_desist); ?>">
    <meta property="og:title" content="<?php echo ($title_cease_desist); ?>">
    <meta property="og:description" content="<?php echo ($description_cease_desist); ?>">
<?php }
else if ($link == 'faq') { 
?>
    <title><?php echo ($title_copyright_protection_faq); ?></title>
    <meta itemprop="name" content="<?php echo ($title_copyright_protection_faq); ?>">
    <meta name="twitter:title" content="<?php echo ($title_copyright_protection_faq); ?>">
    <meta name="twitter:description" content="<?php echo ($description_copyright_protection_faq); ?>">
    <meta property="og:title" content="<?php echo ($title_copyright_protection_faq); ?>">
    <meta property="og:description" content="<?php echo ($description_copyright_protection_faq); ?>">
<?php }
else if (strlen($link) > 0) {
?>
    <title><?php echo ($title_any); ?></title>
    <meta name="description" content="Message transaction hash: <?php echo ($link); ?>"/>
    <meta itemprop="name" content="Set in Block - Everlasting Message">
    <meta itemprop="description" content="Message transaction hash: <?php echo ($link); ?>">
    <meta name="twitter:title" content="Set in Block - Everlasting Message">
    <meta name="twitter:description" content="Message transaction hash: <?php echo ($link); ?>">
    <meta property="og:title" content="Set in Block - Everlasting Message">
    <meta property="og:description" content="Message transaction hash: <?php echo ($link); ?>">
<?php
}
?>
<meta name="twitter:card" content="summary">
<meta property="og:site_name" content="Set in Block">
</head>