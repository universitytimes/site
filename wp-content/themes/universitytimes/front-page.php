<?php get_header(); ?>







		<?php 
		
		
		$layoutexcite = get_option('layoutid');
		
		if($layoutexcite == 'default') {
			
			
			get_template_part( 'frontlayout');
			
			
		}	
		
		
		elseif($layoutexcite == 'default1') {
			
			
			get_template_part( 'frontlayout', 'one');
			
			
		}	
		
		
		elseif($layoutexcite == 'default2') {
			
			
			get_template_part( 'frontlayout', 'two');
			
			
		}	
		
		
		elseif($layoutexcite == 'default3') {
			
			
			get_template_part( 'frontlayout', 'three');
			
			
		}	
		
		else {
			
			
			get_template_part( 'frontlayout');
			
		}
		
		
		
			
			
		 ?>
			
			

<?php get_footer(); ?>
