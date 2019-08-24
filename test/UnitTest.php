<?php
namespace tkijewski\test\lnurl;

use tkijewski\test\lnurl\TestCase;
use tkijewski\lnurl;

class UnitTest extends TestCase
{
    public function testDecodeEncodeUrl()
    {
    	$lnurl = 'LNURL1DP68GURN8GHJ7UM9WFMXJCM99E3K7MF0V9CXJ0M385EKVCENXC6R2C35XVUKXEFCV5MKVV34X5EKZD3EV56NYD3HXQURZEPEXEJXXEPNXSCRVWFNV9NXZCN9XQ6XYEFHVGCXXCMYXYMNSERXFQ5FNS';

    	$url = 'https://service.com/api?q=3fc3645b439ce8e7f2553a69e5267081d96dcd340693afabe04be7b0ccd178df';

        $decodedUrl = lnurl\decodeUrl($lnurl);
        $this->assertEquals($decodedUrl,$url);

        $encoded = lnurl\encodeUrl($url);
        $this->assertEquals($encoded, $lnurl);
    }
}