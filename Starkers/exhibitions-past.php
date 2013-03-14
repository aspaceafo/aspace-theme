<?php
/*
Template Name: Exhibitions - PAST
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
AND (`wp_posts`.`ID` = `end`.`post_id` AND `end`.`meta_key` = 'date_end_date' AND `end`.`meta_value` <= CURDATE())
AND (`wp_posts`.`ID` = `start`.`post_id` AND `start`.`meta_key` = 'date_start_date')
AND (`wp_posts`.`ID` = `ex`.`post_id` AND `ex`.`meta_key` = '_mf_write_panel_id' AND `ex`.`meta_value` = 1)
AND (`wp_posts`.`ID` = `content`.`post_id` AND `content`.`meta_key` = 'content_summary_headline') 
AND `wp_posts`.`post_status` = 'publish' GROUP BY `wp_posts`.`ID`, YEAR(`end`.`meta_key`) ORDER BY `startdate` DESC";
$present = $wpdb->get_results($query, ARRAY_A);
?>
<div class="page">
		
	<?php
	$dates = array();
	$links = array();
	foreach($present as $ex){
		$year = date('Y', strtotime($ex['startdate']));
		$startend = date('F j', strtotime($ex['startdate']))." - ".date('F j', strtotime($ex['enddate']));
		if($ex['description'] != ''){

//stripping tags to remove unusual breaks on the page
//			$div = array('<div>', '</div>');
//			$rep = array('', '<br />');
			$desc = $ex['description'];
//			$desc = str_replace($div, $rep, $desc);
			
			$dates[''.$year.''] .= "
			<div>
				<p id='text'>
					<a href='".$ex['guid']."' class='large'>
					".$desc."
					</a>
				</p>
				<p>".$startend."</p>
			</div> \n"; 

//			replace with strreplace  str_replace("%body%", "black", "<body text='%body%'>");

//			$dates[''.$year.''] .= "<div><p> ESTE <a href='".$ex['guid']."' class='large'>".$ex['description']."</a></p><p>".$startend."</p></div>"; 


		}else{
			
//			$dates[''.$year.''] .= "<div><p class='large'>".$ex['post_title']."</p><p>".$startend."</p></div>"; 
			$dates[''.$year.''] .= "<div>".$ex['post_title']."<br />".$startend."</div>"; 
		}
	}
	$datebox = "<div id='datebox'>";
	$links = '';
	foreach($dates as $date => $link){
		if($date >= '1973'){
				$datebox .= "<h4><a class='datelink ".$date."' href='#".$date."'>".$date."</a></h4>";
				//$datebox .= "<h4><a class='datelink' id='".$date."' href='#".$date."'>".$date."</a></h4>";
				$links .= "<div id='".$date."' class='datebox' style='display:none'>".$link.'</div>'."\n";
		}
	}
	$datebox .= "</div>";
	echo $datebox;
	echo $links;
	?>
</div>

<?php get_footer(); ?>