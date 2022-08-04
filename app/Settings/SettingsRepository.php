<?php
namespace BlockAnimations\Settings;

/**
* Plugin Settings Repository
*/
class SettingsRepository
{
	public function disableScrollUp()
	{
		$option = get_option('wp_block_animations_general');
		if ( $option && isset($option['disable_scroll_up']) && $option['disable_scroll_up'] == '1' ) return true;
		return false;
	}
}