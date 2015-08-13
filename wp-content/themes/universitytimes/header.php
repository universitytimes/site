<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/ember.js/1.6.1/ember.min.js"></script>

   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js"></script>
        <script src="<?php echo home_url(); ?>/wp-content/themes/universitytimes/javascript/jquery-imagefill.js"></script>
        


<link href="//fonts.googleapis.com/css?family=PT+Serif:400italic,400,700italic,700" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One' rel='stylesheet' type='text/css'>



	</head>

	<body <?php body_class(); ?>>

		<div id="container">
		
		<div class="headercontained">
				
					<header class="header" role="banner">

			

					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<script>
					
					jQuery(document).ready(function(){
     
     
     
     jQuery(".newsfeedlink").mouseover(function(){
         jQuery("#logo").removeClass("whiteshadow");
         
         
         
         
         
         
      
     });
     
     
     jQuery(".newsfeedlink").mouseout(function(){
         
         
      setTimeout(function(){   jQuery("#logo").addClass("whiteshadow"); }, 100);
         
         
         
         
         
         
      
     });
     
     
     
     
     
     
     
     
     
     
     
     
});
					
					</script>
					
					
					<h1 id="logo" class="whiteshadow"><a href="<?php echo home_url(); ?>" rel="nofollow">The University Times</a></h1>

					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>


<div class="heightstop">

<div class="navigationtopcontainer">

					<nav class="toplevel">
					
					<div class="greatboom">
					
				<script>
				
			jQuery(function ($) {
			
			
			$.fn.slideFadeToggle  = function(speed, easing, callback) {
        return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
};
			
	
			
			$(".goddess").click(function() {
   $('#boom').slideFadeToggle();
});	







 








 $(window).resize(function() {
  if ($(window).width() > 710) {
  
  
  
   $('#boom').fadeIn();
    
    
    
  }


});


$(window).resize(function() {
  if ($(window).width() < 711) {
  
  
  
   $('#boom').hide();
    
    
    
  }


});



 




 $(window).resize(function() {
  if ($(window).width() > 972) {
  
  
  
   $('.hider').fadeIn();
    
    
    
  }


});

$(window).resize(function() {
  if ($(window).width() < 973) {
  
  
  
   $('.hider').hide();
    
    
    
  }


});













				
				
				});
				</script>
					
					
					<label for="show-menu" class="show-menu goddess">All Sections</label>
<input type="checkbox" id="show-menu" role="button" />
					
					
					<ul id="boom">
					
					<li>
					
					
					<a href="<?php echo site_url(); ?>/newsfeed" class="newsfeedlink">News <span style="font-size: 9px;" class="oi" data-glyph="caret-bottom" title="caret bottom" aria-hidden="true">
					
					
					
					
					</span>
					
					
					</a>
						
						
						

<ul class="boomsub">
<h4 class="miniheading">The Latest</h4>

<?php

$query = new WP_Query( array( 'tax_query' => array(
        array(
        'taxonomy' => 'section',
        'field' => 'name',
        'terms' => 'news')
    ), 'homepage2-post-order'=>'disable', 'orderby' => 'date') );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 1) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>

<hr />

<?php elseif ($count == 2) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>

<hr />


<?php elseif ($count == 3) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>


<?php else : ?>
							
							
							
							
							
							
							
							
							
							

<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>


 <li class="seemore"><a class="moremore" href="<?php echo site_url(); ?>/newsfeed">SEE ALL NEWS</a></li>

</ul>

		
						
						
					</li>
					<li><a href="<?php echo site_url(); ?>/infocus" class="infocuslink">In Focus <span style="font-size: 9px;" class="oi" data-glyph="caret-bottom" title="caret bottom" aria-hidden="true"></span></a>
					
					
					
					<ul class="boomsubfeature clearfix">
					
					
					
					<li class="listone"> 
					
					
					
					<ul class="listoneul clearfix">
<?php

$query = new WP_Query( array( 'cat' => '7', 'homepage2-post-order'=>'disable', 'orderby' => 'date', 'post_type' => array('post','feature'), 'posts_per_page' => 2) );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 1) : ?>



<li class="leftone"><a class="" href="<?php the_permalink() ?>"><h4 class="miniheading"><?php
 

 
//Output the trainer email
 
echo $content_meta_display;
?></h4>

<div class="cropper">
	
	<img class="featuredcropper" src="<?php
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
?>"	alt="" />
</div>

<span><?php the_title(); ?></span></li>



<?php elseif ($count == 2) : ?>

<li class="rightone"><a class="" href="<?php the_permalink() ?>" ><h4 class="miniheading"><?php
 

 
//Output the trainer email
 
echo $content_meta_display;
?></h4>

<div class="cropper">
	
	<img class="featuredcropper" src="<?php
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
?>"	alt="" />
	
	
</div>

<span><?php the_title(); ?></span></a></li>




					</ul> <!-- End of "List One" <ul> -->
				
				
					</li> <!-- End of "List One" <li> -->
					
					
					<?php else : ?>
							
					<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>	



<li class="listtwo"> 
					
					
					
					<ul class="listtwoul clearfix">


<li class="lefttwo">

<ul class="lefttwoul">


<h4 class="miniheading">More Stories</h4>

<?php

$query = new WP_Query( array( 'cat' => '7', 'homepage2-post-order'=>'disable', 'orderby' => 'date', 'post_type' => array('post','feature'), 'posts_per_page' => 8) );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 3) : ?>




<li><a class="boomsublink" href="<?php the_permalink() ?>" ><?php the_title(); ?></a></li>

<hr />
<?php elseif ($count == 4) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li><hr />

<?php elseif ($count == 5) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>	
	
	<?php else : ?>
							
					<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>	

<li class="seemore"><a class="moremore" href="<?php echo site_url(); ?>/infocus">SEE ALL IN FOCUS</a></li>


</ul>

</li>




<li class="righttwo">

<ul class="righttwoul">


<h4 class="miniheading">More from In Focus</h4>

<li><a href="">Societies</a></li>

<li><a href="">Review</a></li>

<li><a href="">Supplement</a></li>



</ul>

</li>




	
							
					</ul>
					
</li>





							
							
							
							
				<div style="clear: both;"></div>			
							




 

</ul>

					
					
					
					
					
					</li>
					
					
					
					
					
					<li><a href="<?php echo site_url(); ?>/opinion" class="opinionlink">Opinion <span style="font-size: 9px;" class="oi" data-glyph="caret-bottom" title="caret bottom" aria-hidden="true"></span></a>
					
									<ul class="boomsubopinion clearfix">
					
					
					
					<li class="listone"> 
					
					
					
					<ul class="listoneul clearfix">
<?php

$query = new WP_Query( array( 'cat' => '15', 'homepage2-post-order'=>'disable', 'orderby' => 'date', 'post_type' => array('post','opinion'), 'posts_per_page' => 2) );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 1) : ?>



<li class="leftone"><a class="" href="<?php the_permalink() ?>"><h4 class="miniheading"><?php
 

 
//Output the trainer email
 
echo $content_meta_display;
?></h4>

<div class="cropper">
	
	
	<?php



$headshot_image = '';

if (empty($headshot_image))

{

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

echo '<img class="featuredcropper" src="' . $feat_image . '"	alt="" />';

}

else

{


$headshot_image = '';



echo '<img class="headshotcropper" src="' . $headshot_image . '"	alt="" />';



}

?>







	
	
	</div>

<span><?php the_title(); ?></span></li>



<?php elseif ($count == 2) : ?>

<li class="rightone"><a class="" href="<?php the_permalink() ?>" ><h4 class="miniheading"><?php
 
$content_meta_display = '';
 
//Output the trainer email
 
echo $content_meta_display
?></h4>

<div class="cropper">
	
	<?php

$headshot_image = '';

if (empty($headshot_image)){

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

echo '<img class="featuredcropper" src="' . $feat_image . '"	alt="" />';

}

else {


$headshot_image = '';


echo '<img class="headshotcropper" src="' . $headshot_image . '"	alt="" />';



}

?>


</div>

<span><?php the_title(); ?></span></a></li>




					</ul> <!-- End of "List One" <ul> -->
				
				
					</li> <!-- End of "List One" <li> -->
					
					
					<?php else : ?>
							
					<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>	



<li class="listtwo"> 
					
					
					
					<ul class="listtwoul clearfix">


<li class="lefttwo">

<ul class="lefttwoul">


<h4 class="miniheading">More Opinions</h4>

<?php

$query = new WP_Query( array( 'cat' => '15', 'homepage2-post-order'=>'disable', 'orderby' => 'date', 'post_type' => array('post','opinion'), 'posts_per_page' => 8) );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 3) : ?>




<li><a class="boomsublink" href="<?php the_permalink() ?>" ><?php the_title(); ?></a></li>

<hr />
<?php elseif ($count == 4) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li><hr />

<?php elseif ($count == 5) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>	
	
	<?php else : ?>
							
					<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>	

<li class="seemore"><a class="moremore" href="<?php echo site_url(); ?>/opinion">SEE ALL IN OPINION</a></li>


</ul>

</li>




<li class="righttwo">

<ul class="righttwoulopinion">


<h4 class="miniheading">More from Opinion</h4>

<li><a href="">Columnists</a></li>

<li><a href="">Editorials</a></li>

<li><a href="">Topical</a></li>



</ul>

</li>




	
							
					</ul>
					
</li>





							
							
							
							
				<div style="clear: both;"></div>			
							




 

</ul>

					
					
					
					</li>
					<li><a href="#" class="sportlink">Sport <span style="font-size: 9px;" class="oi" data-glyph="caret-bottom" title="caret bottom" aria-hidden="true"></span></a>
					
					
					<ul class="boomsubopinion clearfix sport">
					
					
					
					<li class="listone"> 
					
					
					
					<ul class="listoneul clearfix">
<?php

$query = new WP_Query( array( 'cat' => '12', 'homepage2-post-order'=>'disable', 'orderby' => 'date', 'post_type' => array('post','feature'), 'posts_per_page' => 2) );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 1) : ?>



<li class="leftone"><a class="" href="<?php the_permalink() ?>"><h4 class="miniheading"><?php
 
$content_meta_display = '';
 
//Output the trainer email
 
echo $content_meta_display
?></h4>

<div class="cropper">
	
	
		<img class="featuredcropper" src="<?php
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
?>"	alt="" />




	
	
	</div>

<span><?php the_title(); ?></span></li>



<?php elseif ($count == 2) : ?>

<li class="rightone"><a class="" href="<?php the_permalink() ?>" ><h4 class="miniheading"><?php
 
$content_meta_display = '';
 
//Output the trainer email
 
echo $content_meta_display
?></h4>

<div class="cropper">
	
		<img class="featuredcropper" src="<?php
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
?>"	alt="" />


</div>

<span><?php the_title(); ?></span></a></li>




					</ul> <!-- End of "List One" <ul> -->
				
				
					</li> <!-- End of "List One" <li> -->
					
					
					<?php else : ?>
							
					<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>	



<li class="listtwo"> 
					
					
					
					<ul class="listtwoul clearfix">


<li class="lefttwo">

<ul class="lefttwoul">


<h4 class="miniheading">More Sport</h4>

<?php

$query = new WP_Query( array( 'cat' => '12', 'homepage2-post-order'=>'disable', 'orderby' => 'date', 'post_type' => array('post','feature'), 'posts_per_page' => 8) );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 3) : ?>




<li><a class="boomsublink" href="<?php the_permalink() ?>" ><?php the_title(); ?></a></li>

<hr />
<?php elseif ($count == 4) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li><hr />

<?php elseif ($count == 5) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>	
	
	<?php else : ?>
							
					<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>	

<li class="seemore"><a class="moremore" href="<?php echo site_url(); ?>/sport">SEE ALL IN SPORT</a></li>


</ul>

</li>




<li class="righttwo">

<ul class="righttwoulopinion">


<h4 class="miniheading">More from Sport</h4>

<li><a href="">Rugby</a></li>

<li><a href="">Soccer</a></li>

<li><a href="">Rowing</a></li>

<li><a href="">Fencing</a></li>



</ul>

</li>




	
							
					</ul>
					
</li>





							
							
							
							
				<div style="clear: both;"></div>			
							




 

</ul>

					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					</li>
					<li><a href="<?php echo site_url(); ?>/magazine" class="magazinelink">Magazine <span style="font-size: 9px;" class="oi" data-glyph="caret-bottom" title="caret bottom" aria-hidden="true"></span></a>
					
					
					
						<ul class="boomsubopinion clearfix sport">
					
					
					
					<li class="listone"> 
					
					
					
					<ul class="listoneul clearfix">
<?php

$query = new WP_Query( array( 'cat' => '12', 'homepage2-post-order'=>'disable', 'orderby' => 'date', 'post_type' => array('post','feature'), 'posts_per_page' => 2) );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 1) : ?>



<li class="leftone"><a class="" href="<?php the_permalink() ?>"><h4 class="miniheading"><?php
 
$content_meta_display = '';
 
//Output the trainer email
 
echo $content_meta_display
?></h4>

<div class="cropper">
	
	
		<img class="featuredcropper" src="<?php
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
?>"	alt="" />




	
	
	</div>

<span><?php the_title(); ?></span></li>



<?php elseif ($count == 2) : ?>

<li class="rightone"><a class="" href="<?php the_permalink() ?>" ><h4 class="miniheading"><?php
 
$content_meta_display = '';
 
//Output the trainer email
 
echo $content_meta_display;
?></h4>

<div class="cropper">
	
		<img class="featuredcropper" src="<?php
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
?>"	alt="" />


</div>

<span><?php the_title(); ?></span></a></li>




					</ul> <!-- End of "List One" <ul> -->
				
				
					</li> <!-- End of "List One" <li> -->
					
					
					<?php else : ?>
							
					<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>	



<li class="listtwo"> 
					
					
					
					<ul class="listtwoul clearfix">


<li class="lefttwo">

<ul class="lefttwoul">


<h4 class="miniheading">More Sport</h4>

<?php

$query = new WP_Query( array( 'cat' => '12', 'homepage2-post-order'=>'disable', 'orderby' => 'date', 'post_type' => array('post','feature'), 'posts_per_page' => 8) );
 
if ( $query->have_posts() ) : ?>

							
							
							
<?php $count = 0; ?>



<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php $count++; ?>



<?php if ($count == 3) : ?>




<li><a class="boomsublink" href="<?php the_permalink() ?>" ><?php the_title(); ?></a></li>

<hr />
<?php elseif ($count == 4) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li><hr />

<?php elseif ($count == 5) : ?>

<li><a class="boomsublink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>	
	
	<?php else : ?>
							
					<?php endif; ?>
<?php endwhile; ?>


<?php wp_reset_query(); ?>






<?php endif; ?>	

<li class="seemore"><a class="moremore" href="<?php echo site_url(); ?>/sport">SEE ALL IN SPORT</a></li>


</ul>

</li>




<li class="righttwo">

<ul class="righttwoulopinion">


<h4 class="miniheading">More from Sport</h4>

<li><a href="">Rugby</a></li>

<li><a href="">Soccer</a></li>

<li><a href="">Rowing</a></li>

<li><a href="">Fencing</a></li>



</ul>

</li>




	
							
					</ul>
					
</li>





							
							
							
							
				<div style="clear: both;"></div>			
							




 

</ul>

					
					
					
					
					
					
					</li>
					
						<li><a href="<?php echo site_url(); ?>/radius" class="radiuslink">Radius <span style="font-size: 9px;" class="oi" data-glyph="caret-bottom" title="caret bottom" aria-hidden="true"></span></a></li>
					
					
					<li><a href="<?php echo site_url(); ?>/blogs" class="blogslink">Blogs <span style="font-size: 9px;" class="oi" data-glyph="caret-bottom" title="caret bottom" aria-hidden="true"></span></a></li>
					
									
			
					</ul>
					
					</div> <!-- End of greatboom -->
					
					
					
						<script>
					
					jQuery(function ($) {
					
					
					
					
					$(".allsect").click(function(){
  $(".allsect").toggleClass("activity");
});
					
					
						
					
					
					
					});
					
					
					
					
					</script>
								
								
								<div class="allsect">	
								
									
					
					
					<a class="cheeseit" id="hamburger-icon" href="#" title="Menu">
  <span class="line-1"></span>
  <span class="line-2"></span>
  <span class="line-3"></span>
</a>

<span class="alltext">ALL</span> <span class="sectiontext">SECTIONS</span>

								</div>			
								
								<div class="shilly">
					
									
					<div class="pusherit">
					
					
					
					
					<div class="hider">
					<div class="searchboxd">			
					
					<form class="searchformform" style="" method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
					
<div><input type="text" name="s" id="s" value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>



<button type="submit" id="searchsubmit" value="Search" class="btn"><span style="" class="oi searchicon" data-glyph="magnifying-glass" title="magnifying glass" aria-hidden="true"></span>	</button>



</div>






</form>

					</div> <!-- End of searchboxd div -->
					
					
					</div> <!-- End of hider -->
					
					<div class="searchpush">
					
						<div id="excontainer">
						
					<a id="ex-icon" class="cheeseit2" href="#" title="Menu">
  <span class="line ex-1"></span>
  <span class="line ex-2"></span>
</a>

						</div>

					<div id="searchitcontainer">
					
				<span style="" class="oi searchicon" data-glyph="magnifying-glass" title="magnifying glass" aria-hidden="true"></span>
					
					</div>
					
					</div>
					
					<div style="clear: both;"></div>	
					
					
					
					</div> <!-- End of pusherit -->
					
					
					<script>
					
					jQuery(function ($) {
					
					
				$(".searchpush").click(function () {

    // Set the effect type
    var effect = 'slide';

    // Set the options for the effect type chosen
    var options = { direction: 'right' };

    // Set the duration (default: 400 milliseconds)
    var duration = 400;
    
    var delay = 410;
    
    

    $('.hider').toggle(effect, options, duration, callbackFn);
    
     
     function callbackFn(){

     

     $('.hider').is(":visible") ?  $('#s').focus() :  $('#s').focusout();


} 
     
     
     
     
     
     		
});		




$( "#s" ).focus(function() {
  

		
		
		$( "#searchitcontainer" ).delay( 100 ).fadeOut(100);

		$( "#excontainer" ).delay( 100 ).fadeIn(220);



		
		 	
		 	
	
	
	
	
	
	
	
	
	
		 
			
  
});


$( "#s" ).focusout(function() {
  

		
		
		$( "#searchitcontainer" ).delay( 300 ).fadeIn(320);

		$( "#excontainer" ).delay( 300 ).fadeOut(200);



		
		 	
	
	
	
	
	
	
	
	
	
		 
			
  
});







	
 
  
   






$(document).mouseup(function (e)
{
    var container = $(".shilly");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
         if ($(window).width() < 981) {
         
         if ($(this).find('.hider').is(':visible')) {
   
      // Set the effect type
    var effect = 'slide';

    // Set the options for the effect type chosen
    var options = { direction: 'right' };

    // Set the duration (default: 400 milliseconds)
    var duration = 400;
  
  
  
	$('.hider').toggle(effect, options, duration);
	
	}
	
	}

    }
});			



    
    
 


					
					
					
					});
					
					
					
					
					</script>
					
					
					</div> <!-- Close Shilly Container -->

					
					
					
					
						
					</nav>
					

					

			</div> <!-- End of navigationtopcontainer div -->
			
			
			</div>
			
		
			
			</header>
			
			
				
			
			
			
			
		</div> <!-- End of headercontained div -->
