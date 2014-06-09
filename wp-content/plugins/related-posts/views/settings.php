<div class="wrap" id="wp_rp_wrap">
	<?php foreach($input_hidden as $id => $value): ?>
	<input type="hidden" id="<?php echo $id; ?>" value="<?php echo $value; ?>" />
	<?php endforeach; ?>

	<!-- HEADER AND SUPPORT -->
	<div class="header">
		<div class="support">
			<h4><?php _e("Awesome support", 'wp_related_posts'); ?></h4>
			<p>
				<?php _e("If you have any questions please contact us at",'wp_related_posts');?> <a target="_blank" href="mailto:support+gp@zemanta.com"><?php _e("support", 'wp_related_posts');?></a>.
			</p>
		</div>
		<h2 class="title">
			<?php _e("Related Posts by ",'wp_related_posts');?>
			<a href="http://www.zemanta.com">Zemanta</a>
		</h2>
	</div>
	<!-- NOTIFICATIONS -->
	<?php wp_rp_print_notifications(); ?>

	<?php if($meta['show_turn_on_button']): ?>
	<!-- TURN ON STATISTICS PROMO -->
	<div id="wp_rp_turn_on_statistics">
		<div class="turn_on_wrap">
			<h4>Turn on Related Posts and start using awesome features.</h4>
			<div class="button_wrap">
				<a data-type="singlebutton" href="#" class="zemanta-button turn-on">Turn on Related Posts</a>
			</div>
			<p>By turning on Related Posts you agree to <a href="http://www.zemanta.com/rp-tos" target="_blank">terms of service.</a></p>
			<p>You'll get Advanced Settings, Themes, Thumbnails and Analytics Dashboard. These features are provided by <a target="_blank" href="http://www.zemanta.com">Zemanta</a> as a service.</p>
		</div>
		<img class="screendesc" src="<?php echo plugins_url("static/img/turnonscreen.jpg", $settings_file); ?>" />
	</div>
	<?php endif; ?>

	<h2><?php _e('Subscribe to plugin updates and newsletter', 'wp_related_posts'); ?></h2>
	<div class="container">
		<table class="form-table subscription-block">
			<tr valign="top">
				<th scope="row">
					<?php _e('Email:', 'wp_related_posts'); ?>
				</th>
				<td>
					<input type="text" id="wp_rp_subscribe_email" value="<?php esc_attr_e($meta['email']); ?>" class="regular-text" /> 
					<a id="wp_rp_subscribe_button" href="#" class="button-primary"><?php _e('Subscribe', 'wp_related_posts'); ?></a>
					<a id="wp_rp_unsubscribe_button" href="#" class="button-primary"><?php _e('Unsubscribe', 'wp_related_posts'); ?></a>
				</td>
			</tr>
		</table>
	</div>
	
	<!-- MAIN FORM -->
	<form method="post" enctype="multipart/form-data" action="<?php echo $form_url; ?>" id="wp_rp_settings_form" style="display: <?php echo $form_display; ?>;">
		<?php wp_nonce_field('wp_rp_settings', '_wp_rp_nonce') ?>

		
		
		<?php if ($options['ctr_dashboard_enabled']): ?>
		<div id="wp_rp_earnings_holder" style="display:none;">
			<h2><?php _e('Earnings', 'wp_related_posts'); ?></h2>
			<div class="container">
				<p>By displaying promoted posts on your site you've already earned:</p>
				<div id="wp_rp_earnings_wrap">
					<span class="num"></span>
					<a href="#" class="claim disabled">claim
						<span class="payout-explain">You can claim the money when it reaches <span class="payout"></span>.</span>
					</a>
				</div>
			</div>
		</div>
		<div id="wp_rp_statistics_holder">
			<div id="wp_rp_statistics_collapsible" block="statistics" class="settings_block collapsible<?php echo !$meta['show_statistics'] ? ' collapsed' : ''; ?>">
				<a href="#" class="collapse-handle">Collapse</a>
				<h2><?php _e('Statistics', 'wp_related_posts'); ?></h2>
				<div class="container" <?php echo !$meta['show_statistics'] ? 'style="display: none;" ' : ''; ?>>
					<div id="wp_rp_statistics_wrap">
						<div class="message unavailable"><?php _e("Statistics currently unavailable",'wp_related_posts'); ?></div>
					</div>
				</div>
			</div>
		</div>
		<?php do_action('wp_rp_admin_notices'); ?>
		<?php endif; ?>
		<div id="wp_rp_basic_settings_collapsible" block="basic_settings" class="settings_block collapsible">
			<a href="#" class="collapse-handle">Collapse</a>
			<h2><?php _e("Basic settings",'wp_related_posts');?></h2>
			<div class="container">
				<table class="form-table">
					<tr valign="top">
						<th scope="row">
							<?php _e('Related Posts Title:', 'wp_related_posts'); ?>
						</th>
						<td>
							<input name="wp_rp_related_posts_title" type="text" id="wp_rp_related_posts_title" value="<?php esc_attr_e($options['related_posts_title']); ?>" class="regular-text" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<?php _e('Number of Posts:', 'wp_related_posts');?>
						</th>
						<td>
							<input name="wp_rp_max_related_posts" type="number" step="1" id="wp_rp_max_related_posts" class="small-text" min="1" value="<?php esc_attr_e($options['max_related_posts']); ?>" />
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div id="wp_rp_advanced_settings_collapsible" block="statistics" class="settings_block collapsible collapsed">
			<a href="#" class="collapse-handle">Collapse</a>
			<h2><?php _e("Advanced settings",'wp_related_posts');?></h2>
			<div class="container" style="display: none">
				<h3><?php _e("Themes",'wp_related_posts'); ?></h3>
				<label>
					<input name="wp_rp_enable_themes" type="checkbox" id="wp_rp_enable_themes" value="yes"<?php checked($options["enable_themes"]); ?> />
					<?php _e("Enable Themes",'wp_related_posts'); ?>*
				</label>
				
				<h4><?php _e("Layout",'wp_related_posts'); ?></h4>
				<div id="wp_rp_theme_options_wrap" style="display:none;">
					<input type="hidden" id="wp_rp_desktop_theme_selected" value="<?php esc_attr_e($options['desktop']['theme_name']); ?>" />
					<div id="wp_rp_desktop_theme_options_wrap">
						<div id="wp_rp_desktop_theme_area" style="display: none;">
							<div class="theme-list"></div>
							<div class="theme-screenshot"></div>
						</div>
					</div>
				</div>
				<h3><?php _e("Customize",'wp_related_posts'); ?></h3>
				<div id="wp_rp_desktop_theme_custom_css_wrap">
					<label>
						<input name="wp_rp_desktop_display_thumbnail" type="checkbox" id="wp_rp_desktop_display_thumbnail" value="yes" <?php checked($options['desktop']["display_thumbnail"]); ?> >
						<?php _e("Display Thumbnails For Related Posts",'wp_related_posts');?>
					</label><br />
					<label>
						<input name="wp_rp_desktop_display_comment_count" type="checkbox" id="wp_rp_desktop_display_comment_count" value="yes" <?php checked($options['desktop']["display_comment_count"]); ?>>
						<?php _e("Display Number of Comments",'wp_related_posts');?>
					</label><br />
					<label>
						<input name="wp_rp_desktop_display_publish_date" type="checkbox" id="wp_rp_desktop_display_publish_date" value="yes" <?php checked($options['desktop']["display_publish_date"]); ?>>
						<?php _e("Display Publish Date",'wp_related_posts');?>
					</label><br />
					<label>
						<input name="wp_rp_desktop_display_excerpt" type="checkbox" id="wp_rp_desktop_display_excerpt" value="yes" <?php checked($options['desktop']["display_excerpt"]); ?>>
						<?php _e("Display Post Excerpt",'wp_related_posts');?>
					</label>
					<label id="wp_rp_desktop_excerpt_max_length_label">
						<input name="wp_rp_desktop_excerpt_max_length" type="text" id="wp_rp_desktop_excerpt_max_length" class="small-text" value="<?php esc_attr_e($options['desktop']["excerpt_max_length"]); ?>" /> <span class="description"><?php _e('Maximum Number of Characters.', 'wp_related_posts'); ?></span>
					</label><br />
					<label>
						<input type="checkbox" id="wp_rp_desktop_custom_theme_enabled" name="wp_rp_desktop_custom_theme_enabled" value="yes" <?php checked($options['desktop']['custom_theme_enabled']); ?> />
						<?php _e("Enable custom CSS",'wp_related_posts'); ?>
					</label>
					<div class="custom-css-container">
						<textarea style="clear: both; width: 300px; height: 215px; background: #EEE;" id="wp_rp_desktop_theme_custom_css" name="wp_rp_desktop_theme_custom_css" class="custom-css"><?php echo htmlspecialchars($options['desktop']['theme_custom_css'], ENT_QUOTES); ?></textarea>
					</div>
					<h4><?php _e("Default thumbnails",'wp_related_posts'); ?></h4>
					<label>
						<?php _e('For posts without images, a default image will be shown.<br/>
							  You can upload your own default image here','wp_related_posts');?>
						<input type="file" name="wp_rp_default_thumbnail" />
					</label>
					<?php if($options['default_thumbnail_path']) : ?>
					<span style="display: inline-block; vertical-align: top; *display: inline; zoom: 1;">
						<img style="padding: 3px; border: 1px solid #DFDFDF; border-radius: 3px;" valign="top" width="80" height="80" src="<?php esc_attr_e(wp_rp_get_default_thumbnail_url()); ?>" alt="selected thumbnail" />
						<br />
						<label>
							<input type="checkbox" name="wp_rp_default_thumbnail_remove" value="yes" />
							<?php _e("Remove selected",'wp_related_posts');?>
						</label>
					</span>
					<?php endif; ?>

					<?php if($custom_fields): ?>
					<br />
					<br />
					<label><input name="wp_rp_thumbnail_use_custom" type="checkbox" value="yes" <?php checked($options['thumbnail_use_custom']); ?>> Use custom field for thumbnails</label>
					<select name="wp_rp_thumbnail_custom_field" id="wp_rp_thumbnail_custom_field"  class="postform">

						<?php foreach ( $custom_fields as $custom_field ) : ?>
						<option value="<?php esc_attr_e($custom_field); ?>"<?php selected($options["thumbnail_custom_field"], $custom_field); ?>><?php esc_html_e($custom_field);?></option>
						<?php endforeach; ?>
					</select>
					<br />
					<?php endif; ?>
					<h4><?php _e("Custom size thumbnails",'wp_related_posts'); ?></h4>
					<div>If you want to use custom sizes, override theme's CSS rules in the Custom CSS section under Theme Settings above.
					</div>
					<label>
						<input name="wp_rp_custom_size_thumbnail_enabled" type="checkbox" id="wp_rp_custom_size_thumbnail_enabled" value="yes" <?php checked($options['custom_size_thumbnail_enabled']); ?> />
						<?php _e("Use Custom Size Thumbnails",'wp_related_posts');?>
					</label><br />
					<div id="wp_rp_custom_thumb_sizes_settings" style="display:none">
						<label>
							<?php _e("Custom Width (px)",'wp_related_posts');?>
							<input name="wp_rp_custom_thumbnail_width" type="text" id="wp_rp_custom_thumbnail_width" class="small-text" value="<?php esc_attr_e($options['custom_thumbnail_width']); ?>" />
						</label>
						<label>
							<?php _e("Custom Height (px)",'wp_related_posts');?>
							<input name="wp_rp_custom_thumbnail_height" type="text" id="wp_rp_custom_thumbnail_height" class="small-text" value="<?php esc_attr_e($options['custom_thumbnail_height']); ?>" />
						</label>
					</div>
				</div>
				<h3><?php _e("Other Settings",'wp_related_posts'); ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e('Exclude these Categories:', 'wp_related_posts'); ?></th>
						<td>
							<div class="excluded-categories">
								<?php foreach ($categories as $category): ?>
								<label>
									<input name="wp_rp_exclude_categories[]" type="checkbox" id="wp_rp_exclude_categories" value="<?php esc_attr_e($category->cat_ID); ?>"<?php checked(in_array($category->cat_ID, $exclude_categories)); ?> />
									<?php esc_html_e($category->cat_name); ?>
									<br />
								</label>
								<?php endforeach; ?>
							</div>
						</td>
					</tr>
					<tr valign="top">
						<td colspan="2"><?php if(strpos(get_bloginfo('language'), 'en') === 0 || $meta['classic_user']): ?>
							<div>
								<label>
									<input type="checkbox" name="wp_rp_only_admins_can_edit_related_posts" id="wp_rp_only_admins_can_edit_related_posts" value="yes" <?php checked($options['only_admins_can_edit_related_posts']); ?> />
									<?php _e("Only admins can edit Related Posts",'wp_related_posts');?>
								</label>
							</div>
							<label>
								<input name="wp_rp_classic_state" type="checkbox" id="wp_rp_classic_state" value="yes" <?php checked($meta['classic_user']); ?>>
								<?php _e("Display widget with <a href=\"http://support.zemanta.com/customer/portal/articles/1423148-why-should-i-add-related-articles-from-around-the-web-\" target=\"blank\">articles from around the web</a> in your \"Compose-new-post\" page",'wp_related_posts');?>
							</label><?php endif; ?>
							<br/>
							<label>
								<input name="wp_rp_on_single_post" type="checkbox" id="wp_rp_on_single_post" value="yes" <?php checked($options['on_single_post']); ?>>
								<?php _e("Auto Insert Related Posts",'wp_related_posts');?>
							</label>
							(or add <pre style="display: inline">&lt;?php wp_related_posts()?&gt;</pre> to your single post template)
							<br />
							<label>
								<input name="wp_rp_on_rss" type="checkbox" id="wp_rp_on_rss" value="yes"<?php checked($options['on_rss']); ?>>
								<?php _e("Display Related Posts in Feed",'wp_related_posts');?>
							</label>
							<br />
							<label>
								<input name="wp_rp_ctr_dashboard_enabled" type="checkbox" id="wp_rp_ctr_dashboard_enabled" value="yes" <?php checked($options['ctr_dashboard_enabled']); ?> />
								<?php _e("Turn statistics on",'wp_related_posts');?>*
							</label>
							<br />
							<div style="display:<?php echo $meta['show_traffic_exchange'] ? 'block' : 'none' ?>;">
								<label>
									<input name="wp_rp_traffic_exchange_enabled" type="checkbox" id="wp_rp_traffic_exchange_enabled" value="yes"<?php checked($options['traffic_exchange_enabled']); ?>>
									<?php _e("Enable traffic exchange with blogger networks",'wp_related_posts');?>
								</label>
							</div>
							<div style="display:<?php echo $meta['remote_recommendations'] ? 'block' : 'none' ?>;">
								<label>
									<input name="wp_rp_promoted_content_enabled" type="checkbox" id="wp_rp_promoted_content_enabled" value="yes" <?php checked($options['promoted_content_enabled']); ?> />
									<?php _e("Promoted Content", 'wp_related_posts');?>*
								</label>
							</div><?php if($meta['show_zemanta_linky_option']): ?>
							<div>
								<label>
									<input name="wp_rp_display_zemanta_linky" type="checkbox" id="wp_rp_display_zemanta_linky" value="yes" <?php checked($options['display_zemanta_linky']); ?> />
									<?php _e("Support us (show our minimized logo)",'wp_related_posts');?>
								</label>
							</div><?php endif; ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<p class="submit end-block">
			<input type="submit" value="<?php _e('Save changes', 'wp_related_posts'); ?>" class="button-primary" />
		</p>
	</form>
</div>




