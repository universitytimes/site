<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('leftaside'); ?>>
	<header class="post-header">
		<h1 class="post-title">
            <?php the_category(''); ?>
            <a href="<?php the_permalink() ?>">
                <div class="crop">
    		    	<?php# the_post_thumbnail( 'medium-thumbnail' ); ?>  <!-- Uncomment to allow wordpress-defined image sizes -->
    		    	<?php the_post_thumbnail( ); ?>
                </div>
                <div class="postlisttitle">
                    <?php the_title(); ?>
                </div>
            </a>
                    <footer class="post-info">
			            <?php get_template_part('partials/post-metadata-home'); ?>
		            </footer>
		</h1>
	</header>
	<div class="row">
		<section class="post-content">
            <?php #the_content(__('Read On&hellip;', 'frank_theme')); ?>
		</section>
			</div>
</article>
