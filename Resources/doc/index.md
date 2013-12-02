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

###### Setup


``` yml
# app/config/config.yml
hpatoio_bitly:
    # You Bitly access token. Visit [this page](https://bitly.com/a/oauth_apps) to get it.
    access_token: insert_here_you_bitly_access_token
    
    # These parameters are optionals !
    
    # Turn the profiler on (Details in the next section)
    profiler: on
    
    # Turn file log on and specify log format  (Details in the next section)
    file_log_format: [default|debug|short]
```

##### Profiler

If you turn on the profiler you will see one more icon in the *Web Debug Toolbar* and you can easily see details about all requests made by this bundle. These is useful on *dev* environment.

##### File log

You can log all requests and response made by this bundle by specifying *file_log_format*. Allowed values are default, debug and short. You can also pass a MessageFormatter http://docs.guzzlephp.org/en/latest/plugins/log-plugin.html


Usage
-----

``` php
<?php
    $bitly_client = $this->get('hpatoio_bitly.client');
    $result = $bitly_client->Shorten(array("longUrl" => "http://www.iliveinperego.com/"));
?>
```

For more information about `hpatoio/bitly-api` and how use it [look here](https://github.com/hpatoio/bitly-api)


