<?php
/*
Template Name: Programs - PAST
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
AND (`wp_posts`.`ID` = `end`.`post_id` AND `end`.`meta_key` = 'date_end_date' AND `end`.`meta_value` < CURDATE())
AND (`wp_posts`.`ID` = `start`.`post_id` AND `start`.`meta_key` = 'date_start_date')
AND (`wp_posts`.`ID` = `headlinedate`.`post_id` AND `headlinedate`.`meta_key` = 'content_date_and_time')
AND (`wp_posts`.`ID` = `description`.`post_id` AND `description`.`meta_key` = 'header_content_summary')
AND (`wp_posts`.`ID` = `content`.`post_id` AND `content`.`meta_key` = 'content_body')
AND (`wp_posts`.`ID` = `eventtype`.`post_id` AND `eventtype`.`meta_key` = 'content_summary_headline')
AND (`wp_posts`.`ID` = `ex`.`post_id` AND `ex`.`meta_key` = '_mf_write_panel_id' AND `ex`.`meta_value` = 2) 
AND `wp_posts`.`post_status` = 'publish' GROUP BY `wp_posts`.`ID`, YEAR(`end`.`meta_key`) ORDER BY `startdate` DESC";
$present = $wpdb->get_results($query, ARRAY_A);

?>
<div class="page">
	<?php
	$dates = array();
	$links = array();
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
		}
	}
	$datebox = "<div id='datebox'>";
	$links = ''
;	foreach($dates as $date => $link){
		//echo $date;
		$datebox .= "<h4><a class='datelink' href='#".$date."'>".$date."</a></h4>";
		$links .= "<div id='".$date."' class='datebox' style='display:none'>".$link.'</div>'."\n";
	}
	$datebox .= "</div>";
	echo $datebox;
	echo $links;
	?>
</div>

<?php get_footer(); ?>