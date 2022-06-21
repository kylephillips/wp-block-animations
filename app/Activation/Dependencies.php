<?php
namespace BlockAnimations\Activation;

class Dependencies
{
	public function __construct()
	{
		add_action('admin_init', [$this, 'registerAdminScripts']);
		add_action('wp_enqueue_scripts', [$this, 'scripts']);
	}

	/**
	* Enqueue the Admin Scripts
	*/
	public function registerAdminScripts()
	{	
		$dep = [
			'dependencies' => ['wp-blocks', 'wp-dom-ready', 'lodash', 'wp-editor'],
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
	}
}