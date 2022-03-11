<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\OpenSeaAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/nft/{nftAddress}/{nftId}', function ($nftAddress, $nftId) {
    $api = "api";
    $result = OpenSeaAPI::getNft($nftAddress, $nftId, $api);

    return ($result);
});

Route::get('/{net}/nft/{nftAddress}/{nftId}', function ($net, $nftAddress, $nftId) {
    if ($net == 'ropsten') {
        $api = 'ropsten-api'; 
    }
    else if ($net == 'rinkeby') {
        $api = 'rinkeby-api';
    }
    else {
        return('network error');
    }
    $result = OpenSeaAPI::getNft($nftAddress, $nftId, $api);

    return ($result);
});

Route::get('/msg/{txHash}', function ($txHash) {
    $api_key_etherscan = env('api_key_etherscan');
    $link = "https://api.etherscan.io/api?module=proxy&action=eth_getTransactionByHash&txhash=".$txHash."&apikey=".$api_key_etherscan;
    $res = json_decode(file_get_contents($link), TRUE);
    return ($res['result']);
});

// @Todo: Add this to initial request
Route::get('/msg-timestamp/{blockNumber}', function ($blockNumber) {
    $api_key_etherscan = env('api_key_etherscan');
    $link = "https://api.etherscan.io/api?module=proxy&action=eth_getBlockByNumber&tag=".$blockNumber."&boolean=true&apikey=".$api_key_etherscan;
    $res = json_decode(file_get_contents($link), TRUE);
    return ($res['result']);
});

Route::get('/{net}/msg/{txHash}', function ($net, $txHash) {
    $api_key_etherscan = env('api_key_etherscan');
    $api = "";
    if ($net == 'ropsten') $api = 'api-ropsten';
    else if ($net == 'rinkeby') $api = 'api-rinkeby';
    $link = "https://".$api.".etherscan.io/api?module=proxy&action=eth_getTransactionByHash&txhash=".$txHash."&apikey=".$api_key_etherscan;
    $res = json_decode(file_get_contents($link), TRUE);
    return ($res['result']);
});