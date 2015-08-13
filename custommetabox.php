<?php

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
	
	
	
	<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
	
	
jQuery(document).ready(function($) {
    jQuery('#category_faq').on('change',function() {
        jQuery('#wrapper div').show().not(".views-row-" + this.value).hide();
    });
});


</script>
	
	
	
    <div class="jaxtag">
    <?php 
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'section_noncename' );
    $section_IDs = wp_get_object_terms( $post->ID, 'section', array('fields' => 'ids') );
    wp_dropdown_categories('taxonomy=section&hide_empty=0&orderby=name&name=section&show_option_none=Select section&selected='.$section_IDs[0]); ?>
    <p class="howto">Select the section</p>
    </div>
    
    
    <script type="text/javascript">
    
    
    $(document).ready(function(){
    
    
    
    
    
        $("#section").bind('change', function () {
    var str = "";
  
    str = parseInt($("select option:selected").val());
        
        if(str == 1178){
            
         $("#posttypeselector").show();
         
             $("#newswoo").show();  
       
             
         $("#opinionwoo").hide();
         
         
          $("#typeteller").val('news');
          
        
         
        
            
        
         
         $("#sportswoo").hide();
            
            
        }
        
        else if(str == 1180){
            
         $("#posttypeselector").show();
         
             
          $("#opinionwoo").show();  
          
           
         $("#newswoo").hide();
         
         $("#typeteller").val('opinion');
            
        
         
         $("#sportswoo").hide();
            
            
        }
        
       
        
        
        
      else
          $("#posttypeselector").hide();
          
});

$('#section').trigger('change');

});

</script>
  
    
    
     <div id="posttypeselector" class="jaxtag ifnews boxhider" style="display: none;">
   
   
   <div id="newswoo"> 
	   
	  <?php wp_nonce_field( 'newsnonce', 'news_noncefield' ); ?>
	   
	   <select name="news_articletype" class='postform' >
		   
		   
		<option class="level-0" value="1183" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'newsarticle' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>News Article</option>
	<option class="level-0" value="1184" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'newsfeature' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>News Feature</option>
</select>
	   
	   
   </div>
   
   <div id="opinionwoo">
	   
	   
	   
	  
	<?php wp_nonce_field( 'opinionnonce', 'opinion_noncefield' ); ?>
	
		  
	  <select name="opinion_articletype" class='postform' >
		
		
		<option class="level-0" value="1187" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'opinioncontrib' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Opinion Contribution</option>

<option class="level-0" value="1189" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'analysis-2' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Analysis</option>

	<option class="level-0" value="1185" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'column' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Column</option>

<option class="level-0" value="1186" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'editorialarticle' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Editorial</option>


<option class="level-0" value="1188" <?php
if ( is_object_in_term( $post->ID, 'articletype', 'op-ed' ) ) :
	echo 'selected="selected"';
else :
	echo '';
endif;
?>>Op-ed</option>

	    </select>

	   
	   
	   
	   
	   
	    </div>
   
   <div id="sportswoo">SPORTS WOO!</div>
   
   
   
   
   
   	   
	   <input id="typeteller" type="hidden" name="typeteller"  value="" /> 
   
   
   
    <p class="howto">Select article type</p>
    </div>
    
</div>

 


<?php
} ?>