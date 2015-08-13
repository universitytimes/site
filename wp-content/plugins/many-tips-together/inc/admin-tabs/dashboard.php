<?php
/**
 * DASHBOARD options
 *
 * @package    ManyTipsTogether
 * @subpackage B5F_MTT_Admin
 */

$options_panel->OpenTab( 'dashboard' );

$options_panel->Title( __( 'Dashboard', 'mtt' ) );

$options_panel->addParagraph( sprintf( '<hr /><h4>%s</h4>', __( 'REMOVE DASHBOARD WIDGETS', 'mtt' ) ) );

$options_panel->addCheckboxList( 'dashboard_remove', array(
    'quick_press'     => __( 'QuickPress', 'mtt' ),
    'incoming_links'  => __( 'Incoming Links', 'mtt' ),
    'right_now'       => __( 'Right now', 'mtt' ),
    'plugins'         => __( 'Plugins', 'mtt' ),
    'recent_drafts'   => __( 'Recent Drafts', 'mtt' ),
    'recent_comments' => __( 'Recent Comments', 'mtt' ),
    'primary'         => __( 'WordPress Blog', 'mtt' ),
    'secondary'       => __( 'Other WordPress News', 'mtt' ),
    'welcome'         => __( 'Welcome Panel', 'mtt' ),
        ), array(
    'name' => __( 'Remove default items', 'mtt' ),
    'desc' => __( '<code>WordPress Blog</code> and <code>Other WP News</code> titles and feed addresses can be configured in the widget itself.', 'mtt' ),
    'class' => 'no-toggle',                
    'std'  => false
        )
);


$options_panel->addParagraph( sprintf( '<hr /><h4>%s</h4>', __( 'CUSTOMIZE RIGHT NOW WIDGET', 'mtt' ) ) );

$options_panel->addCheckbox( 'dashboard_add_cpt_enable', array(
    'name' => __( 'Add Custom Post Types to Right Now Widget', 'mtt' ),
    'desc' => sprintf( __( 'Tip via: %s', 'mtt' ), B5F_MTT_Utils::make_tip_credit( 'WordPress Answers', 'http://wordpress.stackexchange.com/q/1567/12615' ) ),
    'std'  => false
        )
);

$options_panel->addCheckbox( 'dashboard_remove_footer_rightnow', array(
    'name' => __( 'Hide the footer of Right Now widget', 'mtt' ),
    'desc' => '',
    'std'  => false
        )
);


$options_panel->addParagraph( sprintf( '<hr /><h4>%s</h4>', __( 'ADD CUSTOM WIDGETS', 'mtt' ) ) );
$repeater_fields[] = $options_panel->addText( 'title', array( 
	'name' => __( 'Title', 'mtt' ) 
	), true 
);
$repeater_fields[] = $options_panel->addTextarea( 'content', array(
	'name' => __( 'Content ', 'mtt' ) 
	), true 
);
$repeater_fields[] = $options_panel->addRoles('roles', 
		array('type' => 'checkbox_list'), 
		array( 
			'name'=> __('Show to roles','apc'), 
			'class' => 'no-fancy',
			'desc'  => __( 'Leave empty to show to all.', 'mtt' )
			), 
			
		true
);

$repeater_fields[] = $options_panel->addCheckbox( 'enabled', array(
	'name'=> __( 'Enable this widget', 'mtt' )
	),true
);

$options_panel->addRepeaterBlock( 'dashboard_add_widgets', array( 
	'sortable'	 => true, 
	'inline'	 => false,
	'name'		 => __( 'Custom widgets', 'mtt' ), 
	'fields'	 => $repeater_fields,
	'desc'		 => __( 'Add as many as you want.', 'mtt' )
));


$options_panel->addParagraph( sprintf( '<hr /><h4>%s</h4>', __( 'EXTRA WIDGETS', 'mtt' ) ) );
$options_panel->addCheckboxList( 
    'dashboard_folder_size', 
    array(
        'root'     => __( 'Root', 'mtt' ),
        'wpcontent'  => __( 'WP Content', 'mtt' )
    ), 
    array(
        'name' => __( 'Calculate Folders Size', 'mtt' ),
        'desc' => __( 'The root calculation is usefull when WP is installed at the root of the server.', 'mtt' ),
        'class' => 'no-toggle',                
        'std'  => false
    )
);

$options_panel->CloseTab();