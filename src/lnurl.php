<?php

namespace tkijewski\lnurl;

use tkijewski\lnurl\exception\LnurlException;

const TAG_WITHDRAW  = 'withdrawRequest';
const TAG_LOGIN     = 'login';
const TAG_CHANNEL   = 'channelRequest';

/**
 * Encode a url into lnurl bech32 format
 * @param $url
 * @return string
 * @throws \BitWasp\Bech32\Exception\Bech32Exception
 */
function encodeUrl($url)
{
    $arr = str_split($url);

    array_walk($arr, function(&$value, $key) {
        $value = ord($value);
    });

    $bits = \BitWasp\Bech32\convertBits($arr, count($arr), 8, 5, TRUE);
    $encoded = \BitWasp\Bech32\encode('lnurl', $bits);
    $encoded = strtoupper($encoded);
    
    return $encoded;
}


/**
 * Decode/parse an lnurl bech32 string into an array of elements.
 * @param $lnurl
 * @return mixed ['url'=>URL,'tag'=>TAG,'queryParam1'=>'value1',....]
 * @throws LnurlException
 * @throws \BitWasp\Bech32\Exception\Bech32Exception
 */
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
    parse_str(@parse_url($url)['query'] ?? '', $queryParameters);

    $arr = $queryParameters;
    $arr['url'] = $url;

	return $arr;
}


