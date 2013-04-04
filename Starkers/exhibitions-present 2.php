<?php
/*
Template Name: Exhibitions - PRESENT NONE
*/
?>
<?php get_header(); ?>
<?php
$query = 
"SELECT 
`wp_posts`.`post_title`, 
`wp_posts`.`ID`, 
CAST(`end`.`meta_value` as DATE) as `enddate`
FROM `wp_posts`, 
`wp_postmeta` as `end`,
`wp_postmeta` as `ex`
WHERE `wp_posts`.`post_type` = 'page' 
AND (`wp_posts`.`ID` = `end`.`post_id` 
	AND `end`.`meta_key` = 'date_end_date' 

	AND `end`.`meta_value` >= '".date("Y-m-d")."')
AND (`wp_posts`.`ID` = `ex`.`post_id` AND `ex`.`meta_key` = '_mf_write_panel_id' AND `ex`.`meta_value` = 1) 
AND `wp_posts`.`post_status` = 'publish' GROUP BY `wp_posts`.`ID` LIMIT 1";
$present = $wpdb->get_results($query, ARRAY_A);
?>
<div class="page">

There is no exhibition up at the moment.



<?php get_footer(); ?>