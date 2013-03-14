<?php
/*
Template Name: Auction Gallery
*/
get_header(); ?>
<div class="page">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php edit_post_link( 'edit', '<p>', '</p>'); ?> 
	
	<div id="title">
		<?= the_title(); ?>
	</div>
<br style="clear:both">
	<div id="main_content">
		<?php the_content(); ?>		
	<?php endwhile; ?>
	<div id="content_pictures_below">
	<?php

 $querydetails = "
   SELECT wposts.*
   FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
   WHERE wposts.ID = wpostmeta.post_id
   AND wpostmeta.meta_key = 'auctiongroup'
   AND wposts.post_status = 'publish'
   ORDER BY wposts.post_date DESC
 ";


 $pageposts = $wpdb->get_results($querydetails, OBJECT)

 ?>

 <?php if ($pageposts):       
 foreach ($pageposts as $post):
       setup_postdata($post);
        
		$work_image = get('work_image');
		$first_name = get('first_name');
		$last_name = get('last_name');
		$work_title = get('work_title');
		$year = get('year');
		$dimensions = get('dimensions');
		$media = get('media');
		$price = get('price');
		$notes = get('notes');
		$alt_image = get('alternative_image_image');
		?>
			   <?php if($work_image){ ?>
			    <div id="item-wrap">
					
					<?php // get ?>
					<!-- thumbnail image -->
					<img src="
					<?php  
						if($alt_image){echo $alt_image;}
						else{echo get('work_image');}
					?>
					" class="imagefield-field_pictures toggle thumbnail" />
					
					<div class="description">
						
						<!-- large image -->
						<img src="<?php  
							if($alt_image){echo $alt_image;}
							else{echo get('work_image');}
						?>" class='imagefield-field_pictures toggle2' />
					
						<p>  
							<?php if($first_name){echo $first_name.' '.$last_name;}
							else{echo $last_name.'
							';}
							echo '<br />
							';
							if($work_title) {echo '<i>'.$work_title.', </i>
							';}
							if($year){echo $year.'<br />
							';}
							if($media){echo $media.'<br />
							';}
							if($dimensions){echo $dimensions.'<br />';}
							if($price){echo $price.'<br />';}
							echo '<br />
							';?>
						</p>    
					 </div><!-- .description -->
				 </div><!-- #item-wrap -->
					  
					  <?php
						//if there is an alternative image then there will be no additional images / fields
						
						//if (get('alternative-image')){
						//do nothing	
						//}
						//else{
						//do this	
						//}
						  
						
						
						// additional images
					  	// duplicate groups.
			          	// getGroupOrder us back an array of the order of groups
						// The parameter for this function is the name of a field belonging to the group
					   
					   	$additional = getGroupOrder('additional_work_image');
                       	
						if($alt_image == ''){
							if($additional){

								foreach($additional as $add){
						                                                                                                                           
                        
						
									// the second parameter of the function and get_image get is the index of the group to show

									$add_work_image = get('additional_work_image',$add);
									$add_work_title = get('additional_work_title',$add);
									$add_year = get('additional_year',$add);
									$add_dimensions = get('additional_dimensions',$add);
									$add_media = get('additional_media',$add);  					
									$add_price = get('additional_price',$add);

									echo '
								<div id="item-wrap" class="additional">
									<img src=\''.$add_work_image.'\'  class="imagefield-field_pictures toggle thumbnail" />
						                                                                           
									<div class="description" class="additional">
									<img src=\''.$add_work_image.'\'  class="imagefield-field_pictures toggle2" />';

						
									if($add_work_title) {echo '<i>'.$add_work_title.', </i>
									';}

									if($add_year){echo $add_year.'<br />
									';}

									if($add_media){echo $add_media.'<br />
									';}

									if($add_dimensions){echo $add_dimensions.'<br />
									';}							

									if($add_price){echo $add_price.'<br />
									';}
						
								

								
															
									echo '</div><!-- #description .additional -->';
					
								echo '</div><!-- #itemwrap .additional -->';
					
					  			}//additional loop end
	                          }//ifadditional 
							}//if $alt_image
						?>
						
				   			
			   <?php } ?>
			   
 <?php endforeach;
endif; ?></div>
	</div>
	
	<div id="column_2">
	<div id = "bookstore-content">
		
        </div>

 
	</div>
	</div>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>