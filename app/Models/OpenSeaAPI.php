<?php

namespace App\Models;

class OpenSeaAPI
{
    public static function getNft($nftAddress= null, $nftId= null, $api= null) {
        $api_key_opensea = env('api_key_opensea');

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

        return($result);
    }
}
