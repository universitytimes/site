<ul class="metadata vertical">
		<li class="date"><time datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished"><?php the_time(get_option('date_format')); ?></time></li>
	
	<li class="categories"><?php the_category(', '); ?></li>
   <!-- <li class='author'>
      <?php echo _x('', 'post_author_attribution', 'frank_theme');
	    echo ' ';
	    the_author_posts_link();
	  ?>
	</li>	-->
    <li class="description">
        <?php
            if ( get_the_author_meta('description') ) :
                echo the_author_description();
            endif;
        ?>
    </li> 
	<li class="tags"><?php the_tags('', ' '); ?></li>
	<?php
		if (strlen(get_the_title())==0) :
	?>
		<li class="permalink"><a href="<?php the_permalink() ?>">Permalink</a></li>
	<?php endif; ?>
</ul>
