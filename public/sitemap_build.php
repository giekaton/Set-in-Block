<?php

$urls = file_get_contents('sitemap_urls.json');
$urls = json_decode($urls, true);
// var_dump($urls);

$sitemap = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach($urls['pages'] as $page) {
    $sitemap .= '
<url>
<loc>https://setinblock.com'.$page.'</loc>
<priority>1</priority>
</url>';
}

foreach($urls['txHashArray'] as $msg) {
    $sitemap .= '
<url>
<loc>https://setinblock.com/msg/'.$msg.'</loc>
<priority>0.99</priority>
</url>';
}

foreach($urls['nftRandom'] as $nftCollection) {
    $i = 1;
    while($i < 100) {
        $sitemap .= '
<url>
<loc>https://setinblock.com/nft/'.$nftCollection["contract"].'/'.$i.'</loc>
<priority>1</priority>
</url>';
        $i++;
    }
}

// echo($sitemap);
// exit();

$sitemap .= '
</urlset>';

$file = fopen("sitemap.xml", "w");
fwrite($file, $sitemap);



?>