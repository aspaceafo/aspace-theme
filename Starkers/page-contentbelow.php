<?php
/*
Template Name: Content Below
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
	</div>
	
	<div id="column_2">
		<?= get('content_column_2'); ?>
	</div>
	
		<?php
		$groupofgroups = get_group('pictures');
		if($groupofgroups){
		?>
		<br style="clear:both">

			<div id="content_pictures_below">
				<?php
			foreach($groupofgroups as $group){
				echo "<div>\n";
				echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>\n";
				echo "<div class='description'>\n";
				echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle2'>\n";
				echo "<div>".$group['picture_title'][1];

               if ($group['picture_link']) {
					echo '<div><a href="'.$group['picture_link'][1].'">Download</a></div><br />';	
				}
				
				
				echo "</div></div>\n\n";
			} 
			?>
			</div>

		<?php
		}
		?>
	<br style="clear:both" />
<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
</div>
<?php get_footer(); ?>
