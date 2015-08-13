<?php
/**
 * SHORTCODES options
 *
 * @package    ManyTipsTogether
 * @subpackage B5F_MTT_Admin
 */

$options_panel->OpenTab( 'shortcodes' );

$options_panel->Title( __( 'Shortcodes', 'mtt' ) );


$options_panel->addCheckbox( 
    'shortcodes_everywhere', 
    array(
        'name' => __( 'Enable shortcodes everywhere', 'mtt' ),
        'desc' => sprintf( __( 'In the text widget, excerpts, content and category/tag/taxonomy descriptions. Code by: %s', 'mtt' ), B5F_MTT_Utils::make_tip_credit( 'Thomas Scholz', 'https://github.com/toscho/WordPress-Shortcodes/' ) ),
        'std'  => false
    )
);


$tubedesc = '<div class="desc">' 
    . __( 'Usage:', 'mtt' ) 
        . ' <code>[poptube id="VIDEO-ID" title="TITLE-OVER-THUMBNAIL" color="#CCCF27" button="WATCH NOW"]</code>
            <div style="text-align:center;width:170px;margin:0 0 15px">
            <h2 style="color:#CCCF27;text-shadow:none;padding:0;margin-bottom:0;">' 
        . __( 'TITLE-OVER', 'mtt' ) 
        . '</h2>
            <a href="http://www.youtube.com/watch_popup?v=s-c_urzTWYQ" target="_blank">
            <img src="http://i3.ytimg.com/vi/s-c_urzTWYQ/default.jpg" alt="youtube thumbnail" style="margin-bottom:-19px"/>
            </a><br />
            <a class="button-secondary" href="http://www.youtube.com/watch_popup?v=s-c_urzTWYQ" target="_blank">' 
        . __( 'WATCH NOW', 'mtt' ) 
        . '</a></div>' 
        . __( 'The "color" attribute is for the title.<br />
            This is the default backend style, for adpating it in your theme 
            use the class "mtt-poptube" for the elements', 'mtt' ) 
        . ' <em>&lt;h2&gt;</em>, <em>&lt;img&gt;</em> ' 
        . __( 'and', 'mtt' ) . ' <em>&lt;a&gt;</em></div>';

$options_panel->addCheckbox( 'shortcodes_tube', array(
    'name' => __( 'Enable YouTube shortcode', 'mtt' ),
    'desc' => $tubedesc,
    'std'  => false
        )
);


$options_panel->addCheckbox( 
    'shortcodes_gdocs',
    array(
        'name' => __('Enable Google Docs Preview Document shortcode', 'mtt'),
        'desc' => __('Use Google Docs for preview PDF, Word, Excel docuemtns online. <a href="http://docs.google.com/viewer?url=partners.adobe.com/public/developer/en/xml/AdobeXMLFormsSamples.pdf" target="_blank">Example</a>.<br />Usage: <code>[gdocs url="http://www.domain.com/document.pdf" class="my-doc-class"]View Document[/gdocs]</code>', 'mtt'),
         'std' => false
    )
);


$options_panel->CloseTab();