<?php
/*
Template Name: Content Below - auction
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
		<?php
		$groupofgroups = get_group('pictures');
		if($groupofgroups){
		?>
			<div id="content_pictures">
				<?php /*
				$group = array_shift($groupofgroups);
				echo "<div>\n";
				echo "<img src=\"".$group['picture_image'][1]["o"]."\" style='width:215px;'>\n";
				echo "<div class='description'>".$group['picture_title'][1]."</div><br />\n";
				echo "</div>\n\n";
				*/?>
			</div>
			<br style="clear:both">
			<div id="content_pictures_below">
				<div id="content_pictures_below">
				<?php
			foreach($groupofgroups as $group){?>
				echo "<div>\n";
				echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>\n";
				echo "<div class='description'>\n";
				echo "<img src=\"".$group['picture_image'][1]["o"]."\" class='imagefield-field_pictures toggle2'>\n";
				echo "<p>".$group['picture_title'][1]."</div><br />\n";
				echo "</p></div>\n\n";
			<?php
			//additional images
		  	// duplicate groups.
          	// getGroupOrder us back an array of the order of groups
			// The parameter for this function is the name of a field belonging to the group
			$additional = getGroupOrder($group['additional_work_image']);
			
			print_r $additional;
			
			foreach($additional as $add){
				// the second parameter of the function and get_image get is the index of the group to show
				$add_work_image = get('additional_work_image',$add);
				$add_work_title = get('additional_work_title',$add);
				$add_year = get('additional_year',$add);
				$add_dimensions = get('additional_dimensions',$add);
				$add_media = get('additional_media',$add);  					
				$add_price = get('additional_price',$add);
				
				if($add_work_image){echo '<a href="'.$add_work_image.'" class="lightbox"><img src=\''.$add_work_image.'\' class="imagefield-field_pictures" style="width:250px"></a><br />
				';}
				if($add_work_title) {echo '<i>'.$add_work_title.', </i>
				';}
				if($add_year){echo $add_year.'<br />
				';}
				if($add_media){echo $add_media.'<br />
				';}
				if($add_dimensions){echo $add_dimensions.'<br />
				';}							
				if($add_price){echo $add_price.'<br />
				';}							
				echo '<br />';
  			}//additional
			
			
			}//foreach groupofgroups as group 
			?>
			</div>
		<?php
		}
		?>
	<br style="clear:both" />
<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
</div>
<?php get_footer(); ?>
