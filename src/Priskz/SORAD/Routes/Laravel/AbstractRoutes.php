<?php

namespace Priskz\SORAD\Routes\Laravel;

use Exception;
use Illuminate\Support\Facades\Route;

abstract class AbstractRoutes
{
    /**
     * @property string $prefix
     */
	protected static $prefix = null;

    /**
     * @property array $middleware
     */
	protected static $middleware = [];

    /**
     * @property array $nameSpace
     */
	protected static $namespace = null;

    /**
     * Register the route group.
     * 
     * @return void
     */
	abstract protected static function register();

	/**
	 *	Load Routes
	 */
	public static function load(array $config = [])
	{
		// Set configuration values passed.
		static::setConfig($config);

		// Register the routes.
		static::register();
	}

    /**
     * Set route configuration values.
     *
     * @param  array $config
     * @return void
     */
	private static function setConfig(array $config)
	{
		// $prefix
		static::setPrefix($config);

		// $namespace
		static::setNamespace($config);

		// $middleware
		static::setMiddleware($config);
	}

    /**
     * Set static prefix value.
     *
     * @param  array $config
     * @return void
     */
	private static function setPrefix(array $config)
	{
		if(array_key_exists('prefix', $config))
		{
			static::$prefix = $config['prefix'];
		}

		// Route group prefix must be set or defined.
		if(is_null(static::$prefix))
		{
			throw new Exception(__CLASS__ . ': $prefix can not be null.');
		}
	}

    /**
     * Set static namespace value.
     *
     * @param  array $config
     * @return void
     */
	private static function setNamespace(array $config)
	{
		if(array_key_exists('namespace', $config))
		{
			static::$namespace = $config['namespace'];
		}

		// Route group prefix must be set or defined.
		if(is_null(static::$prefix))
		{
			throw new Exception(__CLASS__ . ': $namespace can not be null.');
		}
	}

    /**
     * Set static middlware value.
     *
     * @param  array $config
     * @return void
     */
	private static function setMiddleware(array $config)
	{
		if(array_key_exists('middleware', $config))
		{
			static::$middleware = $config['middleware'];
		}
	}
}