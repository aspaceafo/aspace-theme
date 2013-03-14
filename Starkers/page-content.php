<?php
/*
Template Name: Content
*/
?>
<?php get_header(); ?>

<div class="page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php edit_post_link( 'edit', '<p>', '</p>'); ?> 

	<div id="title">
		<?= the_title(); ?>
	</div>
<br style="clear:both">
	<div id="main_content">
		<?= get('content_column'); ?> 

		
		<?php
	    	$pressdownloads = get_group('files');
			if($pressdownloads){
	    		?>
	 			<div id="press_downloads">
		 			<?php
		 			foreach($pressdownloads as $pressdownload){
						echo "<a href=\"".$pressdownload['file_downloads'][1]."\">".$pressdownload['file_file_label'][1]."</a>";
					}
					?>
				</div>
				<?php
	 		}	
		?>

		<?php
		if(is_page(814)){
			echo '<p>&nbsp</p><p>&nbsp</p>'.insert_cform('1');
		}?>
	</div>
	<div id="column_2">
		<?= get('content_column_2'); ?>
	</div>
	
		<?php
		$groupofgroups = get_group('pictures');
		
		//begin if
		if($groupofgroups){
		
		?>
			<div id="content_pictures">
			
			<?php
			
			if(is_page(735) == TRUE){

				foreach($groupofgroups as $group){
					echo "<div class='sidebar-image'>";
				
					if($group['picture_link'] != ''){
					//	echo '<a href="'.$group['picture_link'][1].'">';
					}
				
					//echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>";
					//echo "<img src=\"".$group['picture_image'][1][1]["o"]."\" class='imagefield-field_pictures'>";
					echo "<div class='description2'>";
					echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures2 toggle3'>";
					if($group['picture_link'] != ''){
					//	echo '</a>';
					echo '<div style="height:20px;"></div>';
					}
					echo "<p>".$group['picture_title'][1]."</div></p><br /><br />";
					echo "</div><!-- .sidebar-image -->";

				}
			}
			
			else{
				
				foreach($groupofgroups as $group){
					echo "<div class='sidebar-image'>";
				
					if($group['picture_link'] != ''){
						echo '<a href="'.$group['picture_link'][1].'">';
					}
				
					echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>";
					//echo "<img src=\"".$group['picture_image'][1][1]["o"]."\" class='imagefield-field_pictures'>";
					echo "<div class='description'>";
					echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle2'>";
					if($group['picture_link'] != ''){
						echo '</a>';
					}
					echo "<p>".$group['picture_title'][1]."</div></p>";
					echo "</div><!-- .sidebar-image -->";

				}//foreach($groupofgroups.. 

			}//else

			?>
		
			</div><!-- #content_pictures -->
		
		<?php
		
		}//
		
			?>
			
					
		
<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
</div>
<?php get_footer(); ?>
