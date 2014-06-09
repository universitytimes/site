<?php

define('WP_RP_STATIC_BASE_URL', 'http://rp.zemanta.com/static/');
define('WP_RP_STATIC_THEMES_PATH', 'themes/');
define('WP_RP_STATIC_JSON_PATH', 'json/');

define("WP_RP_DEFAULT_CUSTOM_CSS",
".related_post_title {
}
ul.related_post {
}
ul.related_post li {
}
ul.related_post li a {
}
ul.related_post li img {
}");

define('WP_RP_THUMBNAILS_NAME', 'wp_rp_thumbnail');
define('WP_RP_THUMBNAILS_PROP_NAME', 'wp_rp_thumbnail_prop');
define('WP_RP_THUMBNAILS_WIDTH', 150);
define('WP_RP_THUMBNAILS_HEIGHT', 150);
define('WP_RP_CUSTOM_THUMBNAILS_WIDTH', 150);
define('WP_RP_CUSTOM_THUMBNAILS_HEIGHT', 150);
define('WP_RP_THUMBNAILS_DEFAULTS_COUNT', 31);

define("WP_RP_MAX_LABEL_LENGTH", 32);

define("WP_RP_CTR_DASHBOARD_URL", "http://d.zemanta.com/");
define("WP_RP_STATIC_CTR_PAGEVIEW_FILE", "js/pageview.js");

define("WP_RP_STATIC_RECOMMENDATIONS_JS_FILE", "js/recommendations.js");
define("WP_RP_STATIC_RECOMMENDATIONS_CSS_FILE", "wp-rp-css/recommendations.css");

define("WP_RP_STATIC_INFINITE_RECS_JS_FILE", "js/infiniterecs.js");
define("WP_RP_STATIC_PINTEREST_JS_FILE", "js/pinterest.js");

define("WP_RP_RECOMMENDATIONS_AUTO_TAGS_MAX_WORDS", 200);
define("WP_RP_RECOMMENDATIONS_AUTO_TAGS_MAX_TAGS", 15);

define("WP_RP_RECOMMENDATIONS_AUTO_TAGS_SCORE", 2);
define("WP_RP_RECOMMENDATIONS_TAGS_SCORE", 10);
define("WP_RP_RECOMMENDATIONS_CATEGORIES_SCORE", 5);

define("WP_RP_RECOMMENDATIONS_NUM_PREGENERATED_POSTS", 50);

define("WP_RP_THUMBNAILS_NUM_PREGENERATED_POSTS", 50);

global $wp_rp_options, $wp_rp_meta;
$wp_rp_options = false;
$wp_rp_meta = false;

function wp_rp_get_options() {
	global $wp_rp_options, $wp_rp_meta;
	if($wp_rp_options) {
		return $wp_rp_options;
	}

	$wp_rp_options = get_option('gp_options', false);
	$wp_rp_meta = get_option('gp_meta', false);

	if(!$wp_rp_meta || !$wp_rp_options || $wp_rp_meta['version'] !== WP_RP_VERSION) {
		wp_rp_upgrade();
		$wp_rp_meta = get_option('gp_meta');
		$wp_rp_options = get_option('gp_options');
		
	}

	$wp_rp_meta = new ArrayObject($wp_rp_meta);
	$wp_rp_options = new ArrayObject($wp_rp_options);

	return $wp_rp_options;
}

function wp_rp_get_meta() {
	global $wp_rp_meta;

	if (!$wp_rp_meta) {
		wp_rp_get_options();
	}

	return $wp_rp_meta;
}

function wp_rp_update_meta($new_meta) {
	global $wp_rp_meta;

	$new_meta = (array) $new_meta;

	$r = update_option('gp_meta', $new_meta);

	if($r && $wp_rp_meta !== false) {
		$wp_rp_meta->exchangeArray($new_meta);
	}

	return $r;
}

function wp_rp_update_options($new_options) {
	global $wp_rp_options;

	$new_options = (array) $new_options;
	$r = update_option('gp_options', $new_options);
	if($r && $wp_rp_options !== false) {
		$wp_rp_options->exchangeArray($new_options);
	}

	return $r;
}

function wp_rp_activate_hook() {
	wp_rp_get_options();
	wp_rp_schedule_notifications_cron();
}

function wp_rp_deactivate_hook() {
	wp_rp_unschedule_notifications_cron();
}

function wp_rp_upgrade() {
	$wp_rp_meta = get_option('gp_meta', false);
	$version = false;

	if($wp_rp_meta) {
		$version = $wp_rp_meta['version'];
	} else {
		$wp_rp_meta = get_option('wp_rp_meta', false);
		if($wp_rp_meta) {
			$version = $wp_rp_meta['version'];
		}
		else {
			$wp_rp_old_options = get_option('wp_rp', false);
			if($wp_rp_old_options) {
				$version = '1.4';
			}
		}
	}

	if($version) {
		if(version_compare($version, WP_RP_VERSION, '<')) {
			$upgrade_call = 'wp_rp_migrate_' . str_replace('.', '_', $version);
			if (is_callable($upgrade_call)) {
				call_user_func($upgrade_call);
				wp_rp_upgrade();
			}
			else {
				wp_rp_install();
			}
		}
	} else {
		wp_rp_install();
	}
}

function wp_rp_related_posts_db_table_uninstall() {
	global $wpdb;

	$tags_table_name = $wpdb->prefix . "wp_rp_tags";

	$sql = "DROP TABLE " . $tags_table_name;

	$wpdb->query($sql);
}

function wp_rp_related_posts_db_table_install() {
	global $wpdb;

	$tags_table_name = $wpdb->prefix . "wp_rp_tags";
	$sql_tags = "CREATE TABLE $tags_table_name (
	  post_id mediumint(9),
	  post_date datetime NOT NULL,
	  label VARCHAR(" . WP_RP_MAX_LABEL_LENGTH . ") NOT NULL,
	  weight float,
	  INDEX post_id (post_id),
	  INDEX label (label)
	 );";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql_tags);

	$latest_posts = get_posts(array('numberposts' => WP_RP_RECOMMENDATIONS_NUM_PREGENERATED_POSTS));
	foreach ($latest_posts as $post) {
		wp_rp_generate_tags($post);
	}
}

function wp_rp_install() {
	$wp_rp_meta = array(
		'blog_id' => false,
		'auth_key' => false,
		'version' => WP_RP_VERSION,
		'first_version' => WP_RP_VERSION,
		'new_user' => true,
		'blog_tg' => rand(0, 1),
		'remote_recommendations' => false,
		'show_turn_on_button' => true,
		'name' => '',
		'email' => '',
		'remote_notifications' => array(),
		'turn_on_button_pressed' => false,
		'show_statistics' => false,
		'show_traffic_exchange' => false,
		'show_zemanta_linky_option' => true,
		'classic_user' => strpos(get_bloginfo('language'), 'en') === 0 // Enable only if "any" english is the default language
	);

	$wp_rp_options = array(
		'related_posts_title'			=> __('Related Posts', 'wp_related_posts'),
		'max_related_posts'			=> 6,
		'exclude_categories'			=> '',
		'on_single_post'			=> true,
		'on_rss'				=> false,
		'max_related_post_age_in_days' => 0,
		'default_thumbnail_path'		=> false,
		'ctr_dashboard_enabled'		=> false,
		'promoted_content_enabled'	=> false,
		'enable_themes'				=> false,
		'custom_size_thumbnail_enabled'	=> false,
		'custom_thumbnail_width' 	=> WP_RP_CUSTOM_THUMBNAILS_WIDTH,
		'custom_thumbnail_height' 	=> WP_RP_CUSTOM_THUMBNAILS_HEIGHT,
		'traffic_exchange_enabled' => false,
		'thumbnail_use_custom'			=> false,
		'thumbnail_custom_field'		=> false,
		'display_zemanta_linky'			=> false,
        'only_admins_can_edit_related_posts' => false,
		'desktop' => array(
			'display_comment_count'			=> false,
			'display_publish_date'			=> false,
			'display_thumbnail'			=> false,
			'display_excerpt'			=> false,
			'excerpt_max_length'			=> 200,
			'theme_name' 				=> 'vertical.css',
			'theme_custom_css'			=> WP_RP_DEFAULT_CUSTOM_CSS,
			'custom_theme_enabled' => false,
		)
	);

	update_option('gp_meta', $wp_rp_meta);
	update_option('gp_options', $wp_rp_options);

	wp_rp_related_posts_db_table_install();
}

function wp_rp_is_classic() {
	$meta = wp_rp_get_meta();
	if (isset($meta['classic_user']) && $meta['classic_user']) {
		return true;
	}
	return false;
}

function wp_rp_migrate_3_4_4() {
	$wp_rp_meta = get_option('gp_meta');

	$wp_rp_meta['version'] = '3.4.5';
	$wp_rp_meta['new_user'] = false;
	update_option('gp_meta', $wp_rp_meta);
}

function wp_rp_migrate_3_4_3() {
	$wp_rp_meta = get_option('gp_meta');

	$wp_rp_meta['version'] = '3.4.4';
	$wp_rp_meta['new_user'] = false;
	update_option('gp_meta', $wp_rp_meta);
}

function wp_rp_migrate_3_4_2() {
	$wp_rp_meta = get_option('gp_meta');

	$wp_rp_meta['version'] = '3.4.3';
	$wp_rp_meta['new_user'] = false;
	unset($wp_rp_meta['classic_user_old']);
	
	update_option('gp_meta', $wp_rp_meta);

	$wp_rp_options = get_option('gp_options');
	$wp_rp_options['custom_theme_enabled'] = 0;

	update_option('gp_options', $wp_rp_options);
}

function wp_rp_migrate_3_4_1() {
	$wp_rp_meta = get_option('wp_rp_meta');

	$wp_rp_meta['version'] = '3.4.2';
	$wp_rp_meta['new_user'] = false;
	
	update_option('gp_meta', $wp_rp_meta);

	
	$wp_rp_options = get_option('wp_rp_options');
	$wp_rp_options['custom_theme_enabled'] = false;
	update_option('gp_options', $wp_rp_options);
}

function wp_rp_migrate_3_4() {
    $wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '3.4.1';
	$wp_rp_meta['new_user'] = false;
	update_option('wp_rp_meta', $wp_rp_meta);
}

function wp_rp_migrate_3_3_1() {
	// this is a hotfix for correct plugin versioning
	// introduced different versioning for readside plugins
	
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '3.4'; 
	update_option('wp_rp_meta', $wp_rp_meta);
}

function wp_rp_migrate_3_3() {
    $wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '3.4';
	$wp_rp_meta['new_user'] = false;
	update_option('wp_rp_meta', $wp_rp_meta);
    
    $wp_rp_options = get_option('wp_rp_options');
    $wp_rp_options['only_admins_can_edit_related_posts'] = false;
    update_option('wp_rp_options', $wp_rp_options);
}

function wp_rp_migrate_3_2() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '3.3';
	$wp_rp_meta['new_user'] = false;
	update_option('wp_rp_meta', $wp_rp_meta);

}

function wp_rp_migrate_3_1() {
	global $wpdb;

	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '3.2';
	$wp_rp_meta['new_user'] = false;
	$wp_rp_options = get_option('wp_rp_options');
	$wp_rp_options['custom_size_thumbnail_enabled'] = false;
	$wp_rp_options['custom_thumbnail_width'] = WP_RP_CUSTOM_THUMBNAILS_WIDTH;
	$wp_rp_options['custom_thumbnail_height'] = WP_RP_CUSTOM_THUMBNAILS_WIDTH;

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);

}

function wp_rp_migrate_3_0() {
	global $wpdb;

	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '3.1';
	$wp_rp_meta['new_user'] = false;
	$wp_rp_options = get_option('wp_rp_options');
	$wp_rp_options['custom_size_thumbnail_enabled'] = false;
	$wp_rp_options['custom_thumbnail_width'] = WP_RP_CUSTOM_THUMBNAILS_WIDTH;
	$wp_rp_options['custom_thumbnail_height'] = WP_RP_CUSTOM_THUMBNAILS_WIDTH;

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);

}

function wp_rp_migrate_2_9() {
	global $wpdb;

	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '3.0';
	$wp_rp_meta['new_user'] = false;
	$wp_rp_meta['classic_user'] = true;
	$wp_rp_options = get_option('wp_rp_options');
	$wp_rp_options['custom_size_thumbnail_enabled'] = false;
	$wp_rp_options['custom_thumbnail_width'] = WP_RP_CUSTOM_THUMBNAILS_WIDTH;
	$wp_rp_options['custom_thumbnail_height'] = WP_RP_CUSTOM_THUMBNAILS_WIDTH;

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}

function wp_rp_migrate_2_8() {
	global $wpdb;

	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '2.9';
	$wp_rp_meta['new_user'] = false;
	$is_calssic_user = $wp_rp_meta['classic_user'];
	if ($is_calssic_user) {
		$wp_rp_meta['classic_user_old'] = false;
	} else {
		$wp_rp_meta['classic_user'] = true;
		$wp_rp_meta['classic_user_old'] = true;
	}
	$wp_rp_options = get_option('wp_rp_options');
	$wp_rp_options['custom_size_thumbnail_enabled'] = false;
	$wp_rp_options['custom_thumbnail_width'] = WP_RP_CUSTOM_THUMBNAILS_WIDTH;
	$wp_rp_options['custom_thumbnail_height'] = WP_RP_CUSTOM_THUMBNAILS_WIDTH;


	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}

function wp_rp_migrate_2_7() {
	global $wpdb;

	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '2.8';
	$wp_rp_meta['new_user'] = false;
	$wp_rp_meta['classic_user'] = false;

	$wpdb->query("DELETE FROM $wpdb->postmeta WHERE meta_key IN ('_wp_rp_extracted_image_url', '_wp_rp_extracted_image_url_full')");

	update_option('wp_rp_meta', $wp_rp_meta);
}

function wp_rp_migrate_2_6() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_meta['version'] = '2.7';
	$wp_rp_meta['new_user'] = false;
	update_option('wp_rp_meta', $wp_rp_meta);
}

function wp_rp_migrate_2_5() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '2.6';

	if (!isset($wp_rp_meta['blog_tg'])) {
		$wp_rp_meta['blog_tg'] = rand(0, 1);
	}

	$wp_rp_meta['new_user'] = false;

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}

function wp_rp_migrate_2_4_1() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '2.5';

	$wp_rp_meta['blog_tg'] = rand(0, 1);

	$display_options = array(
		'display_comment_count' => $wp_rp_options['display_comment_count'],
		'display_publish_date' => $wp_rp_options['display_publish_date'],
		'display_thumbnail' => $wp_rp_options['display_thumbnail'],
		'display_excerpt' => $wp_rp_options['display_excerpt'],
		'excerpt_max_length' => $wp_rp_options['excerpt_max_length'],
		'theme_name' => $wp_rp_options['theme_name'],
		'theme_custom_css' => $wp_rp_options['theme_custom_css'],
		'custom_theme_enabled' => $wp_rp_options['custom_theme_enabled']
	);

	$wp_rp_options['desktop'] = $display_options;
	$wp_rp_options['mobile'] = $display_options;

	if($wp_rp_options['mobile']['theme_name'] !== 'plain.css') {
		$wp_rp_options['mobile']['theme_name'] = 'm-stream.css';
	}

	unset($wp_rp_options['related_posts_title_tag']);
	unset($wp_rp_options['thumbnail_display_title']);
	unset($wp_rp_options['thumbnail_use_attached']);
	unset($wp_rp_options['display_comment_count']);
	unset($wp_rp_options['display_publish_date']);
	unset($wp_rp_options['display_thumbnail']);
	unset($wp_rp_options['display_excerpt']);
	unset($wp_rp_options['excerpt_max_length']);
	unset($wp_rp_options['theme_name']);
	unset($wp_rp_options['theme_custom_css']);
	unset($wp_rp_options['custom_theme_enabled']);

	$wp_rp_options['display_zemanta_linky'] = false;
	$wp_rp_meta['show_zemanta_linky_option'] = true;

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}

function wp_rp_migrate_2_4() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '2.4.1';

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}
function wp_rp_migrate_2_3() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '2.4';

	$wp_rp_options['max_related_post_age_in_days'] = 0;

	wp_rp_related_posts_db_table_uninstall();
	wp_rp_related_posts_db_table_install();

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}

function wp_rp_migrate_2_2() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '2.3';

	if(isset($wp_rp_options['show_santa_hat'])) {
		unset($wp_rp_options['show_santa_hat']);
	}
	if(isset($wp_rp_options['show_RP_in_posts'])) {
		unset($wp_rp_options['show_RP_in_posts']);
	}

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}

function wp_rp_migrate_2_1() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '2.2';

	$wp_rp_options['custom_theme_enabled'] = $wp_rp_options['theme_name'] == 'custom.css';
	if ($wp_rp_options['custom_theme_enabled']) {
		$wp_rp_options['theme_name'] = 'plain.css';
	}

	$wp_rp_options['show_RP_in_posts'] = false;

	$wp_rp_options['traffic_exchange_enabled'] = false;
	$wp_rp_meta['show_traffic_exchange'] = false;

	update_option('wp_rp_options', $wp_rp_options);
	update_option('wp_rp_meta', $wp_rp_meta);
}

function wp_rp_migrate_2_0() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '2.1';

	if ($wp_rp_options['default_thumbnail_path']) {
		$upload_dir = wp_upload_dir();
		$wp_rp_options['default_thumbnail_path'] = $upload_dir['baseurl'] . $wp_rp_options['default_thumbnail_path'];
	}

	update_option('wp_rp_options', $wp_rp_options);
	update_option('wp_rp_meta', $wp_rp_meta);

	if($wp_rp_options['display_thumbnail'] && $wp_rp_options['thumbnail_use_attached']) {
		wp_rp_process_latest_post_thumbnails();
	}
}

function wp_rp_migrate_1_7() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '2.0';

	$wp_rp_options['promoted_content_enabled'] = $wp_rp_options['ctr_dashboard_enabled'];
	$wp_rp_options['exclude_categories'] = $wp_rp_options['not_on_categories'];

	$wp_rp_meta['show_statistics'] = $wp_rp_options['ctr_dashboard_enabled'];

	// Commented out since we don't want to lose this info for users that will downgrade the plugin because of the change
	//unset($wp_rp_options['missing_rp_algorithm']);
	//unset($wp_rp_options['missing_rp_title']);
	//unset($wp_rp_options['not_on_categories']);

	// Forgot to unset this the last time.
	unset($wp_rp_meta['show_invite_friends_form']);

	update_option('wp_rp_options', $wp_rp_options);
	update_option('wp_rp_meta', $wp_rp_meta);

	wp_rp_schedule_notifications_cron();
	wp_rp_related_posts_db_table_install();
}

function wp_rp_migrate_1_6() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '1.7';

	unset($wp_rp_options['scroll_up_related_posts']);
	unset($wp_rp_options['include_promotionail_link']);
	unset($wp_rp_options['show_invite_friends_form']);

	$wp_rp_meta['show_blogger_network_form'] = false;
	$wp_rp_meta['remote_notifications'] = array();

	$wp_rp_meta['turn_on_button_pressed'] = false;

	update_option('wp_rp_options', $wp_rp_options);
	update_option('wp_rp_meta', $wp_rp_meta);
}

function wp_rp_migrate_1_5_2_1() { # This was a silent release, but WP_RP_VERSION was not properly updated, so we don't know exactly what happened...
	$wp_rp_meta = get_option('wp_rp_meta');

	$wp_rp_meta['version'] = '1.5.2';

	update_option('wp_rp_meta', $wp_rp_meta);
}

function wp_rp_migrate_1_5_2() {
	$wp_rp_meta = get_option('wp_rp_meta');
	$wp_rp_options = get_option('wp_rp_options');

	$wp_rp_meta['version'] = '1.6';

	$wp_rp_meta['show_install_tooltip'] = false;
	$wp_rp_meta['remote_recommendations'] = false;
	$wp_rp_meta['show_turn_on_button'] = !($wp_rp_options['ctr_dashboard_enabled'] && $wp_rp_options['display_thumbnail']);
	$wp_rp_meta['name'] = '';
	$wp_rp_meta['email'] = '';
	$wp_rp_meta['show_invite_friends_form'] = false;

	unset($wp_rp_meta['show_ctr_banner']);
	unset($wp_rp_meta['show_blogger_network']);

	$wp_rp_options['scroll_up_related_posts'] = false;

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}
function wp_rp_migrate_1_5_1() {
	$wp_rp_options = get_option('wp_rp_options');
	$wp_rp_meta = get_option('wp_rp_meta');

	$wp_rp_options['enable_themes'] = true;
	$wp_rp_meta['version'] = '1.5.2';

	update_option('wp_rp_options', $wp_rp_options);
	update_option('wp_rp_meta', $wp_rp_meta);
}
function wp_rp_migrate_1_5() {
	$wp_rp_options = get_option('wp_rp_options');
	$wp_rp_meta = get_option('wp_rp_meta');

	$wp_rp_meta['show_blogger_network'] = false;
	$wp_rp_meta['version'] = '1.5.1';

	$wp_rp_options['include_promotionail_link'] = false;
	$wp_rp_options['ctr_dashboard_enabled'] = !!$wp_rp_options['ctr_dashboard_enabled'];

	update_option('wp_rp_options', $wp_rp_options);
	update_option('wp_rp_meta', $wp_rp_meta);
}

function wp_rp_migrate_1_4() {
	global $wpdb;

	$wp_rp = get_option('wp_rp');

	$wp_rp_options = array();

	////////////////////////////////

	$wp_rp_options['missing_rp_algorithm'] = (isset($wp_rp['wp_no_rp']) && in_array($wp_rp['wp_no_rp'], array('text', 'random', 'commented', 'popularity'))) ? $wp_rp['wp_no_rp'] : 'random';

	if(isset($wp_rp['wp_no_rp_text']) && $wp_rp['wp_no_rp_text']) {
		$wp_rp_options['missing_rp_title'] = $wp_rp['wp_no_rp_text'];
	} else {
		if($wp_rp_options['missing_rp_algorithm'] === 'text') {
			$wp_rp_options['missing_rp_title'] = __('No Related Posts', 'wp_related_posts');
		} else {
			$wp_rp_options['missing_rp_title'] = __('Random Posts', 'wp_related_posts');
		}
	}

	$wp_rp_options['on_single_post'] = isset($wp_rp['wp_rp_auto']) ? !!$wp_rp['wp_rp_auto'] : true;

	$wp_rp_options['display_comment_count'] = isset($wp_rp['wp_rp_comments']) ? !!$wp_rp['wp_rp_comments'] : false;

	$wp_rp_options['display_publish_date'] = isset($wp_rp['wp_rp_date']) ? !!$wp_rp['wp_rp_date'] : false;

	$wp_rp_options['display_excerpt'] = isset($wp_rp['wp_rp_except']) ? !!$wp_rp['wp_rp_except'] : false;

	if(isset($wp_rp['wp_rp_except_number']) && is_numeric(trim($wp_rp['wp_rp_except_number']))) {
		$wp_rp_options['excerpt_max_length'] = intval(trim($wp_rp['wp_rp_except_number']));
	} else {
		$wp_rp_options['excerpt_max_length'] = 200;
	}

	$wp_rp_options['not_on_categories'] = isset($wp_rp['wp_rp_exclude']) ? $wp_rp['wp_rp_exclude'] : '';

	if(isset($wp_rp['wp_rp_limit']) && is_numeric(trim($wp_rp['wp_rp_limit']))) {
		$wp_rp_options['max_related_posts'] = intval(trim($wp_rp['wp_rp_limit']));
	} else {
		$wp_rp_options['max_related_posts'] = 5;
	}

	$wp_rp_options['on_rss'] = isset($wp_rp['wp_rp_rss']) ? !!$wp_rp['wp_rp_rss'] : false;

	$wp_rp_options['theme_name'] = isset($wp_rp['wp_rp_theme']) ? $wp_rp['wp_rp_theme'] : 'plain.css';

	$wp_rp_options['display_thumbnail'] = isset($wp_rp['wp_rp_thumbnail']) ? !!$wp_rp['wp_rp_thumbnail'] : false;

	$custom_fields = $wpdb->get_col("SELECT meta_key FROM $wpdb->postmeta GROUP BY meta_key HAVING meta_key NOT LIKE '\_%' ORDER BY LOWER(meta_key)");
	if(isset($wp_rp['wp_rp_thumbnail_post_meta']) && in_array($wp_rp['wp_rp_thumbnail_post_meta'], $custom_fields)) {
		$wp_rp_options['thumbnail_custom_field'] = $wp_rp['wp_rp_thumbnail_post_meta'];
	} else {
		$wp_rp_options['thumbnail_custom_field'] = false;
	}

	$wp_rp_options['thumbnail_display_title'] = isset($wp_rp['wp_rp_thumbnail_text']) ? !!$wp_rp['wp_rp_thumbnail_text'] : false;

	$wp_rp_options['related_posts_title'] = isset($wp_rp['wp_rp_title']) ? $wp_rp['wp_rp_title'] : '';

	$wp_rp_options['related_posts_title_tag'] = isset($wp_rp['wp_rp_title_tag']) ? $wp_rp['wp_rp_title_tag'] : 'h3';

	$wp_rp_options['default_thumbnail_path'] = (isset($wp_rp['wp_rp_default_thumbnail_path']) && $wp_rp['wp_rp_default_thumbnail_path']) ? $wp_rp['wp_rp_default_thumbnail_path'] : false;

	$wp_rp_options['thumbnail_use_attached'] = isset($wp_rp["wp_rp_thumbnail_extract"]) && ($wp_rp["wp_rp_thumbnail_extract"] === 'yes');

	$wp_rp_options['thumbnail_use_custom'] = $wp_rp_options['thumbnail_custom_field'] && !(isset($wp_rp['wp_rp_thumbnail_featured']) && $wp_rp['wp_rp_thumbnail_featured'] === 'yes');

	$wp_rp_options['theme_custom_css'] = WP_RP_DEFAULT_CUSTOM_CSS;

	$wp_rp_options['ctr_dashboard_enabled'] = false;

	////////////////////////////////

	$wp_rp_meta = array(
		'blog_id' => false,
		'auth_key' => false,
		'version' => '1.5',
		'first_version' => '1.4',
		'new_user' => false,
		'show_upgrade_tooltip' => true,
		'show_ctr_banner' => true
	);

	update_option('wp_rp_meta', $wp_rp_meta);
	update_option('wp_rp_options', $wp_rp_options);
}
