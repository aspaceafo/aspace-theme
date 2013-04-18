<?php
/*
Template Name: Exhibitions - TWO
*/
?>
<?php get_header(); ?>  
<div class="page">
                                                            
<?php // declare mf_get()

function mf_get($field,$id){
	$output = get($field,1,1,true,$id);
	return $output;
}

?>

<?php
//how to display each ex
function page_display($page_data,$page_id) {
	$id = $page_data->ID; // Get id
	$title = $page_data->post_title; // Get title
	$content = $page_data->post_content; // Get Content
		
?>
<div id="title">
	<a href="<?php echo get_permalink($id); ?>">
		<?php echo $title; ?>
	</a>
</div><!-- #title -->

<div id="date">
	<?php echo mf_get('content_subheadline',$id); ?>
</div><!-- #date -->

<div id="description">
	<?php 
	//truncate description to so many chars
	$summary = mf_get('main_content_description',$id);
	
	$pos = strpos($summary, ' ', 1000);
	$summary = substr($summary,0,$pos);
	
	?>
	
	<?php echo $summary ?>... <a href="<?php echo get_permalink($id); ?>">Read More</a>
	
</div><!-- #description -->


<?php /* pictures must go here now! */ ?>
		
<?php
$groupofgroups = get_group('pictures',$id);

	if($groupofgroups){ ?>

<div id="pictures">
	
	<?php
	foreach($groupofgroups as $group){
	
		echo "<div>";
		echo "<img src=\"".$group['picture_pictures'][1]["o"]."\" class='imagefield-field_pictures toggle thumbnail'>";
		echo "<div class='description'>";
		echo "<img src=\"".$group['picture_pictures'][1]["o"]."\" class='imagefield-field_pictures toggle2'>";
		echo "<p>".$group['picture_title'][1]."</div><br />";
		echo "</p></div>";
	
	}//foreach 
	?>
	
</div><!-- #pictures -->

<?php
	}//if pictures ?>
	
	
<?php	
}//end page_display
?>

<div id="left-column">

	<?php 
	/* begin ex_1 */
	$page_id_1 = 9684; 
	$page_data_1 = get_page($page_id_1); ?>
	
	<?php
	page_display($page_data_1,$page_id_1)
	?>
	
	<?php wp_reset_query();  // Restore global post data stomped by the_post().
	/* end ex_1 */ ?>

</div><!-- #left-column -->


<div id="right-column">

	<?php 
	/* begin ex_2 */
	$page_id_2 = 9732; 
	$page_data_2 = get_page($page_id_2); ?>
	
	<?php
	page_display($page_data_2,$page_id_2)
	?>
	
	<?php wp_reset_query();  // Restore global post data stomped by the_post(). 
	/* end ex_2 */?>

</div><!-- #right-column -->

<?php get_footer(); ?>