<?php
?>
<div class='post-group default row'>
	<div class='nine columns post-group-content'>	
	<?php if ( function_exists( 'useful_banner_manager_banners' ) ) { useful_banner_manager_banners( '', 1); } ?>
	<?php 		
	if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('partials/posts/post'); ?>
	<?php endwhile; ?>
	<?php endif; ?>
	</div>
	<?php #get_template_part('partials/sidebars/sidebar', 'index'); ?>
	<?php numeric_posts_nav(); ?>
</div>
