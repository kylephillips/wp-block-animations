<?php 
namespace BlockAnimations;

/**
* Helper Functions
*/
class Helpers 
{
	/**
	* Plugin Root Directory
	*/
	public static function plugin_url()
	{
		return plugins_url() . '/' . basename(dirname(dirname(__FILE__)));
	}

	/**
	* View
	*/
	public static function view($file)
	{
		return dirname(__FILE__) . '/Views/' . $file . '.php';
	}

	/**
	* Template/Theme overrides
	*/
	public static function template($file)
	{
		$template = locate_template('wp-block-animations/' . $file . '.php');
		return ( $template == '' ) ? dirname(dirname(__FILE__)) . '/templates/' . $file . '.php' : $template;
	}
}