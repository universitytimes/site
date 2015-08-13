			<div id="content">
			
		
		
		
		
		
		
			
			
			
			<?php 
// the query


$args = array(
	'post_type' => array('post', 'feature'),
	'posts_per_page' => 25,
);

$thisidnow = get_the_ID();

$recentlist = 0;


$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php
		
		$count++;
		
		${"ut_recent_post_" . $count} = get_the_ID();
		
		
		
		  ?>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	
<?php endif; ?>


<?php


$ut_list_of_recent = array($ut_recent_post_1, $ut_recent_post_2, $ut_recent_post_3, $ut_recent_post_4, $ut_recent_post_5, $ut_recent_post_6, $ut_recent_post_7, $ut_recent_post_8, $ut_recent_post_9, $ut_recent_post_10, 
$ut_recent_post_11,
$ut_recent_post_12,
$ut_recent_post_13,
$ut_recent_post_14,
$ut_recent_post_15,
$ut_recent_post_16,
$ut_recent_post_17,
$ut_recent_post_18,
$ut_recent_post_19,
$ut_recent_post_20,
$ut_recent_post_21,
$ut_recent_post_22,
$ut_recent_post_23,
$ut_recent_post_24,
$ut_recent_post_25, );



		$posts1 = get_option('post1');
   		$posts2 = get_option('post2');
   		$posts3 = get_option('post3');
   		$posts4 = get_option('post4');
   		$posts5 = get_option('post5');
   		$posts6 = get_option('post6');
   		$posts7 = get_option('post7');
   		$posts8 = get_option('post8');
   		$posts9 = get_option('post9');
   		$posts10 = get_option('post10');
   		$posts11 = get_option('post11');
   		$posts12 = get_option('post12');
   		$posts13 = get_option('post13');
   		$posts14 = get_option('post14');
   		$posts15 = get_option('post15');
   		$posts16 = get_option('post16');
   		$posts17 = get_option('post17');
   		$posts18 = get_option('post18');
   		$posts19 = get_option('post19');
	    $posts20 = get_option('post20');
	    $posts21 = get_option('post21');
	    $posts22 = get_option('post22');
	    $posts23 = get_option('post23');
	    $posts24 = get_option('post24');
	    $posts25 = get_option('post25');


$ut_list_of_ordered = array($posts1,$posts2,$posts3,$posts4,$posts5,$posts6,$posts7,$posts8,$posts9,$posts10,$posts11,$posts12,$posts13,$posts14,$posts15,$posts16,$posts17,$posts18,$posts19,$posts20,$posts21,$posts22,$posts23,$posts24,$posts25);

$ut_list_of_ordered_no_blanks = array_filter($ut_list_of_ordered);


$recent_no_duplicates = array_diff($ut_list_of_recent, $ut_list_of_ordered_no_blanks);


$ut_full_array = array_merge($ut_list_of_ordered_no_blanks, $recent_no_duplicates);



extract($ut_full_array, EXTR_PREFIX_ALL, "ut_post");


// echo '<h2>'.$ut_post_0.'</h2>';



$ut_final_list = array($ut_post_0, 
					   $ut_post_3, 
					   $ut_post_5,
					   $ut_post_7, 
					   $ut_post_6, 
					   $ut_post_1, 
					   $ut_post_2, 
					   $ut_post_4, 
					   $ut_post_8,
					   $ut_post_9,
					   $ut_post_10,
					   $ut_post_11,
					   $ut_post_12,
					   $ut_post_13,
					   $ut_post_14,
					   $ut_post_15,
					   $ut_post_16,
					   $ut_post_17,
					   $ut_post_18,
					   $ut_post_19,
					   $ut_post_20,
					   $ut_post_21,
					   $ut_post_22,
					   $ut_post_23,
					   $ut_post_24,);















?>



			
			
			
		<!--	<?php print_r ($ut_full_array); ?> -->
						

				<div id="inner-content" class="wrap cf">
				
				
				
				
				<div id="topblocks">

					<div id="leftofit">

						
														<?php
								
							
 
 // current page number
$paged_l = 1;
// number of posts per page
$posts_per_page_l = 25;
// starting position
$offset = ( $paged_l - 1 ) * $posts_per_page_l;
// extract page of IDs
$ids_to_query_l = array_slice( $ut_final_list, $offset, $posts_per_page_l );



  
    $my_query = new WP_Query( array('post_type' => array( 'post', 'feature' ), 'post__in' => $ids_to_query_l, 'posts_per_page' => $posts_per_page_l, 'orderby' => 'post__in', 'ignore_sticky_posts' => 1, 'post_status' => 'publish') );
 
 

 
if ( $my_query->have_posts() ) : ?>
							
							
							
							
<?php $count = 0; ?>



<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 1) : ?>



<div class="numberonebig">
						
						
			<div class="postlink">
						
						
						<?php $utpostimage_url = get_post_meta( $post->ID, "utpostimage_url", true ); 
							
							  $utpostimage_position = get_post_meta( $post->ID, "utpostimage_position", true );
							
						?>
						
						
						

						
						
						
							<?php if ($utpostimage_url != '' && ($utpostimage_position == 'landscaperight' || $utpostimage_position == 'landscapeabove') ) : ?>
						
						
								<a class="onebigimage" href="<?php echo get_permalink(); ?>">
							
						
							
								<div class="onecropper"> 
								
								<img src="<?php echo $utpostimage_url ?>" alt="blank" /> </div>
							
								<script>
											jQuery('.onecropper').imagefill();
        						</script>
							
							
								<div class="oneimagecaption"><?php echo get_post_meta( $post->ID, "utpostimage_credit", true ); ?></div>
							
							
							
								</a>

						
								<?php endif; ?>
						
						
								<?php if ($utpostimage_url != '' && ($utpostimage_position == 'portraitright' || $utpostimage_position == 'smallportraitleft' || $utpostimage_position == 'bigportraitleft' )) : ?>
						
								<?php $layoutoffirstarticle = 'portrait'; ?>
						
								<a class="onebigimageportrait" href="<?php echo get_permalink(); ?>">
							
												
								<div class="onecropper"> 
			
								<img src="<?php echo $utpostimage_url ?>" alt="blank" /> </div>
							
								<script>
										jQuery('.onecropper').imagefill();
								</script>
							
							
								<div class="oneimagecaption"><?php echo get_post_meta( $post->ID, "utpostimage_credit", true ); ?></div>
							
							
							
								</a>

						
								<?php endif; ?>

						
						
							
							
							
							
							
								
								
								
								<div <?php if ($layoutoffirstarticle == 'portrait') echo "class='floaterright'";?>>
							
							
								
										<h3 class="onebigheadline">
								
											<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
								
										</h3>
								
										<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
								
													$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
								
								
													if ($old_caption !== "" && $old_caption !== false) {
								
													echo get_post_meta($post->ID, '_visual-subtitle', true); 
								
								
											}
								
												else {
									
									
												if(function_exists("the_subtitle")) {
										
												echo  the_subtitle();
										
										
												}
									
									
								
									
									
												}
								
								
								
										?></a>
								
								
							
				
							
							
							<div style="clear: both;"></div>
								
								
							<div class="onebiginformationbox">
							
							
							
								<?php
										if ( is_object_in_term( $post->ID, 'section', 'news' ) ) :
										echo '<a href="'.home_url().'/news" class="onebigsectiontag newstag">News</a>';
	
	
										elseif ( is_object_in_term( $post->ID, 'section', 'infocus' ) ) :
										echo '<a href="'.home_url().'/infocus" class="onebigsectiontag infocustag">In Focus</a>';
	
										elseif ( is_object_in_term( $post->ID, 'section', 'sportcat' ) ) :
										echo '<a href="'.home_url().'/sport" class="onebigsectiontag sporttag">Sport</a>';
	
										elseif ( is_object_in_term( $post->ID, 'section', 'magazine' ) ) :
										echo '<a href="'.home_url().'/magazine" class="onebigsectiontag magazinetag">Magazine</a>';
	
										elseif ( is_object_in_term( $post->ID, 'section', 'radius' ) ) :
										echo '<a href="'.home_url().'/radius" class="onebigsectiontag radiustag">Radius</a>';





										else :
											echo '';
											endif;
								?>
							
							
							
							
							
							<div class="rightinfo"> 
							
							
							
									<?php
							
										$writername = get_post_meta( get_the_ID(), '_writer_name', true );
										$writername2 = get_post_meta( get_the_ID(), '_writer_name_two', true );
										$writername3 = get_post_meta( get_the_ID(), '_writer_name_three', true );
										$writername4 = get_post_meta( get_the_ID(), '_writer_name_four', true );
										$writername5 = get_post_meta( get_the_ID(), '_writer_name_five', true );
							
							
										if ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 == "" and $writername !== "") {
							
							 echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span></span>'; 
							 
							 
							 }
							 
							 
							 elseif ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 !== "") {
								 
								 
								echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span> and <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name_two', true ).'</span></span>'; 
								 
								 
							 }
							 
							 
							 
							 
							 ?>
							
							 
							 
							 
							 							 
							 
							 
							 <?php
											 
											 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $hours = 10;



if($hours > $post_age_in_hours ) {
	
	
	
	if ($post_age_in_hours > 1) {
	
	echo '<span class="onebigdate">'.get_the_time().'</span>' ;
	
	
	}
	
	
	
	
	elseif(1 > $post_age_in_hours) {


 
	
	
	$minutes = round($post_age_in_minutes);
	
	
	if ($minutes == 1) {
	
	
	echo '<span class="onebigdate">'.$minutes.' minute ago</span>' ;
	
	
	
	
	
	}
	
	
	
	
	else {
	
	
	echo '<span class="onebigdate">'.$minutes.' minutes ago</span>' ;
	
	}
	
	
	
	
}

	
	
	
	
}







else {
	
	
	
}


?>
 </div>
					
					
					
							</div> <!-- End of wrapper for post data -->
					
					
					</div>  <!-- end of postlink -->
					
					
							
							</div>
							
							
							
							
							
							<div style="clear: both;"></div>
							
												
						
						
						
						

						
						
						</div>

							
							
							
					<?php elseif ($count == 2) : ?>




<div class="numberone">
						
						<div class="postlink">
						
						
						<?php $utpostimage_url = get_post_meta( $post->ID, "utpostimage_url", true ); 
							$utpostimage_position = get_post_meta( $post->ID, "utpostimage_position", true ); ?>
						
						
						

						
						
						
					<?php if ($utpostimage_url != '' && ($utpostimage_position == 'landscaperight' || $utpostimage_position == 'landscapeabove' )) : ?>
						
						
						
						
						<div class="oneright">
							
			
							<a class="" href="<?php echo get_permalink(); ?>">
							<div class="one2cropper"> <img src="<?php echo $utpostimage_url; ?>" alt="blank" /> </div>
							
								<script>
            jQuery('.one2cropper').imagefill();
        </script>
							
							
							<div class="oneimagecaption"><?php echo get_post_meta( $post->ID, "utpostimage_credit", true );  ?></div>
							
							
							
							</div> <!-- end of oneright -->
							
							</a>
						
						
						
						<?php endif; ?>
						
						
						
						<?php if ($utpostimage_url != '' && ($utpostimage_position == 'portraitright' || $utpostimage_position == 'smallportraitleft' || $utpostimage_position == 'bigportraitleft' )) : ?>
						
						<div class="onerightportrait">
						
						
						<a class="" href="<?php echo get_permalink(); ?>">
							<div class="one2cropper"> <img src="<?php echo $utpostimage_url; ?>" alt="blank" /> </div>
							
								<script>
            jQuery('.one2cropper').imagefill();
        </script>
							
							
							<div class="oneimagecaption"><?php echo get_post_meta( $post->ID, "utpostimage_credit", true );  ?></div>
							
							
							
							</div> <!-- end of oneright -->
							
							</a>
						
						
						
						
						<?php endif; ?>
						
						
						
						
							<div class="oneleft">
							
							
								
								
								<h3 class="oneheadline<?php if ($utpostimage_url == '') { echo '_bigger'; } ?>"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
								
								<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
								
								$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
								
								
								if ($old_caption !== "" && $old_caption !== false) {
								
								echo get_post_meta($post->ID, '_visual-subtitle', true); 
								
								
								}
								
								else {
									
								if(function_exists("the_subtitle")) {
										
										echo  the_subtitle();
										
										
									}
									
									
								}
								
								
								
								?></a>
								
							
							
							<div class="onebiginformationbox">
							
							<?php
if ( is_object_in_term( $post->ID, 'section', 'news' ) ) :
	echo '<a href="'.home_url().'/news" class="onebigsectiontag newstag">News</a>';
	
	
	elseif ( is_object_in_term( $post->ID, 'section', 'infocus' ) ) :
	echo '<a href="'.home_url().'/infocus" class="onebigsectiontag infocustag">In Focus</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'sportcat' ) ) :
	echo '<a href="'.home_url().'/sport" class="onebigsectiontag sporttag">Sport</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'magazine' ) ) :
	echo '<a href="'.home_url().'/magazine" class="onebigsectiontag magazinetag">Magazine</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'radius' ) ) :
	echo '<a href="'.home_url().'/radius" class="onebigsectiontag radiustag">Radius</a>';





else :
	echo '';
endif;
?>
							
							
							<div class="rightinfo">
							
							
							<?php
							
							$writername = get_post_meta( get_the_ID(), '_writer_name', true );
							$writername2 = get_post_meta( get_the_ID(), '_writer_name_two', true );
							$writername3 = get_post_meta( get_the_ID(), '_writer_name_three', true );
							$writername4 = get_post_meta( get_the_ID(), '_writer_name_four', true );
							$writername5 = get_post_meta( get_the_ID(), '_writer_name_five', true );
							
							
							if ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 == "" and $writername !== "") {
							
							 echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span></span>'; 
							 
							 
							 }
							 
							 
							 elseif ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 !== "") {
								 
								 
								echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span> and <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name_two', true ).'</span></span>'; 
								 
								 
							 }
							 
							 
							 
							 
							 ?>
							
							 
							  <?php
											 
											 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $hours = 10;



if($hours > $post_age_in_hours ) {
	
	
	
	if ($post_age_in_hours > 1) {
	
	echo '<span class="onebigdate">'.get_the_time().'</span>' ;
	
	
	}
	
	
	
	
	elseif(1 > $post_age_in_hours) {


 
	
	
	$minutes = round($post_age_in_minutes);
	
	
	if ($minutes == 1) {
	
	
	echo '<span class="onebigdate">'.$minutes.' minute ago</span>' ;
	
	
	
	
	
	}
	
	
	
	
	else {
	
	
	echo '<span class="onebigdate">'.$minutes.' minutes ago</span>' ;
	
	}
	
	
	
	
}

	
	
	
	
}







else {
	
	
	
}


?>
 </div>
							
							</div>

							
							
								
								
							</div> <!-- end of oneleft -->
							
							
							
							
						
						
						
						<div style="clear: both;"></div>
	
							
							
							
</div> <!-- end of postlink -->
							
							
								
																
							
							
							
							
							
													

						
						
						</div>
							
							
							
							
							
							<div <?php if ($layoutoffirstarticle == 'portrait') echo "class='smallerlistborder'";?>>
							
							
							
							<ul class="smallerstufflist">
							
							
							
							<?php elseif ($count == 3) : ?>
							
							
							<li class="smallerstuff">
						
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						
						 <?php
											 
											 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $hours = 10;



if($hours > $post_age_in_hours ) {
	
	
	
	if ($post_age_in_hours > 1) {
	
	echo '<span class="onebigdate">'.get_the_time().'</span>' ;
	
	
	}
	
	
	
	
	elseif(1 > $post_age_in_hours) {


 
	
	
	$minutes = round($post_age_in_minutes);
	
	
	if ($minutes == 1) {
	
	
	echo '<span class="onebigdate">'.$minutes.' minute ago</span>' ;
	
	
	
	
	
	}
	
	
	
	
	else {
	
	
	echo '<span class="onebigdate">'.$minutes.' minutes ago</span>' ;
	
	}
	
	
	
	
}

	
	
	
	
}







else {
	
	
	
}


?>

						
						</h3>   							
							
														
							
							
							
							
							
							

						</li>

							

							
							<?php elseif ($count == 4) : ?>


<li class="smallerstuff">
						
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						
						
						
						
						 <?php
											 
											 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $hours = 10;



if($hours > $post_age_in_hours ) {
	
	
	
	if ($post_age_in_hours > 1) {
	
	echo '<span class="onebigdate">'.get_the_time().'</span>' ;
	
	
	}
	
	
	
	
	elseif(1 > $post_age_in_hours) {


 
	
	
	$minutes = round($post_age_in_minutes);
	
	
	if ($minutes == 1) {
	
	
	echo '<span class="onebigdate">'.$minutes.' minute ago</span>' ;
	
	
	
	
	
	}
	
	
	
	
	else {
	
	
	echo '<span class="onebigdate">'.$minutes.' minutes ago</span>' ;
	
	}
	
	
	
	
}

	
	
	
	
}







else {
	
	
	
}


?>

						
						
						</h3>


							
						
							
							
														
							
							
							
							
							
							

						</li>
						
						
						
						<?php elseif ($count == 5) : ?>


<li class="smallerstuff">
						
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						
						
						
						 <?php
											 
											 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $hours = 10;



if($hours > $post_age_in_hours ) {
	
	
	
	if ($post_age_in_hours > 1) {
	
	echo '<span class="onebigdate">'.get_the_time().'</span>' ;
	
	
	}
	
	
	
	
	elseif(1 > $post_age_in_hours) {


 
	
	
	$minutes = round($post_age_in_minutes);
	
	
	if ($minutes == 1) {
	
	
	echo '<span class="onebigdate">'.$minutes.' minute ago</span>' ;
	
	
	
	
	
	}
	
	
	
	
	else {
	
	
	echo '<span class="onebigdate">'.$minutes.' minutes ago</span>' ;
	
	}
	
	
	
	
}

	
	
	
	
}







else {
	
	
	
}


?>

						
						
						
						</h3>


							
						
							
							
														
							
							
							
							
							
							

						</li>

						
						
						
						</ul>
						
						
							</div> <!-- end of smallerlistborder -->
						
						
						
						
						</div>




							
							



<div id="rightofit">
						<?php elseif ($count == 6) : ?>
						
						<div id="leftonright">
						
						
							<div class="numbertwobig">
						
						
						<div class="postlink">
						
								<h3 class="twobigheadline <?php if ($layoutoffirstarticle == 'portrait') echo "smallertwobigheadline";?>"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
								
										<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
								
								$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
								
								
								if ($old_caption !== "" && $old_caption !== false) {
								
								echo get_post_meta($post->ID, '_visual-subtitle', true); 
								
								
								}
								
								else {
									
								if(function_exists("the_subtitle")) {
										
										echo  the_subtitle();
										
										
									}
									
									
								}
								
								
								
								?></a>
								
						</div> <!-- end of postlink -->
								
								
										<div class="onebiginformationbox">
										
												<?php
if ( is_object_in_term( $post->ID, 'section', 'news' ) ) :
	echo '<a href="'.home_url().'/news" class="onebigsectiontag newstag">News</a>';
	
	
	elseif ( is_object_in_term( $post->ID, 'section', 'infocus' ) ) :
	echo '<a href="'.home_url().'/infocus" class="onebigsectiontag infocustag">In Focus</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'sportcat' ) ) :
	echo '<a href="'.home_url().'/sport" class="onebigsectiontag sporttag">Sport</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'magazine' ) ) :
	echo '<a href="'.home_url().'/magazine" class="onebigsectiontag magazinetag">Magazine</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'radius' ) ) :
	echo '<a href="'.home_url().'/radius" class="onebigsectiontag radiustag">Radius</a>';





else :
	echo '';
endif;
?>

								
												<div class="rightinfo">
												
												
												
												<?php
							
							$writername = get_post_meta( get_the_ID(), '_writer_name', true );
							$writername2 = get_post_meta( get_the_ID(), '_writer_name_two', true );
							$writername3 = get_post_meta( get_the_ID(), '_writer_name_three', true );
							$writername4 = get_post_meta( get_the_ID(), '_writer_name_four', true );
							$writername5 = get_post_meta( get_the_ID(), '_writer_name_five', true );
							
							
							if ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 == "" and $writername !== "") {
							
							 echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span></span>'; 
							 
							 
							 }
							 
							 
							 elseif ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 !== "") {
								 
								 
								echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span> and <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name_two', true ).'</span></span>'; 
								 
								 
							 }
							 
							 
							 
							 
							 ?>
							
												
												
												
									 <?php
											 
											 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $hours = 10;



if($hours > $post_age_in_hours ) {
	
	
	
	if ($post_age_in_hours > 1) {
	
	echo '<span class="onebigdate">'.get_the_time().'</span>' ;
	
	
	}
	
	
	
	
	elseif(1 > $post_age_in_hours) {


 
	
	
	$minutes = round($post_age_in_minutes);
	
	
	if ($minutes == 1) {
	
	
	echo '<span class="onebigdate">'.$minutes.' minute ago</span>' ;
	
	
	
	
	
	}
	
	
	
	
	else {
	
	
	echo '<span class="onebigdate">'.$minutes.' minutes ago</span>' ;
	
	}
	
	
	
	
}

	
	
	
	
}







else {
	
	
	
}


?>
 </div>
									
									
											
										</div>
							
						
							</div>




	
							
							<?php elseif ($count == 7) : ?>


<div class="numbertwobig">
							
							<div class="postlink">

						
								<h3 class="threebigheadline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
								
										<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
								
								$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
								
								
								if ($old_caption !== "" && $old_caption !== false) {
								
								echo get_post_meta($post->ID, '_visual-subtitle', true); 
								
								
								}
								
								else {
									
								if(function_exists("the_subtitle")) {
										
										echo  the_subtitle();
										
										
									}
									
									
								}
								
								
								
								?></a>
								
								
							</div> <!-- end of postlink -->
								
								
										<div class="onebiginformationbox">
										
												<?php
if ( is_object_in_term( $post->ID, 'section', 'news' ) ) :
	echo '<a href="'.home_url().'/news" class="onebigsectiontag newstag">News</a>';
	
	
	elseif ( is_object_in_term( $post->ID, 'section', 'infocus' ) ) :
	echo '<a href="'.home_url().'/infocus" class="onebigsectiontag infocustag">In Focus</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'sportcat' ) ) :
	echo '<a href="'.home_url().'/sport" class="onebigsectiontag sporttag">Sport</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'magazine' ) ) :
	echo '<a href="'.home_url().'/magazine" class="onebigsectiontag magazinetag">Magazine</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'radius' ) ) :
	echo '<a href="'.home_url().'/radius" class="onebigsectiontag radiustag">Radius</a>';





else :
	echo '';
endif;
?>

								
												<div class="rightinfo">
												
												
												
												<?php
							
							$writername = get_post_meta( get_the_ID(), '_writer_name', true );
							$writername2 = get_post_meta( get_the_ID(), '_writer_name_two', true );
							$writername3 = get_post_meta( get_the_ID(), '_writer_name_three', true );
							$writername4 = get_post_meta( get_the_ID(), '_writer_name_four', true );
							$writername5 = get_post_meta( get_the_ID(), '_writer_name_five', true );
							
							
							if ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 == "" and $writername !== "") {
							
							 echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span></span>'; 
							 
							 
							 }
							 
							 
							 elseif ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 !== "") {
								 
								 
								echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span> and <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name_two', true ).'</span></span>'; 
								 
								 
							 }
							 
							 
							 
							 
							 ?>
							
												
												
											 <?php
											 
											 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $hours = 10;



if($hours > $post_age_in_hours ) {
	
	
	
	if ($post_age_in_hours > 1) {
	
	echo '<span class="onebigdate">'.get_the_time().'</span>' ;
	
	
	}
	
	
	
	
	elseif(1 > $post_age_in_hours) {


 
	
	
	$minutes = round($post_age_in_minutes);
	
	
	if ($minutes == 1) {
	
	
	echo '<span class="onebigdate">'.$minutes.' minute ago</span>' ;
	
	
	
	
	
	}
	
	
	
	
	else {
	
	
	echo '<span class="onebigdate">'.$minutes.' minutes ago</span>' ;
	
	}
	
	
	
	
}

	
	
	
	
}







else {
	
	
	
}


?>
 </div>
									
									
											
										</div>
							
						
							</div>




							
							<?php elseif ($count == 8) : ?>


<div class="numbertwobigend">
							
							<div class="postlink">
							
							<a href="<?php echo get_permalink(); ?>" class="fourbigimage">
							
						
							
							<div class="fourcropper"> <img src="http://localhost/wp/wp-content/uploads/2014/05/DSCF2938small-e1400499987179.jpg" alt="blank" /> </div>
							
								<script>
								
							
								
            jQuery('.fourcropper').imagefill();
            
            
           
            
            
            
        </script>
							
							
							
							
							
							
							</a>

						
								<h3 class="fourbigheadline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
								
										<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
								
								$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
								
								
								if ($old_caption !== "" && $old_caption !== false) {
								
								echo get_post_meta($post->ID, '_visual-subtitle', true); 
								
								
								}
								
								else {
									
								if(function_exists("the_subtitle")) {
										
										echo  the_subtitle();
										
										
									}
									
									
								}
								
								
								
								?></a>
								
							</div> <!-- end of postlink -->
								
								
										<div class="onebiginformationbox">
										
												<?php
if ( is_object_in_term( $post->ID, 'section', 'news' ) ) :
	echo '<a href="'.home_url().'/news" class="onebigsectiontag newstag">News</a>';
	
	
	elseif ( is_object_in_term( $post->ID, 'section', 'infocus' ) ) :
	echo '<a href="'.home_url().'/infocus" class="onebigsectiontag infocustag">In Focus</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'sportcat' ) ) :
	echo '<a href="'.home_url().'/sport" class="onebigsectiontag sporttag">Sport</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'magazine' ) ) :
	echo '<a href="'.home_url().'/magazine" class="onebigsectiontag magazinetag">Magazine</a>';
	
	elseif ( is_object_in_term( $post->ID, 'section', 'radius' ) ) :
	echo '<a href="'.home_url().'/radius" class="onebigsectiontag radiustag">Radius</a>';





else :
	echo '';
endif;
?>

								
												<div class="rightinfo">
												
												
												<?php
							
							$writername = get_post_meta( get_the_ID(), '_writer_name', true );
							$writername2 = get_post_meta( get_the_ID(), '_writer_name_two', true );
							$writername3 = get_post_meta( get_the_ID(), '_writer_name_three', true );
							$writername4 = get_post_meta( get_the_ID(), '_writer_name_four', true );
							$writername5 = get_post_meta( get_the_ID(), '_writer_name_five', true );
							
							
							if ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 == "" and $writername !== "") {
							
							 echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span></span>'; 
							 
							 
							 }
							 
							 
							 elseif ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 !== "") {
								 
								 
								echo '<span class="onebigauthorname">By <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name', true ).'</span> and <span class="authoruppercase">'.get_post_meta( get_the_ID(), '_writer_name_two', true ).'</span></span>'; 
								 
								 
							 }
							 
							 
							 
							 
							 ?>
																			
												
											 <?php
											 
											 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $hours = 10;



if($hours > $post_age_in_hours ) {
	
	
	
	if ($post_age_in_hours > 1) {
	
	echo '<span class="onebigdate">'.get_the_time().'</span>' ;
	
	
	}
	
	
	
	
	elseif(1 > $post_age_in_hours) {


 
	
	
	$minutes = round($post_age_in_minutes);
	
	
	if ($minutes == 1) {
	
	
	echo '<span class="onebigdate">'.$minutes.' minute ago</span>' ;
	
	
	
	
	
	}
	
	
	
	
	else {
	
	
	echo '<span class="onebigdate">'.$minutes.' minutes ago</span>' ;
	
	}
	
	
	
	
}

	
	
	
	
}







else {
	
	
	
}


?>
 </div>
									
									
											
										</div>
							
						
							</div>

							
							
							
							
							

						
						</div>
							
													
							
							
							
							
							<?php else : ?>
							
								
							
							
							

<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>
						
						
						
						
						<div id="rightonright">
						
						<h3 class="opinionheading"><a href="<?php echo home_url(); ?>/opinion" class="opiniontag">Comment &amp; Analysis</a></h3>
						
						
						

						
							
							
							<?php
								
							
 
 // current page number
$paged_l = 1;
// number of posts per page
$posts_per_page_l = 25;
// starting position
$offset = ( $paged_l - 1 ) * $posts_per_page_l;
// extract page of IDs
$ids_to_query_l = array_slice( $ut_final_list, $offset, $posts_per_page_l );



  
    $my_query = new WP_Query( array('post_type' => array( 'post', 'feature' ),
    													 'post_status' => 'publish',
    													 
    													 
    													 'posts_per_page' => 3,
    													 
    													 
	  													
	  													'tax_query' => array(
	  													array(
	  													'taxonomy' => 'section',
	  													'terms' => 'opinion',
	  													'field' => 'slug',
	  													)
	  													),
    													 
    													 'tax_query' => array(
	  													array(
	  													'taxonomy' => 'articletype',
	  													'terms' => 'editorials',
	  													'field' => 'slug',
	  													)
	  													),
    													 
    													 
    													 
    													 ) );
 
 

 
if ( $my_query->have_posts() ) : ?>
							
							
							
							
<?php $count = 0; ?>



<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>


<?php $count++; ?>



			<?php if ($count == 1) : ?>






								<?php
																			 
													
									 $editorial_one_the_title = get_the_title();	
									 
									 $editorial_one_get_permalink = get_permalink();	
									 
									 if(function_exists("the_subtitle")) {
																		
										$editorial_one_the_subtitle = get_the_subtitle();
																		
																		
										}									 
																			 
									  
									  $date_u = current_time('timestamp');
									  
									  $post_time = get_post_time('U');
									  
									  $post_age = $date_u - $post_time; 
									
								      $post_age_in_hours = $post_age/3600;
								      
								      $post_age_in_minutes = $post_age/60;	
								      
								      $editorialhours = 30;
								
								
								
								if($editorialhours > $post_age_in_hours ) {
									
									
									
									
									
								$editorial_one = 1;
											
									
									
								}
								
									
									
								
								
								
								
								
								
								
								else {
									
									
									$editorial_one = 0;
									
									
									
								}
								
								
								?>






					<?php endif; ?>



<?php if ($count == 2) : ?>


<?php
											 
											 
		 $editorial_two_the_title = get_the_title();	
	 
	 $editorial_two_get_permalink = get_permalink();	
	 
	 if(function_exists("the_subtitle")) {
										
		$editorial_two_the_subtitle = get_the_subtitle();
										
										
		}										 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $editorialhours = 30;



if($editorialhours > $post_age_in_hours ) {
	
	
	
	
	
$editorial_two = 1;
			
	
	
}

	
	
	
	







else {
	
	
	$editorial_two = 0;
	
	
	
}


?>			

<?php endif; ?>	
						
						
<?php if ($count == 3) : ?>







<?php
											 
			 $editorial_three_the_title = get_the_title();	
	 
	 $editorial_three_get_permalink = get_permalink();	
	 
	 if(function_exists("the_subtitle")) {
										
		$editorial_three_the_subtitle = get_the_subtitle();
										
										
		}									 
											 
	  
	  $date_u = current_time('timestamp');
	  
	  $post_time = get_post_time('U');
	  
	  $post_age = $date_u - $post_time; 
	
      $post_age_in_hours = $post_age/3600;
      
      $post_age_in_minutes = $post_age/60;	
      
      $editorialhours = 30;



if($editorialhours > $post_age_in_hours ) {
	
	
	
	
	
$editorial_three = 1;
			
	
	
}

	
	
	
	







else {
	
	
	$editorial_three = 0;
	
	
	
}


?>



			
						
						
						
						
							
								
							
							
							

<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>

						
						
						
					<?php if ($editorial_one + $editorial_two + $editorial_three == 1) : ?>
					
					
					<div class="editorialbanner">
						
						
												
						
						
						
						
						<div class="postlink">
						
						<h5 class="editorialminiheading">EDITORIAL</h5>
						
						<h4 class="editorialheadline"><a href="<?php echo $editorial_one_get_permalink; ?>"><?php echo $editorial_one_the_title; ?></a></h4>
						
						
							<a href="<?php echo $editorial_one_get_permalink; ?>" class="onebigcaption">
								
								
								<?php echo $editorial_one_the_subtitle; ?>
								
								
							</a>
								
						
						
						<span class="onebigauthorname">By THE EDITORIAL BOARD</span>
						
						
						</div> <!-- End of postlink -->
						
						
						</div> <!-- End of editorialbanner 2 -->

					
					
					
					
						<?php endif; ?>
							
							
							<?php if ($editorial_one + $editorial_two + $editorial_three == 2) : ?>
							
							
							
							<div class="editorialbanner">
						
						
						<div class="postlink">
						
						<h5 class="editorialminiheading">EDITORIALS</h5>
						
						<h4 class="editorialheadline"><a href="<?php echo $editorial_one_get_permalink; ?>"><?php echo $editorial_one_the_title; ?></a></h4>
						
						
							<a href="<?php echo $editorial_one_get_permalink ?>" class="onebigcaption">
								
								
								<?php echo $editorial_one_the_subtitle; ?>
								
								
							</a>
								
								

								
						
						
						
						
						
						</div> <!-- End of postlink -->
						
						
						
						
						
						<div class="postlink">
						
						
						
						<h4 class="editorialheadline"><a href="<?php echo $editorial_two_get_permalink; ?>"><?php echo $editorial_two_the_title; ?></a></h4>
						
						
							<a href="<?php echo $editorial_two_get_permalink; ?>" class="onebigcaption">
								
								
								<?php echo $editorial_two_the_subtitle; ?>
								
								
							</a>
								
						
						
						<span class="onebigauthorname">By THE EDITORIAL BOARD</span>
						
						
						</div> <!-- End of postlink -->
						
						
						</div> <!-- End of editorialbanner 2 -->
							
							
							<?php endif; ?>
							
							
						
							
													
						<?php if ($editorial_one + $editorial_two + $editorial_three == 3) : ?>
								
							
							<div class="editorialbanner">
						
						
						<div class="postlink">
						
						<h5 class="editorialminiheading">EDITORIALS</h5>
						
						<h4 class="editorialheadline"><a href="<?php echo $editorial_one_get_permalink; ?>"><?php echo $editorial_one_the_title; ?></a></h4>
						
						
							<a href="<?php echo $editorial_one_get_permalink ?>" class="onebigcaption">
								
								
								<?php echo $editorial_one_the_subtitle; ?>
								
								
							</a>
								
								

								
						
						
						
						
						
						</div> <!-- End of postlink -->
						
						
						
						
						
						<div class="postlink lefteditorialthree">
						
						
						
						<h4 class="editorialheadlinethree"><a href="<?php echo $editorial_two_get_permalink; ?>"><?php echo $editorial_two_the_title; ?></a></h4>
						
						
							<a href="<?php echo $editorial_two_get_permalink; ?>" class="onebigcaption">
								
								
								<?php echo $editorial_two_the_subtitle; ?>
								
								
							</a>
								
						</div> <!-- End of postlink -->
						
						
						<div class="postlink righteditorialthree">
						
						
						
						<h4 class="editorialheadlinethree"><a href="<?php echo $editorial_three_get_permalink; ?>"><?php echo $editorial_three_the_title; ?></a></h4>
						
						
							<a href="<?php echo $editorial_three_get_permalink; ?>" class="onebigcaption">
								
								
								<?php echo $editorial_three_the_subtitle; ?>
								
								
							</a>
								
						</div> <!-- End of postlink -->
						
						
						
							<div style="clear:both"></div>
						
						<span class="onebigauthorname">By THE EDITORIAL BOARD</span>
						
						
						
						
						
						</div> <!-- End of editorialbanner 2 -->
							
							
							
							
							<?php endif; ?>
							
							
							
							
							
							
							
							
							
							<?php
								
							
 
								// current page number
										$paged_l = 1;
										// number of posts per page
										$posts_per_page_l = 25;
										// starting position
										$offset = ( $paged_l - 1 ) * $posts_per_page_l;
										// extract page of IDs
										$ids_to_query_l = array_slice( $ut_final_list, $offset, $posts_per_page_l );



  
								    $my_query = new WP_Query( array('post_type' => array( 'post', 'feature' ),
								    													 'post_status' => 'publish',
								    													 
								    													 
								    													 'posts_per_page' => 1,
								    													 
								    													 
									  													
									  													'tax_query' => array(
									  													array(
									  													'taxonomy' => 'section',
									  													'terms' => 'opinion',
									  													'field' => 'slug',
									  													)
									  													),
								    													 
								    													 'tax_query' => array(
									  													array(
									  													'taxonomy' => 'articletype',
									  													'terms' => 'column',
									  													'field' => 'slug',
									  													)
									  													),
								    													 
								    													 
								    													 
								    													 ) );
								 
								 
								
								 
if ( $my_query->have_posts() ) : ?>
							
							
							
							
									<?php $count = 0; ?>
									
									
									
					<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
									
									
									<?php $count++; ?>



							<?php if ($count == 1) : ?>






												<?php
																
																	  $date_u = current_time('timestamp');
																	  
																	  $post_time = get_post_time('U');
																	  
																	  $post_age = $date_u - $post_time; 
																	
																      $post_age_in_hours = $post_age/3600;
																      
																      $post_age_in_minutes = $post_age/60;	
																      
																      $columnhours = 48;
													
						
						
										  			if($columnhours > $post_age_in_hours ) {
							
							
									
															$writername = get_post_meta( get_the_ID(), '_writer_name', true );
															$writername2 = get_post_meta( get_the_ID(), '_writer_name_two', true );
															$writername3 = get_post_meta( get_the_ID(), '_writer_name_three', true );
															$writername4 = get_post_meta( get_the_ID(), '_writer_name_four', true );
															$writername5 = get_post_meta( get_the_ID(), '_writer_name_five', true );
													
													
															if ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 == "" and $writername !== "") {
															
															
															
															$writerpage = get_page_by_title( $writername, "OBJECT", 'ut_writer_page_type' );
															
															$status = get_post_status( $writerpage );
															
															$writerpage_ID = $writerpage->ID;
																
															$getcolumnheadshot_url = get_post_meta( $writerpage_ID, 'normalheadshot_url', true );
														
														
													
													if ( 'publish' == $status && $getcolumnheadshot_url != '') {
														
														
														
														
														
														
															
															
															$layouttype = "headshot";
															
															
															
															
															
															
															
															
															
															
															
											
															
															
															
														}
														
														
														else {
															
															
															$layouttype = "noheadshot";
															
															
														}
														
														
													
													
													 
													 
													 }
													 
													 
													 else {
														 
														$columncontinue = 'no';  
																						 
														 
													 }
						
									
							
							
														}
														
															
															
														
														
														
														
														
														
														
														else {
															
															
															$columncontinue = 'no';
															
															
															
														}
														
														
														
														?>


											<?php if ($layouttype == "headshot" && $columncontinue != 'no' ) : ?>
											
													<div class="columnisttop">
														
														
													
													<div class="postlink">
														
														<div class="leftheadshot">
																				
																				<img class="columnistimage" src="<?php echo $getcolumnheadshot_url ?>" />
																				
																				<h4 class="columnistnamein"><a href="<?php echo get_permalink(); ?>"><?php echo $writername; ?></a></h4>
													
																				<h5 class="editorialminiheading"><a href="<?php echo get_permalink(); ?>">COLUMN</a></h5>
																				
																			</div>
													
													
													
																			<div class="insidepostlink">
																				
																				
																			
																					<h3 class="threebigheadline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?> </a></h3>
																					
																					
																					
																				
																					
																							<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
																					
																					$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
																					
																					
																					if ($old_caption !== "" && $old_caption !== false) {
																					
																					echo get_post_meta($post->ID, '_visual-subtitle', true); 
																					
																					
																					}
																					
																					else {
																						
																					if(function_exists("the_subtitle")) {
																							
																							echo  the_subtitle();
																							
																							
																						}
																						
																						
																					}
																					
																					
																					
																					?></a>
																					
																					
																			</div>
																			
																			
																									
																			
																			<div style="clear:both"></div>
																			
																					
																				</div> <!-- end of postlink -->
													
													
													</div>
											
											
											
											<?php endif; ?>
				
				
											<?php if ($layouttype == "noheadshot" && $columncontinue != 'no' ) : ?>
											
													<div class="columnisttop">
														
														
													
													<div class="postlink">
														
													
													
													
													
																			
																				
																				<span class="columnistnamein_noheadshot"><a href="<?php echo get_permalink(); ?>"><?php echo $writername; ?></a></span>
													
																				<span class="editorialminiheading_noheadshot"><a href="<?php echo get_permalink(); ?>">COLUMN</a></span>
													
																				
																			
																					<h3 class="threebigheadline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?> </a></h3>
																					
																					
																					
																				
																					
																							<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
																					
																					$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
																					
																					
																					if ($old_caption !== "" && $old_caption !== false) {
																					
																					echo get_post_meta($post->ID, '_visual-subtitle', true); 
																					
																					
																					}
																					
																					else {
																						
																					if(function_exists("the_subtitle")) {
																							
																							echo  the_subtitle();
																							
																							
																						}
																						
																						
																					}
																					
																					
																					
																					?></a>
																					
																					
																		
																			
																					
																				</div> <!-- end of postlink -->
													
													
													</div>
											
											
											
											<?php endif; ?>
				
				
				
				
											<?php else : ?>
							
								
							
							
							

							<?php endif; ?>



					<?php endwhile; ?>


			<?php wp_reset_query(); ?>






<?php endif; ?>


							
						
						
						
						
						
						
						
						
						<?php
								
							
 
 // current page number
$paged_l = 1;
// number of posts per page
$posts_per_page_l = 25;
// starting position
$offset = ( $paged_l - 1 ) * $posts_per_page_l;
// extract page of IDs
$ids_to_query_l = array_slice( $ut_final_list, $offset, $posts_per_page_l );



  
    $my_query = new WP_Query( array('post_type' => array( 'post', 'feature' ),
    													 'post_status' => 'publish',
    													 
    													 
    													 'posts_per_page' => 1,
    													 
    													 
	  													
	  													'tax_query' => array(
	  													array(
	  													'taxonomy' => 'section',
	  													'terms' => 'opinion',
	  													'field' => 'slug',
	  													)
	  													),
    													 
    													 'tax_query' => array(
	  													array(
	  													'taxonomy' => 'articletype',
	  													'terms' => 'op-ed',
	  													'field' => 'slug',
	  													)
	  													),
    													 
    													 
    													 
    													 ) );
 
 

 
if ( $my_query->have_posts() ) : ?>
							
							
							
										
									<?php $count = 0; ?>



			<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>


									<?php $count++; ?>



					<?php if ($count == 1) : ?>






								<?php
																				 
									  
									  $date_u = current_time('timestamp');
									  
									  $post_time = get_post_time('U');
									  
									  $post_age = $date_u - $post_time; 
									
								      $post_age_in_hours = $post_age/3600;
								      
								      $post_age_in_minutes = $post_age/60;	
								      
								      $opedhours = 48;
								
								
								
								if($opedhours > $post_age_in_hours ) {
									
									
									
															$writername = get_post_meta( get_the_ID(), '_writer_name', true );
															$writername2 = get_post_meta( get_the_ID(), '_writer_name_two', true );
															$writername3 = get_post_meta( get_the_ID(), '_writer_name_three', true );
															$writername4 = get_post_meta( get_the_ID(), '_writer_name_four', true );
															$writername5 = get_post_meta( get_the_ID(), '_writer_name_five', true );
															
															
														if ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 == "" and $writername !== "") {
															
															$writerno = 1;
															
															$writerpage = get_page_by_title( $writername, "OBJECT", 'ut_writer_page_type' );
															
															$status = get_post_status( $writerpage );
															
															$writerpage_ID = $writerpage->ID;
																
															$getopedheadshot_url = get_post_meta( $writerpage_ID, 'normalheadshot_url', true );
																
																
															
															if ( 'publish' == $status && $getopedheadshot_url != '') {
																
																
																
																
																
																
																	
																	
																	$layouttype = "headshot";
																	
																	
																	
																	
								
																	
																	
																}
																
																
																else {
																	
																	
																	$layouttype = "noheadshot";
																	
																	
																}
																
																
															
															
															 
															 
															 }
															 
															 
															 
																 elseif ($writername5 == "" and $writername4 == "" and $writername3 == "" and $writername2 !== "" and $writername !== "") {
																 
																 $writerno = 2;
																 
																 
																 
																 
																 }
																 
																 elseif ($writername5 == "" and $writername4 == "" and $writername3 !== "" and $writername2 !== "" and $writername !== "") {
																 
																 $writerno = 3;
																 
																 
																 
																 
																 }
																 
																  elseif ($writername5 == "" and $writername4 !== "" and $writername3 !== "" and $writername2 !== "" and $writername !== "") {
																 
																 $writerno = 4;
																 
																 
																 
																 
																 }
																 
																 
																 elseif ($writername5 !== "" and $writername4 !== "" and $writername3 !== "" and $writername2 !== "" and $writername !== "") {
																 
																 $writerno = 5;
																 
																 
																 
																 
																 }
															 
															 
															 
															 
															 
																 else {
																	 
																	
																 		$opedcontinue = 'no';  
																									 
																	 
																 }
								
											
									
									
								}
								
									
									
								
								
								
								
								
								
								
								else {
									
									
									$opedcontinue = 'no';
									
									
									
								}
								
								
								
								?>


							<?php if ($writerno == 1 && $layouttype == "headshot" && $opedcontinue != 'no' ) : ?>
							
									<div class="columnisttop">
										
										
									
									<div class="postlink">
										
										<div class="leftheadshot">
																
																<img class="columnistimage" src="<?php echo $getcolumnheadshot_url ?>" />
																
																<h4 class="columnistnamein"><a href="<?php echo get_permalink(); ?>"><?php echo $writername; ?></a></h4>
									
																<h5 class="editorialminiheading"><a href="<?php echo get_permalink(); ?>">OP-ED</a></h5>
																
															</div>
									
									
									
															<div class="insidepostlink">
																
																
															
																	<h3 class="threebigheadline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?> </a></h3>
																	
																	
																	
																
																	
																			<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
																	
																	$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
																	
																	
																	if ($old_caption !== "" && $old_caption !== false) {
																	
																	echo get_post_meta($post->ID, '_visual-subtitle', true); 
																	
																	
																	}
																	
																	else {
																		
																	if(function_exists("the_subtitle")) {
																			
																			echo  the_subtitle();
																			
																			
																		}
																		
																		
																	}
																	
																	
																	
																	?></a>
																	
																	
															</div>
															
															
																					
															
															<div style="clear:both"></div>
															
																	
																</div> <!-- end of postlink -->
									
									
									</div>
							
							
							<?php endif; ?>


							<?php if ($writerno == 1 && $layouttype == "noheadshot" && $opedcontinue != 'no' ) : ?>
							
									<div class="columnisttop">
										
										
									
									<div class="postlink">
										
									
									
									
									
															
																
																<span class="columnistnamein_noheadshot"><a href="<?php echo get_permalink(); ?>"><?php echo $writername; ?></a></span>
									
																<span class="editorialminiheading_noheadshot"><a href="<?php echo get_permalink(); ?>">OP-ED</a></span>
									
																
															
																	<h3 class="threebigheadline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?> </a></h3>
																	
																	
																	
																
																	
																			<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
																	
																	$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
																	
																	
																	if ($old_caption !== "" && $old_caption !== false) {
																	
																	echo get_post_meta($post->ID, '_visual-subtitle', true); 
																	
																	
																	}
																	
																	else {
																		
																	if(function_exists("the_subtitle")) {
																			
																			echo  the_subtitle();
																			
																			
																		}
																		
																		
																	}
																	
																	
																	
																	?></a>
																	
																	
														
															
																	
																</div> <!-- end of postlink -->
									
									
									</div>
							
							
							
							<?php endif; ?>






							<?php if ($writerno > 1 && $opedcontinue != 'no' ) : ?>
							
							<div class="columnisttop">
								
								
							
							<div class="postlink">
								
							
							
							
														<div class="nametaggrouping">
													
														
														<div class="columnistnamein_noheadshot">
														<a href="<?php echo get_permalink(); ?>"><?php if ($writerno == 2) {
																
																echo $writername;
																echo ' <span class="nobold">and</span> ';
																echo $writername2;
																
															}
															
															 elseif ($writerno == 3) {
																
																echo $writername;
																echo '<span class="nobold">,</span> ';
																echo $writername2;
																echo ' <span class="nobold">and</span> ';
																echo $writername3;
															}
															
															 elseif ($writerno == 4) {
																
																echo $writername;
																echo '<span class="nobold">,</span> ';
																echo $writername2;
																echo '<span class="nobold">,</span> ';
																echo $writername3;
																echo ' <span class="nobold">and</span> ';
																echo $writername4;
															}
															
															 elseif ($writerno == 5) {
																
																echo $writername;
																echo '<span class="nobold">,</span> ';
																echo $writername2;
																echo '<span class="nobold">,</span> ';
																echo $writername3;
																echo '<span class="nobold">,</span> ';
																echo $writername4;
							
																echo ' <span class="nobold">and</span> ';
																echo $writername5;
															}
															
															?></a></div><span class="editorialminiheading_noheadshot"><a href="<?php echo get_permalink(); ?>">OP-ED</a></span> </div>
							
														
													
															<h3 class="threebigheadline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?> </a></h3>
															
															
															
														
															
																	<a href="<?php echo get_permalink(); ?>" class="onebigcaption"><?php 
															
															$old_caption = get_post_meta($post->ID, '_visual-subtitle', true);
															
															
															if ($old_caption !== "" && $old_caption !== false) {
															
															echo get_post_meta($post->ID, '_visual-subtitle', true); 
															
															
															}
															
															else {
																
															if(function_exists("the_subtitle")) {
																	
																	echo  the_subtitle();
																	
																	
																}
																
																
															}
															
															
															
															?></a>
															
															
												
													
															
														</div> <!-- end of postlink -->
							
							
							</div>
							
							
							
							<?php endif; ?>








							<?php else : ?>
							
								
							
							
							

					<?php endif; ?>
						
						
			<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>
	
							
							
							
							
							
							
							
						
						
						
						</div> <!-- End of rightonright -->
						
						
						
						
						
						
						<div style="clear:both"></div>
						
						
						
					</div>
					
					
					<div style="clear:both"></div>
				

				</div>
				
				
				</div> <!-- end of topblocks -->
				
				
				
				

			</div>


