<?php

use Illuminate\Support\Facades\Route;

use App\Models\OpenSeaAPI;
use App\Models\EtherscanAPI;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('home');


// NFT Reader

Route::get('/nft/{nftAddress}/{nftId}', function ($nftAddress, $nftId) {
    $api = "api";
    $result = OpenSeaAPI::getNft($nftAddress, $nftId, $api);

    if (json_decode($result, true) == null) { 
        echo("Currently, Set in Block is experiencing some connection issues. Please try again later.");
        exit;
    }
    else if (sizeof(json_decode($result, true)) == 1) {
        abort(404);
    }

    return View::make('welcome', array('nft_data' => $result));
})->where('nftAddress', '.*')->where('nftId', '.*')->name('nft');

Route::get('/{net}/nft/{nftAddress}/{nftId}', function ($net, $nftAddress, $nftId) {
    $api_key_opensea = env('api_key_opensea');

    if ($net == 'ropsten') {
        // opensea
        $api = 'ropsten-api'; 
    }
    else if ($net == 'rinkeby') {
        // opensea
        $api = 'rinkeby-api';
    }
    else {
        return('network error');
    }
    $result = OpenSeaAPI::getNft($nftAddress, $nftId, $api);

    if (json_decode($result, true) == null) { 
        echo("Currently, Set in Block is experiencing some connection issues. Please try again later.");
        exit;
    }
    else if (sizeof(json_decode($result, true)) == 1) {
        abort(404);
    }

    return View::make('welcome', array('nft_data' => $result));

})->where('nftAddress', '.*')->where('nftId', '.*')->name('nft');


// Message Reader

Route::get('/msg/{txHash}', function ($txHash) {
    $api_key_etherscan = env('api_key_etherscan');
    $link = "https://api.etherscan.io/api?module=proxy&action=eth_getTransactionByHash&txhash=".$txHash."&apikey=".$api_key_etherscan;
    $res = json_decode(file_get_contents($link), TRUE);
    return View::make('welcome', array('msg_data' => $res['result']));
})->where('txHash', '.*')->name('msg');

Route::get('/{net}/msg/{txHash}', function ($net, $txHash) {
    $api_key_etherscan = env('api_key_etherscan');
    $api = "";
    if ($net == 'ropsten') $api = 'api-ropsten';
    else if ($net == 'rinkeby') $api = 'api-rinkeby';
    $link = "https://".$api.".etherscan.io/api?module=proxy&action=eth_getTransactionByHash&txhash=".$txHash."&apikey=".$api_key_etherscan;
    $res = json_decode(file_get_contents($link), TRUE);
    return View::make('welcome', array('msg_data' => $res['result']));
})->where('txHash', '.*')->name('msg');


// Static pages

Route::get('/about', function () {
    return view('welcome');
})->name('about');

Route::get('/new', function () {
    return view('welcome');
})->name('new');

Route::get('/new-message', function () {
    return view('welcome');
})->name('new-message');

Route::get('/copyright-protection', function () {
    return view('welcome');
})->name('copyright-protection');

Route::get('/mint-nft', function () {
    return view('welcome');
})->name('mint-nft');

Route::get('/cease-and-desist-letter-template', function () {
    return view('welcome');
})->name('cease-and-desist-letter-template');

Route::get('/faq', function () {
    return view('welcome');
})->name('faq');

// Route::get('/{any}', function () {
//     return view('welcome');
// });
