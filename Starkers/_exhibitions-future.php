<?php
/*
Template Name: Exhibitions - FUTURE archived
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
`content`.`meta_value` as `description`
FROM `wp_posts`, 
`wp_postmeta` as `end`,
`wp_postmeta` as `start`,
`wp_postmeta` as `content`,
`wp_postmeta` as `ex`
WHERE `wp_posts`.`post_type` = 'page' 
AND (`wp_posts`.`ID` = `start`.`post_id` AND `start`.`meta_key` = 'date_start_date' AND `start`.`meta_value` >= '".date("Y-m-d")."')
AND (`wp_posts`.`ID` = `end`.`post_id` AND `end`.`meta_key` = 'date_end_date')
AND (`wp_posts`.`ID` = `ex`.`post_id` AND `ex`.`meta_key` = '_mf_write_panel_id' AND `ex`.`meta_value` = 1)
AND (`wp_posts`.`ID` = `content`.`post_id` AND `content`.`meta_key` = 'content_summary_headline') 
AND `wp_posts`.`post_status` = 'publish' GROUP BY `wp_posts`.`ID`, YEAR(`end`.`meta_key`) ORDER BY `startdate` ASC";
$present = $wpdb->get_results($query, ARRAY_A);
?>
<div class="page">
	<?php
	$dates = array();
	$links = array();
	
//	if($ex['date_start_date'])
  if($ex['description']){


		foreach($present as $ex){
			$year = date('Y', strtotime($ex['startdate']));
			$startend = date('F j', strtotime($ex['startdate']))." – ".date('F j, Y', strtotime($ex['enddate']));

	//		if($ex['description'])
			   // $dates[''.$year.''] .= ''
			
				echo"<div>
					<p>
						<a href='".$ex['guid']."' class='large'>"
							.$ex['description']."
						</a>
					</p>
					<p>".$startend."</p>
				
				</div>
				
			<br />"; 
	   }//foreach
	}//if
	 
		
		else{
			echo "<div>No upcoming exhibitions at this time.</div>"; 
		}
	

	?>


</div>

<?php get_footer(); ?>