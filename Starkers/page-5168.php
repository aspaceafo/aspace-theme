<?php
/*
Template Name: Programs-map
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
	<div id="header_content">
		<div id="date_and_time">	
			<?= get('content_date_and_time'); ?>
		</div>
	
		<div id="content_summary_headline">
			<?= get('content_summary_headline'); ?>
		</div>
 <?php if(get('header_content_related_exhibition') != '') { ?>	
	      <div class="related-exhibition">
	      <p>In conjunction with the exhibition <em><?= get('header_content_related_exhibition'); ?></em></p></div>	 
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

	</div>	
	<div id="column_2">
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
						<?php
						}
						?>
		<?php
		$groupofgroups = get_group('video');
		if($groupofgroups){
		?>
	
	 		<div id="videos">
	 					<?php
					foreach($groupofgroups as $group){
						echo "<div>";
						echo "<img src=\"".$group['video_still'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>";
						echo "<div class='description'>";
						echo '<p class="imagefield-field_pictures toggle2"><iframe src="http://player.vimeo.com/video/'.$group['video_videos'][1].'?title=0&amp;byline=0&amp;portrait=0" width="480" height="270" frameborder="0"></iframe>';
						echo "<br />".$group['video_description'][1]."</p></div>";
						echo "</div>";
				}
				?>
			</div>
			<?php
	 	}
		?>
				
		
</div></div>
		
<?php endwhile; else: ?>
	<div class="page">
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	</div>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>