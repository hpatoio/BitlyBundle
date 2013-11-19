Getting started with HpatoioBitlyBundle
======================================

Setup
-----

- Add hpatoio/bitly-bundle as a dependency in your project's composer.json file:

```
{
    "require": {
        "hpatoio/bitly-bundle": "dev-master"
    }
}
```

- Add HpatoioBitlyBundle to your application kernel

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

- Yml configuration

``` yml
# app/config/config.yml
parameters:
    hpatoio_bitly.access_token: here_your_bitly_access_token
```

Visit [this page](https://bitly.com/a/oauth_apps) to get your access token.

Usage
-----

 - Using service

Open your controller and call the service.

``` php
<?php
    $bitly_client = $this->get('hpatoio_bitly.client');
?>
```

Then you can use one of the methods of HpatoioBitly class

``` php
<?php
    $result = $bitly_client->->Shorten(array("longUrl" => "http://www.iliveinperego.com/"));
?>
```