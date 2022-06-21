<?php 
namespace BlockAnimations;

/**
* Primary Plugin class
*/
class Bootstrap 
{
	function __construct()
	{
		$this->defineGlobals();
		$this->pluginInit();
	}

	/**
	* Define Globals
	*/
	public function defineGlobals()
	{
		define('WP_BLOCK_ANIMATIONS_VERSION', '1.0.0');
		define('WP_BLOCK_ANIMATIONS_DIRECTORY', plugins_url() . '/' . basename(dirname(dirname(__FILE__))));
		define('WP_BLOCK_ANIMATIONS_VERSION_PATH', dirname(dirname(__FILE__)));
	}

	public function pluginInit()
	{
		new Activation\Dependencies;
	}
}