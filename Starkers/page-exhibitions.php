<?php
/*
Template Name: Exhibitions
*/
?>
<?php get_header(); ?>

<div class="page">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php edit_post_link( 'edit', '<p>', '</p>'); ?> 


	<div id="title">
		<?php $title = get('content_headline'); ?>
		<?php if($title != ''): ?>
			<?= $title ?>
		<?php else: ?>
			<?= the_title(); ?>
		<?php endif;?>
	</div>
	<br style="clear:both">
	<div id="content_headline">
		<? //get('content_headline'); ?>
	</div>
	<br style="clear:both">
	<div id="date">
		<?= get('content_subheadline'); ?>
	</div>

	<div id="program_link">
		<?php $groupofgroups = get_group('programs'); 
		if($groupofgroups):?>
		<a href="#programs">To see programs, please click here</a>
		<?php endif; ?>
	</div><br>
	
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
		}
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
	 			<div id="press_downloads" style="clear:both;">
					<h3>Press Downloads</h3>
		 			<?php
		 			foreach($pressdownloads as $download){
						echo "<li><a href=\"".$download['press_download_file'][1]."\">".$download['press_download_summary'][1]."</a></li>";
					}
					?>
				</div>
				<?php
	 		}
		}	
		?>
	
			<br />


	</div>
	
		<?php
		$groupofgroups = get_group('pictures');
		if($groupofgroups){
		?>
		<div id="pictures">
						<?php
					foreach($groupofgroups as $group){
						echo "<div>";
						echo "<img src='".$group['picture_pictures'][1]["o"]."' class='imagefield-field_pictures toggle thumbnail' onload='fadeIn(this)'  style='display:none;' />";
						echo "<div class='description'>";
						echo "<img src='".$group['picture_pictures'][1]["o"]."' class='imagefield-field_pictures toggle2' onload='fadeIn(this)'  style='display:none;' />";
						echo "<p>".$group['picture_title'][1]."</div><br />";
						echo "</p>";
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