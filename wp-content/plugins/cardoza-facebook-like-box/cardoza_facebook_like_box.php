<?php
/*
Plugin Name: Facebook Like Box
Plugin URI: http://www.vinojcardoza.com/blog/cardoza-facebook-like-box/
Description: Facebook Like Box enables you to display the facebook page likes in your website.
Version: 2.8.1
Author: Vinoj Cardoza
Author URI: http://www.vinojcardoza.com
License: GPL2
*/

add_action('admin_init', 'cfblb_enq_scripts');
add_action('wp_enqueue_scripts', 'cfblb_enq_scripts');

add_action("plugins_loaded", "cardoza_fb_like_init");
add_action("admin_menu", "cardoza_fb_like_options");
add_shortcode("cardoza_facebook_like_box", "cardoza_facebook_like_box_sc");
add_shortcode("cardoza_facebook_posts_like", "cardoza_facebook_posts_like_sc");

function cfblb_enq_scripts(){
	wp_enqueue_style('cfblbcss', plugins_url('/cardozafacebook.css', __FILE__));
	wp_enqueue_script('cfblbjs', plugins_url('/cardozafacebook.js', __FILE__), array('jquery'));
}

//The following function will retrieve all the avaialable 
//options from the wordpress database

function cfblb_retrieve_options(){
	$opt_val = array(
			'title' => stripslashes(get_option('cfblb_title')),
			'fb_url' => stripslashes(get_option('cfblb_fb_url')),
			'fb_border_color' => stripslashes(get_option('cfblb_fb_border_color')),
			'fb_color' => stripslashes(get_option('cfblb_fb_border_color')),
			'width' => stripslashes(get_option('cfblb_width')),
			'height' => stripslashes(get_option('cfblb_height')),
			'color_scheme' => stripslashes(get_option('cfblb_color_scheme')),
			'show_faces' => stripslashes(get_option('cfblb_show_faces')),
			'stream' => stripslashes(get_option('cfblb_stream')),
			'header' => stripslashes(get_option('cfblb_header')),
	); 
	return $opt_val;
}

function cardoza_fb_like_options(){
	
	add_menu_page(
		__('FB Like Box'), 
		__('FB Like Box'), 
		'manage_options', 
		'slug_for_fb_like_box', 
		'cardoza_fb_like_options_page',
		plugin_dir_url(__FILE__).'images/fb.png');    
    add_submenu_page(
            'slug_for_fb_like_box',
            __('Posts Like Box'),
            __('Posts Like Box'),
            'manage_options',
            'posts_like_options',
			'posts_like_options');
}

function cardoza_fb_like_options_page(){
	$cfblb_options = array(
			'cfb_title' => 'cfblb_title',
			'cfb_fb_url' => 'cfblb_fb_url',
			'cfb_fb_border_color' => 'cfblb_fb_border_color',
			'cfb_width' => 'cfblb_width',
			'cfb_height' => 'cfblb_height',
			'cfb_color_scheme' => 'cfblb_color_scheme',
			'cfb_show_faces' => 'cfblb_show_faces',
			'cfb_stream' => 'cfblb_stream',
			'cfb_header' => 'cfblb_header',
	);
	
	if(isset($_POST['frm_submit'])){
		if(!empty($_POST['frm_title'])) update_option($cfblb_options['cfb_title'], $_POST['frm_title']);
		if(!empty($_POST['frm_url'])) update_option($cfblb_options['cfb_fb_url'], $_POST['frm_url']);
		if(!empty($_POST['frm_border_color'])) update_option($cfblb_options['cfb_fb_border_color'], $_POST['frm_border_color']);
		if(!empty($_POST['frm_width'])) update_option($cfblb_options['cfb_width'], $_POST['frm_width']);
		if(!empty($_POST['frm_height'])) update_option($cfblb_options['cfb_height'], $_POST['frm_height']);
		if(!empty($_POST['frm_color_scheme'])) update_option($cfblb_options['cfb_color_scheme'], $_POST['frm_color_scheme']);
		if(!empty($_POST['frm_show_faces'])) update_option($cfblb_options['cfb_show_faces'], $_POST['frm_show_faces']);
		if(!empty($_POST['frm_stream'])) update_option($cfblb_options['cfb_stream'], $_POST['frm_stream']);
		if(!empty($_POST['frm_header'])) update_option($cfblb_options['cfb_header'], $_POST['frm_header']);
?>
		<div id="message" class="updated fade"><p><strong><?php _e('Options saved.', 'facebooklikebox' ); ?></strong></p></div>
<?php	
	}
	$option_value = cfblb_retrieve_options();
?>
	<div class="wrap">
		<h2><?php echo __("Facebook Like Box Options", "facebooklikebox");?></h2><br />
		<!-- Administration panel form -->
		<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<table>
			<tr><td><h3><?php _e('General Settings', 'facebooklikebox');?></h3></td><td></td></tr>
			<tr height="35">
				<td width="150"><b><?php _e('Title', 'facebooklikebox');?>:</b></td>
				<td><input type="text" name="frm_title" size="50" value="<?php echo $option_value['title'];?>"/>
						&nbsp;<label id="cfbtitle"><b>?</b></label></td>
			</tr>
                        <tr id="title_help"><td></td><td>(<?php _e('Title of the facebook like box', 'facebooklikebox');?>)</td></tr>
        	<tr height="35">
				<td width="150"><b><?php _e('Facebook Page URL:', 'facebooklikebox');?></b></td>
				<td><input type="text" name="frm_url" size="50" value="<?php echo $option_value['fb_url'];?>"/>
						&nbsp;<label id="cfbpage_url"><b>?</b></label></td>
			</tr>
                        <tr id="page_url_help"><td></td><td>(<?php _e('Copy and paste your facebook page URL here', 'facebooklikebox');?>)</td></tr>
			<tr height="35">
				<td width="150"><b><?php _e("Border Color", 'facebooklikebox');?>:</b></td>
				<td>#<input type="text" name="frm_border_color" value="<?php echo $option_value['fb_border_color'];?>"/>
						&nbsp;<label id="cfbborder"><b>?</b></label></td>
			</tr>
                        <tr id="border_help"><td></td><td>(<?php _e('Border Color of the facebook like box', 'facebooklikebox');?>)</td></tr>
			<tr height="35">
				<td width="150"><b><?php _e('Width', 'facebooklikebox');?>:</b></td>
				<td><input type="text" name="frm_width" value="<?php echo $option_value['width'];?>"/>px 
						&nbsp;<label id="cfbwidth"><b>?</b></label></td>
			</tr>
                        <tr id="width_help"><td></td><td>(<?php _e('Width of the facebook like box', 'facebooklikebox');?>)</td></tr>
			<tr height="35">
				<td width="150"><b><?php _e('Height', 'facebooklikebox');?>:</b></td>
                                <td><input type="text" name="frm_height" value="<?php echo $option_value['height'];?>"/>px 
		        		&nbsp;<label id="cfbheight"><b>?</b></label></td>
			</tr>
                        <tr id="height_help"><td></td><td>(<?php _e('Height of the facebook like box', 'facebooklikebox');?>)</td></tr>
                        <tr height="35">
				<td width="150"><b><?php _e('Color Scheme', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="frm_color_scheme" style="margin-left:0px;width:100px;">
						<option value="light" <?php if($option_value['color_scheme']=="light") echo "selected='selected'";?>><?php _e('light', 'facebooklikebox');?></option>
						<option value="dark" <?php if($option_value['color_scheme']=="dark") echo "selected='selected'";?>><?php _e('dark', 'facebooklikebox');?></option>
					</select>
					&nbsp;<label id="cfbcolor_scheme"><b>?</b></label></td>
			</tr>
                        <tr id="color_scheme_help"><td></td><td>(<?php _e('Select the color scheme you want to display', 'facebooklikebox');?>)</td></tr>
			<tr height="35">
				<td width="150"><b><?php _e('Show Faces', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="frm_show_faces" style="margin-left:0px;width:100px;">
						<option value="true" <?php if($option_value['show_faces']=="true") echo "selected='selected'";?>><?php _e('Yes', 'facebooklikebox');?></option>
						<option value="false" <?php if($option_value['show_faces']=="false") echo "selected='selected'";?>><?php _e('No', 'facebooklikebox');?></option>
					</select>
					&nbsp;<label id="cfbshow_faces"><b>?</b></label>
				</td>
			</tr>
                        <tr id="show_faces_help"><td></td><td>(<?php _e('Select the option to show the faces', 'facebooklikebox');?>)</td></tr>
			<tr height="35">
				<td width="150"><b><?php _e('Stream', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="frm_stream" style="margin-left:0px;width:100px;">
						<option value="true" <?php if($option_value['stream']=="true") echo "selected='selected'";?>><?php _e('Yes', 'facebooklikebox');?></option>
						<option value="false" <?php if($option_value['stream']=="false") echo "selected='selected'";?>><?php _e('No', 'facebooklikebox');?></option>
					</select>
					&nbsp;<label id="cfbstream"><b>?</b></label>
				</td>
			</tr>
                        <tr id="stream_help"><td></td><td>(<?php _e('Select the option to display the stream', 'facebooklikebox');?>)</td></tr>
			<tr height="35">
				<td width="168"><b><?php _e('Header', 'facebooklikebox');?></b></td>
				<td>
					<select name="frm_header" style="margin-left:0px;width:100px;">
						<option value="true" <?php if($option_value['header']=="true") echo "selected='selected'";?>><?php _e('Yes', 'facebooklikebox');?></option>
						<option value="false" <?php if($option_value['header']=="false") echo "selected='selected'";?>><?php _e('No', 'facebooklikebox');?></option>
					</select>
					&nbsp;<label id="cfbheader"><b>?</b></label>
				</td>
			</tr>
                        <tr id="header_help"><td></td><td>(<?php _e('Select the option to display the title', 'facebooklikebox');?>)</td></tr>
			<tr height="60"><td></td><td><input type="submit" name="frm_submit" value="<?php _e('Save', 'facebooklikebox');?>" style="background-color:#CCCCCC;font-weight:bold;"/></td>
			</tr>
		</table>
		</form>
	</div>
<?php
}

function widget_cardoza_fb_like($args){
	$option_value = cfblb_retrieve_options();
	$option_value['fb_url'] = str_replace(":", "%3A", $option_value['fb_url']);
	$option_value['fb_url'] = str_replace("/", "%2F", $option_value['fb_url']);
	extract($args);
        
	echo $before_widget;
	echo $before_title;
	if(empty($option_value['title'])) $option_value['title'] = "Facebook Likes";
	echo $option_value['title'];
	echo $after_title;
	?>
	<iframe 
	src="//www.facebook.com/plugins/likebox.php?href=<?php echo $option_value['fb_url'];?>&amp;width=<?php echo $option_value['width'];?>&amp;height=<?php echo $option_value['height'];?>&amp;colorscheme=<?php echo $option_value['color_scheme'];?>&amp;show_faces=<?php echo $option_value['show_faces'];?>&amp;stream=<?php echo $option_value['stream'];?>&amp;header=<?php echo $option_value['header'];?>&amp;border_color=%23<?php echo $option_value['fb_border_color'];?>" 
        scrolling="no" frameborder="0" style="border:1px solid #<?php echo $option_value['fb_border_color'];?>; overflow:hidden; width:<?php echo $option_value['width'];?>px; height:<?php echo $option_value['height'];?>px;" allowTransparency="true">
	</iframe>
<?php
	global $wpdb;
	echo $after_widget;
}
function cardoza_facebook_like_box_sc($atts){
    ob_start();
    $option_value = cfblb_retrieve_options();
    $option_value['fb_url'] = str_replace(":", "%3A", $option_value['fb_url']);
    $option_value['fb_url'] = str_replace("/", "%2F", $option_value['fb_url']);
    
    if(isset($atts['width']) && !empty($atts['width'])) $option_value['width'] = $atts['width'];
    if(isset($atts['height']) && !empty($atts['height'])) $option_value['height'] = $atts['height'];
    ?>
    <iframe 
    src="//www.facebook.com/plugins/likebox.php?href=<?php echo $option_value['fb_url'];?>&amp;
    width=<?php echo $option_value['width'];?>&amp;
    height=<?php echo $option_value['height'];?>&amp;
    colorscheme=<?php echo $option_value['color_scheme'];?>&amp;
    show_faces=<?php echo $option_value['show_faces'];?>&amp;
    stream=<?php echo $option_value['stream'];?>&amp;
    header=<?php echo $option_value['header'];?>&amp;
    border_color=%23<?php echo $option_value['fb_border_color'];?>"
    scrolling="no" 
    frameborder="0" 
    style="border:1px solid #<?php echo $option_value['fb_border_color'];?>; overflow:hidden; width:<?php echo $option_value['width'];?>px; height:<?php echo $option_value['height'];?>px;" allowTransparency="true">
    </iframe>
<?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

function posts_like_options(){
	$cfpl_enable = get_option('cfpl_enable');
	$show_button = get_option('cfpl_show_button');
	$layout = get_option('cfpl_layout');
	$show_faces = get_option('cfpl_show_faces');
	$verb = get_option('cfpl_verb');
	$color_scheme = get_option('cfpl_color_scheme');
	
	if(isset($_POST['frm_submit'])){
		if($_POST['cfpl_enable']) update_option('cfpl_enable', $_POST['cfpl_enable']);
		if($_POST['show_button']) update_option('cfpl_show_button', $_POST['show_button']);
		if($_POST['layout']) update_option('cfpl_layout', $_POST['layout']);
		if($_POST['show_faces']) update_option('cfpl_show_faces', $_POST['show_faces']);
		if($_POST['verb']) update_option('cfpl_verb', $_POST['verb']);
		if($_POST['color_scheme']) update_option('cfpl_color_scheme', $_POST['color_scheme']);
		$cfpl_enable = get_option('cfpl_enable');
		$show_button = get_option('cfpl_show_button');
		$layout = get_option('cfpl_layout');
		$show_faces = get_option('cfpl_show_faces');
		$verb = get_option('cfpl_verb');
		$color_scheme = get_option('cfpl_color_scheme');
?>
		<div id="message" class="updated fade"><p><strong><?php _e('Options saved.', 'facebooklikebox' ); ?></strong></p></div>
<?php	
	}
?>
	<div class="wrap">
		<h2><?php _e("Facebook Posts Like Options", "facebooklikebox");?></h2><br />
		<!-- Administration panel form -->
		<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<table>
			<tr height="35">
				<td width="260"><b><?php _e('Show like button for posts', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="cfpl_enable" style="margin-left:0px;width:100px;">
						<option value="yes" <?php if($cfpl_enable == "yes") echo "selected='selected'";?>><?php _e('Yes', 'facebooklikebox');?></option>
						<option value="no" <?php if($cfpl_enable == "no") echo "selected='selected'";?>><?php _e('No', 'facebooklikebox');?></option>
					</select>
				</td>
			</tr>
			<tr height="35">
				<td width="150"><b><?php _e('Show like button', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="show_button" style="margin-left:0px;width:225px;">
						<option value="before_post_content" <?php if($show_button == "before_post_content") echo "selected='selected'";?>><?php _e('Before the post content', 'facebooklikebox');?></option>
						<option value="after_post_content" <?php if($show_button == "after_post_content") echo "selected='selected'";?>><?php _e('After the post content', 'facebooklikebox');?></option>
						<option value="before_after_post_content" <?php if($show_button == "before_after_post_content") echo "selected='selected'";?>><?php _e('Before and after the post content', 'facebooklikebox');?></option>
					</select>
				</td>
			</tr>
			<tr height="35">
				<td width="150"><b><?php _e('Layout', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="layout" style="margin-left:0px;width:100px;">
						<option value="standard" <?php if($layout == "standard") echo "selected='selected'";?>>standard</option>
						<option value="button_count" <?php if($layout == "button_count") echo "selected='selected'";?>>button_count</option>
						<option value="box_count" <?php if($layout == "box_count") echo "selected='selected'";?>>box_count</option>
					</select>
				</td>
			</tr>
			<tr height="35">
				<td width="150"><b><?php _e('Show Faces', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="show_faces" style="margin-left:0px;width:100px;">
						<option value="true" <?php if($show_faces=="true") echo "selected='selected'";?>><?php _e('Yes', 'facebooklikebox');?></option>
						<option value="false" <?php if($show_faces=="false") echo "selected='selected'";?>><?php _e('No', 'facebooklikebox');?></option>
					</select>
					&nbsp;(<?php _e('Select the option to show the faces', 'facebooklikebox');?>)
				</td>
			</tr>
			<tr height="35">
				<td width="150"><b><?php _e('Verb to display', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="verb" style="margin-left:0px;width:100px;">
						<option value="like" <?php if($verb == "like") echo "selected='selected'";?>><?php _e('like', 'facebooklikebox');?></option>
						<option value="recommend" <?php if($verb == "recommend") echo "selected='selected'";?>><?php _e('recommend', 'facebooklikebox');?></option>
					</select>
				</td>
			</tr>
			<tr height="35">
				<td width="150"><b><?php _e('Color Scheme', 'facebooklikebox');?>:</b></td>
				<td>
					<select name="color_scheme" style="margin-left:0px;width:100px;">
						<option value="light" <?php if($color_scheme=="light") echo "selected='selected'";?>><?php _e('light', 'facebooklikebox');?></option>
						<option value="dark" <?php if($color_scheme=="dark") echo "selected='selected'";?>><?php _e('dark', 'facebooklikebox');?></option>
					</select>
					&nbsp;(<?php _e('Select the color scheme you want to display', 'facebooklikebox');?>)
				</td>
			</tr>
			<tr height="60"><td></td><td><input type="submit" name="frm_submit" value="<?php _e('Save', 'facebooklikebox');?>" style="background-color:#CCCCCC;font-weight:bold;"/></td>
			</tr>
		</table>
		</form>
	</div>
<?php
}

function fb_like_button_for_post($content) {
	$cfpl_enable = get_option('cfpl_enable');
	$show_button = get_option('cfpl_show_button');
	$layout = get_option('cfpl_layout');
	$show_faces = get_option('cfpl_show_faces');
	$verb = get_option('cfpl_verb');
	$color_scheme = get_option('cfpl_color_scheme');
	
	if (is_single()) { 
		if($cfpl_enable == 'yes'){
			if($show_button == 'before_post_content'){
				$content = '<iframe src="http://www.facebook.com/plugins/like.php?href='
					.urlencode(get_permalink($post->ID)).
					'&amp;layout='.$layout.'&amp;show_faces='.$show_faces.'&amp;width=450&amp;action='.$verb.'&amp;colorscheme='.$color_scheme.'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;"></iframe>'
					.$content;
			}
			if($show_button == 'after_post_content'){
				$content = $content.'<iframe src="http://www.facebook.com/plugins/like.php?href='
					.urlencode(get_permalink($post->ID)).
					'&amp;layout='.$layout.'&amp;show_faces='.$show_faces.'&amp;width=450&amp;action='.$verb.'&amp;colorscheme='.$color_scheme.'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;"></iframe>';
			}
			if($show_button == 'before_after_post_content'){
				$content = '<iframe src="http://www.facebook.com/plugins/like.php?href='
					.urlencode(get_permalink($post->ID)).
					'&amp;layout='.$layout.'&amp;show_faces='.$show_faces.'&amp;width=450&amp;action='.$verb.'&amp;colorscheme='.$color_scheme.'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;"></iframe>'
					.$content.
					'<iframe src="http://www.facebook.com/plugins/like.php?href='
					.urlencode(get_permalink($post->ID)).
					'&amp;layout='.$layout.'&amp;show_faces='.$show_faces.'&amp;width=450&amp;action='.$verb.'&amp;colorscheme='.$color_scheme.'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;"></iframe>';
			}
		}
	}
	return $content;
}
add_filter('the_content', 'fb_like_button_for_post');

function cardoza_facebook_posts_like_sc($content){
    $cfpl_enable = get_option('cfpl_enable');
	$show_button = get_option('cfpl_show_button');
	$layout = get_option('cfpl_layout');
	$show_faces = get_option('cfpl_show_faces');
	$verb = get_option('cfpl_verb');
	$color_scheme = get_option('cfpl_color_scheme');
	
	if (is_single()) { 
		$content = '<iframe src="http://www.facebook.com/plugins/like.php?href='
				.urlencode(get_permalink($post->ID)).
				'&amp;layout='.$layout.'&amp;show_faces='.$show_faces.'&amp;width=450&amp;action='.$verb.'&amp;colorscheme='.$color_scheme.'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;"></iframe>'
				.$content;
	}
	return $content;
}

function cardoza_fb_like_init(){
	load_plugin_textdomain('facebooklikebox', false, dirname( plugin_basename(__FILE__)).'/languages');
	wp_register_sidebar_widget('FBLBX', __('Facebook Like Box'), 'widget_cardoza_fb_like');
}
?>
