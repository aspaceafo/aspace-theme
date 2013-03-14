<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>


				<div class="page">
				<h1><?php _e( 'Not Found', 'twentyten' ); ?></h1>
				<p>&nbsp;</p>
				<p><?php _e( 'The page you requested could not be found.', 'twentyten' ); ?></p>
				<p>&nbsp;</p>
				<p><?php// get_search_form(); ?></p>
		
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
</div>
<?php get_footer(); ?>