<?php
/*
Template Name: Exhibitions - TWO
*/
?>
<?php get_header(); ?>                                                              

<?php 
$page_id = 9684; 
$page_data = get_page($page_id); ?>

<?php
$title = $page_data->post_title; // Get title
$content = $page_data->post_content; // Get Content

echo $title;
echo $content;

wp_reset_query();  // Restore global post data stomped by the_post().
?>

<hr />

<?php 
$page_id = 9732; 
$page_data = get_page($page_id); ?>

<?php
$title = $page_data->post_title; // Get title
$content = $page_data->post_content; // Get Content

echo $title;
echo $content;
wp_reset_query();  // Restore global post data stomped by the_post().
?>

<?php get_footer(); ?>