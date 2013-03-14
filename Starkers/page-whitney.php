<?php
/*
Template Name: Whitney
*/
?>
<?php get_header(); ?>

<div class="page">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php edit_post_link( 'edit', '<p>', '</p>'); ?> 

	<div id="title">
		<?php $title = get('content_headline'); ?>
			</div>
	<br style="clear:both">
	<div id="content_headline">
		<? //get('content_headline'); ?>
	</div>
	<br style="clear:both">
	


	
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
		$sponsors = get_group('logo');
		if($sponsors){
		?>
			<div id="sponsor-logo">
				<?php
			foreach($sponsors as $sponsor){
				echo "<div>";
				echo "<img src=\"".$sponsor['sponsor_logo_sponsor_logo'][1]["o"]."\" class='sponsor-logo'>";
				echo "</div>";
			} 
			?>
			</div>
		<?php
		}
		?>	
	
					<?php
		?>
	</div>

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
			<div id="whitney">
<div id="whitney-image"><img class="whitney" src="http://artistsspace.org/aspace/wp-content/files_mf/12_BIENNIAL_TITLE.png"></div>
		<?php
		$groupofgroups = get_group('programs');
		if($groupofgroups){
			?>
			
			<div id="whitney-programs">
				<p>Programs<br />
				April &mdash; June 2012</p>
				<br>
				<?php
				foreach($groupofgroups as $group){
					$group['program_link'][1] != '' ? $link = $group['program_link'][1] : $link = '#';
					echo "<a href='".$link."'>".$group['program_title'][1]."</a>";
					echo $group['program_type'][1]."<br />";
					echo $group['program_date'][1]."<br />";
					echo $group['program_time'][1]."<br /><br>";
				}
				?>
			</div>

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
				echo "<img src=\"".$group['picture_pictures'][1]["o"]."\" class='imagefield-field_pictures'>";
				echo "<div class='description'>".$group['picture_title'][1]."</div><br />";
				echo "</div>";
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
		 		<?php
		 		foreach($videos as $video){
					echo '<p><iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0"></iframe></p><br>';
				}
				?>
			</div>
			<?php
	 	}
		?>
		
	</div>	
	


<?php endwhile; else: ?>
	<div class="page">
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	</div>
<?php endif; ?>

</div>
<?php get_footer(); ?>