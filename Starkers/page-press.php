<?php
/*
Template Name: Press
*/
?>
<?php get_header(); ?>

<div class="page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php edit_post_link( 'edit', '<p>', '</p>'); ?> 

	<div id="title">
		<?= the_title(); ?>
	</div>
	<em>Note: for downloads of exhibition reviews and clippings please go to the exhibition related page.</em>
	<br />
	<br style="clear:both">
	<div id="main_content">
		<?= get('content_column'); ?>
		<p>Coverage</p>
		<?php
	    	$coverages = get_group('coverage');
			if($coverages){
	    		?>
	
	 			<div id="press_coverage">
		 			<?php
		 			foreach($coverages as $coverage){
						echo "<li><a href=\"".$coverage['coverage_downloads'][1]."\">".$coverage['coverage_file_label'][1]."</a></li>";
					}
					?>
				</div>

				<?php
	 		}	
		?>
	</div><!-- main_content -->
	
	<!-- column 2 = releases -->
	<div id="column_2">

		<?= get('content_column_2'); ?>
		<p>Releases</p>
		<?php
	    	$releases = get_group('releases');
			if($releases){
	    		?>
	
	 			<div id="press_releases">
		 			<?php
		 			foreach($releases as $release){
						echo "<li><a href=\"".$release['releases_downloads'][1]."\">".$release['releases_file_label'][1]."</a></li>";
					}
					?>
				</div>

				<?php
	 		}	
		?>

	</div><!-- column_2 -->
	
		
<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
</div>
<?php get_footer(); ?>
