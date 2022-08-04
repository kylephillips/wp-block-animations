<?php
namespace BlockAnimations\Settings;

use BlockAnimations\Settings\SettingsRepository;
use BlockAnimations\Helpers;

/**
* Plugin Settings
*/
class Settings
{
	/**
	* Settings Repository
	* @var obj SettingsRepository
	*/
	private $settings;

	public function __construct()
	{
		$this->settings = new SettingsRepository;
		add_action( 'admin_menu', [$this, 'registerSettingsPage']);
		add_action( 'admin_init', [$this, 'registerSettings']);
	}

	/**
	* Register the settings page
	* @see admin_menu
	*/
	public function registerSettingsPage()
	{
		add_options_page( 
			__('Block Animations Settings', 'wp-block-animations'),
			__('Block Animations', 'wp-block-animations'),
			'manage_options',
			'block-animations-settings', 
			[$this, 'settingsPage']
		);
	}

	/**
	* Register the plugin settings
	* @see admin_init
	*/
	public function registerSettings()
	{
		register_setting( 'wp-block-animations-general', 'wp_block_animations_general' );
	}

	/**
	* Display the Settings Page
	* Callback for registerSettingsPage method
	*/
	public function settingsPage()
	{
		$tab = ( isset($_GET['tab']) ) ? sanitize_text_field($_GET['tab']) : 'general';
		include( Helpers::view('settings/settings') );
	}
}