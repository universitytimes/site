<?php



require 'localhost/wp/wp-blog-header.php';




$box_a = $_POST['number_of_1'];
$box_b = $_POST['number_of_2'];
$box_c = $_POST['number_of_3'];
$box_d = $_POST['number_of_4'];
$box_e = $_POST['number_of_5'];
$box_f = $_POST['number_of_6'];
$box_g = $_POST['number_of_7'];
$box_h = $_POST['number_of_8'];
$box_i = $_POST['number_of_9'];
$box_j = $_POST['number_of_10'];
$box_k = $_POST['number_of_11'];
$box_l = $_POST['number_of_12'];
$box_m = $_POST['number_of_13'];
$box_n = $_POST['number_of_14'];
$box_o = $_POST['number_of_15'];
$box_p = $_POST['number_of_16'];
$box_q = $_POST['number_of_17'];
$box_r = $_POST['number_of_18'];
$box_s = $_POST['number_of_19'];
$box_t = $_POST['number_of_20'];
$box_u = $_POST['number_of_21'];
$box_v = $_POST['number_of_22'];
$box_w = $_POST['number_of_23'];
$box_x = $_POST['number_of_24'];
$box_y = $_POST['number_of_25'];



$id_of_a = $_POST['id_of_1'];
$id_of_b = $_POST['id_of_2'];
$id_of_c = $_POST['id_of_3'];
$id_of_d = $_POST['id_of_4'];
$id_of_e = $_POST['id_of_5'];
$id_of_f = $_POST['id_of_6'];
$id_of_g = $_POST['id_of_7'];
$id_of_h = $_POST['id_of_8'];
$id_of_i = $_POST['id_of_9'];
$id_of_j = $_POST['id_of_10'];
$id_of_k = $_POST['id_of_11'];
$id_of_l = $_POST['id_of_12'];
$id_of_m = $_POST['id_of_13'];
$id_of_n = $_POST['id_of_14'];
$id_of_o = $_POST['id_of_15'];
$id_of_p = $_POST['id_of_16'];
$id_of_q = $_POST['id_of_17'];
$id_of_r = $_POST['id_of_18'];
$id_of_s = $_POST['id_of_19'];
$id_of_t = $_POST['id_of_20'];
$id_of_u = $_POST['id_of_21'];
$id_of_v = $_POST['id_of_22'];
$id_of_w = $_POST['id_of_23'];
$id_of_x = $_POST['id_of_24'];
$id_of_y = $_POST['id_of_25'];







   
												

									
									
									if($box_a !== '') {
       
       
													$checking_for_equal = array($box_b,
																				$box_c, 
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_a, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_a) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_a) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_a) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_a) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_a) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_a) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_a) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_a) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_a) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_a) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_a) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_a) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_a) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_a) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_a) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_a) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_a) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_a) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_a) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_a) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_a) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_a) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_a) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_a) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_a) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_a;
	      
				$new_value = $id_of_a;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  
	  
	  		elseif($box_b !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_c, 
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_b, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_b) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_b) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_b) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_b) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_b) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_b) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_b) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_b) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_b) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_b) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_b) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_b) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_b) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_b) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_b) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_b) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_b) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_b) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_b) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_b) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_b) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_b) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_b) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_b) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_b) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_b;
	      
				$new_value = $id_of_c;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  
	  
	  
	  
	  		elseif($box_c !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_c, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_c) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_c) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_c) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_c) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_c) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_c) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_c) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_c) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_c) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_c) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_c) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_c) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_c) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_c) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_c) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_c) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_c) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_c) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_c) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_c) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_c) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_c) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_c) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_c) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_c) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_c;
	      
				$new_value = $id_of_c;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  
	  
	  
	  		elseif($box_d !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_d, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_d) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_d) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_d) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_d) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_d) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_d) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_d) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_d) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_d) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_d) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_d) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_d) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_d) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_d) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_d) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_d) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_d) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_d) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_d) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_d) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_d) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_d) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_d) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_d) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_d) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_d;
	      
				$new_value = $id_of_d;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  		elseif($box_e !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_e, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_e) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_e) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_e) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_e) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_e) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_e) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_e) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_e) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_e) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_e) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_e) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_e) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_e) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_e) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_e) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_e) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_e) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_e) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_e) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_e) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_e) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_e) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_e) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_e) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_e) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_e;
	      
				$new_value = $id_of_e;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  		elseif($box_f !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_f, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_f) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_f) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_f) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_f) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_f) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_f) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_f) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_f) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_f) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_f) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_f) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_f) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_f) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_f) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_f) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_f) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_f) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_f) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_f) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_f) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_f) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_f) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_f) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_f) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_f) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_f;
	      
				$new_value = $id_of_f;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_g !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_g, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_g) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_g) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_g) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_g) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_g) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_g) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_g) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_g) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_g) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_g) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_g) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_g) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_g) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_g) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_g) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_g) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_g) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_g) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_g) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_g) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_g) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_g) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_g) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_g) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_g) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_g;
	      
				$new_value = $id_of_g;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  		elseif($box_h !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_h, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_h) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_h) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_h) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_h) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_h) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_h) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_h) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_h) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_h) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_h) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_h) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_h) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_h) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_h) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_h) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_h) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_h) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_h) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_h) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_h) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_h) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_h) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_h) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_h) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_h) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_h;
	      
				$new_value = $id_of_h;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_i !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_i, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_i) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_i) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_i) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_i) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_i) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_i) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_i) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_i) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_i) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_i) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_i) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_i) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_i) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_i) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_i) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_i) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_i) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_i) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_i) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_i) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_i) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_i) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_i) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_i) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_i) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_i;
	      
				$new_value = $id_of_i;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  		elseif($box_j !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_j, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_j) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_j) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_j) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_j) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_j) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_j) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_j) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_j) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_j) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_j) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_j) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_j) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_j) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_j) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_j) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_j) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_j) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_j) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_j) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_j) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_j) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_j) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_j) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_j) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_j) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_j;
	      
				$new_value = $id_of_j;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  
	  		elseif($box_k !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_k, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_k) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_k) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_k) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_k) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_k) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_k) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_k) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_k) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_k) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_k) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_k) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_k) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_k) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_k) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_k) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_k) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_k) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_k) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_k) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_k) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_k) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_k) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_k) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_k) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_k) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_k;
	      
				$new_value = $id_of_k;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  
	  
	  		elseif($box_l !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_l, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_l) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_l) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_l) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_l) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_l) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_l) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_l) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_l) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_l) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_l) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_l) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_l) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_l) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_l) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_l) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_l) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_l) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_l) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_l) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_l) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_l) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_l) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_l) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_l) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_l) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_l;
	      
				$new_value = $id_of_l;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_m !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_m, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_m) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_m) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_m) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_m) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_m) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_m) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_m) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_m) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_m) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_m) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_m) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_m) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_m) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_m) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_m) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_m) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_m) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_m) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_m) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_m) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_m) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_m) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_m) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_m) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_m) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_m;
	      
				$new_value = $id_of_m;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_n !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_n, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_n) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_n) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_n) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_n) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_n) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_n) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_n) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_n) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_n) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_n) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_n) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_n) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_n) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_n) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_n) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_n) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_n) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_n) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_n) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_n) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_n) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_n) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_n) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_n) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_n) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_n;
	      
				$new_value = $id_of_n;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  		elseif($box_o !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_o, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_o) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_o) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_o) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_o) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_o) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_o) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_o) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_o) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_o) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_o) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_o) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_o) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_o) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_o) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_o) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_o) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_o) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_o) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_o) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_o) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_o) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_o) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_o) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_o) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_o) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_o;
	      
				$new_value = $id_of_o;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_p !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_p, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_p) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_p) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_p) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_p) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_p) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_p) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_p) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_p) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_p) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_p) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_p) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_p) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_p) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_p) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_p) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_p) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_p) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_p) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_p) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_p) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_p) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_p) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_p) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_p) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_p) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_p;
	      
				$new_value = $id_of_p;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_q !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_q, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_q) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_q) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_q) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_q) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_q) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_q) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_q) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_q) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_q) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_q) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_q) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_q) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_q) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_q) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_q) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_q) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_q) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_q) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_q) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_q) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_q) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_q) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_q) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_q) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_q) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_q;
	      
				$new_value = $id_of_q;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_r !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_r, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_r) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_r) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_r) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_r) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_r) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_r) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_r) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_r) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_r) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_r) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_r) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_r) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_r) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_r) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_r) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_r) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_r) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_r) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_r) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_r) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_r) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_r) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_r) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_r) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_r) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_r;
	      
				$new_value = $id_of_r;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_s !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_s, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_s) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_s) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_s) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_s) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_s) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_s) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_s) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_s) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_s) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_s) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_s) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_s) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_s) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_s) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_s) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_s) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_s) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_s) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_s) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_s) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_s) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_s) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_s) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_s) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_s) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_s;
	      
				$new_value = $id_of_s;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_t !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_t, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_t) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_t) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_t) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_t) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_t) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_t) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_t) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_t) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_t) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_t) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_t) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_t) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_t) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_t) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_t) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_t) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_t) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_t) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_t) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_t) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_t) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_t) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_t) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_t) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_t) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_t;
	      
				$new_value = $id_of_t;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  		elseif($box_u !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_v,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_u, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_u) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_u) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_u) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_u) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_u) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_u) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_u) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_u) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_u) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_u) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_u) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_u) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_u) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_u) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_u) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_u) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_u) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_u) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_u) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_u) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_u) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_u) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_u) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_u) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_u) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_u;
	      
				$new_value = $id_of_u;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_v !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_w,
																				$box_x,
																				$box_y	);


													if (in_array($box_v, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_v) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_v) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_v) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_v) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_v) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_v) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_v) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_v) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_v) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_v) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_v) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_v) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_v) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_v) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_v) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_v) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_v) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_v) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_v) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_v) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_v) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_v) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_v) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_v) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_v) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_v;
	      
				$new_value = $id_of_v;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_w !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_x,
																				$box_y	);


													if (in_array($box_w, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_w) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_w) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_w) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_w) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_w) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_w) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_w) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_w) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_w) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_w) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_w) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_w) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_w) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_w) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_w) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_w) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_w) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_w) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_w) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_w) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_w) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_w) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_w) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_w) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_w) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_w;
	      
				$new_value = $id_of_w;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_x !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_y	);


													if (in_array($box_x, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_x) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_x) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_x) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_x) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_x) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_x) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_x) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_x) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_x) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_x) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_x) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_x) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_x) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_x) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_x) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_x) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_x) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_x) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_x) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_x) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_x) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_x) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_x) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_x) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_x) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_x;
	      
				$new_value = $id_of_x;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  		elseif($box_y !== '') {
       
       
													$checking_for_equal = array($box_a,
																				$box_b, 
																				$box_c,
																				$box_d,
																				$box_e,
																				$box_f,
																				$box_g,
																				$box_h,
																				$box_i,
																				$box_j,
																				$box_k,
																				$box_l,
																				$box_m,
																				$box_n,
																				$box_o,
																				$box_p,
																				$box_q,
																				$box_r,
																				$box_s,
																				$box_t,
																				$box_u,
																				$box_v,
																				$box_w,
																				$box_x	);


													if (in_array($box_y, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																/* echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>"; */
    
																$has_run = "true";
    
																}
  
													}


											
											
											
										else
													
												{      
												
												
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

       
       
										 		
															
															
															
													if($posts1 == $id_of_y) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $id_of_y) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $id_of_y) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $id_of_y) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $id_of_y) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $id_of_y) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $id_of_y) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $id_of_y) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $id_of_y) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $id_of_y) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $id_of_y) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $id_of_y) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $id_of_y) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $id_of_y) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $id_of_y) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $id_of_y) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $id_of_y) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts18 == $id_of_y) {
											       		
											       		$option = 'post18';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts19 == $id_of_y) {
											       		
											       		$option = 'post19';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts20 == $id_of_y) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts21 == $id_of_y) {
											       		
											       		$option = 'post21';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts22 == $id_of_y) {
											       		
											       		$option = 'post22';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts23 == $id_of_y) {
											       		
											       		$option = 'post23';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts24 == $id_of_y) {
											       		
											       		$option = 'post24';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts25 == $id_of_y) {
											       		
											       		$option = 'post25';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.$box_y;
	      
				$new_value = $id_of_y;
	      
				update_option( $option, $new_value );
	  
	  
				

	  
				} 	/* END OF ELSE (in array thing) */
	  
	
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
	  
	  
	  
	  
	  header("Location: http://localhost/wp/wp-admin/admin.php?page=postorderit");
	   
				exit();
	  
	  
	  
    
    
   
   
   ?>
