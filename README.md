# ElasticSearch API for Laravel

Powerful Laravel API using the official PHP client for ElasticSearch


- **Author:** Erwin Flaming
- **Website:** [http://erwinflaming.com](http://erwinflaming.com/)
- **Version:** 1.0.0

## Installation

To install the API as a Composer package to be used with Laravel 4, simply add this to your composer.json:

```json
"require": {
		"elasticsearch/elasticsearch": "~1.0",
		"spoowy/elasticsearch": "dev-master"
}
```

..and run `composer update`(Having any problems with that? Try `php artisan dump-autoload` and then `composer update` again).  Once it's installed, you can register the service provider in `app/config/app.php` in the `providers` array:

```php
'providers' => array(
    //...
    'Spoowy\Elasticsearch\ElasticsearchServiceProvider',
)
```

Then create the config file `app/config/elasticsearch.php`. Remember, this is an example with default values.
```php
<?php

use Monolog\Logger;

return array(
		'hosts' => array('localhost:9200'),
		'logPath' => storage_path() . '/logs/elasticsearch-' . php_sapi_name() . '.log',
		'logLevel' => Logger::INFO
);
```

## Documentation

Now, you can access the ElasticSearch API simply by: `ElasticSearch::`, e.g. `ElasticSearch::get($params)`

More detailed information about using this API is sure to come.
