<?php
/*
Template Name: Content-education
*/
?>
<?php get_header(); ?>
<div class="page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
	</div>
	<div id="column_2">
		<?= get('content_column_2'); ?>
	</div>
	
		<?php
		$groupofgroups = get_group('pictures');
		if($groupofgroups){
		?>
			<div id="content_pictures">
				<?php
			foreach($groupofgroups as $group){
				echo "<div class='sidebar-image'>";
				
				if($group['picture_link'] != ''){
					echo '<a href="'.$group['picture_link'][1].'">';
				}
				
				echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures thumbnail'>";
				//echo "<img src=\"".$group['picture_image'][1][1]["o"]."\" class='imagefield-field_pictures'>";
				echo "<div class='description'>";
				
				if($group['picture_link'] != ''){
					echo '</a>';
				}
				echo "<p>".$group['picture_title'][1]."</div></p>";
				echo "</div>";
			} 
		}
			?>
			</div>
		
<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
</div>
<?php get_footer(); ?>
