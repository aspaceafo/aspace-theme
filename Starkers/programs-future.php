<?php
/*
Template Name: Programs - FUTURE
*/
?>
<?php get_header(); ?>
<?php
$query = 
"SELECT 
`wp_posts`.`post_title`, 
`wp_posts`.`ID`, 
`wp_posts`.`guid`, 
CAST(`end`.`meta_value` as DATE) as `enddate`,
CAST(`start`.`meta_value` as DATE) as `startdate`,
`eventtype`.`meta_value` as `event`,
`headlinedate`.`meta_value` as `dateandtime`,
`content`.`meta_value` as `content`,
`description`.`meta_value` as `headline`
FROM `wp_posts`, 
`wp_postmeta` as `end`,
`wp_postmeta` as `start`,
`wp_postmeta` as `description`,
`wp_postmeta` as `content`,
`wp_postmeta` as `headlinedate`,
`wp_postmeta` as `eventtype`,
`wp_postmeta` as `ex`
WHERE `wp_posts`.`post_type` = 'page' 
AND (`wp_posts`.`ID` = `end`.`post_id` AND `end`.`meta_key` = 'date_start_date' AND `end`.`meta_value` >= '".date("Y-m-d")."')
AND (`wp_posts`.`ID` = `start`.`post_id` AND `start`.`meta_key` = 'date_start_date')
AND (`wp_posts`.`ID` = `headlinedate`.`post_id` AND `headlinedate`.`meta_key` = 'content_date_and_time')
AND (`wp_posts`.`ID` = `description`.`post_id` AND `description`.`meta_key` = 'header_content_summary')
AND (`wp_posts`.`ID` = `content`.`post_id` AND `content`.`meta_key` = 'content_body')
AND (`wp_posts`.`ID` = `eventtype`.`post_id` AND `eventtype`.`meta_key` = 'content_summary_headline')
AND (`wp_posts`.`ID` = `ex`.`post_id` AND `ex`.`meta_key` = '_mf_write_panel_id' AND `ex`.`meta_value` = 2) 
AND `wp_posts`.`post_status` = 'publish' GROUP BY `wp_posts`.`ID`, YEAR(`end`.`meta_key`) ORDER BY `startdate` ASC";
$present = $wpdb->get_results($query, ARRAY_A);

?>
<div class="page">
	<div id="future_content">
		

	<?php                   
	//setup arrays
	$dates = array();
	$links = array();
	
	//foreach loop
if($present){
	foreach($present as $ex){
		$year = date('Y', strtotime($ex['startdate']));
		$startend = $ex['dateandtime'];
		$headline = $ex['headline'];
		$eventtype = $ex['event'];
		$content = $ex['content'];
		if($content != ''){
			$dates[''.$year.''] .= "
			<div>
				<p>
					<a href='".$ex['guid']."' class='large'>".$headline."</a>
				</p>
				<p>".$eventtype."</p>
				<p>".$startend."</p>
			</div>"; 
		}else{
			$dates[''.$year.''] .= "
			<div>
				<div class='large'>".$headline."</div>
				<p>".$eventtype."</p>
				<p>".$startend."</p>
			</div>"; 

	    }//end else
	}//end foreach($present)
   
    $datebox = "<div id='datebox'>";
	$links = '';	
	foreach($dates as $date => $link){
		//echo $date;
		$datebox .= "<h4><a class='datelink' href='#".$date."'>".$date."</a></h4>";
		$links .= "<div id='".$date."' class='datebox' style='display:none'>".$link.'</div>'."\n";
	}
	$datebox .= "</div>";
	echo $datebox;
	echo $links;
	
	
}//end if present
else{
	echo 'There are no upcoming programs at this time. Please check back later.';
	
}

	?>
</div>
  <div id="column_2" class="right_future">
	
  <!-- content -->

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php edit_post_link( 'edit', '<p>', '</p>'); ?> 

        <?php the_content(); ?>
  <?php endwhile; endif; ?>

	<!--
	<div id="visit-top">
	<p>Artists Space : Books &amp; Talks<br /> 55 Walker Street<br /> New York<br /> NY 10013<br />T 212 226 3970<br />
	<a href="mailto:bookstore@artistsspace.org">bookstore@artistsspace.org</a><br /><br /><br /></p></div>
	
	<p><img src="http://artistsspace.org/aspace/wp-content/files_mf/books-map.png" alt="Map, Artists Space: Books &amp; Talks" width="370" /><br /><small><a style="text-align: left;" href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=55+walker+street+nyc&amp;aq=&amp;sll=40.725925,-74.000688&amp;sspn=0.018473,0.037808&amp;ie=UTF8&amp;hq=&amp;hnear=55+Walker+St,+New+York,+10013&amp;t=m&amp;ll=40.726641,-74.001331&amp;spn=0.020814,0.02738&amp;z=14&amp;iwloc=A">View Larger Map</a></small>
	
	</p>
	-->
	<!-- end the content -->
	
	</div><!-- #column2 -->

</div>

<?php get_footer(); ?>