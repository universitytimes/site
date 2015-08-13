<?php


if ( class_exists("global_posts_ordering") ) {
   $global_posts_ordering = new global_posts_ordering(array("post", "feature"));
}


add_filter('show_admin_bar', '__return_false');


/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
require_once( 'library/custom-post-type.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/



function bones_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  
  
  
  
  
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
  wp_enqueue_style( 'googleFonts');
}

add_action('wp_print_styles', 'bones_fonts');





	/**
 * Define default terms for custom taxonomies in WordPress 3.0.1
 *
 * @author    Michael Fields     http://wordpress.mfields.org/
 * @props     John P. Bloch      http://www.johnpbloch.com/
 *
 * @since     2010-09-13
 * @alter     2010-09-14
 *
 * @license   GPLv2
 */
/**function mfields_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'frontpage' => array( 'frontpageon' ),
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'mfields_set_default_object_terms', 100, 2 );

*/




/* DON'T DELETE THIS CLOSING TAG */ ?><?
	
	
	add_action('do_meta_boxes', 'remove_thumbnail_box');

function remove_thumbnail_box() {
    remove_meta_box( 'postimagediv','post','side' );
}


?><?php

function custom_headshot_meta_box() {


    add_meta_box( 'tagsdiv-normalheadshot', 'Standard Headshot', 'normalheadshot_meta_box', 'ut_writer_page_type', 'side', 'high' );

}


add_action('add_meta_boxes', 'custom_headshot_meta_box');

/* Prints the taxonomy box content */
function normalheadshot_meta_box($post) {

   
?>
  
  <div>
	  
 <?php echo '<input type="hidden" name="ut_normalheadshot_nonce" id="ut_normalheadshot_nonce" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />'; ?>
	
	
	
	
	
	<div id="imageafterdisplay" style="width: 75px; height: 75px; background: none; margin: 5px 0px 0px 0px;<?php       
		
		
			
				$headshoturl = get_post_meta( $post->ID, "normalheadshot_url", true );
					
					if ($headshoturl == ''){
						
						echo 'display: none;';
						
					}
					
					else {
						
						$isitblank = 'no';
						
					}
				
				
					
						
							
								
									?>">
		
		<img style="width: 75px; height: 75px;" src="<?php echo get_post_meta( $post->ID, "normalheadshot_url", true ); ?>" />
		
		
		
	</div>
	
	<div id="imagebeforesave" style="width: 75px; height: 75px; background: none; margin: 5px 0px 0px 0px; display: none;">
		
		<img id="imageurladder" style="width: 75px; height: 75px;" src="" />
		
		
		
	</div>
	
	
	
	
	  
	  <input id="upload_image" type="hidden" type="text" size="36" name="normalheadshot_url" value="<?php 
		  
		  
		  
		  
		  echo $headshoturl; ?>" />
<input class="button" id="upload_image_button" type="button" value="Upload Normal Headshot" style="margin-top: 8px;"/>


<input class="button" id="upload_image_button_clear" type="button" value="Delete" <?php
	
	if ( $isitblank != 'no' ) {
		
		echo 'disabled="disabled"';
		
		
		
	}
	
	
	
	
	
	?> style="margin-top: 8px;"/>


</div>






<?php
	
	function my_admin_scripts() {    
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('my-upload');
    wp_enqueue_script( 'ajax-stuff',  get_stylesheet_directory_uri() . '/javascript/ajax-stuff.js', array( 'jquery' ), '1.0', true );
    
    
    
   wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
	
));
    
    
}

function my_admin_styles() {

    wp_enqueue_style('thickbox');
}

// better use get_current_screen(); or the global $current_screen
if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {

    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}

?><script type="text/javascript">


jQuery(document).ready( function( $ ) {

    $('#upload_image_button').click(function() {
	    
		var frame;
		uploadID = jQuery(this).prev('input');
        formfield = $('#upload_image').attr('name');
        
        
        
        // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });
    
    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      
      
      
	  
	  uploadID.val(attachment.url);

       jQuery("#imageurladder").attr("src", attachment.url);
       
      

        $( "#imageafterdisplay" ).hide();
        
        $( "#imagebeforesave" ).show();
        
        $("#upload_image_button_clear").removeAttr("disabled");
          
      
      });

    // Finally, open the modal on click
    frame.open();
  }); 
       
       
        
        
        
        
    
        
 

	    
    
     $("#upload_image_button_clear").click(function() {
  
  
  
  if (!$("#upload_image_button_clear").is(":disabled")) {
	  
	  $( "#imageafterdisplay" ).hide();
        
        $( "#imagebeforesave" ).hide();
        
        $('#upload_image').val('');
        
        
        
        
        $("#upload_image_button_clear").attr("disabled","disabled");
	  
  
  
  }    
       
    

});
  
  
  });
  
  </script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	
	 } 
	
	
/* Do something with the data entered */






function save_normalheadshoturl( $post_id )
{
	global $post; 
	
    if ($post->post_type != 'ut_writer_page_type'){
        return;
    }
	
	
	
    // Bail if we're doing an auto save
    //if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    // if( !isset( $_POST['ut_normalheadshot_nonce'] ) || !wp_verify_nonce( $_POST['ut_normalheadshot_nonce'], 'ut_normalheadshot_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    // if( !current_user_can( 'edit_post' ) ) return;
    
    
    if( isset( $_POST['normalheadshot_url'] ) )
  
  
 		 		$themeta = get_post_meta($post->ID, 'normalheadshot_url', true);
 		 		

	 		
	 		update_post_meta( $post_id, 'normalheadshot_url', $_POST['normalheadshot_url'] );
	 		
 	        
 
    
    
    
    
}

add_action( 'save_post', 'save_normalheadshoturl', 99 );





    
   















?><?php

function custom_columnheadshot_meta_box() {


    add_meta_box( 'tagsdiv-columnheadshot', 'Column Headshot', 'columnheadshot_meta_box', 'ut_writer_page_type', 'side', 'high' );

}


add_action('add_meta_boxes', 'custom_columnheadshot_meta_box');

/* Prints the taxonomy box content */
function columnheadshot_meta_box($post) {

   
?>
  
  <div>
	  
 <?php echo '<input type="hidden" name="ut_columnheadshot_nonce" id="ut_columnheadshot_nonce" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />'; ?>
	
	
	
	
	
	<div id="imageafterdisplay_column" style="width: 75px; height: 92px; background: none; margin: 5px 0px 0px 0px;<?php       
		
		
			
				$columnheadshoturl = get_post_meta( $post->ID, "columnheadshot_url", true );
					
					if ($columnheadshoturl == ''){
						
						echo 'display: none;';
						
					}
					
					else {
						
						$isitblank_column = 'no';
						
					}
				
				
					
						
							
								
									?>">
		
		<img style="width: 75px; height: 92px;" src="<?php echo get_post_meta( $post->ID, "columnheadshot_url", true ); ?>" />
		
		
		
	</div>
	
	<div id="imagebeforesave_column" style="width: 75px; height: 92px; background: none; margin: 5px 0px 0px 0px; display: none;">
		
		<img id="columnurladder" style="width: 75px; height: 92px;" src="" />
		
		
		
	</div>
	
	
	
	
	  
	  <input id="upload_column" type="hidden" type="text" size="36" name="columnheadshot_url" value="<?php 
		  
		  
		  
		  
		  echo $columnheadshoturl; ?>" />
<input class="button" id="upload_column_button" type="button" value="Upload Column Headshot" style="margin-top: 8px;"/>


<input class="button" id="upload_column_button_clear" type="button" value="Delete" <?php
	
	if ( $isitblank_column != 'no' ) {
		
		echo 'disabled="disabled"';
		
		
		
	}
	
	
	
	
	
	?> style="margin-top: 8px;"/>


</div>


<p class="howto">Column headshots should be 900px &times; 1100px, with the person centred on a white background.</p>


<?php
	
	
// better use get_current_screen(); or the global $current_screen
if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {

    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}

?><script type="text/javascript">


jQuery(document).ready( function( $ ) {

    $('#upload_column_button').click(function() {
	    
		var frame;
		uploadID = jQuery(this).prev('input');
        formfield = $('#upload_column').attr('name');
        
        
        
        // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });
    
    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      
      
      
	  
	  uploadID.val(attachment.url);

       jQuery("#columnurladder").attr("src", attachment.url);
       
      

        $( "#imageafterdisplay_column" ).hide();
        
        $( "#imagebeforesave_column" ).show();
        
        $("#upload_column_button_clear").removeAttr("disabled");
          
      
      });

    // Finally, open the modal on click
    frame.open();
  }); 
       
       
        
        
        
        
    
        
 

	    
    
     $("#upload_column_button_clear").click(function() {
  
  
  
  if (!$("#upload_column_button_clear").is(":disabled")) {
	  
	  $( "#imageafterdisplay_column" ).hide();
        
        $( "#imagebeforesave_column" ).hide();
        
        $('#upload_column').val('');
        
        
        
        
        $("#upload_column_button_clear").attr("disabled","disabled");
	  
  
  
  }    
       
    

});
  
  
  });
  
  </script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	
	 } 
	
	
/* Do something with the data entered */






function save_columnheadshoturl( $post_id )
{
	global $post; 
	
    if ($post->post_type != 'ut_writer_page_type'){
        return;
    }
	
	
	
    // Bail if we're doing an auto save
    //if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    // if( !isset( $_POST['ut_columnheadshot_nonce'] ) || !wp_verify_nonce( $_POST['ut_columnheadshot_nonce'], 'ut_columnheadshot_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    // if( !current_user_can( 'edit_post' ) ) return;
    
    
    if( isset( $_POST['columnheadshot_url'] ) )
  
  
 		 		$themeta = get_post_meta($post->ID, 'columnheadshot_url', true);
 		 		

	 		
	 		update_post_meta( $post_id, 'columnheadshot_url', $_POST['columnheadshot_url'] );
	 		
 	        
 
    
    
    
    
}

add_action( 'save_post', 'save_columnheadshoturl', 99 );





    
   















?><?php


add_action( 'load-post.php', 'ut_meta_boxes' );
add_action( 'load-post-new.php', 'ut_meta_boxes' );



function ut_meta_boxes() {

		add_action( 'add_meta_boxes', 'ut_add_post_meta_boxes' );
		
		add_action( 'save_post', 'ut_save_writer_name_meta', 10, 2 );
		
		
}


/* Save the meta box's post metadata. */




function ut_save_writer_name_meta( $post_id, $post ) {

 // verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['ut-writer-details-nonce'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$ut_writer_details['_writer_name'] = $_POST['_writer_name'];
	$ut_writer_details['_position_name'] = $_POST['_position_name'];
	$ut_writer_details['_writer_name_two'] = $_POST['_writer_name_two'];
	$ut_writer_details['_writer_name_three'] = $_POST['_writer_name_three'];
	$ut_writer_details['_writer_name_four'] = $_POST['_writer_name_four'];
	$ut_writer_details['_writer_name_five'] = $_POST['_writer_name_five'];
	
	
	
	
	if( isset( $_POST[ '_writer_name_none' ] ) ) {
    
    $ut_writer_details['_writer_name_none'] = "yes";
    
    
    } else {
    
    $ut_writer_details['_writer_name_none'] = "";
	
	}
	
	// Add values of $events_meta as custom fields
	
	foreach ($ut_writer_details as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
    
    
    
    
    
}





function ut_add_post_meta_boxes() {

  add_meta_box(
    'ut-writer-name',      // Unique ID
    esc_html__( 'Writer Details', 'Samuel Riggs' ),    // Title
    'ut_writer_name_meta_box',   // Callback function
    'post',         // Admin page (or post type)
    'advanced',         // Context
    'high'         // Priority
  );
}


function ut_writer_name_meta_box( $object, $box ) { 


global $post;
	
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="ut-writer-details-nonce" id="ut-writer-details-nonce" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	
	// Get the location data if its already been entered
	$ut_writer_name = get_post_meta($post->ID, '_writer_name', true);
	$ut_position_name = get_post_meta($post->ID, '_position_name', true);
	
	$ut_writer_name_two = get_post_meta($post->ID, '_writer_name_two', true);
	
	$ut_writer_name_three = get_post_meta($post->ID, '_writer_name_three', true);
	
	$ut_writer_name_four = get_post_meta($post->ID, '_writer_name_four', true);
	
	$ut_writer_name_five = get_post_meta($post->ID, '_writer_name_five', true);
	
	$ut_writer_name_none = get_post_meta($post->ID, '_writer_name_none', true);
	
	
	$count_first_value = "2";
	
	
	if ($ut_writer_name_two !== "" && $ut_writer_name_two !== null) {
		
		
		$count_first_value = "3";
		
	}
	
	if ($ut_writer_name_three !== "" && $ut_writer_name_three !== null) {
		
		
		$count_first_value = "4";
		
	}
	
	if ($ut_writer_name_four !== "" && $ut_writer_name_four !== null) {
		
		
		$count_first_value = "5";
		
	}
	
	
	
	// Echo out the field
	
	
	
	echo '
	
	
	<div id="checkersut"><label style="margin: 10px 0px 10px 0px; display: block;" for="_writer_name_none">
	
	<input style="margin-right: 2px;" type="checkbox" id="_writer_name_none" name="_writer_name_none" value="yes"';
	
	
	if ($ut_writer_name_none == "yes") {
	
	echo "checked";
	
	}
	
	
	echo '> Do not display writer details</label></div>
	
	
		
		


		
		
		
	
	<div id="wholeformnames">
	
	
	<div style="margin-bottom: 4px;" id="writer_one">
	
	
	<label for="_writer_name">Name:</label> <input type="text" name="_writer_name" id="_writer_name" value="' . $ut_writer_name  . '" />
	
	<div style="';
	
	
	if ($ut_writer_name_two !== "" && $ut_writer_name_two !== null || $ut_writer_name_three !== "" && $ut_writer_name_three !== null || $ut_writer_name_four !== "" && $ut_writer_name_four !== null || $ut_writer_name_five !== "" && $ut_writer_name_five !== null) {
	
	echo "display:none;";
	
	}
	
	else {
	
	echo "display:inline;";
	
	}
	
	
	
	echo '" id="positionfield"><label style="padding-left: 7px;" for="_position_name">Position:</label> <input type="text" name="_position_name" id="_position_name" value="' . $ut_position_name  . '" /></div>
	
	
	
	</div>
	
	
	<div style="margin-bottom: 4px; ';
	
	
	if ($ut_writer_name_two == "" || $ut_writer_name_two == null) {
	
	echo "display:none;";
	
	}
	
	
	echo '" id="writer_two"><label for="_writer_name_two">Name:</label> <input type="text" name="_writer_name_two" id="_writer_name_two" value="' . $ut_writer_name_two  . '" />
	
	</div>
	
	
	<div style="margin-bottom: 4px;';
	
	
	 if ($ut_writer_name_three == "" || $ut_writer_name_three == null) {
	
	echo "display:none";
	
	}

	 
	 
	 echo '" id="writer_three"><label for="_writer_name_three">Name:</label> <input type="text" name="_writer_name_three" id="_writer_name_three" value="' . $ut_writer_name_three  . '" />
	
	</div>
	
	
	<div style="margin-bottom: 4px;';
	
	
	 if ($ut_writer_name_four == "" || $ut_writer_name_four == null) {
	
	echo "display:none";
	
	}
	
	
	
	
	
	echo '" id="writer_four"><label for="_writer_name_four">Name:</label> <input type="text" name="_writer_name_four" id="_writer_name_four" value="' . $ut_writer_name_four  . '" />
	
	</div>
	
	
	<div style="margin-bottom: 4px;';
	
	
	
	 if ($ut_writer_name_five == "" || $ut_writer_name_five == null) {
	
	echo "display:none";
	
	}
	
	
	echo '" id="writer_five"><label for="_writer_name_five">Name:</label> <input type="text" name="_writer_name_five" id="_writer_name_five" value="' . $ut_writer_name_five  . '" />
	
	</div>
	
	
		
	
	<script> 
	
	
	
	jQuery(document).ready(function () {
	
	
	
	var clicks = ';echo $count_first_value;
	
	
	
	echo ';
  jQuery("#morewriter").click(function(){
 
 
if(jQuery("#writer_two").is(":hidden") && jQuery("#writer_three").is(":hidden") && jQuery("#writer_four").is(":hidden") && jQuery("#writer_five").is(":hidden")) {
  jQuery("#writer_two").show();
  jQuery("#positionfield").hide();
  jQuery("#_position_name").val("");
  jQuery("#lesswriter").removeAttr("disabled");
  
  
  }
  
  else if(jQuery("#writer_two").is(":visible") && jQuery("#writer_three").is(":hidden") && jQuery("#writer_four").is(":hidden") && jQuery("#writer_five").is(":hidden")) {
  jQuery("#writer_three").show();
  
  }
  
 else if(jQuery("#writer_two").is(":visible") && jQuery("#writer_three").is(":visible") && jQuery("#writer_four").is(":hidden") && jQuery("#writer_five").is(":hidden")) {
  jQuery("#writer_four").show();
  
  }
  
  else if(jQuery("#writer_two").is(":visible") && jQuery("#writer_three").is(":visible") && jQuery("#writer_four").is(":visible") && jQuery("#writer_five").is(":hidden")) {
  jQuery("#writer_five").show();
  jQuery("#morewriter").attr("disabled","disabled");
  
  }
   
   
   else{
        // second clik
    }
    
    
  
  
  
  
  
});
      
      
      
      
      
      
      
  });
  
  
  </script>
  
  
  
  
  <script> 
	
	
	
	jQuery(document).ready(function () {
	
	
  jQuery("#lesswriter").click(function(){
 
 
 
 if(jQuery("#writer_five").is(":visible")) {
    
 jQuery("#writer_five").hide();
 jQuery("#_writer_name_five").val("");
 jQuery("#morewriter").removeAttr("disabled");
 
 
}
 
 
  else if(jQuery("#writer_four").is(":visible")) {
  
  jQuery("#writer_four").hide();
 jQuery("#_writer_name_four").val("");
  
  
  }   
  
  
   else if(jQuery("#writer_three").is(":visible")) {
  
  jQuery("#writer_three").hide();
 jQuery("#_writer_name_three").val("");
  
  
  }
  
  
   else if(jQuery("#writer_two").is(":visible")) {
  
  jQuery("#writer_two").hide();
 jQuery("#_writer_name_two").val("");
 jQuery("#positionfield").css("display","inline");
 jQuery("#lesswriter").attr("disabled","disabled");
 
  
  
  }
  
  
 
  
   
   else{
        // second clik
    }
    
    
    ++clicks;
  
  
  
  
});
      
      
      
      
      
      
      
  });
  
  
  </script>
  
  
  
  
   <script> 
	
	
	
	jQuery(document).ready(function () {
	
	
  
 if(jQuery("#_writer_name_none").is(":checked")) {
    

 jQuery("#wholeformnames").hide();
 
 
}

 
 
 if(jQuery("#writer_five").is(":visible")) {
    

 jQuery("#morewriter").attr("disabled","disabled");
 
 
}
 
 
if(jQuery("#writer_two").is(":visible")) {
  
 
 jQuery("#lesswriter").removeAttr("disabled");
  
  
  }   
  
  
  
  
  
 
  
   
   else{
        // second clik
    }
    
    
    
  
  
  
  
      
      
      
      
      
      
      
  });
  
  
  </script>
  
  
  
  
  
  
  <script> 
	
	
	
	jQuery(document).ready(function () {
	
	jQuery("#checkersut").click(function(){
  
 if (!jQuery("#_writer_name_none").is(":checked")) {
    

 jQuery("#wholeformnames").show();
 
 
}



else if (jQuery("#_writer_name_none").is(":checked")) {
    

 jQuery("#wholeformnames").hide();
 
 
}   


   
     
     }); 
     
     
     
         
         
     
     
   
     
     
         
      
  });
  
  
  </script>


  
  

  
  
  
  

	
	<div style="margin-top: 15px">
	
	<div id="morewriter" class="button-secondary" title="Add a Writer">Add a Writer</div>
	<div id="containlesswriterbutton" style="display: inline;"><div id="lesswriter" class="button-secondary" disabled="true" title="Delete a Writer">Delete a Writer</div></div>
	
	</div>
	
	
	
	</div>
	
	
	
		
	
	
	';




 }


add_action('edit_form_after_title', function() {
    global $post, $wp_meta_boxes;
    do_meta_boxes(get_current_screen(), 'advanced', $post);
    unset($wp_meta_boxes[get_post_type($post)]['advanced']);
});











add_action('admin_menu', 'add_global_custom_options_boo'); 

function add_global_custom_options_boo()
{

$page_title = 'Order Posts';
$menu_title = 'Order Posts';
$capability = 'manage_options';
$menu_slug = 'postorderit';
$function = 'functionpostorderit';
$icon_url = '';
$position = '7';


    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    
    }


?><?php




function functionpostorderit()
{     ?>

<!--
<script>

window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
       setTimeout(function() { window.location.reload() },300);
    }
}

</script>

-->



<form method="post" action="<?php get_site_url(); ?>/wp/wp-content/themes/universitytimes/form-order.php">



      <?php
      
      
      

   
      global $post;
global $my_query;



		$posts1 = get_option('post1');
   		$posts2 = get_option('post2');
   		$posts3 = get_option('post3');
   		$posts4 = get_option('post4');
   		$posts5 = get_option('post5');
   		$posts6 = get_option('post6');
   		$posts7 = get_option('post7');
   		$posts8 = get_option('post8');
   		$posts9 = get_option('post9');
   		$posts10 = get_option('post10');
   		$posts11 = get_option('post11');
   		$posts12 = get_option('post12');
   		$posts13 = get_option('post13');
   		$posts14 = get_option('post14');
   		$posts15 = get_option('post15');
   		$posts16 = get_option('post16');
   		$posts17 = get_option('post17');
   		$posts18 = get_option('post18');
   		$posts19 = get_option('post19');
	    $posts20 = get_option('post20');
	    $posts21 = get_option('post21');
	    $posts22 = get_option('post22');
	    $posts23 = get_option('post23');
	    $posts24 = get_option('post24');
	    $posts25 = get_option('post25');


$post_listids = array($posts1,$posts2,$posts3,$posts4,$posts5,$posts6,$posts7,$posts8,$posts9,$posts10,$posts11,$posts12,$posts13,$posts14,$posts15,$posts16,$posts17,$posts18,$posts19,$posts20,$posts21,$posts22,$posts23,$posts24,$posts25);

array_filter($post_listids);


// current page number
$paged_l = 1;
// number of posts per page
$posts_per_page_l = 25;
// starting position
$offset = ( $paged_l - 1 ) * $posts_per_page_l;
// extract page of IDs
$ids_to_query_l = array_slice( $post_listids, $offset, $posts_per_page_l );



  
    $my_query = new WP_Query( array('post_type' => array( 'post', 'feature' ), 
    								'post__in' => $ids_to_query_l, 
    								'posts_per_page' => $posts_per_page_l, 
    								
    								'orderby' => 'post__in', 
    								'ignore_sticky_posts' => 1, 
    								'post_status' => 'publish') );

   

    if($my_query->have_posts()) {
       
	echo '<ul>';
	
	$loop_counter = 0;
	
	
	while ( $my_query->have_posts() ) {
		$my_query->the_post();
		
		$loop_counter++;
		
		
		
		$current_id = get_the_id();
		
		if ($current_id == $posts1) {
			
			$current_number = '1';
			
			
		}
		
		elseif ($current_id == $posts2) {
			
			$current_number = '2';
			
		}
		
		elseif ($current_id == $posts3) {
			
			$current_number = '3';
			
		}
		
		elseif ($current_id == $posts4) {
			
			$current_number = '4';
			
		}
		elseif ($current_id == $posts5) {
			
			$current_number = '5';
			
		}
		elseif ($current_id == $posts6) {
			
			$current_number = '6';
			
		}
		elseif ($current_id == $posts7) {
			
			$current_number = '7';
			
		}
		elseif ($current_id == $posts8) {
			
			$current_number = '8';
			
		}
		elseif ($current_id == $posts9) {
			
			$current_number = '9';
			
		}
		elseif ($current_id == $posts10) {
			
			$current_number = '10';
			
		}
		elseif ($current_id == $posts11) {
			
			$current_number = '11';
			
		}
		elseif ($current_id == $posts12) {
			
			$current_number = '12';
			
		}
		elseif ($current_id == $posts13) {
			
			$current_number = '13';
			
		}
		elseif ($current_id == $posts14) {
			
			$current_number = '14';
			
		}
		elseif ($current_id == $posts15) {
			
			$current_number = '15';
			
		}
		elseif ($current_id == $posts16) {
			
			$current_number = '16';
			
		}
		elseif ($current_id == $posts17) {
			
			$current_number = '17';
			
		}
		elseif ($current_id == $posts18) {
			
			$current_number = '18';
			
		}
		elseif ($current_id == $posts19) {
			
			$current_number = '19';
			
		}
		elseif ($current_id == $posts20) {
			
			$current_number = '20';
			
		}
		elseif ($current_id == $posts21) {
			
			$current_number = '21';
			
		}
		elseif ($current_id == $posts22) {
			
			$current_number = '22';
			
		}
		elseif ($current_id == $posts23) {
			
			$current_number = '23';
			
		}
		elseif ($current_id == $posts24) {
			
			$current_number = '24';
			
		}
		elseif ($current_id == $posts25) {
			
			$current_number = '25';
			
		}
		
		else {
			
			
			
		}
		
	
$this_id = get_the_ID();
		
		
echo '<li><strong>' . $current_number . '</strong>&nbsp;&nbsp;' . get_the_title() . '&nbsp;' . '<input type="text" name="number_of_'.$loop_counter.'" value="" />'.'&nbsp;&nbsp;' . $this_id . '</li>' ;

echo '<input type="hidden" name="id_of_' . $loop_counter . '" value="' . get_the_ID() . '">' ;

	  
	  
	  
    
   






}
	echo '</ul>';
	
	
	
} 



else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();  

    



?>


 <p><input class="submitter" type="submit" name="submit" value="Update" /></p>
     
              
        </form>
        
        
        <form method="post" action="<?php get_site_url(); ?>/wp/wp-content/themes/universitytimes/form-order-clear.php">
        
        
        
     <p><input class="submitter" type="submit" name="submit" value="Clear All" /></p>
     
              
        </form>




<br /><br />

<hr />














  <form method="post" action="form-order.php">
            
            
            
            <?php

   
      global $post;
	  global $my_query;


  
	  					$my_query = new WP_Query( array('post_type' => array( 'post', 'feature' ), 
	  													'posts_per_page' => 25,
	  													
	  													'tax_query' => array(
	  													array(
	  													'taxonomy' => 'section',
	  													'terms' => array(1179, 1178, 1181,12,8),
	  													'field' => 'id',
	  													)
	  													),
	  													
	  													 
	  													'orderby' => 'date', 
	  													'post_status' => 'publish', 
	  													'post__not_in' => $post_listids  
) );

   

if($my_query->have_posts()) {
       
								
								echo '<ul>';
	
						$loop_counter = 0;
	
	
		while ( $my_query->have_posts() ) {
						
						
							$my_query->the_post();
		
							$loop_counter++;
		
	
							$this_id = get_the_ID();
		
		
							echo '<li><strong>' . $loop_counter . '</strong>&nbsp;&nbsp;' . get_the_title() . '&nbsp;' . '<input type="text" name="number_of_'.$loop_counter.'" value="" />'.'&nbsp;&nbsp;'.$this_id.'</li>' ;


							echo '<input type="hidden" name="id_of_' . $loop_counter . '" value="' . get_the_ID() . '">' ;



} /* END OF WHILE */


	echo '</ul>';
	
	
	
	
} /* END OF QUERY */



else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();  

   

?>


     <p><input class="submitter" type="submit" name="submit" value="Update" /></p>
     
              
        </form>
        
        
        
        
              
    
<?php
}
?><?php
    
  /**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
  // Add new "team" taxonomy to Posts
  register_taxonomy('section', 'post', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    'show_admin_column' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Section', 'taxonomy general name' ),
      'singular_name' => _x( 'Section', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Sections' ),
      'all_items' => __( 'All Sections' ),
      'parent_item' => __( 'Parent Section' ),
      'parent_item_colon' => __( 'Parent Section:' ),
      'edit_item' => __( 'Edit Section' ),
      'update_item' => __( 'Update Section' ),
      'add_new_item' => __( 'Add New Section' ),
      'new_item_name' => __( 'New Section Name' ),
      'menu_name' => __( 'Section' ),
      
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => '', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/team/"
      'hierarchical' => true, // This will allow URL's like "/team/boston/cambridge/"
      
    ),
  ));
  
  
  register_taxonomy('articletype', 'post', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'articletype', 'taxonomy general name' ),
      'singular_name' => _x( 'articletype', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Article Types' ),
      'all_items' => __( 'All Article Types' ),
      'parent_item' => __( 'Parent articletype' ),
      'parent_item_colon' => __( 'Parent Article Type:' ),
      'edit_item' => __( 'Edit Article Type' ),
      'update_item' => __( 'Update Article Type' ),
      'add_new_item' => __( 'Add New Article Type' ),
      'new_item_name' => __( 'New Article Type Name' ),
      'menu_name' => __( 'Article Type' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => '', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/team/"
      'hierarchical' => true // This will allow URL's like "/team/boston/cambridge/"
    ),
  ));

  
  
  
  
  
}
add_action( 'init', 'add_custom_taxonomies', 0 );
  
  
  
    
    ?><?php

function custom_meta_box() {

    remove_meta_box( 'sectiondiv', 'post', 'side' );
    
    remove_meta_box( 'articletypediv', 'post', 'side' );

    add_meta_box( 'tagsdiv-section', 'Section', 'section_meta_box', 'post', 'side', 'high' );

}
add_action('add_meta_boxes', 'custom_meta_box');

/* Prints the taxonomy box content */
function section_meta_box($post) {

    $tax_name = 'section';
    $taxonomy = get_taxonomy($tax_name);
?>
<div class="tagsdiv" id="<?php echo $tax_name; ?>">
	
	
	
	
	
	
	
    <div id="sectionselector">
    <?php 
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'section_noncename' );
    $section_IDs = wp_get_object_terms( $post->ID, 'section', array('fields' => 'ids') );
    wp_dropdown_categories('taxonomy=section&hide_empty=0&orderby=name&name=section&show_option_none=Select section&selected='.$section_IDs[0]); ?>
    
    
    
    
    
    
    <p class="howto">Select the section</p>
    </div>
    
    
    <script type="text/javascript">
    
    
    jQuery(document).ready(function(){
	    
	    
	    var pageno = 2;
	   	    
	    jQuery( "#loadmoreevents" ).click(function() {
		    
		    
		    
		    
		    
		    
  
  
  
  
   jQuery.ajax({
	         
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
		type: 'post',
		data: {
		action: 'ajax_stuffie_loadmore',
		post_id: <?php echo get_the_ID(); ?>,
		page_no:  pageno,
		},
	success: function( html ) {
		
		
		
		
		jQuery('#listofradiusposts').append( html );
		
		jQuery("#loadmoreeventsgif").css("visibility","hidden");
		
		
		
		
		pageno++
		
	 
		
		
		
				
	},
	
	error: function( html ){
    alert('failure');
  },
	
	
	
	
});       

  
  
  
  jQuery('#ajaxpagenumber').val( function(i, oldval) {
    return ++oldval;
});
  
  jQuery("#loadmoreeventsgif").css("visibility","visible");
  
});

	    
	  
	    
	    
	    
	    
	    
	    
	    
	    
	    jQuery("#tagsdiv-utlinkradiusevent").hide();
	    
	    
	    
	    
	    
    
   
  <?php 
$newsterm = get_term_by( 'slug', 'news', 'section' );
$newsterm_id = $newsterm->term_id;

$opinionterm = get_term_by( 'slug', 'opinion', 'section' );
$opinionterm_id = $opinionterm->term_id;

$radiusterm = get_term_by( 'slug', 'radius', 'section' );
$radiusterm_id = $radiusterm->term_id;








?>
	   
	  
	   
	   
	    
	    
	    
    	var loaded = false;
    
    
        jQuery("#sectionselector").bind('change', function () {
	        
	        
	       var newstermid = "<?php echo $newsterm_id; ?>"; 
	       var opiniontermid = "<?php echo $opinionterm_id; ?>";
	       var radiustermid = "<?php echo $radiusterm_id; ?>";
	       
	       
	
	        
    var str = "";
  
    str = parseInt(jQuery("select option:selected").val());
        
        if(str == newstermid){
            
         jQuery("#posttypeselector").show();
         
             jQuery("#newswoo").show();  
       
             
         jQuery("#opinionwoo").hide();
         
         jQuery("#radiuswoo").hide();
         
         
         jQuery("#tagsdiv-utlinkradiusevent").hide();
         
         
          jQuery("#typeteller").val('news');
          
        
         
        
            
        
         
         jQuery("#sportswoo").hide();
            
            
        }
        
        else if(str == opiniontermid){
            
         jQuery("#posttypeselector").show();
         
             
          jQuery("#opinionwoo").show();  
          
           
         jQuery("#newswoo").hide();
         
         jQuery("#tagsdiv-utlinkradiusevent").hide();
         
         jQuery("#radiuswoo").hide();
         
         
         
         jQuery("#typeteller").val('opinion');
            
        
         
         jQuery("#sportswoo").hide();
            
            
        }
        
        
        else if(str == radiustermid){
            
         jQuery("#posttypeselector").show(); 
         
         
         jQuery("#tagsdiv-utlinkradiusevent").show();
         
         
         
         if(loaded) return;
         
         jQuery.ajax({
	         
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
		type: 'post',
		data: {
		action: 'ajax_stuffie',
		post_id: <?php echo get_the_ID(); ?>
		},
	success: function( html ) {
		
		jQuery('#listofradiusposts').prepend( html );
		
		loaded = true;
	}
	
	
	
	
	
	
	
});  


     jQuery("#loadmoreevents").show();
    
    
        
         
	
          
         
         
         
         
         
             
             
             jQuery("#radiuswoo").show();  
             
          jQuery("#opinionwoo").hide();  
          
           
         jQuery("#newswoo").hide();
         
         
         
         jQuery("#typeteller").val('radius');
            
        
         
         jQuery("#sportswoo").hide();
            
            
        }

        
       
        
        
        
      else
          jQuery("#posttypeselector").hide();
          
});

jQuery('#sectionselector').trigger('change');











});

</script>



<script>
	
	jQuery(document).ready(function(){
		
	
});
	
	
	</script>


  
    
    
     <div id="posttypeselector" style="display: none;">
   
   
   <div id="newswoo"> 
	   
	 
	   
	   <select name="news_articletype" class='postform' >
		   
		   <option class="level-0" value="-1">Select article type</option>

		<option class="level-0" value="newsarticle" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'newsarticle' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>News Article</option>
	<option class="level-0" value="newsfeature" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'newsfeature' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>News Feature</option>
</select>
	   
	   
   </div>
   
   <div id="opinionwoo">
	   
	   
	   
	  
	
	
		  
	  <select id="opinionarticletype" name="opinion_articletype" class='postform' >
		
		
		<option class="level-0" value="-1">Select article type</option>
		
		
		<option class="level-0" value="opinioncontrib" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'opinioncontrib' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Opinion Contribution</option>

<option class="level-0" value="analysis-2" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'analysis-2' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Analysis</option>

	<option class="level-0" value="column" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'column' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Column</option>

<option class="level-0" value="editorials" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'editorials' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Editorial</option>


<option class="level-0" value="op-ed" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'op-ed' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Op-ed</option>

	    </select>

	   
	   
	   
	   
	   
	    </div>
	    
	    
	     <div id="radiuswoo">
	   
	   
	   
	
	
	
		  
	  <select id="radiusarticletype" name="radius_articletype" class='postform' >
		
		
		<option class="level-0" value="-1">Select article type</option>
		
		
		<option class="level-0" value="radiuspreviews" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'radiuspreviews' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Preview</option>

<option class="level-0" value="radiusreviews" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'radiusreviews' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Review</option>

	<option class="level-0" value="radiusfeatures" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'radiusfeatures' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Feature</option>

<option class="level-0" value="radiusobservations" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'radiusobservations' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Observations</option>


<option class="level-0" value="radiussnapshot" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'radiussnapshot' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Snapshot</option>

<option class="level-0" value="radiusextract" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'radiusextract' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Extract</option>

<option class="level-0" value="radiusspeakingwith" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'radiusspeakingwith' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Speaking with...</option>

<option class="level-0" value="radius5of" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'radius5of' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>5 of...</option>

	    </select>

	   
	   <script>
	   
	  


	   </script>
	   
	   
	   
	    </div>
   
   <div id="sportswoo">SPORTS WOO!</div>
   
   
   
   
   
   	   
	   <input id="typeteller" type="hidden" name="typeteller"  value="" /> 
   
   
   
    <p class="howto">Select article type</p>
    </div>
    
</div>

 


<?php
} ?><?php

/* When the post is saved, saves our custom taxonomy */
function section_save_postdata( $post_id ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['section_noncename'], plugin_basename( __FILE__ ) ) )
      return;


  // Check permissions
  if ( 'post' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // OK, we're authenticated: we need to find and save the data

  $section_ID = $_POST['section'];
  

  $section = ( $section_ID > 0 ) ? get_term( $section_ID, 'section' )->slug : NULL;

  wp_set_object_terms(  $post_id , $section, 'section' );
  
  
  
  
  
  

}
/* Do something with the data entered */
add_action( 'save_post', 'section_save_postdata' );









/* When the post is saved, saves our custom taxonomy */
function articletype_save_postdata( $post_id ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['section_noncename'], plugin_basename( __FILE__ ) ) )
      return;
      

  // Check permissions
  if ( 'post' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // OK, we're authenticated: we need to find and save the data
  
  
  
  $typeteller = $_POST['typeteller'];
  
  
  if($typeteller == 'news'){
	  
	$articletype_ID = $_POST['news_articletype'];  
	  
	  
  }
  
  elseif($typeteller == 'opinion'){
	  
	$articletype_ID = $_POST['opinion_articletype'];  
	  
	  
  }
  
  elseif($typeteller == 'radius'){
	  
	$articletype_ID = $_POST['radius_articletype'];  
	  
	  
  }
  
 

  if ($articletype_ID != -1) {
	  
	  wp_set_object_terms(  $post_id , $articletype_ID, 'articletype' );
	  
  }

 

  
  
  
  
  
  
  

}
/* Do something with the data entered */
add_action( 'save_post', 'articletype_save_postdata' );










?><?php    
	
	
	
	
	// Register Custom Post Type
function ut_radius_event() {

	$labels = array(
		'name'                => _x( 'Radius Event', 'Post Type General Name' ),
		'singular_name'       => _x( 'Radius Event', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Radius Events' ),
		'name_admin_bar'      => __( 'Radius Events'),
		'parent_item_colon'   => __( 'Parent Item:' ),
		'all_items'           => __( 'All Radius Events'  ),
		'add_new_item'        => __( 'Add New Radius Event'  ),
		'add_new'             => __( 'Add New' ),
		'new_item'            => __( 'New Event' ),
		'edit_item'           => __( 'Edit Event' ),
		'update_item'         => __( 'Update Event' ),
		'view_item'           => __( 'View Event' ),
		'search_items'        => __( 'Search Events' ),
		'not_found'           => __( 'Not found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);
	$args = array(
		'label'               => __( 'ut_radius_event_type' ),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'custom-fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 11,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'slug' 				  => 'events',
		'taxonomies'		  => array('category','post_tag'),
	);
	register_post_type( 'ut_radius_event_type', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_radius_event', 0 );
	
	
	
	
?><?php

function ut_radius_date_meta_box() {


    add_meta_box( 'tagsdiv-utradiusdate', 'Event Date', 'utradiusdate_meta_box', 'ut_radius_event_type', 'side', 'high' );

}


add_action('add_meta_boxes', 'ut_radius_date_meta_box');

/* Prints the taxonomy box content */
function utradiusdate_meta_box($post) {

   
?>
  
  <div>
	  
 <?php echo '<input type="hidden" name="ut_utradiusdate_nonce" id="ut_utradiusdate_nonce" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />'; ?>
	
	
	<div id="checkersut"><label id="multidaycheck" style="margin: 10px 0px 10px 0px; display: inline-block;" for="radius_multi_day_event">
	
	<input style="margin-right: 2px;" type="checkbox" id="radius_multi_day_event" name="radius_multi_day_event" value="yes"
	
	<?php
	
	
	$radius_multi_day_event = get_post_meta( $post->ID, 'utradiusdatemultiday', true );
	
	if ($radius_multi_day_event == "yes") {
	
	echo "checked";
	
	}
	
	?>> Multi-day Event</label></div>
	
	
	 
		
				<div class="eventdatewrap" ><label for="month_mm" class="screen-reader-text">Month</label>



<select style="padding: 2px; font-size: 12px; height: 28px; padding-top: 0px; margin-top: -3px; <?php	if ( get_post_meta($post->ID, 'utradiusdate_month', true) == 'minusone' ) :
	echo 'border: 1px solid red;';
else :
	echo '';
endif;
?>
" id="month_mm" name="month_mm">
			<option value="-1">Month</option>
			<option value="01" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '01' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Jan</option>
			<option value="02" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '02' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Feb</option>
			<option value="03" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '03' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Mar</option>
			<option value="04" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '04' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Apr</option>
			<option value="05" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '05' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>May</option>
			<option value="06"  <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '06' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Jun</option>
			<option value="07" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '07' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Jul</option>
			<option value="08" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '08' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Aug</option>
			<option value="09" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '09' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Sep</option>
			<option value="10" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '10' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Oct</option>
			<option value="11" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '11' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Nov</option>
			<option value="12" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month', true) == '12' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Dec</option>
</select> 



<label for="day_dd" class="screen-reader-text">Day</label>
<input style="font-size: 12px; width: 28px; height: 28px; padding: 2px; 

<?php $utradiusdate_day = get_post_meta($post->ID, 'utradiusdate_day', true);
	
	if ($utradiusdate_day == 'DD') { echo 'color: red; font-weight: bold;';}   ?>




" type="text" id="day_dd" name="day_dd" value="

<?php echo $utradiusdate_day; ?>

" size="2" maxlength="2" autocomplete="off" />, 



<label for="year_yyyy" class="screen-reader-text">Year</label>
<input type="text" id="year_yyyy" style="font-size: 12px; width: 45px; height: 28px; margin-top: 3px; padding: 2px;


<?php $utradiusdate_year = get_post_meta($post->ID, 'utradiusdate_year', true);
	
	if ($utradiusdate_year == 'YYYY') { echo 'color: red; font-weight: bold;';}   ?>



" name="year_yyyy" value="

<?php echo $utradiusdate_year; ?>

" size="4" maxlength="4" autocomplete="off" /> 


<span id="hidetime" 



<?php
	
	$multiday = get_post_meta( $post->ID, 'utradiusdatemultiday', true);

if ($multiday == 'yes') 






{ echo 'style="display: none;"'; }




?>




>@ <label for="hour_hh" class="screen-reader-text">Hour</label>



<input style="font-size: 12px; width: 28px; height: 28px; padding: 2px; 

<?php $utradiusdate_hour = get_post_meta($post->ID, 'utradiusdate_hour', true);
	
	if ($utradiusdate_hour == 'hh') { echo 'color: red; font-weight: bold;';}   ?>

" type="text" id="hour_hh" name="hour_hh" value="

<?php echo $utradiusdate_hour; ?>

" size="2" maxlength="2" autocomplete="off" /> : 



<label for="minute_mm" class="screen-reader-text">Minute</label>
<input style="font-size: 12px; width: 30px; height: 28px; padding: 2px; 


<?php $utradiusdate_minute = get_post_meta($post->ID, 'utradiusdate_minute', true);
	
	if ($utradiusdate_minute == 'mm') { echo 'color: red; font-weight: bold;';}   ?>




" type="text" id="minute_mm" name="minute_mm" value="

<?php echo $utradiusdate_minute ?>

" size="2" maxlength="2" autocomplete="off" />


</span>

</div>




<div id="eventdatewrap_until" style="
	
	<?php
		
		if ($radius_multi_day_event !== "yes") {
	
	echo "display: none;";
	
	}
	
	
	?>">
	
	
	
	
	<span style="display:block; margin-top: 5px;">Until:</span>
	<label for="month_mm_until" class="screen-reader-text">Month</label>
	
	<select style="padding: 2px; font-size: 12px; height: 28px; padding-top: 0px; margin-top: -3px; <?php	if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == 'minusone' ) :
	echo 'border: 1px solid red;';
else :
	echo '';
endif;
?>
" id="month_mm_until" name="month_mm_until">
			<option value="-1">Month</option>
			<option value="01" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '01' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Jan</option>
			<option value="02" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '02' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Feb</option>
			<option value="03" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '03' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Mar</option>
			<option value="04" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '04' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Apr</option>
			<option value="05" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '05' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>May</option>
			<option value="06"  <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '06' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Jun</option>
			<option value="07" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '07' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Jul</option>
			<option value="08" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '08' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Aug</option>
			<option value="09" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '09' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Sep</option>
			<option value="10" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '10' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Oct</option>
			<option value="11" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '11' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Nov</option>
			<option value="12" <?php
if ( get_post_meta($post->ID, 'utradiusdate_month_until', true) == '12' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Dec</option>
</select> 



<label for="day_dd_until" class="screen-reader-text">Day</label>
<input style="font-size: 12px; width: 28px; height: 28px; padding: 2px; 

<?php $utradiusdate_day_until = get_post_meta($post->ID, 'utradiusdate_day_until', true);
	
	if ($utradiusdate_day_until == 'DD') { echo 'color: red; font-weight: bold;';}   ?>




" type="text" id="day_dd_until" name="day_dd_until" value="

<?php echo $utradiusdate_day_until; ?>

" size="2" maxlength="2" autocomplete="off" />, 



<label for="year_yyyy_until" class="screen-reader-text">Year</label>
<input type="text" id="year_yyyy_until" style="font-size: 12px; width: 45px; height: 28px; margin-top: 3px; padding: 2px;


<?php $utradiusdate_year_until = get_post_meta($post->ID, 'utradiusdate_year_until', true);
	
	if ($utradiusdate_year_until == 'YYYY') { echo 'color: red; font-weight: bold;';}   ?>



" name="year_yyyy_until" value="

<?php echo $utradiusdate_year_until; ?>

" size="4" maxlength="4" autocomplete="off" />


</div>		
		
		
		
		 
  </div>
	
	

<script type="text/javascript">

jQuery(document).ready( function( $ ) {
	
	
	
	
    $('.meta-box-sortables').sortable({
        disabled: true
    });

    $('.postbox .hndle').css('cursor', 'pointer');


    $('#upload_postimage_button').click(function() {
	    
		
		
		
		
		
		
		  }); 
       
       
     
     $("#month_mm_until").focus(function() {
	 
	 
	 $(this).css({
   'color' : 'black',
   'border' : '1px solid #dddddd'});
	 
	 
	 
	 });
	 
	 
	 $("#month_mm").focus(function() {
	 
	 
	 $(this).css({
   'color' : 'black',
   'border' : '1px solid #dddddd'});
	 
	 
	 
	 });

     
     
     
        
    $("#day_dd").focus(function() {
	 
	 
	 $(this).css({
   'color' : 'black',
   'font-weight' : 'normal'});
	 
	 
	 
	 });
	 
	 
	 $("#year_yyyy").focus(function() {
	 
	 
	 $(this).css({
   'color' : 'black',
   'font-weight' : 'normal'});
	 
	 
	 
	 });
	 
	 
	 
	 $("#day_dd_until").focus(function() {
	 
	 
	 $(this).css({
   'color' : 'black',
   'font-weight' : 'normal'});
	 
	 
	 
	 });
	 
	 
	 $("#year_yyyy_until").focus(function() {
	 
	 
	 $(this).css({
   'color' : 'black',
   'font-weight' : 'normal'});
	 
	 
	 
	 });
    
        
        
    
        
 $("#hour_hh").focus(function() {
	 
	 
	 $(this).css({
   'color' : 'black',
   'font-weight' : 'normal'});
	 
	 
	 
	 });
	 
	 
	 $("#minute_mm").focus(function() {
	 
	 
	 $(this).css({
   'color' : 'black',
   'font-weight' : 'normal'});
	 
	 
	 
	 });
	 	 
	 
	 
	 

	    
    
     $("#multidaycheck").click(function() {
  
  
  
  if ($('#radius_multi_day_event').is(':checked')) {
	  
	  $( "#eventdatewrap_until" ).show();
	  
	  $( "#hidetime" ).hide();
	  
	   $('#hour_hh').val('');
	  
	  $('#minute_mm').val('');

        
        
  
  }    
  
  
  else if (!$('#radius_multi_day_event').is(':checked')) {
	  
	  $( "#eventdatewrap_until" ).hide();
	  
	  $( "#hidetime" ).show();
	  
	  $('#month_mm_until').val('-1');
	  
	  $('#day_dd_until').val('');
	  
	  $('#year_yyyy_until').val('');
	  
	  
	  
	  

  
  }    
       
    

});
  
  
  });





  

		




	
	</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	
	 } 
	
	
/* Do something with the data entered */






function save_utradiusdateurl( $post_id )
{
	global $post; 
	
    if ($post->post_type != 'ut_radius_event_type'){
        return;
    }
	
	
	
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    // if( !isset( $_POST['ut_utradiusdate_nonce'] ) || !wp_verify_nonce( $_POST['ut_utradiusdate_nonce'], 'ut_utradiusdate_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    // if( !current_user_can( 'edit_post' ) ) return;
    
    
    
    
    if ($_POST['month_mm'] == '-1')  {
	    
	    
	    update_post_meta( $post_id, 'utradiusdate_month', 'minusone' );
	    
	    
	    }
	    
	    
	    
	    else {
		  
		  
		  
		  		update_post_meta( $post_id, 'utradiusdate_month', $_POST['month_mm'] );  }
		  		
		  		
		  		
		  			if ($_POST['month_mm'] === '-1' && ctype_digit($_POST['day_dd']) && $_POST['day_dd'] < 32 ) {
			  			
			  			update_post_meta( $post_id, 'utradiusdate_day', $_POST['day_dd'] );
			  			
		  			}
		  		
		  		
		  		
		  
		  
		  			else if ((
		  			
		  			
		  			$_POST['month_mm'] === '01' OR 
		  			$_POST['month_mm'] === '03' OR
		  			$_POST['month_mm'] === '05' OR
		  			$_POST['month_mm'] === '07' OR
		  			$_POST['month_mm'] === '08' OR
		  			$_POST['month_mm'] === '10' OR
		  			$_POST['month_mm'] === '12') && ctype_digit($_POST['day_dd']) && $_POST['day_dd'] > 0 && $_POST['day_dd'] < 32   )  {
			  			
			  			
			  			$continuewithdate = 'yes';
			  			
			  			update_post_meta( $post_id, 'utradiusdate_day', $_POST['day_dd'] );
			  			

			  			
			  			
			  			}
			  			
			  			
			  			
			  		else if (
			  		
			  		($_POST['month_mm'] === '04' OR 
		  			$_POST['month_mm'] === '06' OR
		  			$_POST['month_mm'] === '09' OR
		  			$_POST['month_mm'] === '11') && ctype_digit($_POST['day_dd']) && $_POST['day_dd'] > 0 && $_POST['day_dd'] < 31   )  {
			  			
			  			
			  			$continuewithdate = 'yes';
			  			
			  			update_post_meta( $post_id, 'utradiusdate_day', $_POST['day_dd'] );
			  			

			  			
			  			
			  			}
			  			
			  			
			  			else if ($_POST['month_mm'] == '02' && ctype_digit($_POST['day_dd']) && $_POST['day_dd'] > 0 && $_POST['day_dd'] < 30   )  {
			  			
			  			
			  			$continuewithdate = 'yes';
			  			
			  			update_post_meta( $post_id, 'utradiusdate_day', $_POST['day_dd'] );
			  			

			  			
			  			
			  			}
			  			
			  			
			  			else {
				  			
				  			update_post_meta( $post_id, 'utradiusdate_day', 'DD' );
				  			
			  			}
			  			
			  			
			  			if (ctype_digit($_POST['year_yyyy']) && $_POST['year_yyyy'] > 2014) {
					  			
					  				update_post_meta( $post_id, 'utradiusdate_year', $_POST['year_yyyy'] );
					  			
					  			
					  			
				  			}
				  			
				  			
				  			else {
					  			
					  			update_post_meta( $post_id, 'utradiusdate_year', 'YYYY' );
					  			
					  			
				  			}


    
  
  
  if ($_POST['radius_multi_day_event'] !== 'yes' ) {
	  
	  
	  			  			update_post_meta( $post_id, 'utradiusdatemultiday', '' );
			  				update_post_meta( $post_id, 'utradiusdate_month_until', '' );
			  				update_post_meta( $post_id, 'utradiusdate_day_until', '' );
			  				update_post_meta( $post_id, 'utradiusdate_year_until', '' );
			  		
			  						  			
				  			
				  			
				  							  			
				  			
				  			
				  			
				  			if (
				  			
				  			
				  			(($_POST['hour_hh'] === '00') OR
				  			 ($_POST['hour_hh'] === '01') OR
				  			 ($_POST['hour_hh'] === '02') OR
				  			 ($_POST['hour_hh'] === '03') OR
				  			 ($_POST['hour_hh'] === '04') OR
				  			 ($_POST['hour_hh'] === '05') OR
				  			 ($_POST['hour_hh'] === '06') OR
				  			 ($_POST['hour_hh'] === '07') OR
				  			 ($_POST['hour_hh'] === '08') OR
				  			 ($_POST['hour_hh'] === '09')) 
				  			 
				  			 
				  			 OR
				  			
				  						  			
				  			 ( ctype_digit($_POST['hour_hh']) && $_POST['hour_hh'] > 9 && $_POST['hour_hh'] < 24)) {
					  			
					  				
					  				update_post_meta( $post_id, 'utradiusdate_hour', $_POST['hour_hh'] );					  			
					  			
				  			}
				  			
				  			
				  			else {
					  			
					  			update_post_meta( $post_id, 'utradiusdate_hour', 'hh' );
					  			
				  			}
				  			
				  			
				  			
				  			if (
				  			
				  			
				  			(($_POST['minute_mm'] === '00') OR
				  			 ($_POST['minute_mm'] === '01') OR
				  			 ($_POST['minute_mm'] === '02') OR
				  			 ($_POST['minute_mm'] === '03') OR
				  			 ($_POST['minute_mm'] === '04') OR
				  			 ($_POST['minute_mm'] === '05') OR
				  			 ($_POST['minute_mm'] === '06') OR
				  			 ($_POST['minute_mm'] === '07') OR
				  			 ($_POST['minute_mm'] === '08') OR
				  			 ($_POST['minute_mm'] === '09')) 
				  			 
				  			 
				  			 OR
				  			
				  						  			
				  			 ( ctype_digit($_POST['minute_mm']) && $_POST['minute_mm'] > 9 && $_POST['minute_mm'] < 60)) {
					  			
					  				update_post_meta( $post_id, 'utradiusdate_minute', $_POST['minute_mm'] );
					  			
					  			
					  			
				  			}
				  			
				  			else {
					  			
					  			update_post_meta( $post_id, 'utradiusdate_minute', 'mm' );
					  			
				  			}

				  			
		  
		  
	  }
	  
	  
	  
	  elseif ($_POST['radius_multi_day_event'] == 'yes' ) {
		  
		  
		  
		  
											  update_post_meta( $post_id, 'utradiusdatemultiday', 'yes' );
											  update_post_meta( $post_id, 'utradiusdate_hour', '' );
											  update_post_meta( $post_id, 'utradiusdate_minute', '' );
											  
											  
											   if ($_POST['month_mm_until'] == '-1')  {
										    
										    
										    update_post_meta( $post_id, 'utradiusdate_month_until', 'minusone' );
										    
										    
										    }
										    
										    
										    
										    else {
											  
											  
											  
											  		update_post_meta( $post_id, 'utradiusdate_month_until', $_POST['month_mm_until'] );  
											  		
											  		
											  		
											  		
											  		}
											  		
											  		
											  		
											  			if ($_POST['month_mm_until'] === '-1' && ctype_digit($_POST['day_dd_until']) && $_POST['day_dd_until'] < 32 ) {
												  			
												  			update_post_meta( $post_id, 'utradiusdate_day_until', $_POST['day_dd_until'] );
												  			
											  			}
											  
											  
											  			
											  
											  
											  
											  
											  			else if (($_POST['month_mm_until'] === '01' OR 
		  			$_POST['month_mm_until'] === '03' OR
		  			$_POST['month_mm_until'] === '05' OR
		  			$_POST['month_mm_until'] === '07' OR
		  			$_POST['month_mm_until'] === '08' OR
		  			$_POST['month_mm_until'] === '10' OR
		  			$_POST['month_mm_until'] === '12') && ctype_digit($_POST['day_dd_until']) && $_POST['day_dd_until'] > 0 && $_POST['day_dd_until'] < 32   )  {
												  			
												  			
												  			$continuewithdate = 'yes';
												  			
												  			update_post_meta( $post_id, 'utradiusdate_day_until', $_POST['day_dd_until'] );
												  			
									
												  			
												  			
												  			}
												  			
												  			
												  			
												  			
												  			
												  			
												  		else if (($_POST['month_mm_until'] === '04' OR
		  			$_POST['month_mm_until'] === '06' OR
		  			$_POST['month_mm_until'] === '09' OR
		  			$_POST['month_mm_until'] === '11') && ctype_digit($_POST['day_dd_until']) && $_POST['day_dd_until'] > 0 && $_POST['day_dd_until'] < 31   )  {
												  			
												  			
												  			$continuewithdate = 'yes';
												  			
												  			update_post_meta( $post_id, 'utradiusdate_day_until', $_POST['day_dd_until'] );
												  			
									
												  			
												  			
												  			}
												  			
												  			
												  			else if ($_POST['month_mm_until'] == '02' && ctype_digit($_POST['day_dd_until']) && $_POST['day_dd_until'] > 0 && $_POST['day_dd_until'] < 30   )  {
												  			
												  			
												  			$continuewithdate = 'yes';
												  			
												  			update_post_meta( $post_id, 'utradiusdate_day_until', $_POST['day_dd_until'] );
												  			
									
												  			
												  			
												  			}
												  			
												  			
												  			
												  			
												  			
												  			
												  			
												  			
												  			else {
													  			
													  			update_post_meta( $post_id, 'utradiusdate_day_until', 'DD' );
													  			
												  			}
												  			
												  			
												  			
												  			
												  			if ($_POST['year_yyyy_until'] == $_POST['year_yyyy'] && $_POST['month_mm_until'] == $_POST['month_mm'] && ctype_digit($_POST['day_dd_until']) && $_POST['day_dd_until'] <= $_POST['day_dd'] && $_POST['day_dd_until'] < 32   )  {
												  			
												  			
												  			$continuewithdate = 'yes';
												  			
												  			update_post_meta( $post_id, 'utradiusdate_day_until', 'DD' );
												  			
									
												  			
												  			
												  			}
												  			
												  			
												  			if ($_POST['year_yyyy_until'] == $_POST['year_yyyy'] && $_POST['month_mm_until'] < $_POST['month_mm']   )  {
												  			
												  			
												  			$continuewithdate = 'yes';
												  			
												  			update_post_meta( $post_id, 'utradiusdate_month_until', 'minusone' );
												  			
									
												  			
												  			
												  			}
												  			
												  			
												  			
												  			
												  			
												  			
												  			if (ctype_digit($_POST['year_yyyy_until']) && $_POST['year_yyyy_until'] >= $_POST['year_yyyy']) {
														  			
														  				update_post_meta( $post_id, 'utradiusdate_year_until', $_POST['year_yyyy_until'] );
														  			
														  			
														  			
													  			}
													  			
													  			
													  			else {
														  			
														  			update_post_meta( $post_id, 'utradiusdate_year_until', 'YYYY' );
														  			
														  			
													  			}
				  			
				  			
				  			}

		  
		  
		  else {
			  
			   update_post_meta( $post_id, 'utradiusdatemultiday', 'no' );
			  
		  }
		  
		  
		  
		  
		  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
  }
  
  
  
	 		
	 		
	 		
 	        
 
    
    
    
    







add_action( 'save_post', 'save_utradiusdateurl', 99 );





    
   















?><?php    
	
	
	
	
	// Register Custom Post Type
function ut_writer_page() {

	$labels = array(
		'name'                => _x( 'Writer Pages', 'Post Type General Name' ),
		'singular_name'       => _x( 'Writer Page', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Writer Page' ),
		'name_admin_bar'      => __( 'Writer Page'),
		'parent_item_colon'   => __( 'Parent Item:' ),
		'all_items'           => __( 'All Items'  ),
		'add_new_item'        => __( 'Add New Writer Page'  ),
		'add_new'             => __( 'Add New' ),
		'new_item'            => __( 'New Item' ),
		'edit_item'           => __( 'Edit Item' ),
		'update_item'         => __( 'Update Item' ),
		'view_item'           => __( 'View Item' ),
		'search_items'        => __( 'Search Item' ),
		'not_found'           => __( 'Not found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);
	$args = array(
		'label'               => __( 'ut_writer_page_type' ),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'custom-fields'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 10,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'slug' 				  => 'staff',
	);
	register_post_type( 'ut_writer_page_type', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ut_writer_page', 0 );






	
	
	
	
?><?php

function linkradiusevent_meta_box() {


    add_meta_box( 'tagsdiv-utlinkradiusevent', 'Link to Radius Event', 'utlinkradiusevent_meta_box', 'post', 'side', 'high' );

}


add_action('add_meta_boxes', 'linkradiusevent_meta_box');



add_action( 'wp_ajax_ajax_stuffie', 'my_ajax_stuffie');

function my_ajax_stuffie() {
  
    $ajax_post_id = $_POST['post_id'];
    
    $arraything = get_post_meta( $ajax_post_id, 'radiuseventid', false );
    
    if ($arraything !== "") { 
    
    

    
    
	
	$avoidids = reset($arraything);
	
	
	if(!empty($avoidids))  {
		
		
	
	$args = array(
	'post_type' => array('ut_radius_event_type'),
	'posts_per_page' => 25,
	'post_status' => 'publish',
	'post__in' =>  $avoidids, ); 
    
    
    // The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	echo $currentpostid;
	
	$thereissome = true;
	
	
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		
		
		
		
		echo '<li class="popular-category" style="list-style-type:none;">
		
		<label class="selectit">
				<input name="radiuseventid[]" type="checkbox"  value="' .get_the_ID(). '"  checked="checked" />
					
		
		
		' . get_the_title() . '</label></li>';
		
		
		
	}
	
	
	
} else {
	
}
/* Restore original Post Data */
wp_reset_postdata();
	
	
	
	
	
	
	
	
	}
	
	
	
	
	}
	
	
	
	
	
	
	
	
    
    
    $args = array(
	'post_type' => array('ut_radius_event_type'),
	'posts_per_page' => 25,
	'post_status' => 'publish',
	'post__not_in' =>  $avoidids,
	
	
	
); 
    
    
    // The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	echo $currentpostid;
	
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		
		
		
		
		echo '<li class="popular-category" style="list-style-type:none;">
		
		<label class="selectit">
				<input name="radiuseventid[]" type="checkbox"  value="' .get_the_ID(). '"  />
					
		
		
		' . get_the_title() . '</label></li>';
		
		
		
	}
	echo '<div id="moreevents"></div>';
	
	
} else {
	
}
/* Restore original Post Data */
wp_reset_postdata();
    
    
    
    
    
    
    
    
    
    
    die();
}






add_action( 'wp_ajax_ajax_stuffie_loadmore', 'my_ajax_stuffie_loadmore');

function my_ajax_stuffie_loadmore() {
  
    $ajax_post_id = $_POST['post_id'];
    
    $ajax_page_no = $_POST['page_no'];
    
    $arraything = get_post_meta( $ajax_post_id, 'radiuseventid', false );
    
    
    
    
    
	
	$avoidids = reset($arraything);
	
	
	
	
	
	
	
	
	
	
	
    
    
    $args = array(
	'post_type' => array('ut_radius_event_type'),
	'posts_per_page' => 25,
	'post_status' => 'publish',
	'post__not_in' =>  $avoidids,
	'paged' => $ajax_page_no,
	
	
	
); 
    
    
    // The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	echo $currentpostid;
	
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		
		
		
		
		echo '<li class="popular-category">
		
		<label class="selectit">
				<input name="radiuseventid[]" type="checkbox"  value="' .get_the_ID(). '"  />
					
		
		
		' . get_the_title() . '</label></li>';
		
		
		
	}
	
	
	
} else {
	
}
/* Restore original Post Data */
wp_reset_postdata();
    
    
    
    
    
    
    
    
    
    
    die();
}










/* Prints the taxonomy box content */
function utlinkradiusevent_meta_box($post) {

   
?>
  
  <div>
	  
 <?php echo '<input type="hidden" name="ut_utlinkradiusevent_nonce" id="ut_utlinkradiusevent_nonce" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />'; 
	
	
	
	
	
	
	
	
	?>
	
	
		<div id="radiuseventslist">
			
			<div id="listofradiuspostsdiv" style="background: #fdfdfd; width: 100%; border: 1px solid #dfdfdf; max-height: 200px; overflow: auto;"><ul id="listofradiusposts" style="list-style-type: none; margin: 6px 12px 6px 12px; padding-top: 0px;" class="categorychecklist">
				
				
				
				
			</ul>
			
			<div id="loadmoreevents" class="fakedivlink" style="display: none; background: none; vertical-align: middle;" href="#">Load More Events<div id="loadmoreeventsgif" style="display: inline-block; visibility:hidden; padding: 0px 0px 0px 5px; vertical-align: middle;"><img src="<?php echo admin_url(); ?>/images/wpspin_light.gif" /></div></div>
			
			<input id="ajaxpagenumber" type="hidden" name="ajaxpagenumber" value="2">
			
			</div>
			
			
			
			
		</div>
	
	

  </div>

<?php
	
	
// better use get_current_screen(); or the global $current_screen
if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {

    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}

?>	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	
	 } 
	
	
/* Do something with the data entered */



add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
  
  
  .fakedivlink {
	  
	  
	  display: block; margin: 5px 0px 10px 12px; font-weight: 600; font-size: 13px; color: rgb(0, 115, 170); text-decoration: underline;
	  
	  cursor: pointer;
	  
	  -webkit-font-smoothing: subpixel-antialiased;
-webkit-transition-duration: 0.05s, 0.05s, 0.05s;
-webkit-transition-property: border, background, color;
-webkit-transition-timing-function: ease-in-out, ease-in-out, ease-in-out;

transition-duration: 0.05s, 0.05s, 0.05s;
transition-property: border, background, color;
transition-timing-function: ease-in-out, ease-in-out, ease-in-out;
	  
	  
	  }
	  
	  
	  .fakedivlink:hover {
		  
		  
		  
		 color: rgb(0, 160, 210);
		  
		  
		  }
  
          
      
      
    
  </style>';
}


function save_utlinkradiuseventurl( $post_id )
{
	global $post; 
	
    if ($post->post_type != 'post'){
        return;
    }
	
	
	
    // Bail if we're doing an auto save
    //if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    // if( !isset( $_POST['ut_utlinkradiusevent_nonce'] ) || !wp_verify_nonce( $_POST['ut_utlinkradiusevent_nonce'], 'ut_utlinkradiusevent_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    // if( !current_user_can( 'edit_post' ) ) return;
    
    
    if( isset( $_POST['radiuseventid'] ) )
  
			
			update_post_meta( $post_id, 'FUCK', 'CARLAISALESBIANNOTsssss' );
			
			
			$radiusids = $_POST['radiuseventid'];
			
			
			delete_post_meta( $post_id, 'radiuseventid', $radiusids );
			
			
			
			
			update_post_meta( $post_id, 'radiuseventid', $radiusids );
 		 		
 		 		
			
	 		
	 		
	 		
 	        
 
    
    
    
    
}






add_action( 'save_post', 'save_utlinkradiuseventurl', 99 );





    
   















?><?php

function utpostimageurl_meta_box() {


    add_meta_box( 'tagsdiv-utpostimage', 'Post Image', 'utpostimage_meta_box', 'post', 'side', 'high' );

}


add_action('add_meta_boxes', 'utpostimageurl_meta_box');

/* Prints the taxonomy box content */
function utpostimage_meta_box($post) {

   
?>
  
  <div>
	  
 <?php echo '<input type="hidden" name="ut_utpostimage_nonce" id="ut_utpostimage_nonce" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />'; ?>
	
	
	
	
	
	<div id="imageafterdisplay_column" style="width: 100%; background: none; margin: 10px 0px 0px 0px;<?php       
		
		
			
				$utpostimageurl = get_post_meta( $post->ID, "utpostimage_url", true );
					
					if ($utpostimageurl == ''){
						
						echo 'display: none;';
						
					}
					
					else {
						
						$isitblank_postimage = 'no';
						
					}
				
				
					
						
							
								
									?>">
		
		<img style="width: 100%;" src="<?php echo get_post_meta( $post->ID, "utpostimage_url", true ); ?>" />
		
		
		
	</div>
	
	<div id="imagebeforesave_column" style="width: 100%; background: none; margin: 10px 0px 0px 0px; display: none;">
		
		<img id="postimageurladder" style="width: 100%;" src="" />
		
		
		
	</div>
	
	
	
	
	  
	  <input id="upload_postimage" type="hidden" type="text" size="36" name="utpostimage_url" value="<?php 
		  
		  
		  
		  
		  echo $utpostimageurl; ?>" />
<input class="button" id="upload_postimage_button" type="button" value="Upload Post Image" style="margin-top: 8px;"/>


<input class="button" id="upload_postimage_button_clear" type="button" value="Delete" <?php
	
	if ( $isitblank_postimage != 'no' ) {
		
		echo 'disabled="disabled"';
		
		
		
	}
	
	
	
	
	
	?> style="margin-top: 8px;"/>


</div>

<div class="fieldinmeta" style="margin: 12px 0px 5px 0px;">
 <select name="utpostimage_position" class='postform' >
		   
		   

		<option class="level-0" value="landscaperight" <?php
if ( get_post_meta($post->ID, 'utpostimage_position', true) == 'landscaperight' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Landscape right</option>
	<option class="level-0" value="landscapeabove" <?php
if ( get_post_meta($post->ID, 'utpostimage_position', true) == 'landscapeabove' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Landscape above</option>

<option class="level-0" value="portraitright" <?php
if ( get_post_meta($post->ID, 'utpostimage_position', true) == 'portraitright' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Portrait right</option>

<option class="level-0" value="smallportraitleft" <?php
if ( get_post_meta($post->ID, 'utpostimage_position', true) == 'smallportraitleft' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Small portrait left</option>

<option class="level-0" value="bigportraitleft" <?php
if ( get_post_meta($post->ID, 'utpostimage_position', true) == 'bigportraitleft' ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Big portrait left</option>



</select>

<div class="howto">Select orientation and position of image</div>


</div>


<div class="fieldinmeta" ><label for="utpostimage_credit" style="display: block; margin-top: 8px;">Credit:</label> <input type="text" name="utpostimage_credit" id="utpostimage_credit" value="<?php echo get_post_meta($post->ID, 'utpostimage_credit', true) ?>" /></div>

<div class="fieldinmeta"><label for="utpostimage_caption" style="display: block; margin-top: 8px;">Caption:</label> <textarea name="utpostimage_caption" id="utpostimage_caption" rows="3" style="width: 100%;"><?php echo get_post_meta($post->ID, 'utpostimage_caption', true) ?></textarea></div>





<?php
	
	
// better use get_current_screen(); or the global $current_screen
if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {

    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}

?><script type="text/javascript">

jQuery(document).ready( function( $ ) {
	
	
	
	
    $('.meta-box-sortables').sortable({
        disabled: true
    });

    $('.postbox .hndle').css('cursor', 'pointer');


    $('#upload_postimage_button').click(function() {
	    
		var frame;
		uploadID = jQuery(this).prev('input');
        formfield = $('#upload_postimage').attr('name');
        
        
        
        // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });
    
    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      
      
      
	  
	  uploadID.val(attachment.url);

       jQuery("#postimageurladder").attr("src", attachment.url);
       
      

        $( "#imageafterdisplay_column" ).hide();
        
        $( "#imagebeforesave_column" ).show();
        
        $("#upload_postimage_button_clear").removeAttr("disabled");
          
      
      });

    // Finally, open the modal on click
    frame.open();
  }); 
       
       
        
        
        
        
    
        
 

	    
    
     $("#upload_postimage_button_clear").click(function() {
  
  
  
  if (!$("#upload_postimage_button_clear").is(":disabled")) {
	  
	  $( "#imageafterdisplay_column" ).hide();
        
        $( "#imagebeforesave_column" ).hide();
        
        $('#upload_postimage').val('');
        
        
        
        
        $("#upload_postimage_button_clear").attr("disabled","disabled");
	  
  
  
  }    
       
    

});
  
  
  });





  

		




	
	</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	
	 } 
	
	
/* Do something with the data entered */






function save_utpostimageurl( $post_id )
{
	global $post; 
	
    if ($post->post_type != 'post'){
        return;
    }
	
	
	
    // Bail if we're doing an auto save
    //if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    // if( !isset( $_POST['ut_utpostimage_nonce'] ) || !wp_verify_nonce( $_POST['ut_utpostimage_nonce'], 'ut_utpostimage_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    // if( !current_user_can( 'edit_post' ) ) return;
    
    
    if( isset( $_POST['utpostimage_url'] ) )
  
  
 		 		$themeta = get_post_meta($post->ID, 'utpostimage_url', true);
 		 		

	 		
	 		update_post_meta( $post_id, 'utpostimage_url', $_POST['utpostimage_url'] );
	 		
	 		update_post_meta( $post_id, 'utpostimage_credit', $_POST['utpostimage_credit'] );
	 		
	 		update_post_meta( $post_id, 'utpostimage_caption', $_POST['utpostimage_caption'] );
	 		
	 		update_post_meta( $post_id, 'utpostimage_position', $_POST['utpostimage_position'] );
	 		
 	        
 
    
    
    
    
}






add_action( 'save_post', 'save_utpostimageurl', 99 );





    
   















?><?php
    
   
add_action('after_setup_theme', 'wpse65653_remove_formats', 100);
function wpse65653_remove_formats()
{
   remove_theme_support('post-formats');
}
    
    
    ?><?php  /* DON'T GO BELOW THIS */      ?><?php

add_action('admin_menu', 'add_global_custom_options'); 

function add_global_custom_options()
{

$page_title = 'Front Page Layout Chooser';
$menu_title = 'Front Page Layout';
$capability = 'manage_options';
$menu_slug = 'frontpagelayout';
$function = 'functionsfrontpage';
$icon_url = '';
$position = '6';


    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    
    }


?><?php  
	
	function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );
	
	
	
	 ?><?php
		 
		 
		 
		 
		 
		 
		 
		 ?><?php
function functionsfrontpage()
{
?>
    <div class="wrap">
        <h2>Front Page Layout Chooser</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p><strong>Front Page Layout:</strong><br />
            
            <?php 
            
           $layoutexcite = get_option('layoutid');
           
         
           
           ?>
           
           
           
            
            
            <select id="layoutid2" name="layoutid">                      
<option value="default" <?php if ($layoutexcite == "default") { echo 'selected'; }   ?> >Default Layout</option>




<option value="default1" <?php if ($layoutexcite == "default1") { echo 'selected'; }   ?>>Layout 1</option>


<option value="default2" <?php if ($layoutexcite == "default2") { echo 'selected'; }   ?>>Layout 2</option>

<option value="default3" <?php if ($layoutexcite == "default3") { echo 'selected'; }   ?>>Layout 3</option>



</select>
            
            
            
                
            </p>
            <p><input type="submit" name="Submit" value="Choose" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="layoutid" />
        </form>
    </div>
    
    
    
    
    
    
    
    
    
<?php
}
?>