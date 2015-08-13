<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

						
									
											
								<?php
								
								$post_ids = array( 26995, 26605, 26851);
								
								// current page number
$paged = 1;
// number of posts per page
// starting position
$offset = ( $paged - 1 ) * $posts_per_page;
// extract page of IDs
$ids_to_query = array_slice( $post_ids, $offset, $posts_per_page );
								
								/* 'post__in' =>  $ids_to_query, 'orderby' => 'post__in' */
								
if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');
 
$query = new WP_Query( array( 'post_type' => array('post','feature')) );
 
if ( $query->have_posts() ) : ?>
							
							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 1) : ?>



							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								
								
								<header class="article-header">Totally Farted!

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p><?php
 
$writer_name = types_render_field("writer-name", array("raw"=>"true","separator2"=>"and"));
 
//Output the trainer email
 
echo $writer_name;
?></p>


<?php
 
$bottom = types_render_field("bottom-of-post", array("raw"=>"false"));
 
//Output the trainer email
 
echo $bottom;


?></p>




<p>

<?php

	$file = 'http://universitytimes.ie';
$file_headers = @get_headers($file);
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
}
else {
    $exists = true;
}

if($exists == true){

echo "Fart";

}
	
	?>
	
	
</p>
									
									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>
							
							
							
					<?php elseif ($count == 2) : ?>



							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								
								
								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>		
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							<?php elseif ($count == 3) : ?>



							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								
								
								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>		
							
							<?php elseif ($count == 4) : ?>



							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								
								
								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>		
							
							<?php elseif ($count == 5) : ?>



							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								
								
								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>		
							
							<?php elseif ($count == 6) : ?>



							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								
								
								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>		
							
							<?php elseif ($count == 7) : ?>



							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								
								
								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>		
							
							<?php elseif ($count == 8) : ?>



							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								
								
								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header>

								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>		
							
							
							
							
							
							
							
							<?php else : ?>
							
							
							
							
							
							
							
							
							
							

<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>



						</div>

					<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
