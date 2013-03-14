<?php
/*
Template Name: Content / Bookshop
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
<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
</div>
<?php get_footer(); ?>
