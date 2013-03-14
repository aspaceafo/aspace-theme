<?php
/*
Template Name: Bookshop curator
*/
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/lib.js"></script>
	<div id="main_content">
				 <div id="column_2"> 
				<div id="book_content">
							<?php
		$groupofgroups = get_group('book');
		if($groupofgroups){
		?>
						
<div id="pictures">
<?php
						foreach($groupofgroups as $group){
							echo "<div>";
							$group['book_title'][1] != '' ? $link = $group['book_title'][1] : $link = '#';
							echo "<img src=\"".$group['book_image'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>";
							echo "<div class='description'>";
							echo "<img src=\"".$group['book_image'][1]["o"]."\" class='imagefield-field_pictures toggle2'>";
							echo "<p>".$group['book_title'][1]."<br />";
							echo $group['book_author'][1]."<br />";
							echo $group['book_publisher'][1]."<br />";
							echo $group['book_year'][1]."</div><br /><br>";
							echo "</p></div>";
						}
						?>
					</div></div>
		</div>
		<?php
		}
		?>
	<br style="clear:both" />
<?php endwhile; else: ?>
	<div class="page">
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	</div>
<?php endif; ?>



<?php get_footer(); ?>
