<?php
/*
Template Name: Auction
*/
get_header(); ?>
<div class="page">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php edit_post_link( 'edit', '<p>', '</p>'); ?> 

	<div id="title">
		<?= the_title(); ?>
	</div>
	<div id="main_content">
		<?php the_content(); ?>		
	<?php endwhile; ?>

</div>	

	<div id="auction-list">

		<?php
		if ( ! post_password_required() ) {
  		 
			$querydetails = "
			   SELECT wposts.*
			   FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
               WHERE wposts.ID = wpostmeta.post_id
   			   AND wpostmeta.meta_key = 'auctiongroup'  
			   AND wposts.post_status = 'publish'
			   ORDER BY wposts.post_title ASC
			 ";


			 $pageposts = $wpdb->get_results($querydetails, OBJECT);
			
            
			//print_r($pageposts);

			}?>          


	<?php
 ?>
 <?php if ($pageposts):      
 sort($pageposts, SORT_NATURAL | SORT_FLAG_CASE);
 foreach ($pageposts as $post):
 
       setup_postdata($post); ?>

		<div <?php post_class(); ?> id='post-<?php the_ID(); ?>'>
            <p>
				<a class="book-curator" href="<?php the_permalink() ?>"><?php if(get(first_name)){echo get(first_name).' ';}
				echo get(last_name); ?></a>
			</p>
		</div>

<?php endforeach;
endif; ?>
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