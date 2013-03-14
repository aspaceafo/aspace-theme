</div><!-- #content -->
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>


<script>
<?php if ( is_page_template('page-auction.php') ) { ?>
	jQuery(window).load(function(){
		jQuery('.page-template-page-auction-php #auction-list #post-8206 p a').click();
	});
<?php }?>      

function fadeIn(obj) {
    $(obj).show();
}

setTimeout(function() {
  if (location.hash) {
    window.scrollTo(0, 0);
  }
}, 1);

</script>

</html>