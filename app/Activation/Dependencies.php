<?php
namespace BlockAnimations\Activation;

use BlockAnimations\Settings\SettingsRepository;

class Dependencies
{
	/**
	* Settings Repository
	* @var obj
	*/
	private $settings;

	public function __construct()
	{
		$this->settings = new SettingsRepository;
		add_action('admin_init', [$this, 'registerAdminScripts']);
		add_action('wp_enqueue_scripts', [$this, 'scripts']);
		add_action( 'wp_enqueue_scripts', [$this, 'styles']);
	}

	/**
	* Enqueue the Admin Scripts
	*/
	public function registerAdminScripts()
	{	
		$script_deps = apply_filters('wp_block_animations_script_dependencies', ['wp-blocks', 'wp-dom-ready', 'lodash', 'wp-editor']);
		$dep = [
			'dependencies' => $script_deps,
			'version' => WP_BLOCK_ANIMATIONS_VERSION
		];
		wp_enqueue_script(
			'wp-block-animations-editor',
			WP_BLOCK_ANIMATIONS_DIRECTORY . '/assets/dist/script_admin.js',
			$dep['dependencies'],
			$dep['version']
		);
	}

	/**
	* Enqueue the Front end scripts
	*/
	public function scripts()
	{
		wp_enqueue_script(
			'block-animations-scripts',
			WP_BLOCK_ANIMATIONS_DIRECTORY . '/assets/dist/script.js',
			[],
			WP_BLOCK_ANIMATIONS_VERSION,
			true
		);
		$localized_data = [];
		$localized_data['disable_scroll_up'] = ( $this->settings->disableScrollUp() ) ? '1' : '0';
		wp_localize_script( 
			'block-animations-scripts', 
			'block_animations', 
			$localized_data
		);
	}

	/**
	* Enqueue the front end styles
	*/
	public function styles()
	{
		wp_enqueue_style(
			'block-animations-styles',
			WP_BLOCK_ANIMATIONS_DIRECTORY . '/assets/css/style.css',
			[],
			WP_BLOCK_ANIMATIONS_VERSION
		);
	}
}