<?php
/*
Template Name: Exhibitions - PRESENT BOTTOM TEST
*/
?>
<?php get_header(); ?>
<?php
$query = 
"SELECT 
`wp_posts`.`post_title`, 
`wp_posts`.`ID`, 
CAST(`end`.`meta_value` as DATE) as `enddate`
FROM `wp_posts`, 
`wp_postmeta` as `end`,
`wp_postmeta` as `ex`
WHERE `wp_posts`.`post_type` = 'page' 
AND (`wp_posts`.`ID` = `end`.`post_id` AND `end`.`meta_key` = 'date_end_date' AND `end`.`meta_value` >= '".date("Y-m-d")."')
AND (`wp_posts`.`ID` = `ex`.`post_id` AND `ex`.`meta_key` = '_mf_write_panel_id' AND `ex`.`meta_value` = 1) 
AND `wp_posts`.`post_status` = 'publish' GROUP BY `wp_posts`.`ID` LIMIT 1";
$present = $wpdb->get_results($query, ARRAY_A);
?>
<div class="page">

<?php if($present){?>
	<?php foreach($present as $event){?>
		
		<?php query_posts('page_id='.$event['ID'] );?>

		<!-- START EX TEMPLATE -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="title">

				<?php
				//this desperately needs to be changed
				?>
				<a href="http://artistsspace.org/exhibitions/bernadette-corporation/">

				<?php $title = get('content_headline'); ?>
				<?php if($title != ''): ?>
					<?= $title ?>
				<?php else: ?>
					<?= the_title(); ?>
				<?php endif;?>
				</a>
			</div>
			<br />
			<div id="date">
				<?= get('content_subheadline'); ?>
				<!-- <?//= date('F j', strtotime(get('date_start_date'))); ?> - <?//= date('F j, Y', strtotime(get('date_end_date'))); ?> -->
			</div>
			<?php
			$groupofgroups = get_group('programs');
			if($groupofgroups){
				?>
				<div id="program_link">
					<a href="#programs">To see programs, please click here</a>
				</div>
			<?php } ?>	
			<br />
			<div id="main_content">
				<div id="related_programs">
					<?= get('main_content_related_programs'); ?>
				</div>
				<div id="description">
					<?= get('main_content_description'); ?>
				</div>

				<div id="footnote">
					<?= get('main_content_footnote'); ?>
				</div>
							<?php
				$groupofgroups = get_group('programs');
				if($groupofgroups){
					?>
					<br />
					<div id="programs">
						<h3>Programs</h3>
						<?php
						foreach($groupofgroups as $group){
							$group['program_link'][1] != '' ? $link = $group['program_link'][1] : $link = '#';
							echo "<h4><a href='".$link."'>".$group['program_title'][1]."</a></h4><br>";
							echo $group['program_type'][1]."<br />";
							echo $group['program_date'][1]."<br />";
							echo $group['program_time'][1]."<br /><br>";
						}
						?>
					</div>
				<?php

				$downloads = get_group('Public Download');
				if($downloads){
					?>
					<div id="downloads">
						<h3>Downloads</h3>
			 			<?php
			 			foreach($downloads as $download){
							echo "<a href=\"".$download['public_download_file'][1]."\">".$download['public_download_summary'][1]."</a><br>";
						}
						?>
					</div>
					<?php
				}
				?>

				<?php
				if ( is_user_logged_in() ) {
			    	$pressdownloads = get_group('Press Downloads');
					if($pressdownloads){
			    		?>
			 			<div id="press_downloads">
							<h3>Press Downloads</h3>
				 			<?php
				 			foreach($pressdownloads as $download){
								echo "<a href=\"".$download['press_download_file'][1]."\">".$download['press_download_summary'][1]."</a><br>";
							}
							?>
						</div>
						<?php
			 		}
				}	
				?>
					<br />
					<?php
				}
				?>
			
			</div>

				<?php
				$groupofgroups = get_group('pictures');
				if($groupofgroups){
				?>
					<div id="pictures">
						<?php
					foreach($groupofgroups as $group){
						echo "<div>";
						echo "<img src=\"".$group['picture_pictures'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>";
						echo "<div class='description'>";
						echo "<img src=\"".$group['picture_pictures'][1]["o"]."\" class='imagefield-field_pictures toggle2'>";
						echo "<p>".$group['picture_title'][1]."</div><br />";
						echo "</p></div>";
					} 
					?>
					</div>
				<?php
				}
				?>

				<?php
				$videos = get_field_duplicate('attachment_videos');

			 	if($videos){
			 		?>
			 		<div id="videos">
						<h4>Videos</h4>
				 		<?php
				 		foreach($videos as $video){
							echo '<p><iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0"></iframe></p><br>';
						}
						?>
					</div>
					<?php
			 	}
				?>
				<br style="clear:both" />
			</div>	
			<br style="clear:both">
		
			<?php
			if ( is_user_logged_in() ) {
		    	$pressdownloads = get_group('press_download');
				if($pressdownloads){
		    		?>
		 			<div id="press_downloads">
			 			<?php
			 			foreach($pressdownloads as $pressdownload){
							echo "<a href=\"".$pressdownload['press_download_file'][1]."\">".$pressdownload['press_download_summary'][1]."</a>";
						}
						?>
					</div>
					<?php
		 		}
			}	
			?>
		


		<?php endwhile; else: ?>

			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

		<?php endif; ?>
		
		
	<?php } ?>
</div>
<?php }else{ ?>
No exhibition up at the moment.
<?php } ?>



<?php get_footer(); ?>