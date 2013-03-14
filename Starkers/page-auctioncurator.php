<?php
/*
Template Name: Auction curator
*/
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/lib.js"></script>

		
<div id="pictures">
				<?php
						$work_image = get('work_image');
						$first_name = get('first_name');
						$last_name = get('last_name');
						$work_title = get('work_title');
						$year = get('year');
						$dimensions = get('dimensions');
						$media = get('media');
						$credit = get('credit');
						$price = get('price');
						$notes = get('notes');
						
						
						//echo "<div>";
						//echo "<p>";
		
						//adding duplicate images
						//if($work_image){echo '<img src=\''.$work_image.'\' class="imagefield-field_pictures" style="width:200px"> <br />';}
						// form 1, using getFieldOrder and get
 						// the function returns an array getFieldOrder us to index field
						// The parameter for this function is the name of the field
						$images = getFieldOrder('work_image');
                        	foreach($images as $image){
							if (get('work_image',1,$image)){
								// get the first parameter is the name of the field, the second is the index of the group, if this
								// field is not duplicable placed in a group 1, the third parameter is the index of field
								echo '<a href="'.get('work_image',1,$image).'" class="lightbox" id="main-img"><img src="'.get('work_image',1,$image).'" class="imagefield-field_pictures" style="width:250px" /></a><br />';  
							
							}                  
                        }

						if($first_name){echo $first_name.' '.$last_name;}
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
						if($credit){echo $credit.'<br />';}
						if($price){echo $price.'<br />';}          
						echo '<br />
						';
						//additional images
						
						// duplicate groups.
 
						// getGroupOrder us back an array of the order of groups
						// The parameter for this function is the name of a field belonging to the group
						$additional = getGroupOrder('additional_work_image');
						
						foreach($additional as $add){
							// the second parameter of the function and get_image get is the index of the group to show
							$add_work_image = get('additional_work_image',$add);
							$add_work_title = get('additional_work_title',$add);
							$add_year = get('additional_year',$add);
							$add_dimensions = get('additional_dimensions',$add);
							$add_media = get('additional_media',$add);  					
							$add_credit = get('additional_credit',$add); 
							$add_price = get('additional_price',$add);
							
							if($add_work_image){echo '<a href="'.$add_work_image.'" class="lightbox"><img src=\''.$add_work_image.'\' class="imagefield-field_pictures" style="width:250px"></a><br />
							';}
							if($add_work_title) {echo '<i>'.$add_work_title.', </i>
							';}
							if($add_year){echo $add_year.'<br />
							';}
							if($add_media){echo $add_media.'<br />
							';}
							if($add_dimensions){echo $add_dimensions.'<br />
							';}
							if($add_credit){echo $add_credit.'<br />
							';}
							if($add_price){echo $add_price.'<br />
							';}							
							echo '<br />';
						}
			
						
						
						//notes
						if($notes){echo $notes;}

						//echo "</p>";
						//echo "</p>";
						//echo "</div>";
						

				?>
				
	  
	<br style="clear:both" />
<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

</div>

<?php get_footer()?>