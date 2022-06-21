<?php
namespace BlockAnimations\Activation;

class Dependencies
{
	public function __construct()
	{
		add_action('admin_init', [$this, 'registerAdminScripts']);
	}

	/**
	* Register the Admin Scripts
	*/
	public function registerAdminScripts()
	{	
		$dep = [
			'dependencies' => ['wp-blocks', 'wp-dom-ready', 'lodash', 'wp-editor'],
			'version' => WP_BLOCK_ANIMATIONS_VERSION
		];
		wp_enqueue_script(
			'wp-block-animations-editor',
			WP_BLOCK_ANIMATIONS_DIRECTORY . '/assets/dist/scripts-admin.js',
			$dep['dependencies'],
			$dep['version']
		);
	}
}