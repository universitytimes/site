if(isset($_POST['submit'])) 
												{
   
   
												$current_number_of = 'number_of_'.$loop_counter;

									
									
									if($current_value_input !== '') {
       
       
													$checking_for_equal = array('number_of_1','number_of_2','number_of_3','number_of_4','number_of_5','number_of_6','number_of_7','number_of_8','number_of_9','number_of_10','number_of_11','number_of_12','number_of_13','number_of_14','number_of_15','number_of_16','number_of_17','number_of_18','number_of_19','number_of_20','number_of_21','number_of_22','number_of_23','number_of_24','number_of_25');

 
													$remove_equal = array_search('number_of_'.$loop_counter, $checking_for_equal);

													unset($checking_for_equal[$remove_equal]);


													foreach ($checking_for_equal as &$valued) {
														$valued = $_POST[$valued];

														}



													if (in_array(${'number_of_' . $loop_counter}, $checking_for_equal))
													{
  
															if ($has_run !== "true") {
  
																echo "<div id='message' class='error'>Sorry, posts cannot have the same position. Try again.</div>";
    
																$has_run = "true";
    
																}
  
  
													}


											
											
											
										else
													
												{      
       
       
															
															
															
															
													if($posts1 == $current_id) {
	       		
													$option = 'post1';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}

	   		
													elseif($posts2 == $current_id) {
	       		
													$option = 'post2';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts3 == $current_id) {
	       		
													$option = 'post3';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


													elseif($posts4 == $current_id) {
	       		
													$option = 'post4';
	      
													$new_value = '';
	      
													update_option( $option, $new_value );
	       	
	       		
													}


											   		elseif($posts5 == $current_id) {
											       		
											       		$option = 'post5';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts6 == $current_id) {
											       		
											       		$option = 'post6';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		
											   		elseif($posts7 == $current_id) {
											       		
											       		$option = 'post7';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		elseif($posts8 == $current_id) {
											       		
											       		$option = 'post8';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts9 == $current_id) {
											       		
											       		$option = 'post9';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts10 == $current_id) {
											       		
											       		$option = 'post10';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts11 == $current_id) {
											       		
											       		$option = 'post11';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
										
											   		elseif($posts12 == $current_id) {
											       		
											       		$option = 'post12';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		elseif($posts13 == $current_id) {
											       		
											       		$option = 'post13';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts14 == $current_id) {
											       		
											       		$option = 'post14';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
										
											   		elseif($posts15 == $current_id) {
											       		
											       		$option = 'post15';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts16 == $current_id) {
											       		
											       		$option = 'post16';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										
											   		elseif($posts17 == $current_id) {
											       		
											       		$option = 'post17';
											      
												   		$new_value = '';
											      
												   		update_option( $option, $new_value );
											       	
											       		
										       		}
										       		
										       		
										       		else {
											       		
											       		
											       		
										       		}



	  
	  
	
		  
				$option = 'post'.${'number_of_' . $loop_counter};
	      
				$new_value = ${'id_of_' . $loop_counter};
	      
				update_option( $option, $new_value );
	  
	  
				header("Location: " . $_SERVER['REQUEST_URI']);
	   
				exit();
	  
	  
	  
	  
	  
	  
	  
				} 	/* END OF ELSE (in array thing) */
	  
	  
	  
	 



 




 


	  
	  
	  
	  
	   
	  
	  } 	/* END OF IF (checking for blank) */
	  
	  
	  
    
   }  /* END OF IF SUBMIT */
