<?php namespace Spoowy\Elasticsearch;

use Spoowy\Elasticsearch\Facades\ElasticSearch;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Monolog\Logger;
use Config;
use Elasticsearch\Client;

class ElasticsearchServiceProvider extends ServiceProvider {

	/**
	* Indicates if loading of the provider is deferred.
	*
	* @var bool
	*/
	protected $defer = false;
	
	/**
	* Bootstrap the application events.
	*
	* @return void
	*/
	public function boot()
	{
		$this->package('spoowy/elasticsearch');
	}
	
	/**
	* Register the service provider.
	*
	* @return void
	*/
	public function register()
	{
		$this->app->booting(function()
		{
			$loader = AliasLoader::getInstance();
			$loader->alias('ElasticSearch', 'Spoowy\Elasticsearch\Facades\Elasticsearch');
		});
		
		$this->app->singleton('elasticsearch', function()
		{
			$config = array(
				'hosts' => array('localhost:9200'),
				'logPath' => storage_path().'/logs/elasticsearch-'.php_sapi_name().'.log',
				'logLevel' => Logger::INFO
			);
			
			$config = array_merge($config, Config::get('elasticsearch'));
				return new Client($config);	
			});
		}
	
	/**
	* Get the services provided by the provider.
	*
	* @return array
	*/
	public function provides()
	{
		return array('elasticsearch');
	}

}
