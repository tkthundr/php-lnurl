<?php
namespace tkijewski\test\lnurl;

use tkijewski\test\lnurl\TestCase;
use tkijewski\lnurl;

class UnitTest extends TestCase
{
    public function testEncodeUrl()
    {
    	$lnurl = 'LNURL1DP68GURN8GHJ7UM9WFMXJCM99E3K7MF0V9CXJ0M385EKVCENXC6R2C35XVUKXEFCV5MKVV34X5EKZD3EV56NYD3HXQURZEPEXEJXXEPNXSCRVWFNV9NXZCN9XQ6XYEFHVGCXXCMYXYMNSERXFQ5FNS';
    	
    	$url = 'https://service.com/api?q=3fc3645b439ce8e7f2553a69e5267081d96dcd340693afabe04be7b0ccd178df';

        $encoded = lnurl\encodeUrl($url);
        $this->assertEquals($encoded, $lnurl);
    }

    public function testDecodeUrl()
    {
		//https://paywall.link?someIdentifier=292e29j29j19nd91m2mfmmurn843&tag=withdraw
		$lnurl = 'LNURL1DP68GURN8GHJ7URP09MKZMRV9EKXJMNT8AEK7MT9F9JX2MN5D9NXJETJ85ERJVN9XGUK5V3EDGCNJMNY8YCK6VNDVEKK6ATJDCURGVEXW3SKW0THD96XSERJV9MS95LDUW';

		$decodedUrl = lnurl\decodeUrl($lnurl);

        $this->assertEquals($decodedUrl['tag'],'withdraw');
        $this->assertEquals($decodedUrl['someIdentifier'],'292e29j29j19nd91m2mfmmurn843');
        $this->assertEquals($decodedUrl['url'],'https://paywall.link?someIdentifier=292e29j29j19nd91m2mfmmurn843&tag=withdraw');
    }
}