<?php
/**
 * @package Frank
 */
?>
<?php get_header(); ?>
<div id="content" class="archive">
	<div class="row">
		<main id="content-primary" role="main">
        
        <?php                
            // If showing 18 gadgets per page                
            if (is_category('Gallery')) {
            
                // Get the query URL used to show posts from a certain category
                // based on the URL used by the user.
                global $query_string;

                // Show 18 posts per page (rather than 10 by default) for anything
                // in this category, but respect all pagination and category selection.
                query_posts($query_string . '&posts_per_page=18');
            }
        ?>

		<?php if(have_posts()) : ?>

        <!-- <header>   

            //These Headers look crap so commented out

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="page-title">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="page-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="page-title">Archive for <?php the_time('F jS, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="page-title">Archive for <?php the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="page-title">Archive for <?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="page-title">Author Archive</h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="page-title">Blog Archives</h1>
		<?php } ?>
		</header> -->

		<div class="posts">
			<?php while(have_posts()) : the_post(); ?>
				<?php get_template_part('partials/posts/post'); ?>
			<?php endwhile; ?>
			</div>
			<?php// get_template_part( 'partials/post-pagination'); ?>
			<?php numeric_posts_nav(); ?>
			<?php else : ?>
			<div class="post">
				<header><br /><h1>Page Not Found</h1></header>
				<section>
				<p>Looks like the page you're looking for isn't here anymore. Try using the search box below.</p>
				<?php get_search_form(true); ?>
		 		</section>
			</div>
			<?php endif; ?>
           <?php
    // Reset Query so rest of website doesn't break.
    if (is_category('Gallery')) {
        wp_reset_query(); 
    }
?> 
		</main>
		<?php# get_template_part('partials/sidebars/sidebar', 'archive'); ?>
	</div>
</div>
<?php get_footer(); ?>
