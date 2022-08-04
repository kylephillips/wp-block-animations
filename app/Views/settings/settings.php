<div class="wrap">
	<h1><?php _e('Block Animations Settings', 'wp-block-animations'); ?></h1>
	<form method="post" enctype="multipart/form-data" action="options.php">
		<?php settings_fields( 'wp-block-animations-general' ); ?>
		<table class="form-table" role="presentation">
			<tbody>
				<tr>
					<th scope="row"><?php _e('Animation Settings', 'wp-block-animations'); ?></th>
					<td>
						<fieldset>
							<legend class="screen-reader-text"><span><?php _e('Animation Settings', 'wp-block-animations'); ?></span></legend>
							<label>
								<input name="wp_block_animations_general[disable_scroll_up]" type="checkbox" value="1" <?php if ( $this->settings->disableScrollUp() ) echo 'checked="checked"'; ?>><?php _e('Only animate on initial scroll down', 'wp-block-animations'); ?>
							</label>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
		<?php submit_button(); ?>
	</form>
</div><!-- .wrap -->