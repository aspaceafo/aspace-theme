<?php
/*
Template Name: Bookstore
*/

get_header(); ?>
<div class="page">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php edit_post_link( 'edit', '<p>', '</p>'); ?> 
	<div id="title">
		<?= the_title(); ?>
	</div>
<br style="clear:both">
	<div id="main_content">
		<?php the_content(); ?>	

	<?php endwhile; ?>

	<div id="bookstore-list">
	<?php

 $querydetails = "
   SELECT wposts.*
   FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
   WHERE wposts.ID = wpostmeta.post_id
   AND wpostmeta.meta_key = 'bookcurator'
   AND wposts.post_status = 'publish'
   ORDER BY wposts.post_date DESC
 ";


 $pageposts = $wpdb->get_results($querydetails, OBJECT)

 ?>

	<?php if ($pageposts):       
	 foreach ($pageposts as $post):
	       setup_postdata($post); ?>

			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<p>
					<a class="book-curator" id="<?php the_ID(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</p>
			</div>
            

		

	 <?php endforeach;
	endif; ?>
	<br /><br />

</div> 

   	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <?= get('content_column'); ?>	
    
 	    <?php
			$pressdownloads = get_group('files');
			if($pressdownloads){
				?>
				<div id="press_downloads">
		 			<?php
		 			foreach($pressdownloads as $pressdownload){
						echo "<a href=\"".$pressdownload['file_downloads'][1]."\">".$pressdownload['file_file_label'][1]."</a>";
					}
					?>

				</div><!--#press_downloads-->
				<?php
			}	
	     ?>
	<?php endwhile; ?>
	<?php endif; ?>
	
 

	


	</div>
	
	<div id="column_2">
		<div id = "bookstore-content">
		</div>
	</div>

	</div>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>