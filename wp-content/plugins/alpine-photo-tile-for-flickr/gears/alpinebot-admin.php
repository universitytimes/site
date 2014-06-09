<?php
/**
 *  AlpineBot Seconday
 * 
 *  ADMIN Functions
 *  Contains ONLY UNIVERSAL ADMIN functions
 * 
 */
class PhotoTileForFlickrAdminSecondary extends PhotoTileForFlickrPrimary{     

//////////////////////////////////////////////////////////////////////////////////////
/////////////////////////      Update Functions       ////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
/**
 * Options Simple Update for Admin Page
 *  
 * @since 1.2.0
 *
 */
  function admin_simple_update( $currenttab, $newoptions, $oldoptions ){
    $options = $this->option_defaults();
    $bytab = $this->admin_get_options_by_tab( $currenttab );
    foreach( $bytab as $id){
      $new = (isset($newoptions[$id])?$newoptions[$id]:'');
      $old = (isset($oldoptions[$id])?$oldoptions[$id]:'');
      $opt = (isset($options[$id])?$options[$id]:'');
      $oldoptions[$id] = $this->MenuOptionsValidate( $new, $old, $opt ); // Make changes to existing options array
    }
    update_option( $this->get_private('settings'), $oldoptions);
    return $oldoptions;
  }  
  
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////      Admin Option Functions      //////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
/**
 *  Create array of option names for a given tab
 *  
 *  @ Since 1.2.0
 */
  function admin_get_options_by_tab( $tab = 'generator' ){
    $default_options = $this->option_defaults();
    $return = array();
    foreach($default_options as $key => $val){
      if( $val['tab'] == $tab ){
        $return[$key] = $key;
      }
    }
    return $return;
  }
/**
 *  Create array of option names and current values for a given tab
 *  
 *  @ Since 1.2.0
 */
  function admin_get_settings_by_tab( $tab = 'generator' ){
    $current = $this->get_all_options();
    $default_options = $this->option_defaults();
    $return = array();
    foreach($default_options as $key => $val){
      if( $val['tab'] == $tab ){
        $return[$key] = $current[$key];
      }
    }
    return $return;
  }
/**
 *  Create array of positions for a given tab along with a list of settings for each position
 *  
 *  @ Since 1.2.0
 *  @ Updated 1.2.3
 */
  function get_option_positions_by_tab( $tab = 'generator' ){
    $positions = $this->admin_option_positions();
    $return = array();
    if( isset($positions[$tab]) ){
      $options = $this->admin_get_options_by_tab( $tab );
      $defaults = $this->option_defaults();
      
      foreach($positions[$tab] as $pos => $info ){
        $return[$pos]['title'] = (isset($info['title'])?$info['title']:'');
        $return[$pos]['description'] = (isset($info['description'])?$info['description']:'');
        $return[$pos]['options'] = array();
      }
      foreach($options as $name){
        $pos = (isset($defaults[$name]['position'])?$defaults[$name]['position']:'none');
        $return[ $pos ]['options'][] = $name;
      }
    }
    return $return;
  }
/**
 *  Create array of positions for each widget along with a list of settings for each position
 *  
 *  @ Since 1.2.0
 */
  function admin_get_widget_options_by_position(){
    $default_options = $this->option_defaults();
    $positions = $this->admin_widget_positions();
    $return = array();
    foreach($positions as $key => $val ){
      $return[$key]['title'] = $val;
      $return[$key]['options'] = array();
    }
    foreach($default_options as $key => $val){
      if(!empty($val['widget'])){
        $return[ $val['position'] ]['options'][] = $key;
      }
    }
    return $return; 
  }
  
//////////////////////////////////////////////////////////////////////////////////////
///////////////////////      Admin Page Functions       //////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////  

/**
 * Create shortcode based on given options
 *  
 * @ Since 1.1.0
 * @ Update 1.2.5
 */
  function admin_generate_shortcode( $options, $optiondetails ){
    $short = '['.$this->get_private('short');
    $trigger = '';
    foreach( $options as $key=>$value ){
      if($value && isset($optiondetails[$key]['short'])){
        if( isset($optiondetails[$key]['child']) && isset($optiondetails[$key]['hidden']) ){
          $hidden = @explode(' ',$optiondetails[$key]['hidden']);
          if( !in_array( $options[ $optiondetails[$key]['child'] ] ,$hidden) ){
            $short .= ' '.$optiondetails[$key]['short'].'="'.$value.'"';
          }
        }else{
          $short .= ' '.$optiondetails[$key]['short'].'="'.$value.'"';
        }
      }
    }
    $short .= ']';
    
    return $short;
  }
/**
 * Define Settings Page Tab Markup
 *  
 * @since 1.1.0
 * @link`http://www.onedesigns.com/tutorials/separate-multiple-theme-options-pages-using-tabs	Daniel Tara
 *
 */
  function admin_options_page_tabs( $current = 'general' ) {
    $tabs = $this->admin_settings_page_tabs();
    $links = array();
    
    foreach( $tabs as $tab ){
      $tabname = $tab['name'];
      $tabtitle = $tab['title'];
      if( $tabname == $current ){
          $links[] = '<a class="nav-tab nav-tab-active" href="?page='.$this->get_private('settings').'&tab='.$tabname.'">'.$tabtitle.'</a>';
      }else{
          $links[] = '<a class="nav-tab" href="?page='.$this->get_private('settings').'&tab='.$tabname.'">'.$tabtitle.'</a>';
      }
    }

    echo '<div class="AlpinePhotoTiles-title"><div class="icon32 icon-alpine"><br></div><h2>'.$this->get_private('name').'</h2></div>';
    echo '<div class="AlpinePhotoTiles-menu"><h2 class="nav-tab-wrapper">';
    foreach ( $links as $link ){
      echo $link;
    }
    echo '</h2></div>';
  }
/**
 * Function for printing general settings page
 *  
 * @ Since 1.2.0
 * @ Updated 1.2.4
 */
  function admin_display_general(){ 
    ?>
      <h3><?php _e("Thank you for downloading the "); echo $this->get_private('name'); _e(", a WordPress plugin by the Alpine Press.");?></h3>
      <?php if( $this->check_private('termsofservice') ) {
        echo '<p>'.$this->get_private('termsofservice').'</p>';
      }?>
      <p><?php _e("On the 'Shortcode Generator' tab you will find an easy to use interface that will help you create shortcodes. These shortcodes make it simple to insert the PhotoTile plugin into posts and pages.");?></p>
      <p><?php _e("The 'Plugin Settings' tab provides additional back-end options.");?></p>
      <p><?php _e("Finally, I am a one man programming team and so if you notice any errors or places for improvement, please let me know."); ?></p>
      <p><?php _e('If you liked this plugin, try out some of the other plugins by ') ?><a href="http://thealpinepress.com/category/plugins/" target="_blank">the Alpine Press</a>.</p>
      <br>
      <h3><?php _e('Try the other free plugins in the Alpine PhotoTile Series:');?></h3>
      <?php 
      if( $this->check_private('plugins') && is_array( $this->get_private('plugins') ) ){
        foreach($this->get_private('plugins') as $each){
          ?><a href="http://wordpress.org/extend/plugins/alpine-photo-tile-for-<?php echo $each;?>/" target="_blank"><img class="image-icon" src="<?php echo $this->get_private('url');?>/css/images/for-<?php echo $each;?>.png" style="width:100px;"></a><?php
        }
      }?>
    <?php
  }
/**
 * Function displays donation request
 *  
 * @ Since 1.2.4
 * @ Updated 1.2.5
 */
  function admin_donate_button(){
    $phrases = array('Pocket change is appreciated.','Buy me a cup of tea?','Help me pay my rent?','You tip your waiter. Why not your WordPress developer?','You tip the pizza deliver boy. Why not your WordPress programmer?');
    ?>
    <div>
      <p>Please support further development of this plugin with a small  <a target="_blank" href="<?php echo $this->get_private('donatelink');?>" title="Donate">donation</a>.
      <br><?php echo $phrases[rand(0,count($phrases)-1)];?></p>
      <p>
        <a target="_blank" href="<?php echo $this->get_private('donatelink');?>" title="Donate">
        <img class="image-icon" src="<?php echo $this->get_private('url');?>/css/images/paypal_donate.png" style="width:150px;">
        </a>
      </p>
    </div>
    <?php
  }
/**
 * First function for printing options page
 *  
 * @ Since 1.1.0
 * @ Updated 1.2.4
 *
 */
  function admin_setup_options_form($currenttab){
    $options = $this->get_all_options();     
    $settings_section = $this->get_private('id'). '_' . $currenttab . '_tab';
    $submitted = ( ( isset($_POST[ "hidden" ]) && ($_POST[ "hidden" ]=="Y") ) ? true : false );

    if( $submitted ){
      $options = $this->admin_simple_update( $currenttab, $_POST, $options );
    }

    $buttom = (isset($_POST[$this->get_private('settings').'_'.$currenttab]['submit-'.$currenttab])?$_POST[$this->get_private('settings').'_'.$currenttab]['submit-'.$currenttab]:'');
    if( $buttom == 'Delete Current Cache' ){
      $bot = new PhotoTileForFlickrBot();
      $bot->clearAllCache();
      echo '<div class="announcement">'.__("Cache Cleared").'</div>';
    }
    elseif( $buttom == 'Save Settings' ){
      $bot = new PhotoTileForFlickrBot();
      $bot->clearAllCache();
      echo '<div class="announcement">'.__("Settings Saved").'</div>';
    }
    echo '<form action="" method="post">';
      echo '<input type="hidden" name="hidden" value="Y">';
      $this->admin_display_opt_form($options,$currenttab);
      echo '<div class="AlpinePhotoTiles-breakline"></div>';
    echo '</form>';

  }
/**
 * Second function for printing options page
 *  
 * @ Since 1.1.0
 * @ Updated 1.2.5
 *
 */
  function admin_display_opt_form($options,$currenttab){

    $defaults = $this->option_defaults();
    $positions = $this->get_option_positions_by_tab( $currenttab );
    $submitted = ( ( isset($_POST[ "hidden" ]) && ($_POST[ "hidden" ]=="Y") ) ? true : false );
    
    if( 'generator' == $currenttab ) { 
      $preview = (isset($_POST[ $this->get_private('settings').'_preview']['submit-preview']) && $_POST[ $this->get_private('settings').'_preview']['submit-preview'] == 'Preview')?true:false;
      if( $submitted && isset($_POST['shortcode']) && $preview ){
        $short = str_replace('\"','"',$_POST['shortcode']);
      }elseif( $submitted ){
        $short = $this->admin_generate_shortcode( $_POST, $defaults );
      }
      ?>
      <div>
        <h3>This tool allows you to create shortcodes for the Alpine PhotoTile plugin.</h3>
        <p>A shortcode is a line of text that tells WordPress how to load a plugin inside the content of a page or post. Rather than explaining how to put together a shortcode, this tool will create the shortcode for you.</p>
      </div>
      <?php       
      if( !empty($short) ){
        ?>
        <div id="<?php echo $this->get_private('settings');?>-shortcode" style="position:relative;clear:both;margin-bottom:20px;" ><div class="announcement" style="margin:0 0 10px 0;">
          Now, copy (Crtl+C) and paste (Crtl+V) the following shortcode into a page or post. Or preview using the button below.</div>
          <div class="AlpinePhotoTiles-preview" style="border-bottom: 1px solid #DDDDDD;">
            <input type="hidden" name="hidden" value="Y">
            <textarea id="shortcode" class="auto_select" name="shortcode" style="margin-bottom:20px;"><?php echo $short;?></textarea>
            <input name="<?php echo $this->get_private('settings');?>_preview[submit-preview]" type="submit" class="button-primary" value="Preview" />
            <br style="clear:both">
          </div>
        </div>
        <?php 

        
        if( $submitted && isset($_POST['shortcode']) && $preview ){       
          echo '<div style="border-bottom: 1px solid #DDDDDD;padding-bottom:10px;margin-bottom:40px;">';
          echo do_shortcode($short);
          echo '</div>';
        }
      }
      echo '<input name="'. $this->get_private('settings').'_'.$currenttab .'[submit-'. $currenttab .']" type="submit" class="button-primary topbutton" value="Generate Shortcode" /><br> ';
    }
    if( !empty($positions) && count($positions) ){
      foreach( $positions as $position=>$positionsinfo){
        echo '<div class="'. $position .'">'; 
          if( !empty($positionsinfo['title']) ){ echo '<h4>'. $positionsinfo['title'].'</h4>'; } 
          if( !empty($positionsinfo['description']) ){ echo '<div style="margin-bottom:15px;"><span class="description" >'. $positionsinfo['description'].'</span></div>'; } 
          echo '<table class="form-table">';
            echo '<tbody>';
              if( !empty($positionsinfo['options']) && count($positionsinfo['options']) ){
                foreach( $positionsinfo['options'] as $optionname ){
                  $option = $defaults[$optionname];
                  $fieldname = ( $option['name'] );
                  $fieldid = ( $option['name'] );

                  if( !empty($option['hidden-option']) && !empty($option['check']) ){
                    $show = $this->get_option( $option['check'] );
                    if( !$show ){ continue; }
                  }
                  
                  if(isset($option['parent'])){
                    $class = $option['parent'];
                  }elseif(isset($option['child'])){
                    $class =($option['child']);
                  }else{
                    $class = ('unlinked');
                  }
                  $trigger = (isset($option['trigger'])?('data-trigger="'.(($option['trigger'])).'"'):'');
                  $hidden = (isset($option['hidden'])?' '.$option['hidden']:'');
                  
                  if( 'generator' == $currenttab ){                  
                    echo '<tr valign="top"> <td class="'.$class.' '.$hidden.'" '.$trigger.'>';
                      $this->MenuDisplayCallback($options,$option,$fieldname,$fieldid);
                    echo '</td></tr>';   
                  }else{
                    echo '<tr valign="top"><td class="'.$class.' '.$hidden.'" '.$trigger.'>';
                      $this->AdminDisplayCallback($options,$option,$fieldname,$fieldid);
                    echo '</td></tr>';   
                  }       
                }
              }
            echo '</tbody>';
          echo '</table>';
        echo '</div>';
      }
    }
    
    if( 'generator' == $currenttab ) {
      echo '<input name="'.$this->get_private('settings').'_'.$currenttab .'[submit-'. $currenttab.']" type="submit" class="button-primary" value="Generate Shortcode" />';
    }elseif( 'plugin-settings' == $currenttab ){
      echo '<input name="'.$this->get_private('settings').'_'.$currenttab .'[submit-'. $currenttab.']" type="submit" class="button-primary" value="Save Settings" />';
      echo '<input name="'.$this->get_private('settings').'_'.$currenttab .'[submit-'. $currenttab.']" type="submit" class="button-primary" style="margin-top:15px;" value="Delete Current Cache" />';
    }
  }
    
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////      Menu Display Functions       /////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////  
/**
  * Function for displaying forms in the widget page
  *
  *  @ Since 1.0.0
  *  @ Updated 1.2.5
  */
  function MenuDisplayCallback($options,$option,$fieldname,$fieldid){
    $default = (isset($option['default'])?$option['default']:'');
    $optionname = (isset($option['name'])?$option['name']:'');
    $optiontitle = (isset($option['title'])?$option['title']:'');
    $optiondescription = (isset($option['description'])?$option['description']:'');
    $fieldtype = (isset($option['type'])?$option['type']:'');
    $value = ( isset($options[$optionname]) ? $options[$optionname] : $default );
    
     // Output checkbox form field markup
    if ( 'checkbox' == $fieldtype ) {
      ?>
      <input type="checkbox" id="<?php echo $fieldid; ?>" name="<?php echo $fieldname; ?>" value="1" <?php checked( $value ); ?> />
      <label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label>
      <span class="description"><?php echo $optiondescription; ?></span>
      <?php
    }
    // Output radio button form field markup
    else if ( 'radio' == $fieldtype ) {
      $valid_options = array();
      $valid_options = $option['valid_options'];
      ?><label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label><?php
      foreach ( $valid_options as $valid_option ) {
        ?>
        <input type="radio" name="<?php echo $fieldname; ?>" <?php checked( $valid_option['name'] == $value ); ?> value="<?php echo $valid_option['name']; ?>" />
        <span class="description"><?php echo $optiondescription; ?></span>
        <?php
      }
    }
    // Output select form field markup
    else if ( 'select' == $fieldtype ) {
      $valid_options = array();
      $valid_options = $option['valid_options']; 
      ?>
      <label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label>
        <select id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" >
        <?php 
        foreach ( $valid_options as $valid_option ) {
          ?>
          <option <?php selected( $valid_option['name'] == $value ); ?> value="<?php echo $valid_option['name']; ?>" ><?php echo $valid_option['title']; ?></option>
          <?php
        }
        ?>
        </select>
        <div class="description"><span class="description"><?php echo $optiondescription; ?></span></div>
      <?php
    } // Output select form field markup
    else if ( 'range' == $fieldtype ) {     
      ?>
      <label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label>
        <select id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" >
        <?php 
        for($i = $option['min'];$i <= $option['max']; $i++){
          ?>
          <option <?php selected( $i == $value ); ?> value="<?php echo $i; ?>" ><?php echo $i ?></option>
          <?php
        }
        ?>
        </select>
        <span class="description"><?php echo $optiondescription; ?></span>
      <?php
    } 
    // Output text input form field markup
    else if ( 'text' == $fieldtype ) {
      ?>
      <label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label>
      <input type="text" id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" value="<?php echo ( $value ); ?>" />
      <div class="description"><span class="description"><?php echo $optiondescription; ?></span></div>
      <?php
    } 
    else if ( 'textarea' == $fieldtype ) {
      ?>
      <label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label>
      <textarea id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" class="AlpinePhotoTiles_textarea" ><?php echo $value; ?></textarea><br>
      <span class="description"><?php echo (function_exists('esc_textarea')?esc_textarea( $optiondescription ):$optiondescription); ?></span>
      <?php
    }   
    else if ( 'color' == $fieldtype ) {
      $value = ($value?$value:$default);
      ?>    
      <label for="<?php echo $fieldid ?>">
      <input type="text" id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" class="AlpinePhotoTiles_color"  value="<?php echo ( $value ); ?>" /><span class="description"><?php echo $optiondescription; ?></span></label>
      <div id="<?php echo $fieldid; ?>_picker" class="AlpinePhotoTiles_color_picker" ></div>
      <?php
    }
  }

/**
 *  Function for displaying forms in the admin page
 *  
 *  @ Since 1.0.0
 *  @ Updated 1.2.5 
 */
  function AdminDisplayCallback($options,$option,$fieldname,$fieldid){
    $default = (isset($option['default'])?$option['default']:'');
    $optionname = (isset($option['name'])?$option['name']:'');
    $optiontitle = (isset($option['title'])?$option['title']:'');
    $optiondescription = (isset($option['description'])?$option['description']:'');
    $fieldtype = (isset($option['type'])?$option['type']:'');
    $value = ( isset($options[$optionname]) ? $options[$optionname] : $default );
    
     // Output checkbox form field markup
    if ( 'checkbox' == $fieldtype ) {
      ?>
      <div class="title"><label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label></div>
      <input type="checkbox" id="<?php echo $fieldid; ?>" name="<?php echo $fieldname; ?>" value="1" <?php checked( $value ); ?> />
      <div class="admin-description" ><?php echo $optiondescription; ?></div>
      <?php
    }
    // Output radio button form field markup
    else if ( 'radio' == $fieldtype ) {
      $valid_options = array();
      $valid_options = $option['valid_options'];
      ?><label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label><?php
      foreach ( $valid_options as $valid_option ) {
        ?>
        <input type="radio" name="<?php echo $fieldname; ?>" <?php checked( $valid_option['name'] == $value ); ?> value="<?php echo $valid_option['name']; ?>" />
        <span class="admin-description"><?php echo $optiondescription; ?></span>
        <?php
      }
    }
    // Output select form field markup
    else if ( 'select' == $fieldtype ) {
      $valid_options = array();
      $valid_options = $option['valid_options']; 
      ?>
      <label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label>
        <select id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" >
        <?php 
        foreach ( $valid_options as $valid_option ) {
          ?>
          <option <?php selected( $valid_option['name'] == $value ); ?> value="<?php echo $valid_option['name']; ?>" ><?php echo $valid_option['title']; ?></option>
          <?php
        }
        ?>
        </select>
        <div class="admin-description"><?php echo $optiondescription; ?></div>
      <?php
    } // Output select form field markup
    else if ( 'range' == $fieldtype ) {     
      ?>
      <label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label>
        <select id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" >
        <?php 
        for($i = $option['min'];$i <= $option['max']; $i++){
          ?>
          <option <?php selected( $i == $value ); ?> value="<?php echo $i; ?>" ><?php echo $i ?></option>
          <?php
        }
        ?>
        </select>
        <div class="admin-description"><?php echo $optiondescription; ?></div>
      <?php
    } 
    // Output text input form field markup
    else if ( 'text' == $fieldtype ) {
      ?>
      <div class="title"><label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label></div>
      <input type="text" id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" value="<?php echo ( $value ); ?>" />
      <div class="admin-description" style="width:50%;"><?php echo $optiondescription; ?></div>
      <?php
    } 
    else if ( 'textarea' == $fieldtype ) {
      ?>
      <label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label>
      <textarea id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" class="AlpinePhotoTiles_textarea" ><?php echo $value; ?></textarea><br>
      <span class="admin-description"><?php echo (function_exists('esc_textarea')?esc_textarea( $optiondescription ):$optiondescription); ?></span>
      <?php
    }   
    else if ( 'color' == $fieldtype ) {
      $value = ($value?$value:$default);
      ?>
      <div class="title"><label for="<?php echo $fieldid; ?>"><?php echo $optiontitle ?></label></div>
      <input type="text" id="<?php echo $fieldid ?>" name="<?php echo $fieldname; ?>" class="AlpinePhotoTiles_color"  value="<?php echo ( $value ); ?>" /><div class="admin-description" style="width:40%;"><?php echo $optiondescription; ?></div></label>
      <div id="<?php echo $fieldid; ?>_picker" class="AlpinePhotoTiles_color_picker" ></div>
      <?php
    }
  }

//////////////////////////////////////////////////////////////////////////////////////
////////////////////      Input Validation Functions       ///////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
/**
 * Options Validate Pseudo-Callback
 *
 * @ Since 1.0.0
 * @ Updated 1.2.3
 */
  function MenuOptionsValidate( $newinput, $oldinput, $optiondetails ) {
      $valid_input = $oldinput;
      $type = (isset($optiondetails['type'])?$optiondetails['type']:'');
      // Validate checkbox fields
      if ( 'checkbox' == $type ) {
        // If input value is set and is true, return true; otherwise return false
        $valid_input = ( ( isset( $newinput ) && true == $newinput ) ? true : false );
      }
      // Validate radio button fields
      else if ( 'radio' == $type ) {
        // Get the list of valid options
        $valid_options = $optiondetails['valid_options'];
        // Only update setting if input value is in the list of valid options
        $valid_input = ( array_key_exists( $newinput, $valid_options ) ? $newinput : $valid_input );
      }
      // Validate select fields
      else if ( 'select' == $type || 'select-trigger' == $type) {
        // Get the list of valid options
        $valid_options = $optiondetails['valid_options'];
        // Only update setting if input value is in the list of valid options
        $valid_input = ( (isset($newinput) && is_array($valid_options) && array_key_exists( $newinput, $valid_options )) ? $newinput : $valid_input );
      }
      else if ( 'range' == $type ) {
        // Only update setting if input value is in the list of valid options
        $max = (isset($optiondetails['max'])?$optiondetails['max']:100);
        $min = (isset($optiondetails['min'])?$optiondetails['min']:0);
        $valid_input = ( ($newinput>=$min && $newinput<=$max) ? $newinput : $valid_input );
      }    
      // Validate text input and textarea fields
      else if ( ( 'text' == $type || 'textarea' == $type || 'image-upload' == $type) ) {
        $valid_input = strip_tags( $newinput );
        $sanatize = (isset($optiondetails['sanitize'])?$optiondetails['sanitize']:'');
        // Validate no-HTML content
        // nospaces option offers additional filters
        if ( 'nospaces' == $sanatize ) {
          // Pass input data through the wp_filter_nohtml_kses filter
          $valid_input = wp_filter_nohtml_kses( $newinput );
          
          // Remove specified character(s)
          if( isset($optiondetails['remove']) ){
            if( is_array($optiondetails['remove']) ){
              foreach( $optiondetails['remove'] as $remove ){
                $valid_input = str_replace($remove,'',$valid_input);
              }
            }else{
              $valid_input = str_replace($optiondetails['remove'],'',$valid_input);
            }
          }
          // Switch or encode characters
          if( isset($optiondetails['encode']) && is_array( $optiondetails['encode'] ) ){
            foreach( $optiondetails['encode'] as $find=>$replace ){
              $valid_input = str_replace($find,$replace,$valid_input);
            }
          }
          // Replace spaces with provided character or just remove spaces
          if( isset($optiondetails['replace']) ){
            $valid_input = str_replace(array('  ',' '),$optiondetails['replace'],$valid_input);
          }else{
            $valid_input = str_replace(' ','',$valid_input);
          }
        }
        // Check if numeric
        if ( 'numeric' == $sanatize && is_numeric( wp_filter_nohtml_kses( $newinput ) ) ) {
          // Pass input data through the wp_filter_nohtml_kses filter
          $valid_input = wp_filter_nohtml_kses( $newinput );
          if( isset($optiondetails['min']) && $valid_input<$optiondetails['min']){
            $valid_input = $optiondetails['min'];
          }
          if( isset($optiondetails['max']) && $valid_input>$optiondetails['max']){
            $valid_input = $optiondetails['max'];
          }
        }
        if ( 'int' == $sanatize && is_numeric( wp_filter_nohtml_kses( $newinput ) ) ) {
          // Pass input data through the wp_filter_nohtml_kses filter
          $valid_input = round( wp_filter_nohtml_kses( $newinput ) );
          if( isset($optiondetails['min']) && $valid_input<$optiondetails['min']){
            $valid_input = $optiondetails['min'];
          }
          if( isset($optiondetails['max']) && $valid_input>$optiondetails['max']){
            $valid_input = $optiondetails['max'];
          }
        }
        if ( 'tag' == $sanatize ) {
          // Pass input data through the wp_filter_nohtml_kses filter
          $valid_input = wp_filter_nohtml_kses( $newinput );
          $valid_input = str_replace(' ','-',$valid_input);
        }            
        // Validate no-HTML content
        if ( 'nohtml' == $sanatize ) {
          // Pass input data through the wp_filter_nohtml_kses filter
          $valid_input = wp_filter_nohtml_kses( $newinput );
          $valid_input = str_replace(' ','',$valid_input);
        }
        // Validate HTML content
        if ( 'html' == $sanatize ) {
          // Pass input data through the wp_filter_kses filter using allowed post tags
          $valid_input = wp_kses_post($newinput );
        }
        // Validate URL address
        if( 'url' == $sanatize ){
          $valid_input = esc_url( $newinput );
        }
        // Validate URL address
        if( 'css' == $sanatize ){
          $valid_input = wp_htmledit_pre( stripslashes( $newinput ) );
        }      
      }else if( 'wp-textarea' == $type ){
          // Text area filter
          $valid_input = wp_kses_post( force_balance_tags($newinput) );
      }
      elseif( 'color' == $type ){
        $value =  wp_filter_nohtml_kses( $newinput );
        if( '#' == $value ){
          $valid_input = '';
        }else{
          $valid_input = $value;
        }
      }
      return $valid_input;
  }    

}  
/** ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *  ##############################################################################################################################################
 *
 *    AlpineBot
 * 
 *    ADMIN Functions
 *    Contains ONLY UNIQUE ADMIN functions
 * 
 * ##########################################################################################
 */
class PhotoTileForFlickrAdmin extends PhotoTileForFlickrAdminSecondary{

//////////////////////////////////////////////////////////////////////////////////////
////////////////////        Unique Admin Functions        ////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////    
  
 /**
   * Alpine PhotoTile: Options Page
   *
   * @ Since 1.1.1
   * @ Updated 1.2.4
   */
  function admin_build_settings_page(){
    $currenttab = isset( $_GET['tab'] )?$_GET['tab']:'general'; 
    
    echo '<div class="wrap AlpinePhotoTiles_settings_wrap">';
    $this->admin_options_page_tabs( $currenttab );

      echo '<div class="AlpinePhotoTiles-container '.$this->get_private('domain').'">';
        echo '<div class="AlpinePhotoTiles-'.$currenttab.'" style="position:relative;width:100%;">';
          if( 'general' == $currenttab ){
            $this->admin_display_general();
          }elseif( 'add' == $currenttab ){
            $this->admin_display_add();
          }else{
            $this->admin_setup_options_form($currenttab);
          }
        echo '</div>';
        
        echo '<div class="bottom" style="position:relative;width:100%;margin-top:20px;">';
          $this->admin_donate_button();
          echo '<div class="help-link"><p>'.__('Need Help? Visit ').'<a href="'.$this->get_private('info').'" target="_blank">the Alpine Press</a>'.__(' for more about this plugin.').'</p></div>';  
        echo '</div>';
      echo '</div>'; // Close Container

    echo '</div>'; // Close wrap
  }  
  
  
  function admin_add_key($key){
    $options = get_option( $this->get_private('settings') );
    $options['api_key'] = $key;
    update_option( $this->get_private('settings'), $options );
  }
  function admin_delete_key(){
    $options = get_option( $this->get_private('settings') );
    $options['api_key'] = 0;
    update_option( $this->get_private('settings'), $options );
  }
/**
 * Display add page
 *
 * @ Since 1.2.3
 *
 */
  function admin_display_add(){ 
    $currenttab = 'add';
    $options = $this->get_all_options();  

    $settings_section = $this->get_private('id') . '_'.$currenttab.'_tab';
    $submitted = ( ( isset($_POST[ "hidden" ]) && ($_POST[ "hidden" ]=="Y") ) ? true : false );
    $success = false;
    $errormessage = null;
    $errortype = null;
     
    // Check that key works
    if($submitted && !empty( $_POST['api_key']) ) {
      $key = $_POST['api_key'];

      $request = 'http://api.flickr.com/services/rest/?method=flickr.test.echo&format=php_serial&api_key='.$key;
      
      $response = wp_remote_get( $request );

      if(!is_wp_error($response) && isset($response['response']['code']) && $response['response']['code'] < 400 && $response['response']['code'] >= 200) {
        $echo = @unserialize($response['body']);
        if( $key == $echo['api_key']['_content'] ){
          $this->admin_add_key($key);
          $success = true;
        }elseif( $echo['stat'] == 'fail' ){
          $errormessage = ' '.$echo['message'].' ';
          $success = false;
        }else{
          $errormessage = 'API Key saved but not verified';
          $this->admin_add_key($key);
          $success = true;
        }
      }elseif( !is_wp_error($response) && isset($response['response']['code']) && $response['response']['code'] >= 400 ) {
        $error = unserialize($response['body']);
        $errormessage = $error->error;
      }elseif( is_wp_error($response) ){
        $errormessage = $response->get_error_message();
      }
    }elseif($submitted && isset($_POST[ $this->get_private('settings').'_add']['submit-add']) && $_POST[ $this->get_private('settings').'_add']['submit-add'] == 'Delete Your API Key'){
      $this->admin_delete_key();
      $delete = true;
    }

    if( !empty($success) ){
      echo '<div class="announcement"> API key verified and saved. </div>';
    }elseif( !empty($delete) ){
      echo '<div class="announcement"> API key deleted. </div>';
    }elseif( !empty($errormessage) ){
      echo '<div class="announcement"> An error occured ('.$errormessage.'). </div>';
    }

    $key = $this->get_option('api_key');
    if( !empty($key) ){
     echo '<h4>Thank you for adding an API Key</h4>'; 
     echo '<div id="AlpinePhotoTiles-user-form" style="margin-bottom:20px;padding-bottom:20px;overflow:hidden;border-bottom: 1px solid #DDDDDD;">'; 
      echo '<form id="'.$this->get_private('settings').'"-add-user" action="" method="post">';
      echo '<input type="hidden" name="hidden" value="Y">';
      echo '<input id="'.$this->get_private('settings').'-submit" name="'.$this->get_private('settings').'_'.$currenttab .'[submit-'. $currenttab.']" type="submit" class="button-primary" style="margin-top:15px;" value="Delete Your API Key" />';
      echo '</form>';
     echo '</div>';
      
    }else{
      $defaults = $this->option_defaults();
      $positions = $this->get_option_positions_by_tab( $currenttab );
        if( count($positions) ){
          foreach( $positions as $position=>$positionsinfo){
            echo '<div id="AlpinePhotoTiles-user-form" style="margin-bottom:20px;padding-bottom:20px;overflow:hidden;border-bottom: 1px solid #DDDDDD;">'; 

              ?>
              <form id="<?php echo $this->get_private('settings')."-add-user";?>" action="" method="post">
              <input type="hidden" name="hidden" value="Y">
                <?php 
              echo '<div class="'. $position .'">'; 
                if( !empty($positionsinfo['title']) ){ echo '<h4>'. $positionsinfo['title'].'</h4>'; } 
                echo '<table class="form-table">';
                  echo '<tbody>';
                    if( count($positionsinfo['options']) ){
                      foreach( $positionsinfo['options'] as $optionname ){
                        $option = $defaults[$optionname];
                        $fieldname = ( $option['name'] );
                        $fieldid = ( $option['name'] );

                        echo '<tr valign="top"><td>';
                          $this->AdminDisplayCallback($options,$option,$fieldname,$fieldid); // Don't display previously input info
                        echo '</td></tr>';   
                            
                      }
                    }
                  echo '</tbody>';
                echo '</table>';
              echo '</div>';
              echo '<input id="'.$this->get_private('settings').'-submit" name="'.$this->get_private('settings').'_'.$currenttab .'[submit-'. $currenttab.']" type="submit" class="button-primary" style="margin-top:15px;" value="Save API Key" />';
              echo '</form>';
              echo '<br style="clear:both;">';
            echo '</div>';
            
          }
        }
    }
          ?>
        <div style="max-width:680px;">
          <h1><?php _e('What is an API Key and why do I need one?');?> :</h1>
          <p><?php _e('Photo sharing websites like Flickr want to protect their users and to prevent abuses by keeping track of how their services are being used. ');
          _e('Two of the ways that Flickr does this is by assigning API Keys to plugins, like the Alpine PhotoTile, to keep track of who is who and by limiting the number of times a plugin can talk to the Flickr network.  ');
          _e('While serveral hundred websites could share an API Key without reaching this limit, the Alpine PhotoTile plugin has become popular enough that users now need API Keys of their own. ');
          ?></p>
          <p><?php
          _e('An API Key is free and easy to get. Because this plugin uses multiple methods of talking with the Flickr network, signing up for an API Key is optional. However, users without an API Key will experience the following limitations: ');?>
            <ul style="text-align:left;padding-left:15px;">
            <li>- <?php _e('Images size options limited to 75px, 240px, 500px, and 800px.');?></li>
            <li>- <?php _e('"Photo Offset" option will not work.');?></li>
            <li>- <?php _e('"Shuffle/Randomize Photos" option will not work.');?></li>
            <li>- <?php _e('Lack of helpful error messages if something does not work.');?></li>
            <li>- <?php _e('Possibly slower plugin loading time (It is hard to tell).');?></li>
            <li>- <?php _e('Future options added to this plugin will likely require an API Key.');?></li>
            </ul> 
          <?php _e('If you are fine with these limitations, feel free to use this plugin without an API Key. Otherwise, please add an API Key using the directions below. Thank you for your understanding.');?>
         </p>
          
        </div>
        <div style="max-width:680px;">
          <h1><?php _e('How to get a Flickr API Key');?> :</h1>
          <h2 style="font-size: 18px;padding:0px;">(<?php _e("Don't worry. I promise it's EASY");?>!!!)</h2>
          <p><?php _e('Please <a href="'.$this->get_private('info').'" target="_blank">let me know</a> if these directions become outdated.');?></p>
          <ol>
            <li>
              <?php _e('Make sure you are logged into Flickr.com and then visit');?> <a href="http://www.flickr.com/services/apps/create/" target="_blank">http://www.flickr.com/services/apps/create/</a>.
            </li>
            <li>
              <?php _e('Under "Get your API Key", click the "Request an API Key" link.');?>
            </li>
            <li>
              <?php _e('Next, click the button that says "APPLY FOR A NON-COMMERCIAL KEY". Even if your website is commercial, this plugin is non-commercial.');?>
            </li>
            <li>
              <p><?php _e('A form will appear. Fill in the form with the following infomation. Feel free to add details wherever you like. Check the two boxes and finish by clicking "Submit":');?></p>
              <dl>
                <dt><strong><?php _e('What\'s the name of your app');?></strong></dt>
                <dd><em><?php echo $this->get_private('name');?> WordPress plugin</em></dd>
                <dt><strong><?php _e('What are you building?');?></strong></dt>
                <dd><em>A simple plugin to display images from Flickr on my WordPress website.</em></dd>
              </dl>
            </li>
            <li>
              <?php _e('Copy and paste the Key into the form above. Click "Save API Key" and you are all done. I hope you enjoy the plugin.');?>
            </li>
          </ol>
        </div>  
    <?php
  }  
}


?>
