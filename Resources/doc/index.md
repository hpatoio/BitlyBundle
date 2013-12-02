Installation and setup
======================================

###### Add hpatoio/bitly-bundle as a dependency in your project's `composer.json` file
```
{
    "require": {
        "hpatoio/bitly-bundle": "dev-master"
    }
}
```

###### Add HpatoioBitlyBundle to your application kernel
``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Hpatoio\BitlyBundle\HpatoioBitlyBundle(),
    );
}
```

###### Add you access_token to `config.yml`
``` yml
# app/config/config.yml
parameters:
    hpatoio_bitly.access_token: here_your_bitly_access_token
```

 * Visit [this page](https://bitly.com/a/oauth_apps) to get your access token.
 

Usage
-----

``` php
<?php
    $bitly_client = $this->get('hpatoio_bitly.client');
    $result = $bitly_client->Shorten(array("longUrl" => "http://www.iliveinperego.com/"));
?>
```

For more information about `hpatoio/bitly-api` and how use it [look here](https://github.com/hpatoio/bitly-api)


