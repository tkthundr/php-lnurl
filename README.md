# php-lnurl
PHP implementation of the `lnurl` protocol https://github.com/btcontract/lnurl-rfc/blob/master/spec.md

Uses the bech32 library https://github.com/Bit-Wasp/bech32

## Installation

```
composer require tkijewski/php-lnurl
```


## Usage

```
<?php

require __DIR__ . '/vendor/autoload.php';

use tkijewski\lnurl;

$url = 'https://paywall.link?someIdentifier=292e29j29j19nd91m2mfmmurn843';

$lnurl = lnurl\encodeUrl($url);
//LNURL1DP68GURN8GHJ7URP09MKZMRV9EKXJMNT8AEK7MT9F9JX2MN5D9NXJETJ85ERJVN9XGUK5V3EDGCNJMNY8YCK6VNDVEKK6ATJDCURGVC4UCD6K

echo lnurl\decodeUrl($lnurl);
//https://paywall.link?someIdentifier=292e29j29j19nd91m2mfmmurn843

```
