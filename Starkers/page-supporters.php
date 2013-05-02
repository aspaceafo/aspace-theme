<?php
/*
Template Name: Supporters
*/
?>
<?php get_header(); ?>
<div class="page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php edit_post_link( 'edit', '<p>', '</p>'); ?> 

	<div id="title">
		<?php echo the_title(); ?>
	</div>
<br style="clear:both">
	<div id="column1_supporters">
		<?php echo get('content_column'); ?>
	</div>
	<div id="column2_supporters">
		<?php echo get('content_column_2'); ?>
	</div>
	<div id="column3_supporters">
		<?php echo get('content_column_3'); ?>
	</div>
	
		<?php
		$groupofgroups = get_group('pictures');
		if($groupofgroups){
		?>
			<div id="content_pictures">
				<?php
			foreach($groupofgroups as $group){
				echo "<div>";
				echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures'>";
				echo "".$group['picture_title'][1]."<br />";
				echo "</div>";
			} 
			?>
			</div>
		<?php
		}
		?>

<?php endwhile; else: ?>
	<div class="page">
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	</div>
<?php endif; ?>
</div>
<?php get_footer(); ?>
