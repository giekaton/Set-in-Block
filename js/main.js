
toastr.options = {
    closeButton: true,
    tapToDismiss: false,
    onclick: false,
    closeOnHover: false,
    timeOut: 0,
    extendedTimeOut: 0,
};


function hex2utf8(pStr) {
    var tempstr = ''
    try {
        tempstr = decodeURIComponent(pStr.replace(/\s+/g, '').replace(/[0-9a-f]{2}/g, '%$&'));
    }
    catch (err) {
        
        for (b = 0; b < pStr.length; b = b + 2) {
            tempstr = tempstr + String.fromCharCode(parseInt(pStr.substr(b, 2), 16));
        }
    }            
    return tempstr;
}


// Converts a raw javascript string into a string of single byte characters using utf8 encoding.
// This makes it easier to perform other encoding operations on the string.
function rstr2utf8(input) {
    var output = "";

    for (var n = 0; n < input.length; n++) {
        var c = input.charCodeAt(n);

        if (c < 128) {
            output += String.fromCharCode(c);
        } else if ((c > 127) && (c < 2048)) {
            output += String.fromCharCode((c >> 6) | 192);
            output += String.fromCharCode((c & 63) | 128);
        } else {
            output += String.fromCharCode((c >> 12) | 224);
            output += String.fromCharCode(((c >> 6) & 63) | 128);
            output += String.fromCharCode((c & 63) | 128);
        }
    }
    return output;
}


strlpad = function(str, pad, len) {
	while (str.length < len) {
		str = pad + str;
	}
	return str;
}


function str2hex(str) {
	var output = "";
	for (var i = 0; i < str.length; i++) {
		output += strlpad(str.charCodeAt(i).toString(16), "0", 2).toUpperCase();
	}
	return output;
}


function convert(unixtimestamp){
    // Months array
    var months_arr = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    // Convert timestamp to milliseconds
    var date = new Date(unixtimestamp*1000);
    // Year
    var year = date.getFullYear();
    // Month
    var month = months_arr[date.getMonth()];
    // Day
    var day = date.getDate();
    // Hours
    var hours = date.getHours();
    // Minutes
    var minutes = "0" + date.getMinutes();
    // Seconds
    var seconds = "0" + date.getSeconds();
    // Display date time in MM-dd-yyyy h:m:s format
    var convdataTime = month+'-'+day+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
    return convdataTime;
}


jQuery("#button-read").click( function() {
    jQuery("#reader-msg").show();
    jQuery("#reader-content").html("Loading...");
    var tx_hash = jQuery("#tx-hash").val();
    jQuery.ajax({     
        url: etherscan + '/api?module=proxy&action=eth_getTransactionByHash&txhash=' + tx_hash,
        success: function (data) {
            var decoded = hex2utf8(data["result"]["input"]);
            var blockNumber = data["result"]["blockNumber"];
            jQuery.ajax({     
                url: etherscan + '/api?module=proxy&action=eth_getBlockByNumber&tag='+blockNumber+'&boolean=true',
                success: function (data) {
                    console.log(typeof data.error);
                    if (typeof data.error === 'undefined') {
                        var timestamp = data["result"]["timestamp"];
                        var timestamp = parseInt(timestamp, 16);
                        var timestamp = convert(timestamp);
                    }
                    else {
                        var timestamp = "Processing... Try again later"
                    }
                    jQuery("#reader-content").html("Added on: "+ timestamp +"<br><br>" + decoded.substring(2));
                },
            })
        },
    })
});


jQuery("#how-it-works-link").click( function() {
    jQuery("#how-it-works").show();
});

jQuery("#close-1").click( function() {
    jQuery("#how-it-works").hide();
});

jQuery("#close-2").click( function() {
    jQuery("#reader-msg").hide();
});


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
}


jQuery("#button-set").click( function() {
    
    if (typeof window.web3 === 'undefined') {
        toastr.warning('Install <a href="https://metamask.io/" target="_blank">MetaMask</a> browser extension to broadcast messages', 'MetaMask missing');
        return;
    }
    else if (typeof web3.currentProvider.publicConfigStore._state.selectedAddress === 'undefined') {
        toastr.warning('To execute the transaction, first login to your MetaMask account', 'MetaMask');
        return;
    }
    
    var handleReceipt = (error, receipt) => {
        if (error) console.error(error);
        else {
            toastr.success('<span style="cursor:text;">Tx hash: '+receipt+'</span>', 'Transaction broadcasted');
        }
    }

    var message = jQuery("#message").val();
    var message = rstr2utf8(message);
    var message = str2hex(message);
    eth.sendTransaction({
        from: web3.currentProvider.publicConfigStore._state.selectedAddress,
        to: address,
        value: 0,
        gas: gasCount(message) + 30000,
        gasPrice: 3000000000,
        data: message,
    }, handleReceipt);

});