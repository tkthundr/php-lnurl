# php-lnurl
PHP implementation of the `lnurl` protocol https://github.com/fiatjaf/lnurl-rfc

Uses the bech32 library https://github.com/Bit-Wasp/bech32

## Installation

```
$ composer require tkijewski/php-lnurl
```


## Usage

```
<?php

require __DIR__ . '/vendor/autoload.php';

use tkijewski\lnurl;

$lnurl = lnurl\encodeUrl('https://paywall.link?someIdentifier=292e29j29j19nd91m2mfmmurn843&tag=withdraw');
//LNURL1DP68GURN8GHJ7URP09MKZMRV9EKXJMNT8AEK7MT9F9JX2MN5D9NXJETJ85ERJVN9XGUK5V3EDGCNJMNY8YCK6VNDVEKK6ATJDCURGVEXW3SKW0THD96XSERJV9MS95LDUW


print_r( lnurl\decodeUrl($lnurl) );
/*
 * [
 *   'url' => 'https://paywall.link?someIdentifier=292e29j29j19nd91m2mfmmurn843&tag=withdraw',
 *   'tag' => 'withdraw'
 *   'someIdentifier' => '292e29j29j19nd91m2mfmmurn843'
 * ] 
 */

```

## Test

```
$ vendor/bin/phpunit
```
