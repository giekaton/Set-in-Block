<?php

include_once("env.php");

$nftId = $_GET['id'];
$nftAddress = $_GET['address'];
if (isset($_GET['net'])) {
  $net = $_GET['net'];
}
else {
  $net = 'main';
}

// echo($nftId . $nftAddress);

$string = "0xc87b56dd0000000000000000000000000000000000000000000000000000000000000000";
$idHex = dechex($nftId);

$l = strlen($idHex) * -1;
$string = substr($string, 0, $l);
$string .= $idHex;

// echo($string);

$plan = "A";

if ($net == 'main') {
  $api = 'api';
}
else if ($net == 'ropsten') {
  $api = 'api-ropsten';
}
else if ($net == 'rinkeby') {
  if ($plan == "A") {
    $api = 'rinkeby-api';
  }
  else {
    $api = 'api-rinkeby';
  }
}

if ($plan == "A") {
  // Plan A: OpenSea API

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://'.$api.'.opensea.io/api/v1/asset/'.$nftAddress.'/'.$nftId.'/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

  $headers = array();
  if ($api == 'api') {
    $headers[] = 'X-Api-Key: '.$api_key_opensea;
  }
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);


  $res = json_decode(($result), TRUE);

  echo($result);

}

else {
  // Plan B (Etherscan API)

  $link = "https://".$api.".etherscan.io/api?module=proxy&action=eth_call&to=".$nftAddress."&data=".$string."&apikey=".$api_key_etherscan;

  $res = json_decode(file_get_contents($link), TRUE);

  // var_dump($res);

  function hex_to_string ($hex) {
      if (strlen($hex) % 2 != 0) {
        // throw new Exception('String length must be an even number.', 1);
        $hex .= 0;
      }
      $string = '';
    
      for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
      }
      
      return $string;
    }
  $ress = (substr($res['result'],65));
  // echo($ress);
  $ress = ltrim($ress, '0');
  $ress = rtrim($ress, '0');
  $ress = (substr(($ress),2));
  // echo($ress);

  $result = hex_to_string($ress);
  // var_dump($result);
  // echo($result);

  $result = str_replace("ipfs://", "https://ipfs.io/ipfs/", $result);

  $res = file_get_contents($result);

  echo($res);
}