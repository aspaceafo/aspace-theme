<?php
/*
Template Name: Programs bt
*/
?>

<?php get_header(); ?>
<div class="page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div id="title">
		<?php 
		if(get('content_headline') != ''){
			echo get('content_headline');
		}else{
			the_title();
		} ?>
	</div>
		<div id="date_and_time">	
			<?= get('content_date_and_time'); ?>
		</div>
	<div id="header_content">
		<div id="content_summary_headline">
			<?= get('content_summary_headline'); ?>
		</div>
 <?php if(get('header_content_related_exhibition') != '') { ?>	
	      <div class="related-exhibition">
	      <p>In conjunction with the exhibition <em><?= get('header_content_related_exhibition'); ?></em></p>	 
			      <?php } ?>
	      </div>


	
<br style="clear:both">
	<div id="main_content">
		<div id="description">
			<?= get('content_body'); ?>
		</div>
		<div id="footnote">
			<?= get('content_footnote'); ?>
		</div>
		<?php
		$groupofgroups = get_group('video');
		if($groupofgroups){
		?>
	 		<div id="videos">
		 		<?php
					foreach($groupofgroups as $group){
						echo "<div>";
					echo '<p><iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0" width="480" height="270" frameborder="0"></iframe></p><br>';
echo "</div>";
				}
				?>
			
			<?php
	 	}
		?>
	</div>	</div>
		
		<?php
		$groupofgroups = get_group('pictures');
		if($groupofgroups){
		?>

			<div id="pictures">
						<?php
					foreach($groupofgroups as $group){
						echo "<div>";
						echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>";
						echo "<div class='description'>";
						echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle2'>";
						echo "<p>".$group['picture_title'][1]."</div><br />";
						echo "</p></div>";
					} 
					?>
					</div>
		<?php
		}
		?>

	
<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

</div>
<?php get_footer(); ?>