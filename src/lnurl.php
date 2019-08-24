<?php

namespace tkijewski\lnurl;

use tkijewski\lnurl\exception\LnurlException;

function encodeUrl($url)
{
    $arr = str_split($url);

    array_walk($arr, function(&$value, &$key) {
        $value = ord($value);
    });

    $bits = \BitWasp\Bech32\convertBits($arr, count($arr), 8, 5, TRUE);
    $encoded = \BitWasp\Bech32\encode('lnurl', $bits);
    $encoded = strtoupper($encoded);
    return $encoded;
}

function decodeUrl($lnurl)
{
	list ($hrp, $data) = \Bitwasp\Bech32\decodeRaw($lnurl);

	if ($hrp != 'lnurl')
		throw new LnurlException('Not a valid lnurl, hrp does not equal lnurl');

	$decoded = \BitWasp\Bech32\convertBits($data, count($data), 5, 8, false);
    $url = '';
    foreach ($decoded as $char) {
        $url .= chr($char);
    }

	return $url;
}